<x-app-layout>
  
  <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/logo-sapido.png') }}" class="h-8" alt="sapido logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SAPIDO</span>
        </a>
        

        <div class="flex items-center md:order-3">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                  {{Auth::user()->name}}
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                  {{Auth::user()->email}}
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                          Log Out
                      </button>
                  </form>
              </li>
              </ul>
            </div>
          </div>
        </div>
      
    </div>
</nav>



      @if (Auth::user()->hasRole('admin'))
      <x-menu-admin></x-menu-admin>
      <div class="p-4">
        <div class="mt-5 pl-72">
            {{$slot}}
        </div>
      </div>
      @else
      <div class="p-0">
        <div class="p-0 mt-0">
            {{$slot}}
        </div>
      </div>
      @endif

      

      
      

</x-app-layout>