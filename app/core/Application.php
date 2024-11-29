<?php

namespace App\Core;

/**
 * Application
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core
 */
class Application
{
    public static string $ROOT_DIR;
    public Request $request;
    public Response $response;
    public Session $session;
    public Router $router;
    public Database $db;
    public static Application $app;
    public Controller $controller;

    /**
     * __construct
     *
     * @param  mixed $rootPath
     * @return void
     */
    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['database']);
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController($controller)
    {
        $this->controller = $controller;
    }
}
