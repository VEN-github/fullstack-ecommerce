<?php

namespace App\Controllers\Admin;

use App\Core\Middlewares\GuestMiddleware;
use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Models\LoginForm;

/**
 * AuthController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers\Admin
 */
class AuthController extends Controller
{
  public function __construct()
  {
    $this->registerMiddleware(new GuestMiddleware(['index']));
  }

  public function index(Request $request, Response $response)
  {
    $loginForm = new LoginForm();

    if ($request->isPost()) {
      $loginForm->loadData($request->getBody());

      if ($loginForm->validate() && $loginForm->login()) {
        $response->redirect('/admin');
        return;
      }
    }

    $this->setLayout('admin_auth');
    return $this->render('admin/auth/login', [
      'model' => $loginForm
    ]);
  }

  public function logout(Request $request, Response $response)
  {
    Application::$app->logout('admin');
    $response->redirect('/admin/login');
  }
}
