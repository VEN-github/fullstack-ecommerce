<?php

namespace App\Core\Database\seeders;

use PDO;

/**
 * AdminSeeder
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Database\seeders
 */
class AdminSeeder implements SeederInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function run(): void
    {
        $admin = [
            'first_name' => 'INVI Clothing',
            'last_name' => 'Co.',
            'email' => 'admin@invi.com',
            'password' => 'password',
        ];

        $stmt = $this->pdo->prepare(
            'INSERT INTO admin (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password);'
        );

        $password = password_hash($admin['password'], PASSWORD_DEFAULT);

        $stmt->execute([
            ':first_name' => $admin['first_name'],
            ':last_name' => $admin['last_name'],
            ':email' => $admin['email'],
            ':password' => $password,
        ]);
    }
}
