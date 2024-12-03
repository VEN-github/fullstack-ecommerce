<?php

namespace App\Core\middlewares;

/**
 * BaseMiddleware
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\middlewares
 */
abstract class BaseMiddleware
{
  abstract public function execute();
}
