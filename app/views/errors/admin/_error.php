<section class="flex h-screen justify-center items-center">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
    <div class="mx-auto max-w-screen-sm text-center">
      <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-secondary"><?= $exception->getCode() ?></h1>
      <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl"><?= $exception->getTitle() ?></p>
      <p class="mb-4 text-lg font-light text-gray-500"><?= $exception->getMessage() ?></p>
      <a href="/admin/login" class="inline-flex text-white bg-secondary font-medium rounded-lg text-sm px-5 py-2.5 text-center my-4">Back to Homepage</a>
    </div>
  </div>
</section>