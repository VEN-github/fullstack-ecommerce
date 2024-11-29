<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/bootstrap.php';

use App\Core\Application;

$config = require_once __DIR__ . '/../app/config/config.php';

$app = new Application(dirname(__DIR__) . '/app', $config);

require_once Application::$ROOT_DIR . '/Routes/routes.php';

$app->run();
