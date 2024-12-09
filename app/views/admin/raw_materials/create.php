<?php

use App\Core\Form\Form; ?>

<section class="px-4 py-2">
  <h2 class="mb-4 text-xl font-semibold text-gray-900">Add New Raw Material</h2>
  <div class="bg-white p-5 shadow-md rounded-lg">
    <?php $form = Form::begin('/admin/raw-material/create', 'POST'); ?>
    <div class="mb-4">
      <?= $form->label($model, 'name') ?>
      <?= $form->field($model, 'name') ?>
    </div>
    <div class="mb-4">
      <?= $form->label($model, 'supplier_id') ?>
      <?= $form->select($model, 'supplier_id', $suppliers) ?>
    </div>
    <div class="mb-4">
      <?= $form->label($model, 'unit_price') ?>
      <?= $form->number($model, 'unit_price') ?>
    </div>
    <div>
      <?= $form->label($model, 'quantity') ?>
      <?= $form->number($model, 'quantity') ?>
    </div>
    <div class="flex items-center justify-end gap-4 mt-4 sm:mt-6">
      <a href="/admin/raw-materials" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary/50 rounded-lg">Cancel</a>
      <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-secondary rounded-lg">
        Add Raw Material
      </button>
    </div>
    <?= Form::end() ?>
  </div>
</section>