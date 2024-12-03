<?php

use App\Controllers\Client\HomeController;

$app->router->get('/', [HomeController::class, 'index']);
