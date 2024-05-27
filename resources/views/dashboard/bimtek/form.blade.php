<x-app-layout>
        
    <div class="overflow-hidden shadow-xl sm:rounded-lg" style="background-image: url({!! asset('img/bg-sapi-hitam.png') !!}); background-size: cover;">    <div class="mx-auto py-20 px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white p-10">
            <h1 class="text-6xl font-bold mb-2">PENDAFTARAN BIMTEK TERNAK</h1>
            <p>SILAHKAN ISI FORMULIR DI BAWAH INI</p>
        </div>
        <form action="{{route('bimtek.daftar')}}" class="mx-auto max-w-3xl bg-white p-10 mt-5 rounded-lg" method="POST">
          @csrf
            <div class="mb-5">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input name="nama" type="text" id="nama" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="contoh: Yanuario" required />
              </div>
              <div class="mb-5">
                <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Telepon</label>
                <input name="no_hp" type="tel" id="telepon" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="contoh: 081234567890" required />
              </div>
              <div class="mb-5">
                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <input name="alamat" type="text" id="alamat" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
              </div>
              <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input name="email" type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
              </div>
              <button type="submit" class="text-white mr-2 bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm w-full sm:w-auto px-6 py-2.5 text-center border border-gray-300 inline-block mt-2 focus:outline-none focus:ring-4 focus:border-transparent">Kirim</button>
              <input type="text" hidden name="id_bimtek" value="{{$id}}">
        </form>
    
    </div>

</x-dashboard-layout>