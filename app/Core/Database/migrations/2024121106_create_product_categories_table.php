<?php

return [
    'up' => function ($pdo) {
        $sql = "CREATE TABLE IF NOT EXISTS product_categories (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      slug VARCHAR(255) NOT NULL,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      updated_at TIMESTAMP DEFAULT NULL,
      deleted_at TIMESTAMP DEFAULT NULL
    ) ENGINE=INNODB;";

        $pdo->exec($sql);
    },
    'down' => function ($pdo) {
        $pdo->exec('DROP TABLE IF EXISTS product_categories;');
    },
];
