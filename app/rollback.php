<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/bootstrap.php';

use App\Core\Application;

$config = require_once __DIR__ . '/config/config.php';

$app = new Application(dirname(__DIR__) . '/app', $config);

$app->db->rollbackMigrations();
