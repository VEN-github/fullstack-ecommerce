<?php

use App\Core\Form\Form; ?>

<section class="px-4 py-2">
  <h1 class="mb-4 text-xl font-semibold text-gray-900">Add New Category</h1>
  <div class="bg-white p-5 shadow-md rounded-lg">
    <?php $form = Form::begin('/admin/products/category/' . $model->id . '/edit', 'POST'); ?>
    <div class="w-full mb-4">
      <?= $form->label($model, 'name') ?>
      <?= $form->field($model, 'name') ?>
    </div>
    <div class="w-full">
      <?= $form->label($model, 'slug') ?>
      <?= $form->field($model, 'slug') ?>
    </div>
    <div class="flex items-center justify-end gap-4 mt-4 sm:mt-6">
      <a href="/admin/products/categories" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary/50 rounded-lg">Cancel</a>
      <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-secondary rounded-lg">
        Update Category
      </button>
    </div>
    <?= Form::end() ?>
  </div>
</section>