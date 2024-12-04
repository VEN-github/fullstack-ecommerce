<?php

namespace App\Core\Middlewares;

use App\Core\Application;

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
    if (!Application::$app->admin) {
      if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
        Application::$app->response->redirect('/admin/login');
      }
    }
  }
}
