<?php

return [
    'up' => function ($pdo) {
        $sql = "CREATE TABLE IF NOT EXISTS suppliers (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      email VARCHAR(255) NOT NULL UNIQUE,
      address VARCHAR(255) NOT NULL,
      phone VARCHAR(255) NOT NULL,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=INNODB;";

        $pdo->exec($sql);
    },
    'down' => function ($pdo) {
        $pdo->exec('DROP TABLE IF EXISTS suppliers;');
    },
];
