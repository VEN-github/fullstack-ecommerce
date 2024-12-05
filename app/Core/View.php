<?php

namespace App\Core;

/**
 * View
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core
 */
class View
{
  public string $title = '';

  public function renderView($view, $params = [])
  {
    $layoutContent = $this->layoutContent($params);
    $viewContent = $this->renderOnlyView($view, $params);
    return str_replace('{{content}}', $viewContent, $layoutContent);
  }

  public function renderContent($viewContent)
  {
    $layoutContent = $this->layoutContent();
    return str_replace('{{content}}', $viewContent, $layoutContent);
  }

  protected function layoutContent($params = [])
  {
    if (isset(Application::$app->controller)) {
      $layout = Application::$app->controller->layout;
    } else {
      $layout = str_contains($_SERVER['REQUEST_URI'], 'admin') ? 'admin_auth' : 'main';
    }

    foreach ($params as $key => $value) {
      $$key = $value;
    }

    ob_start();
    include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
    return ob_get_clean();
  }

  protected function renderOnlyView($view, $params)
  {
    foreach ($params as $key => $value) {
      $$key = $value;
    }

    ob_start();
    $viewPath = Application::$ROOT_DIR . "/views/$view.php";
    include_once $viewPath;
    return ob_get_clean();
  }
}
