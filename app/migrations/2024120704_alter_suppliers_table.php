<?php

return [
    'up' => function ($pdo) {
        $sql =
            'ALTER TABLE suppliers ADD COLUMN updated_at TIMESTAMP DEFAULT NULL AFTER created_at, ADD COLUMN deleted_at TIMESTAMP DEFAULT NULL AFTER updated_at;';

        $pdo->exec($sql);
    },
    'down' => function ($pdo) {
        $pdo->exec('ALTER TABLE suppliers DROP COLUMN updated_at,DROP COLUMN deleted_at;');
    },
];
