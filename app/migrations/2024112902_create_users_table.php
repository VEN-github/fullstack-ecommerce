<?php

return [
  'up' => function ($pdo) {
    $sql = "CREATE TABLE IF NOT EXISTS users (
      id INT AUTO_INCREMENT PRIMARY KEY,
      first_name VARCHAR(255) NOT NULL,
      last_name VARCHAR(255) NOT NULL,
      email VARCHAR(255) NOT NULL UNIQUE,
      password VARCHAR(255) NOT NULL,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=INNODB;";

    $pdo->exec($sql);
  },
  'down' => function ($pdo) {
    $pdo->exec('DROP TABLE IF EXISTS users;');
  }
];
