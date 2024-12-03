<?php

namespace App\Core;

/**
 * Controller
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core
 */
class Controller
{
  public string $layout = 'main';
  public function setLayout($layout)
  {
    $this->layout = $layout;
  }

  public function render($view, $params = [])
  {
    return Application::$app->router->renderView($view, $params);
  }
}
