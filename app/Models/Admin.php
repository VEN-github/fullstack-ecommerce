<?php

namespace App\Models;

use App\Core\Application;
use App\Core\DbModel;

/**
 * Login
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Models
 */
class Admin extends DbModel
{
  public string $email = '';
  public string $password = '';


  public function tableName(): string
  {
    return 'admin';
  }

  public function primaryKey(): string
  {
    return 'id';
  }

  public function login()
  {
    $admin = self::findOne(['email' => $this->email]);
    if (!$admin) {
      $this->addError('email', 'Admin does not exist with this email address.');
      return false;
    }

    if (!password_verify($this->password, $admin->password)) {
      $this->addError('password', 'Password is incorrect.');
      return false;
    }

    dd($admin);

    return Application::$app->login($admin);
  }

  public function rules(): array
  {
    return [
      'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
      'password' => [self::RULE_REQUIRED],
    ];
  }

  public function attributes(): array
  {
    return ['email', 'password'];
  }

  public function labels(): array
  {
    return [
      'email' => 'Email address',
      'password' => 'Password',
    ];
  }
}
