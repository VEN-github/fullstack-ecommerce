<?php

namespace App\Controllers\Client;

use App\Core\Controller;
use App\Models\User;
use App\Models\LoginForm;
use App\Core\Middlewares\GuestMiddleware;
use App\Core\Request;
use App\Core\Response;
use App\Core\Application;

/**
 * AuthController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers\Client
 */
class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new GuestMiddleware(['register', 'login']));
    }

    public function register(Request $request, Response $response)
    {
        $user = new User();
        $loginForm = new LoginForm();

        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                $loginForm->loadData($request->getBody());
                $loginForm->login('user');
                $response->redirect('/');
                return;
            }
        }

        $params = [
            'title' => 'Create Account',
            'model' => $user,
        ];
        return $this->render('client/auth/register', $params);
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();

        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());

            if ($loginForm->validate() && $loginForm->login('user')) {
                $response->redirect('/');
                return;
            }
        }

        $params = [
            'title' => 'Login',
            'model' => $loginForm,
        ];
        return $this->render('client/auth/login', $params);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout('user');
        $response->redirect('/');
    }
}
