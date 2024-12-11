<?php

use App\Controllers\Admin\AuthController;
use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\RawMaterialController;
use App\Controllers\Admin\SupplierController;

$app->router->group('admin', function () use ($app) {
    $app->router->get('/', [DashboardController::class, 'index']);
    // Auth
    $app->router->get('/login', [AuthController::class, 'index']);
    $app->router->post('/login', [AuthController::class, 'index']);
    $app->router->get('/logout', [AuthController::class, 'logout']);
    // Raw Materials
    $app->router->get('/raw-materials', [RawMaterialController::class, 'index']);
    $app->router->get('/raw-material/create', [RawMaterialController::class, 'create']);
    $app->router->post('/raw-material/create', [RawMaterialController::class, 'create']);
    // Suppliers
    $app->router->get('/suppliers', [SupplierController::class, 'index']);
    $app->router->get('/supplier/create', [SupplierController::class, 'create']);
    $app->router->post('/supplier/create', [SupplierController::class, 'create']);
    $app->router->get('/supplier/{id:\d+}/edit', [SupplierController::class, 'edit']);
    $app->router->post('/supplier/{id:\d+}/edit', [SupplierController::class, 'edit']);
    $app->router->get('/supplier/{id:\d+}/delete', [SupplierController::class, 'delete']);
});
