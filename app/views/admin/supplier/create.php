<?php

use App\Core\Form\Form; ?>

<section class="px-4 py-2">
  <h2 class="mb-4 text-xl font-semibold text-gray-900">Add New Supplier</h2>
  <div class="bg-white p-5 shadow-md rounded-lg">
    <?php $form = Form::begin('/admin/supplier/create', 'POST'); ?>
    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
      <div class="w-full">
        <?= $form->label($model, 'name') ?>
        <?= $form->field($model, 'name') ?>
      </div>
      <div class="w-full">
        <?= $form->label($model, 'email') ?>
        <?= $form->field($model, 'email')->emailField() ?>
      </div>
      <div class="w-full">
        <?= $form->label($model, 'address') ?>
        <?= $form->field($model, 'address') ?>
      </div>
      <div class="w-full">
        <?= $form->label($model, 'phone') ?>
        <?= $form->field($model, 'phone') ?>
      </div>
    </div>
    <div class="flex items-center justify-end gap-4 mt-4 sm:mt-6">
      <a href="/admin/suppliers" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary/50 rounded-lg">Cancel</a>
      <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-secondary rounded-lg">
        Add Supplier
      </button>
    </div>
    <?= Form::end() ?>
  </div>
</section>