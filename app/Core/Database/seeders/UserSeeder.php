<?php

namespace App\Core\Database\seeders;

use PDO;

/**
 * UserSeeder
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Database\seeders
 */
class UserSeeder implements SeederInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function run(): void
    {
        $user = [
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'user@invi.com',
            'password' => 'password',
        ];

        $stmt = $this->pdo->prepare(
            'INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password);'
        );

        $password = password_hash($user['password'], PASSWORD_DEFAULT);

        $stmt->execute([
            ':first_name' => $user['first_name'],
            ':last_name' => $user['last_name'],
            ':email' => $user['email'],
            ':password' => $password,
        ]);
    }
}
