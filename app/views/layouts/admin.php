<?php

use App\Core\Application; ?>

<?php require_once Application::$ROOT_DIR . '/views/partials/admin/header.php'; ?>

<body>
  <div class="bg-gray-50 antialiased">
    <?php require_once Application::$ROOT_DIR . '/views/partials/admin/nav.php'; ?>
    <?php require_once Application::$ROOT_DIR . '/views/partials/admin/sidebar.php'; ?>
    <main class="h-screen p-4 pt-20 md:ml-64">
      {{content}}
    </main>
  </div>
</body>

</html>