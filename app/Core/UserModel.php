<?php

namespace App\Core;

use App\Core\Database\DbModel;

/**
 * UserModel
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core
 */
abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;

    abstract public function getEmail(): string;
}
