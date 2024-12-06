<section class="px-4 py-2">
  <div class="flex items-center justify-between flex-wrap gap-2 mb-4">
    <h1 class="text-2xl text-gray-900 font-semibold">Suppliers</h1>
    <a href="/admin/supplier/create" class="btn btn-primary inline-flex items-center gap-2">
      <span class="icon-[mdi--file-plus]" style="width: 24px; height: 24px;"></span>
      <span>Add New</span>
    </a>
  </div>
  <div class="bg-white relative p-5 shadow-md rounded-lg overflow-hidden">
    <div class="relative overflow-x-auto">
      <table class="datatable">
        <thead>
          <tr>
            <th scope="col" class="bg-gray-600 text-white font-semibold text-sm">Name</th>
            <th scope="col" class="bg-gray-600 text-white font-semibold text-sm">Email</th>
            <th scope="col" class="bg-gray-600 text-white font-semibold text-sm">Phone</th>
            <th scope="col" class="bg-gray-600 text-white font-semibold text-sm">Address</th>
            <th scope="col" class="bg-gray-600 text-white font-semibold text-sm">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($suppliers as $supplier): ?>
            <tr class="odd:bg-white even:bg-gray-100 border-b">
              <th scope="row" class="whitespace-nowrap"><?= $supplier->name ?></th>
              <th scope="row" class="whitespace-nowrap"><?= $supplier->email ?></th>
              <th scope="row" class="whitespace-nowrap"><?= $supplier->phone ?></th>
              <th scope="row" class="whitespace-nowrap"><?= $supplier->address ?></th>
              <td scope="row" class="flex gap-4 items-center">
                <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>