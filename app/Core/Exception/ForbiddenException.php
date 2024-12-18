<?php

namespace App\Core\Exception;

/**
 * ForbiddenException
 * @author  Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Exception
 */
class ForbiddenException extends \Exception
{
    protected $code = 403;
    protected $title = 'Forbidden';
    protected $message = "You don't have permission to access this page.";

    public function getTitle(): string
    {
        return $this->title;
    }
}
