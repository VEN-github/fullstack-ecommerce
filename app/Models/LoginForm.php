<?php

namespace App\Models;

use App\Core\Application;
use App\Core\Model;
use App\Models\Admin;
use App\Models\User;

/**
 * LoginForm
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Models
 */
class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Email address',
            'password' => 'Password',
        ];
    }

    public function placeholders(): array
    {
        return [
            'email' => 'Enter your email address',
            'password' => 'Enter your password',
        ];
    }

    public function login($access_type = 'admin')
    {
        $userClass = $access_type == 'user' ? new User() : new Admin();
        $user = $userClass->findOne(['email' => $this->email]);

        if (!$user) {
            $this->addError(
                'email',
                ucfirst($access_type) . ' does not exist with this email address.'
            );
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect.');
            return false;
        }

        return Application::$app->login($user, $access_type);
    }
}
