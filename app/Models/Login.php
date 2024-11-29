<?php

namespace App\Models;

use App\Core\Model;

/**
 * Login
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Models
 */
class Login extends Model
{
  public string $email = '';
  public string $password = '';

  public function login()
  {
    echo 'login';
  }

  public function rules(): array
  {
    return [
      'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
      'password' => [self::RULE_REQUIRED],
    ];
  }
}
