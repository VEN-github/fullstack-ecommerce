<?php

namespace App\Core;

use App\Core\Database\DbModel;

/**
 * AdminModel
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core
 */
abstract class AdminModel extends DbModel
{
    abstract public function getDisplayName(): string;

    abstract public function getEmail(): string;
}
