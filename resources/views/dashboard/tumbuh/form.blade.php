<x-app-layout>

    <form action="{{route('tumbuh.store')}}" method="POST" enctype="multipart/form-data" class="p-10 m-4 bg-white rounded-lg">
        @csrf
        <span class="text-3xl font-semibold">Tambahkan Data Tumbuh Kembang Hewan</span>
        <div class="mb-6 mt-8">
            <label for="nomor_hewan" class="{{$errors->has('nomor_hewan') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">ID Hewan</label>
            <select name="id_hewan" id="nomor_hewan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>Pilih no Hewan</option>
                @foreach ($hewan as $item)
                    <option value="{{$item->id}}">{{$item->nomor_hewan}}</option>
                @endforeach
                
            </select>
            @if($errors->has('id_hewan'))
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('nomor_hewan')}}</p>
            @endif
        </div>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div >
                <label for="umur" class="{{$errors->has('umur') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Umur (Bulan)</label>
                <input type="number" name="umur" id="umur" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh: 24 Bulan" required />
            </div>
            <div >
                <label for="tinggi" class="{{$errors->has('tinggi') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium ">Tinggi (cm)</label>
                <input name="tinggi" type="number" id="tinggi" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh: 120 cm" required />
                @if($errors->has('tinggi'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('Tinggi')}}</p>
                @endif
            </div>
            <div >
                <label for="berat_badan" class="{{$errors->has('berat_badan') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Berat Badan (Kg)</label>
                <input name="berat_badan" type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh: 40 Kg" required />
                @if($errors->has('jenis_hewan'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('jenis_hewan')}}</p>
                @endif
            </div>
            <div>
                <label for="jumlah_gigi" class="{{$errors->has('id_profile') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Jumlah gigi</label>
                <input name="jumlah_gigi" type="number" id="number-input" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh: 32" required />
                @if($errors->has('id_profile'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('id_profile')}}</p>
                @endif
            </div>
        </div>
        
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload foto hewan</label>
            <input name="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
        </div> 
        <div class="mb-6">
            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
            <textarea name="keterangan" id="keterangan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: Kesehatan sapi sangat baik, nafsu makan & minum baik"></textarea>
        </div> 
        
        <div class="flex justify-end">
            <a href="{{ route('tumbuh.index') }}" class="text-white mr-2 bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm w-full sm:w-auto px-7 py-2.5 text-center border border-gray-300 inline-block mt-2 focus:outline-none focus:ring-4 focus:border-transparent">Batal</a>
            <button type="submit" class="text-white mr-2 bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm w-full sm:w-auto px-6 py-2.5 text-center border border-gray-300 inline-block mt-2 focus:outline-none focus:ring-4 focus:border-transparent">Simpan</button>
        </div>
    </form>
    
    </x-dashboard-layout>