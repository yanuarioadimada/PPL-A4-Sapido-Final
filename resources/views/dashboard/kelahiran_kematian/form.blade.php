<x-app-layout>

    <form action="{{route('kelahiran-kematian.store')}}" method="POST" enctype="multipart/form-data" class="p-10 m-4 bg-white">
        @csrf
        <div class="mb-8">
            <span class="text-3xl font-semibold">Kelahiran & Kematian</span><br>
            <span class="text-medium font-medium mb-10">Lengkapi data di bawah ini untuk menambahkan data kelahiran dan kematian hewan ternak</span>
        </div>
        <div class="mb-6 mt-8">
            <label for="nomor_hewan" class="{{$errors->has('nomor_hewan') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">ID Hewan</label>
            <select name="id_hewan" id="nomor_hewan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>Pilih ID Hewan</option>
                @foreach ($hewan as $item)
                    <option value="{{$item->id}}">{{$item->nomor_hewan}}</option>
                @endforeach
                
            </select>
            @if($errors->has('id_hewan'))
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('nomor_hewan')}}</p>
            @endif
        </div>
        <div class="mb-6">
            <label for="jenis" class="{{$errors->has('jenis') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Kelahiran dan Kematian</label>
            <select name="jenis" id="jenis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>Jenis</option>
                <option value="kelahiran">Kelahiran</option>
                <option value="kematian">Kematian</option>
            </select>
            @if($errors->has('id_hewan'))
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('nomor_hewan')}}</p>
            @endif
        </div>
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload foto</label>
            <input name="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
        </div> 
        <div class="mb-6">
            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
            <textarea name="keterangan" id="keterangan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="contoh: beberapa minggu terakhir nafsu makan sapi menurun drastis"></textarea>
        </div> 
    
        <div class="flex justify-end">
            <a href="{{ route('kelahiran-kematian.index') }}" class="text-white mr-2 bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm w-full sm:w-auto px-7 py-2.5 text-center border border-gray-300 inline-block mt-2 focus:outline-none focus:ring-4 focus:border-transparent">Batal</a>
            <button type="submit" class="text-white mr-2 bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm w-full sm:w-auto px-6 py-2.5 text-center border border-gray-300 inline-block mt-2 focus:outline-none focus:ring-4 focus:border-transparent">Simpan</button>
        </div>
    </form>
    
    </x-dashboard-layout>