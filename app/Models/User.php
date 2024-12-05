<?php

namespace App\Models;

use App\Core\UserModel;

/**
 * User
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Models
 */
class User extends UserModel
{
  public int $id = 0;
  public string $first_name = '';
  public string $last_name = '';
  public string $email = '';
  public string $password = '';
  public string $confirm_password = '';
  public string $created_at = '';

  public function tableName(): string
  {
    return 'users';
  }

  public function primaryKey(): string
  {
    return 'id';
  }

  public function rules(): array
  {
    return [
      'first_name' => [self::RULE_REQUIRED],
      'last_name' => [self::RULE_REQUIRED],
      'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
      'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
      'confirm_password' => [[self::RULE_MATCH, 'match' => 'password']],
    ];
  }

  public function attributes(): array
  {
    return ['first_name', 'last_name', 'email', 'password'];
  }

  public function save()
  {
    $this->password = password_hash($this->password, PASSWORD_DEFAULT);
    return parent::save();
  }

  public function getDisplayName(): string
  {
    return $this->first_name . ' ' . $this->last_name;
  }

  public function getEmail(): string
  {
    return $this->email;
  }
}
