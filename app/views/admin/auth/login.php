<?php

use App\Core\Form\Form; ?>

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
        <?php $form = Form::begin('/admin/login', 'POST'); ?>
        <div class="mb-4">
          <?= $form->label($model, 'email') ?>
          <?= $form->field($model, 'email')->emailField() ?>
        </div>
        <div>
          <?= $form->label($model, 'password') ?>
          <?= $form->field($model, 'password')->passwordField() ?>
        </div>
        <div class="flex items-center justify-end mt-2 mb-8">
          <a href="#" class="text-sm font-medium text-primary hover:underline">Forgot password?</a>
        </div>
        <button type="submit" class="btn btn-primary w-full">Sign in</button>
        <?php Form::end(); ?>
      </div>
    </div>
  </div>
</section>