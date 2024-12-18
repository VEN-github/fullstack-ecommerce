<?php

namespace App\Core\Middlewares;

/**
 * BaseMiddleware
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Middlewares
 */
abstract class BaseMiddleware
{
    abstract public function execute();
}
