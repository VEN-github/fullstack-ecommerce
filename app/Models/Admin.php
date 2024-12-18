<?php

namespace App\Models;

use App\Core\AdminModel;

/**
 * Admin
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Models
 */
class Admin extends AdminModel
{
    public int $id = 0;
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $password = '';
    public string $created_at = '';

    public function tableName(): string
    {
        return 'admin';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function attributes(): array
    {
        return ['email', 'password'];
    }

    public function getDisplayName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
