<x-app-layout>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-10 m-4 bg-white">
        <div>
            <h4 class="text-3xl font-bold text-grey-900 text-center bg-gray-50 p-5">Profil</h4>
        </div>
    <div class="flex justify-center p-10">
            <div class="w-full flex flex-col items-center max-w-2xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-10">
                <div class="flex flex-col items-center pb-10 p-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset($profile->foto_profil? $profile->foto_profil : '') }}" alt="Bonnie image"/>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><b>Nama: </b> {{Auth::user()->name}}</h5>
                    <p class="text-sm text-gray-500 dark:text-gray-400"><b>No Hp: </b>{{$profile->no_hp}}</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400"><b>Alamat: </b>{{$profile->alamat}}</p>

                    <div class="flex mt-4 md:mt-6">
                        <a href="{{route('profile.edit',Auth::id())}}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ubah Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
