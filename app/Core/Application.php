<?php

namespace App\Core;

use App\Models\Admin;
use App\Models\User;
use App\Core\Database\Database;

/**
 * Application
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core
 */
class Application
{
    public static string $ROOT_DIR;
    public string|Admin $adminClass;
    public string|User $userClass;
    public Request $request;
    public Response $response;
    public Session $session;
    public Router $router;
    public Database $db;
    public AdminModel|null $admin;
    public UserModel|null $user;
    public View $view;
    public static Application $app;
    public Controller|null $controller;

    public function __construct($rootPath, array $config)
    {
        $this->adminClass = new $config['adminClass'];
        $this->userClass = new $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();

        $this->db = new Database($config['database']);

        $this->initAdminSession();
        $this->initUserSession();
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

    private function initUserSession()
    {
        $userValue = $this->session->get('user');

        if ($userValue) {
            $userPrimarykey = $this->userClass->primaryKey();
            $this->user = $this->userClass->findOne([$userPrimarykey => $userValue]);
        } else {
            $this->user = null;
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

    public function login(AdminModel|UserModel $user, $access_type = 'admin')
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

    public function logout($access_type = 'admin')
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
