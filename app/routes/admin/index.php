<?php

use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\AuthController;

$app->router->group('admin', function () use ($app) {
  $app->router->get('/', [DashboardController::class, 'index']);
  $app->router->get('/login', [AuthController::class, 'index']);
  $app->router->post('/login', [AuthController::class, 'index']);
  $app->router->get('/logout', [AuthController::class, 'logout']);
});
