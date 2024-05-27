<x-app-layout>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-10 m-4 bg-white">
        <div style="background-image: url({!! asset('img/cover-konsul.png') !!}); background-size: cover;">
            <h4 class="text-3xl font-bold text-white mb-4 p-10">Ubah Profil</h4>
        </div>
    
    <form action="{{route('profile.update', Auth::id())}}" enctype="multipart/form-data" class="mx-auto max-w-3xl bg-white p-10 mt-5 rounded-lg" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-5">
          <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
          <input name="name" value="{{Auth::user()->name}}" type="text" id="username" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required/>
        </div>
        <div class="mb-5">
          <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomer Telepon</label>
          <input name="no_hp" value="{{$profile->no_hp}}" type="text" id="no_hp" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required/>
        </div>
        <div class="mb-5">
          <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
          <input name="alamat" value="{{$profile->alamat}}" type="text" id="alamat" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required/>
        </div>
        <div class="mb-10">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Foto profil</label>
            <input name="foto" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
        </div>
        
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
    </form>
</div>
</x-app-layout>