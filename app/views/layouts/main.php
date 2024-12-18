<?php

use App\Core\Application; ?>

<?php require_once Application::$ROOT_DIR . '/views/partials/client/header.php'; ?>

<body>
  <div class="page-container">
    <?php require_once Application::$ROOT_DIR . '/views/partials/client/nav.php'; ?>
    <main>
      {{content}}
    </main>
    <?php require_once Application::$ROOT_DIR . '/views/partials/client/footer.php'; ?>
  </div>
</body>

</html>