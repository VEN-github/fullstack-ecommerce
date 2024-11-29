<?php

use App\Core\Form\Form;
?>
<section class="bg-gray-50">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
    <a href="/admin" class="flex flex-col items-center mb-6 text-2xl font-semibold text-gray-900">
      <img class="w-16 mr-2 object-cover" src="<?= asset('logo.png') ?>" alt="logo">
      INVI Clothing Co.
    </a>
    <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
      <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
          Sign in to your account
        </h1>
        <?php $form = Form::begin('/admin/login', 'POST') ?>
        <div class="mb-4">
          <?= $form->field($login, 'email') ?>
        </div>
        <div class="mb-4">
          <?= $form->field($login, 'password')->passwordField() ?>
        </div>
        <button type="submit" class="w-full text-white bg-secondary hover:bg-secondary/70 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign in</button>
        <?php Form::end() ?>
        <!-- <form action="/admin/login" method="POST">
          <div class="mb-4">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email address</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5" placeholder="name@company.com">
          </div>
          <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-secondary focus:border-secondary block w-full p-2.5">
          </div>
          <div class="flex items-center justify-end mt-2 mb-8">
            <a href="#" class="text-sm font-medium text-primary hover:underline">Forgot password?</a>
          </div>
          <button type="submit" class="w-full text-white bg-secondary hover:bg-secondary/70 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign in</button>
        </form> -->
      </div>
    </div>
  </div>
</section>