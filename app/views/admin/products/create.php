<?php

use App\Core\Form\Form;
?>

<section class="px-4 py-2">
  <h1 class="mb-4 text-xl font-semibold text-gray-900">Add New Product</h1>
  <div class="bg-white p-5 shadow-md rounded-lg">
    <div id="product-images" data-accordion="open">
      <h2 id="product-images-heading">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-900 border border-gray-200 hover:bg-gray-100 gap-3" data-accordion-target="#product-images-body" aria-expanded="true" aria-controls="product-images-body">
          <span>Product Images</span>
          <span data-accordion-icon class="icon-[lucide--chevron-up] w-5 h-5 rotate-180 shrink-0"></span>
        </button>
      </h2>
      <div id="product-images-body" class="hidden" aria-labelledby="product-images-heading">
        <div class="p-5 border border-gray-200">
        </div>
      </div>
    </div>
  </div>
  <div class="bg-white mt-5 p-5 shadow-md rounded-lg">
    <div id="product-info" data-accordion="open">
      <h2 id="product-info-heading">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-900 border border-gray-200 hover:bg-gray-100 gap-3" data-accordion-target="#product-info-body" aria-expanded="true" aria-controls="product-info-body">
          <span>Product Information</span>
          <span data-accordion-icon class="icon-[lucide--chevron-up] w-5 h-5 rotate-180 shrink-0"></span>
        </button>
      </h2>
      <div id="product-info-body" class="hidden" aria-labelledby="product-info-heading">
        <div class="p-5 border border-gray-200">
          <?php $form = Form::begin('/admin/product/create', 'POST'); ?>
          <div class="grid grid-cols-1 gap-4 mb-4 sm:grid-cols-2">
            <div>
              <?= $form->label($model, 'name') ?>
              <?= $form->field($model, 'name') ?>
            </div>
            <div>
              <?= $form->label($model, 'slug') ?>
              <?= $form->field($model, 'slug') ?>
            </div>
          </div>
          <div class="mb-4">
            <?= $form->label($model, 'category_id') ?>
            <?= $form->select($model, 'category_id', $categories) ?>
          </div>
          <?= Form::end() ?>
        </div>
      </div>
    </div>
  </div>
</section>