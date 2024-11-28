<nav
  class="fixed left-0 right-0 top-0 z-50 border-b border-gray-200 bg-white px-4 py-2.5">
  <div class="flex flex-wrap items-center justify-between">
    <div class="flex items-center justify-start">
      <button
        data-drawer-target="drawer-navigation"
        data-drawer-toggle="drawer-navigation"
        aria-controls="drawer-navigation"
        class="mr-2 cursor-pointer rounded-lg p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 md:hidden">
        <svg
          aria-hidden="true"
          class="h-6 w-6"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path
            fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"></path>
        </svg>
        <svg
          aria-hidden="true"
          class="hidden h-6 w-6"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path
            fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Toggle sidebar</span>
      </button>
      <a href="/admin" class="mr-4 flex items-start justify-between">
        <img
          src="<?= asset('logo.png') ?>"
          class="mr-2 w-14 object-cover"
          alt="Logo" />
        <span class="whitespace-nowrap text-2xl font-semibold hidden md:block">INVI Clothing Co.</span>
      </a>
    </div>
    <div class="flex items-center lg:order-2">
      <!-- Notifications -->
      <button
        type="button"
        data-dropdown-toggle="notification-dropdown"
        class="mr-1 rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:ring-4 focus:ring-gray-300">
        <span class="sr-only">View notifications</span>
        <!-- Bell icon -->
        <svg
          aria-hidden="true"
          class="h-6 w-6"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path
            d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
        </svg>
      </button>
      <!-- Dropdown menu -->
      <div
        class="z-50 my-4 hidden max-w-sm list-none divide-y divide-gray-100 overflow-hidden rounded-xl bg-white text-base shadow-lg"
        id="notification-dropdown">
        <div
          class="block bg-gray-50 px-4 py-2 text-center text-base font-medium text-gray-700">
          Notifications
        </div>
        <div>
          <a
            href="#"
            class="flex border-b px-4 py-3 hover:bg-gray-100">
            <div class="flex-shrink-0">
              <img
                class="h-11 w-11 rounded-full"
                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                alt="Bonnie Green avatar" />
              <div
                class="bg-primary-700 absolute -mt-5 ml-6 flex h-5 w-5 items-center justify-center rounded-full border border-white">
                <svg
                  aria-hidden="true"
                  class="h-3 w-3 text-white"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path>
                  <path
                    d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path>
                </svg>
              </div>
            </div>
            <div class="w-full pl-3">
              <div class="mb-1.5 text-sm font-normal text-gray-500">
                New message from
                <span class="font-semibold text-gray-900">Bonnie Green</span>:
                "Hey, what's up? All set for the presentation?"
              </div>
              <div class="text-primary-600 dark:text-primary-500 text-xs font-medium">
                a few moments ago
              </div>
            </div>
          </a>
        </div>
        <a
          href="#"
          class="text-md block bg-gray-50 py-2 text-center font-medium text-gray-900 hover:bg-gray-100">
          <div class="inline-flex items-center">
            <svg
              aria-hidden="true"
              class="mr-2 h-4 w-4 text-gray-500"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
              <path
                fill-rule="evenodd"
                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                clip-rule="evenodd"></path>
            </svg>
            View all
          </div>
        </a>
      </div>
      <button
        type="button"
        class="mx-3 flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300 md:mr-0"
        id="user-menu-button"
        aria-expanded="false"
        data-dropdown-toggle="dropdown">
        <span class="sr-only">Open user menu</span>
        <img
          class="h-8 w-8 rounded-full"
          src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png"
          alt="user photo" />
      </button>
      <!-- Dropdown menu -->
      <div
        class="z-50 my-4 hidden w-56 list-none divide-y divide-gray-100 rounded-xl bg-white text-base shadow"
        id="dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm font-semibold text-gray-900">Neil Sims</span>
          <span class="block truncate text-sm text-gray-900">name@flowbite.com</span>
        </div>
        <ul class="py-1 text-gray-700" aria-labelledby="dropdown">
          <li>
            <a
              href="#"
              class="block px-4 py-2 text-sm hover:bg-gray-100">My profile</a>
          </li>
        </ul>
        <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
          <li>
            <a
              href="#"
              class="block px-4 py-2 text-sm hover:bg-gray-100">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>