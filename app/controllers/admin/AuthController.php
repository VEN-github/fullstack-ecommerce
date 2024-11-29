<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Request;
use App\Models\Login;

/**
 * AuthController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers
 */
class AuthController extends Controller
{
  public function index(Request $request)
  {
    $login = new Login();
    $this->setLayout('admin_auth');

    if ($request->isPost()) {
      $login = new Login();

      $login->loadData($request->getBody());

      if ($login->validate() && $login->login()) {
        return 'success';
      }
      return $this->render('admin/auth/login', [
        'login' => $login
      ]);
    }

    return $this->render('admin/auth/login', [
      'login' => $login
    ]);
  }
}
