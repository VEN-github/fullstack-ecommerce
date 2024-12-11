<?php

return [
  'up' => function ($pdo) {
    $sql = "CREATE TABLE IF NOT EXISTS raw_materials (
      id INT AUTO_INCREMENT PRIMARY KEY,
      supplier_id INT NOT NULL,
      name VARCHAR(255) NOT NULL,
      unit_price DECIMAL(10,2) NOT NULL,
      quantity INT NOT NULL,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      CONSTRAINT fk_supplier FOREIGN KEY (supplier_id) REFERENCES suppliers(id) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=INNODB;";

    $pdo->exec($sql);
  },
  'down' => function ($pdo) {
    $pdo->exec('DROP TABLE IF EXISTS raw_materials;');
  },
];
