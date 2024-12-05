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

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->registerRoute('get', $path, $callback);
    }

    public function post($path, $callback)
    {
        $this->registerRoute('post', $path, $callback);
    }

    public function registerRoute($method, $path, $callback)
    {
        $normalizedPrefix = $this->prefix ? '/' . trim($this->prefix, '/') : '';
        $normalizedPath = $path === '/' ? '' : '/' . ltrim($path, '/');

        // Combine prefix and path to form the full path    
        $fullPath = $normalizedPrefix . $normalizedPath;

        // Ensure the root path is properly set as "/"
        $fullPath = $fullPath === '' ? '/' : $fullPath;

        $this->routes[$method][$fullPath] = $callback;
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
        $method = $this->request->method();
        $callback = isset($this->routes[$method][$path]) ? $this->routes[$method][$path] : false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            $view = str_contains($_SERVER['REQUEST_URI'], 'admin') ? 'errors/admin/_404' : 'errors/client/_404';

            return Application::$app->view->renderView($view);
        }
        if (is_string($callback)) {
            return Application::$app->view->renderView($callback);
        }
        if (is_array($callback)) {
            /** @var \App\Core\Controller $controller */
            $controller = new $callback[0]();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;

            // Execute controller-level middlewares
            $controller->executeMiddlewares();
        }

        return call_user_func($callback, $this->request, $this->response);
    }
}
