<?php

namespace App\Core;

use App\Core\Middlewares\BaseMiddleware;

/**
 * Controller
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core
 */
class Controller
{
  public string $layout = 'main';
  public string $action = '';
  /**
   * @var \App\Core\Middlewares\BaseMiddleware[]
   */
  protected array $middlewares = [];

  public function setLayout($layout)
  {
    $this->layout = $layout;
  }

  public function render($view, $params = [])
  {
    return Application::$app->view->renderView($view, $params);
  }

  public function registerMiddleware(BaseMiddleware $middleware)
  {
    $this->middlewares[] = $middleware;
  }

  public function getMiddlewares(): array
  {
    return $this->middlewares;
  }

  public function executeMiddlewares()
  {
    foreach ($this->middlewares as $middleware) {
      $middleware->execute();
    }
  }
}
