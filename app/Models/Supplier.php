<?php

namespace App\Models;

use App\Core\Database\DbModel;

/**
 * Supplier
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Models
 */
class Supplier extends DbModel
{
  public int $id = 0;
  public string $name = '';
  public string $email = '';
  public string $address = '';
  public string $phone = '';
  public string $created_at = '';

  public function tableName(): string
  {
    return 'suppliers';
  }

  public function primaryKey(): string
  {
    return 'id';
  }

  public function attributes(): array
  {
    return ['name', 'email', 'address', 'phone'];
  }

  public function rules(): array
  {
    return [
      'name' => [self::RULE_REQUIRED],
      'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
      'address' => [self::RULE_REQUIRED],
      'phone' => [self::RULE_REQUIRED],
    ];
  }

  public function get()
  {
    $tableName = $this->tableName();

    $statement = self::prepare("SELECT * FROM $tableName ORDER BY created_at DESC");
    $statement->execute();

    return $statement->fetchAll(\PDO::FETCH_CLASS, static::class);
  }
}
