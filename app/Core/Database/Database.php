<?php

namespace App\Core\Database;

use PDO;
use App\Core\Application;

/**
 * Database
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Core\Database
 */
class Database
{
  public PDO $pdo;

  public function __construct(array $config)
  {
    $dsn = 'mysql:' . http_build_query($config, '', ';');
    $username = $config['username'] ?? '';
    $password = $config['password'] ?? '';

    $this->pdo = new PDO($dsn, $username, $password);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function applyMigrations(): void
  {
    $this->createMigrationsTable();
    $appliedMigrations = $this->getAppliedMigrations();

    $newMigrations = [];

    $files = scandir(Application::$ROOT_DIR . '/migrations');

    $toMigrate = array_diff($files, $appliedMigrations);

    foreach ($toMigrate as $migration) {
      if ($migration === '.' || $migration === '..') {
        continue;
      }

      $file = require_once Application::$ROOT_DIR . '/migrations/' . $migration;

      $this->log("Applying migration {$migration}...");
      $file['up']($this->pdo);
      $this->log("Migration {$migration} applied successfully.");

      $newMigrations[] = $migration;
    }

    if (!empty($newMigrations)) {
      $this->saveMigrations($newMigrations);
    } else {
      $this->log('Nothing to migrate');
    }
  }

  public function rollbackMigrations(): void
  {
    $migrations = $this->getAppliedMigrations();

    if (!empty($migrations)) {
      $last = array_pop($migrations);
      $file = require_once Application::$ROOT_DIR . '/migrations/' . $last;

      $this->log("Rolling back migration {$last}...");
      $file['down']($this->pdo);
      $this->deleteMigration($last);
      $this->log("Migration {$last} rolled back successfully.");
    } else {
      $this->log('No migrations to rollback');
    }
  }

  public function createMigrationsTable(): void
  {
    $this->pdo->exec("
      CREATE TABLE IF NOT EXISTS migrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        migration VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      ) ENGINE=INNODB;
    ");
  }

  public function getAppliedMigrations(): array
  {
    $statement = $this->pdo->prepare("SELECT migration FROM migrations");
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_COLUMN);
  }

  public function saveMigrations(array $migrations): void
  {
    $str = implode(',', array_map(fn($m) => "('$m')", $migrations));

    $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES " . $str);
    $statement->execute();
  }

  public function deleteMigration($migration): void
  {
    $statement = $this->pdo->prepare("DELETE FROM migrations WHERE migration = :migration");
    $statement->execute(['migration' => $migration]);
  }

  public function prepare($sql)
  {
    return $this->pdo->prepare($sql);
  }

  protected function log($message): void
  {
    echo '[' . date('Y-m-d H:i:s') . '] - ' . $message . PHP_EOL;
  }
}
