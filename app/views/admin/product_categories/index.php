<section class="px-4 py-2">
  <div class="flex items-center justify-between flex-wrap gap-2 mb-4">
    <h1 class="text-2xl text-gray-900 font-semibold">Categories</h1>
    <a href="/admin/products/category/create" class="btn btn-primary inline-flex items-center gap-2">
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
            <th scope="col" class="bg-gray-600 text-white font-semibold text-sm">Slug</th>
            <th scope="col" class="bg-gray-600 text-white font-semibold text-sm">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categories as $category): ?>
            <tr class="odd:bg-white even:bg-gray-100 border-b">
              <th scope="row" class="whitespace-nowrap"><?= $category->name ?></th>
              <th scope="row" class="whitespace-nowrap"><?= $category->slug ?></th>
              <td scope="row" class="flex gap-4 items-center">
                <a href="/admin/products/category/<?= $category->id ?>/edit" class="font-medium text-blue-600 hover:underline">Edit</a>
                <button type="button" data-modal-target="deleteModal-<?= $category->id ?>" data-modal-toggle="deleteModal-<?= $category->id ?>" class="font-medium text-red-600 hover:underline">
                  Delete
                </button>
              </td>
            </tr>
            <div id="deleteModal-<?= $category->id ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
              <div class="relative p-4 w-full max-w-xl">
                <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
                  <button data-modal-toggle="deleteModal-<?= $category->id ?>" type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="deleteModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                  </button>
                  <svg class="text-gray-400 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                  </svg>
                  <p class="mb-4 text-gray-700">Are you sure you want to delete category: <span class="font-semibold text-gray-900"><?= $category->name ?></span>?</p>
                  <div class="flex justify-center items-center space-x-4">
                    <button data-modal-toggle="deleteModal-<?= $category->id ?>" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-900 focus:z-10">
                      No, cancel
                    </button>
                    <a href="/admin/products/category/<?= $category->id ?>/delete" data-modal-toggle="deleteModal-<?= $category->id ?>" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700">Yes, I'm sure</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>