<?php

namespace App\Models;

use App\Core\Application;
use App\Core\Model;
use App\Models\Admin;

/**
 * LoginForm
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Models
 */
class LoginForm extends Model
{
  public string $email = '';
  public string $password = '';

  public function rules(): array
  {
    return [
      'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
      'password' => [self::RULE_REQUIRED],
    ];
  }

  public function labels(): array
  {
    return [
      'email' => 'Email address',
      'password' => 'Password',
    ];
  }

  public function login()
  {
    $admin = (new Admin())->findOne(['email' => $this->email]);

    if (!$admin) {
      $this->addError('email', 'Admin does not exist with this email address.');
      return false;
    }

    if (!password_verify($this->password, $admin->password)) {
      $this->addError('password', 'Password is incorrect.');
      return false;
    }

    return Application::$app->login($admin, 'admin');
  }
}
