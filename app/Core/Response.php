<?php

namespace App\Core;

/**
 * Response
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core
 */
class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function redirect(string $url)
    {
        header('Location: ' . $url);
    }
}
