<?php

namespace App\Core\Database;

use App\Core\Model;
use App\Core\Application;

/**
 * DbModel
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Database
 */
abstract class DbModel extends Model
{
    protected array $conditions = [];
    protected array $orders = [];

    abstract public function tableName(): string;

    abstract public function attributes(): array;

    abstract public function primaryKey(): string;

    public function where(array $conditions): self
    {
        $this->conditions = $conditions;
        return $this;
    }

    public function orderBy(string $column = 'created_at', string $order = 'DESC'): self
    {
        $this->orders[] = "$column $order";
        return $this;
    }

    public function get($query = null): array
    {
        $tableName = $this->tableName();
        $sql = $query ?? "SELECT * FROM $tableName";
        $params = [];

        if (!empty($this->conditions)) {
            $where = [];

            foreach ($this->conditions as $key => $value) {
                if (strtoupper($value) === 'IS NULL') {
                    $where[] = "$key $value";
                } else {
                    $where[] = "$key = :$key";
                    $params[$key] = $value;
                }
            }

            $where = implode(' AND ', $where);
            $sql .= " WHERE $where";
        }

        if (!empty($this->orders)) {
            $order = implode(', ', $this->orders);
            $sql .= " ORDER BY $order";
        }

        return static::findAll($sql, $params);
    }

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $params = array_map(fn($attr) => ":$attr", $attributes);

        $statement = self::prepare(
            "INSERT INTO $tableName (" .
                implode(',', $attributes) .
                ') VALUES (' .
                implode(',', $params) .
                ')'
        );

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();

        return true;
    }

    public function update()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $params = array_map(fn($attr) => "$attr = :$attr", $attributes);

        $statement = self::prepare(
            "UPDATE $tableName SET " .
                implode(',', $params) .
                ',updated_at = :updated_at' .
                ' WHERE ' .
                $this->primaryKey() .
                ' = :' .
                $this->primaryKey()
        );

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->bindValue(':' . $this->primaryKey(), $this->{$this->primaryKey()});
        $statement->bindValue(':updated_at', date('Y-m-d H:i:s'));

        $statement->execute();

        return true;
    }

    public function delete()
    {
        $tableName = $this->tableName();

        $statement = self::prepare(
            "UPDATE $tableName SET deleted_at = :deleted_at WHERE " .
                $this->primaryKey() .
                ' = :' .
                $this->primaryKey()
        );

        $statement->bindValue(':' . $this->primaryKey(), $this->{$this->primaryKey()});
        $statement->bindValue(':deleted_at', date('Y-m-d H:i:s'));

        $statement->execute();

        return true;
    }

    public function findAll(string $sql, array $params = [])
    {
        $statement = self::prepare($sql);

        foreach ($params as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_CLASS, static::class);
    }

    public function findOne()
    {
        $tableName = static::tableName();
        $sql = "SELECT * FROM $tableName";

        if (!empty($this->conditions)) {
            $where = implode(
                ' AND ',
                array_map(fn($key) => "$key = :$key", array_keys($this->conditions))
            );
            $sql .= " WHERE $where";
        }

        $statement = self::prepare($sql);

        foreach ($this->conditions as $key => $value) {
            $statement->bindValue(":$key", $value);
        }

        $statement->execute();

        return $statement->fetchObject(static::class);
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}
