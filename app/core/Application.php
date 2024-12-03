<?php

namespace App\Core;

use App\Models\Admin;

/**
 * Application
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core
 */
class Application
{
    public static string $ROOT_DIR;
    public string|Admin $adminClass;
    public Request $request;
    public Response $response;
    public Session $session;
    public Router $router;
    public Database $db;
    public DbModel|Admin|null $admin;
    public ?DbModel $user;
    public static Application $app;
    public Controller $controller;

    public function __construct($rootPath, array $config)
    {
        $this->adminClass = new $config['adminClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['database']);

        $this->initAdminSession();
    }

    private function initAdminSession()
    {
        $adminValue = $this->session->get('admin');

        if ($adminValue) {
            $adminPrimarykey = $this->adminClass->primaryKey();
            $this->admin = $this->adminClass->findOne([$adminPrimarykey => $adminValue]);
        } else {
            $this->admin = null;
        }
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

    public function login(DbModel $user, $access_type = 'user')
    {
        if ($access_type == 'admin') {
            $this->admin = $user;
            $primarykey = $this->admin->primaryKey();
            $primaryValue = $this->admin->{$primarykey};
        } else {
            $this->user = $user;
            $primarykey = $this->user->primaryKey();
            $primaryValue = $this->user->{$primarykey};
        }

        $this->session->set($access_type, $primaryValue);
        return true;
    }

    public function logout($access_type = 'user')
    {
        if ($access_type == 'admin') {
            $this->admin = null;
        } else {
            $this->user = null;
        }

        $this->session->remove($access_type);
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }
}
