<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Models\Admin;

/**
 * AuthController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers
 */
class AuthController extends Controller
{
  public function index(Request $request, Response $response)
  {
    $admin = new Admin();
    $this->setLayout('admin_auth');

    if ($request->isPost()) {
      $admin->loadData($request->getBody());

      if ($admin->validate() && $admin->login()) {
        $response->redirect('/admin');
        return;
      }

      return $this->render('admin/auth/login', [
        'model' => $admin
      ]);
    }

    return $this->render('admin/auth/login', [
      'model' => $admin
    ]);
  }
}
