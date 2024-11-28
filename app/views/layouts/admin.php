<?php

use App\Core\Application;
?>

<?php require_once Application::$ROOT_DIR . '/views/partials/admin/header.php'; ?>

<body>
  <div class="bg-gray-50 antialiased">
    <?php require_once Application::$ROOT_DIR . '/views/partials/admin/nav.php'; ?>
    <?php require_once Application::$ROOT_DIR . '/views/partials/admin/sidebar.php'; ?>
    <main class="h-[calc(100vh-84px)] p-4 pt-20 md:ml-64">
      {{content}}
    </main>
    <?php require_once Application::$ROOT_DIR . '/views/partials/admin/footer.php'; ?>
  </div>
</body>

</html>