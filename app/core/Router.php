<?php

namespace App\Core;

/**
 * Router
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core
 */
class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];
    protected string $prefix = '';
    /**
     * __construct
     *
     * @param  mixed $request
     * @param  mixed $response
     * @return void
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $normalizedPrefix = $this->prefix ? '/' . trim($this->prefix, '/') : '';
        $normalizedPath = $path === '/' ? '' : '/' . ltrim($path, '/');

        // Combine prefix and path to form the full path
        $fullPath = $normalizedPrefix . $normalizedPath;

        // Ensure the root path is properly set as "/"
        $fullPath = $fullPath === '' ? '/' : $fullPath;


        $this->routes['get'][$fullPath] = $callback;
    }

    public function group($prefix, $callback)
    {
        // Store the current prefix to modify route paths dynamically
        $previousPrefix = $this->prefix;
        $this->prefix = $prefix;

        // Call the callback to register the routes within the group
        $callback($this);

        // Restore the original prefix
        $this->prefix = $previousPrefix;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = isset($this->routes[$method][$path]) ? $this->routes[$method][$path] : false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView('errors/_404');
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        return call_user_func($callback, $this->request);
    }

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
        $layout = Application::$app->controller->layout ?? 'main';
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
