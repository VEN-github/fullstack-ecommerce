<?php

use App\Core\Application; ?>

<header id="main-header" class="<?= urlIs('/') ? '' : 'bg' ?>">
  <div class="container flex">
    <div class="logo">
      <a href="/"><img src="<?= asset('logo_white.png') ?>" alt="Logo" /></a>
    </div>
    <nav>
      <ul class="nav-links">
        <li><a href="/" class="nav-link <?= urlIs('/') ? 'active' : '' ?> ">Home</a></li>
        <li><a href="/shop" class="nav-link <?= urlIs('/shop') ? 'active' : '' ?> ">Shop</a></li>
        <li><a href="/about" class="nav-link <?= urlIs('/about') ? 'active' : '' ?> ">About</a></li>
        <li><a href="/contact" class="nav-link <?= urlIs('/contact')
            ? 'active'
            : '' ?> ">Contact</a></li>
        <?php if (Application::$app->isGuest()): ?>
          <li><a href="/login" class="login-nav btn outline-primary-btn">Login</a></li>
        <?php endif; ?>
      </ul>
    </nav>
    <div class="side-menu">
      <div class="icon-menu">
        <div class="shopping-container">
          <a href="#" class="icon-link">
            <span class="iconify cart-icon" data-icon="gg:shopping-bag" data-inline="false"></span>
          </a>
          <span id="counter" class="counter">0</span>
        </div>
        <?php if (Application::$app->isGuest()): ?>
          <a href="/login" class="btn outline-primary-btn login-btn">Login</a>
        <?php else: ?>
          <div class="profile-menu">
            <div class="hover">
              <span
                class="iconify user-icon"
                data-icon="carbon:user-avatar"
                data-inline="false">
              </span>
              <span
                class="iconify arrow"
                data-icon="dashicons:arrow-down-alt2"
                data-inline="false">
              </span>
            </div>
            <ul class="menu active">
              <li>
                <a href="#">
                  <span
                    class="iconify"
                    data-icon="fa-solid:user"
                    data-inline="false">
                  </span>
                  Profile
                </a>
              </li>
              <li>
                <a href="#">
                  <span
                    class="iconify"
                    data-icon="ant-design:home-filled"
                    data-inline="false">
                  </span>
                  Addresses
                </a>
              </li>
              <li>
                <a href="#">
                  <span
                    class="iconify"
                    data-icon="fa-solid:shopping-bag"
                    data-inline="false">
                  </span>
                  Orders
                </a>
              </li>
              <li>
                <a href="#">
                  <span class="iconify" data-icon="ic:baseline-assignment-return"></span>
                  Return
                </a>
              </li>
              <li>
                <a href="/logout">
                  <span class="iconify" data-icon="ls:logout" data-inline="false"></span>
                  Logout
                </a>
              </li>
            </ul>
          </div>
        <?php endif; ?>
      </div>
      <div class="burger-btn">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </div>
  </div>
</header>