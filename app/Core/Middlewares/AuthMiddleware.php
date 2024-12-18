<?php

namespace App\Core\Middlewares;

use App\Core\Application;
use App\Core\Exception\ForbiddenException;

/**
 * AuthMiddleware
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Middlewares
 */
class AuthMiddleware extends BaseMiddleware
{
    protected array $actions;

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        $isAdmin = str_contains(Application::$app->request->getPath(), 'admin');

        if (!Application::$app->admin && $isAdmin) {
            if (
                empty($this->actions) ||
                in_array(Application::$app->controller->action, $this->actions)
            ) {
                throw new ForbiddenException();
            }
        }

        if (!Application::$app->user && !$isAdmin) {
            if (
                empty($this->actions) ||
                in_array(Application::$app->controller->action, $this->actions)
            ) {
                Application::$app->response->redirect('/');
            }
        }
    }
}
