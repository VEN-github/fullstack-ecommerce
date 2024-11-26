<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Application;

$app = new Application(dirname(__DIR__) . '/app');

require_once Application::$ROOT_DIR . '/routes/routes.php';

$app->run();
