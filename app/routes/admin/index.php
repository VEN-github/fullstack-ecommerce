<?php

use App\Controllers\Admin\DashboardController;

$app->router->group('admin', function () use ($app) {
  $app->router->get('/', [DashboardController::class, 'index']);
});
