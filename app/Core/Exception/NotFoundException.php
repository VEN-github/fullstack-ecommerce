<?php

namespace App\Core\Exception;

/**
 * NotFoundException
 * @author  Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Exception
 */
class NotFoundException extends \Exception
{
    protected $code = 404;
    protected $title = "Something's missing.";
    protected $message = "Sorry, we can't find that page. You'll find lots to explore on the home page.";

    public function getTitle(): string
    {
        return $this->title;
    }
}
