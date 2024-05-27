@if(Auth::user()->hasRole('admin'))
    <x-dashboard-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard Admin') }}
            </h2>
        </x-slot>
        <div class="overflow-hidden shadow-xl sm:rounded-lg" style="background-image: url({!! asset('img/bg-sapi1.png') !!}); background-size: cover;">
            <div class="mx-auto py-20 px-4 sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="bg-cover bg-center h-screen" style="background-image: url('')">
                        <div class="h-full flex flex-col justify-center items-center text-center bg-gray-900 bg-opacity-10">
                            <h1 class="text-4xl font-bold text-white mb-4">Selamat Datang di Website SAPIDO</h1>
                            <p class="text-lg text-gray-200">Sistem Informasi Monitoring dan Pelayanan UPT Peternakan Jember dalam Monitoring Produktivitas dan Kesejahteraan Peternak Sapi dan Domba</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-dashboard-layout>
@else
<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard Admin') }}
      </h2>
  </x-slot>
  <div class="overflow-hidden shadow-xl sm:rounded-lg" style="background-image: url({!! asset('img/bg-sapi1.png') !!}); background-size: cover;">
      <div class="mx-auto py-20 px-4 sm:px-6 lg:px-8">
          <div class="overflow-hidden shadow-xl sm:rounded-lg">
              <div class="bg-cover bg-center h-screen" style="background-image: url('')">
                  <div class="h-full flex flex-col justify-center items-center text-center bg-black bg-opacity-5">
                      <h1 class="text-4xl font-bold text-white mb-4">Selamat Datang di Website SAPIDO</h1>
                      <p class="text-lg text-gray-200">Sistem Informasi Monitoring dan Pelayanan UPT Peternakan Jember dalam Monitoring Produktivitas dan Kesejahteraan Peternak Sapi dan Domba</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
@endif

