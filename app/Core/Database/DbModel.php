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
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    abstract public function primaryKey(): string;

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
        $attributes[] = 'updated_at';

        $params = array_map(fn($attr) => "$attr = :$attr", $attributes);

        $statement = self::prepare(
            "UPDATE $tableName SET " .
                implode(',', $params) .
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

    public function findOne($where)
    {
        $tableName = static::tableName();

        $attributes = array_keys($where);
        $sql = implode(' AND ', array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");

        foreach ($where as $key => $value) {
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
