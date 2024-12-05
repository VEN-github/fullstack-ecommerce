<?php

namespace App\Controllers\Client;

use App\Core\Controller;

/**
 * AuthController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers\Client
 */
class AuthController extends Controller
{
  public function register()
  {
    $params = [
      'title' => 'Create Account'
    ];

    return $this->render('client/auth/register', $params);
  }

  public function login()
  {
    $params = [
      'title' => 'Login'
    ];

    return $this->render('client/auth/login', $params);
  }
}
