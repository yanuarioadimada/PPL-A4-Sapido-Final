<x-dashboard-layout>
        
    <div class="overflow-hidden shadow-xl sm:rounded-lg" style="background-image: url({!! asset('img/bg-sapi-hitam.png') !!}); background-size: cover;">    <div class="mx-auto py-20 px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white p-10">
            <h1 class="text-6xl font-bold mb-2">BUAT BIMTEK TERNAK</h1>
            <p>ADMIN</p>
        </div>
        <form action="{{route('admin.bimtek.store') }}" method="POST" enctype="multipart/form-data" class="mx-auto max-w-3xl bg-white p-10 mt-5 rounded-lg">
            @csrf
            <div class="mb-5">
                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Acara</label>
                <input name="judul" type="text" id="judul" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"   />
            </div>
            <div class="mb-5">                
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis deskripsi disini"></textarea>
            </div>
            <div class="mb-5">
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tanggal</label>
                <input name="tanggal" type="date" id="alamat" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  />
            </div>
            <div>
                <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                <input type="file" accept="image/*" name="gambar" id="gambar" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"  />
            </div>

            
            <button type="submit" class="text-white mr-2 bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm w-full sm:w-auto px-6 py-2.5 text-center border border-gray-300 inline-block mt-2 focus:outline-none focus:ring-4 focus:border-transparent">Kirim</button>
        </form>
    
    </div>

</x-dashboard-layout>