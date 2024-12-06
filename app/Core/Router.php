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
    private array $route_map = [];
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

        $this->route_map[$method][$fullPath] = $callback;
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

    public function getRouteMap($method): array
    {
        return $this->route_map[$method] ?? [];
    }

    public function getCallback()
    {
        $method = $this->request->method();
        $url = $this->request->getPath();
        // Trim slashes
        $url = trim($url, '/');

        // Get all routes for current request method
        $routes = $this->getRouteMap($method);

        $routeParams = false;

        // Start iterating registed routes
        foreach ($routes as $route => $callback) {
            // Trim slashes
            $route = trim($route, '/');
            $routeNames = [];

            if (!$route) {
                continue;
            }

            // Find all route names from route and save in $routeNames
            if (preg_match_all('/\{(\w+)(:[^}]+)?}/', $route, $matches)) {
                $routeNames = $matches[1];
            }

            // Convert route name into regex pattern
            $routeRegex =
                '@^' .
                preg_replace_callback(
                    '/\{\w+(:([^}]+))?}/',
                    fn($m) => isset($m[2]) ? "({$m[2]})" : '(\w+)',
                    $route
                ) .
                "$@";

            // Test and match current route against $routeRegex
            if (preg_match_all($routeRegex, $url, $valueMatches)) {
                $values = [];
                for ($i = 1; $i < count($valueMatches); $i++) {
                    $values[] = $valueMatches[$i][0];
                }
                $routeParams = array_combine($routeNames, $values);

                $this->request->setRouteParams($routeParams);
                return $callback;
            }
        }

        return false;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = isset($this->route_map[$method][$path])
            ? $this->route_map[$method][$path]
            : false;
        $isAdmin = str_contains($path, 'admin');

        if (!$callback) {
            $callback = $this->getCallback();

            if ($callback === false) {
                $this->response->setStatusCode(404);
                $view = $isAdmin ? 'errors/admin/_404' : 'errors/client/_404';

                return Application::$app->view->renderView($view);
            }
        }
        if (is_string($callback)) {
            return Application::$app->view->renderView($callback);
        }
        if (is_array($callback)) {
            /** @var \App\Core\Controller $controller */
            $controller = new ($callback[0])();
            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;

            // Execute controller-level middlewares
            $controller->executeMiddlewares();
        }

        return call_user_func($callback, $this->request, $this->response);
    }
}
