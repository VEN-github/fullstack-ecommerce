<?php

use App\Core\Application;
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
  <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
  <meta name="apple-mobile-web-app-title" content="INVI" />
  <link rel="manifest" href="/site.webmanifest" />
  <?= vite('src/main.ts') ?>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
  <title><?= $title ?? 'INVI' ?></title>
</head>

<body>

  <div class="bg-gray-50 antialiased dark:bg-gray-900">
    <?php require_once Application::$ROOT_DIR . '/views/partials/admin/nav.php'; ?>
    <?php require_once Application::$ROOT_DIR . '/views/partials/admin/sidebar.php'; ?>
    <main class="min-h-screen p-4 pt-20 md:ml-64">
      {{content}}
    </main>
    <?php require_once Application::$ROOT_DIR . '/views/partials/admin/footer.php'; ?>
  </div>
</body>

</html>