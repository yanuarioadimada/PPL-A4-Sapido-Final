<x-dashboard-layout>

    <form action="{{route('hewan.update',$hewan->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="nomor_hewan" class="{{$errors->has('nomor_hewan') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">ID Hewan</label>
                <input value="{{$hewan->nomor_hewan}}" name="nomor_hewan" type="text" id="nomor_hewan" class="{{$errors->has('nomor_hewan') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} " placeholder="ID Hewan" required />
                @if($errors->has('nomor_hewan'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('nomor_hewan')}}</p>
                @endif
            </div>
            <div >
                <label for="nomor_induk" class="{{$errors->has('nomor_induk') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">ID Induk</label>
                <select name="nomor_induk" id="nomor_induk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="{{$hewan->induk ? $hewan->induk->nomor_hewan : ''}}" selected>{{$hewan->induk ? $hewan->induk->nomor_hewan : 'Pilih no induk'}}</option>
                    @foreach ($hewans as $item)
                        <option value="{{$item->id}}">{{$item->nomor_hewan}}</option>
                    @endforeach
                </select>
            </div>
            <div >
                <label for="jenis_kelamin" class="{{$errors->has('jenis_kelamin') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium ">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="{{$errors->has('jenis_kelamin') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} ">
                    <option selected value="{{$hewan->jenis_kelamin}}">{{$hewan->jenis_kelamin}}</option>
                    <option value="jantan">Jantan</option>
                    <option value="betina">Betina</option>
                </select>
                @if($errors->has('jenis_kelamin'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('jenis_kelamin')}}</p>
                @endif
            </div>
            <div >
                <label for="jenis_hewan" class="{{$errors->has('jenis_hewan') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Jenis Hewan</label>
                <select name="jenis_hewan" id="jenis_hewan" class="{{$errors->has('jenis_hewan') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} ">
                    <option selected value="{{$hewan->jenis_hewan}}">{{$hewan->jenis_hewan}}</option>
                    <option value="sapi">Sapi</option>
                    <option value="kambing">Domba</option>
                </select>
                @if($errors->has('jenis_hewan'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('jenis_hewan')}}</p>
                @endif
            </div>
        </div>
        <div class="mb-6">
            <label for="id_profile" class="{{$errors->has('id_profile') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Kelompok Ternak</label>
            <select name="id_profile" id="kelompok" class="{{$errors->has('id_profile') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} ">
                <option selected value="{{$hewan->id_profile}}">{{$hewan->profile->users->name}}</option>
                @foreach ($kelompok as $item)
                    <option value="{{$item->id}}">{{$item->users->name}}</option>
                @endforeach
                
            </select>
            @if($errors->has('id_profile'))
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('id_profile')}}</p>
            @endif
        </div>
        <div class="mb-6">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload foto hewan</label>
            <input name="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
        </div> 
        <div class="mb-6">
            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
            <textarea value="{{$hewan->keterangan}}" name="keterangan" id="keterangan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$hewan->keterangan}}</textarea>
        </div> 
    
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
    </form>
    
    </x-dashboard-layout>