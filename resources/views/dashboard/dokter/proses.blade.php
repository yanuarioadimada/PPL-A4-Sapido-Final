<x-app-layout>

    
<form class="m-4 p-10 rounded-lg bg-white" action="{{route('konsultasi.store')}}" method="POST">
    
    @csrf
    @if (session('error'))
    
    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">{{session('error')}}</span> 
        </div>
      </div>
    @endif
    <div class="mb-5">
        <div class="mb-8">
            <span class="text-3xl font-semibold">Formulir Konsultasi</span><br>
            <span class="text-medium font-medium mb-10">Lengkapi data di bawah ini untuk mengajukan konsultasi dengan dokter</span>
        </div>
        <div class="mb-6">
            <label for="tanggal_konsultasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jadwal konsultasi</label>
            <input name="tanggal_konsultasi" type="date" id="tanggal_konsultasi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
        </div>
        <label for="waktu_konsultasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu konsultasi</label>
        <div class="relative mb-6">
            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                </svg>
            </div>
            <input name="waktu_konsultasi" type="time" id="time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" required />
        </div>
        <div class="mb-6">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
            <textarea name="keterangan" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis keterangan disini"></textarea>
        </div>
        <div class="mb-6">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Dokter</label>
            <select name="dokter" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Pilih Dokter</option>
                @foreach ($dokter as $item)
                    <option value="{{$item->id}}">{{$item->nama}}</option>
                @endforeach
                
            </select>
        </div>
    </div>
    
    <div class="flex justify-end">
        <a href="{{ route('konsultasi.index') }}" class="text-white mr-2 bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm w-full sm:w-auto px-9 py-2.5 text-center border border-gray-300 inline-block mt-2 focus:outline-none focus:ring-4 focus:border-transparent">Batal</a>
        <button type="submit" class="text-white mr-2 bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm w-full sm:w-auto px-6 py-2.5 text-center border border-gray-300 inline-block mt-2 focus:outline-none focus:ring-4 focus:border-transparent">Cek Jadwal</button>
    </div>

</form>

</x-app-layout>