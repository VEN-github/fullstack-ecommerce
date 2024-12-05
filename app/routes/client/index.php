<?php

use App\Controllers\Client\HomeController;
use App\Controllers\Client\AboutController;
use App\Controllers\Client\AuthController;

$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/about', [AboutController::class, 'index']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->get('/login', [AuthController::class, 'login']);
