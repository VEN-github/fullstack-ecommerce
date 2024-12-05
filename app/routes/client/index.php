<?php

use App\Controllers\Client\HomeController;
use App\Controllers\Client\AboutController;

$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/about', [AboutController::class, 'index']);
