<section class="px-4 py-2">
  <div class="flex items-center justify-between flex-wrap gap-2 mb-4">
    <h1 class="text-2xl text-gray-900 font-semibold">Raw Materials</h1>
    <a href="/admin/raw-material/create" class="btn btn-primary inline-flex items-center gap-2">
      <span class="icon-[mdi--file-plus]" style="width: 24px; height: 24px;"></span>
      <span>Add New</span>
    </a>
  </div>
  <div class="bg-white relative p-5 shadow-md rounded-lg overflow-hidden">
    <div class="relative overflow-x-auto">
      <table class="datatable">
        <thead>
          <tr>
            <th scope="col" class="bg-gray-600 text-white font-semibold text-sm">Material Name</th>
            <th scope="col" class="bg-gray-600 text-white font-semibold text-sm">Unit Price</th>
            <th scope="col" class="bg-gray-600 text-white font-semibold text-sm">Stock Quantity</th>
            <th scope="col" class="bg-gray-600 text-white font-semibold text-sm">Total Price</th>
            <th scope="col" class="bg-gray-600 text-white font-semibold text-sm">Supplier</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($raw_materials as $material): ?>
            <tr class="odd:bg-white even:bg-gray-100 border-b">
              <th scope="row" class="whitespace-nowrap"><?= $material->name ?></th>
              <th scope="row" class="whitespace-nowrap flex items-center gap-1"><span class="icon-[clarity--peso-line]" style="width: 15px; height: 15px;"></span><?= $material->formatToCurrency(
                  $material->unit_price
              ) ?></th>
              <th scope="row" class="whitespace-nowrap"><?= $material->quantity ?></th>
              <th scope="row" class="whitespace-nowrap flex items-center gap-1"><span class="icon-[clarity--peso-line]" style="width: 15px; height: 15px;"></span><?= $material->getTotalPrice() ?></th>
              <th scope="row" class="whitespace-nowrap"><?= $material->supplier ?></th>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>