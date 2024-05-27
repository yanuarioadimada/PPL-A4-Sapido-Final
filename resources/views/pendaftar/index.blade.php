<x-app-layout>
    <div class="p-5 md:p-10">
        <form class="space-y-4 bg-white p-8" method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
            @csrf
            <div style="background-image: url({!! asset('img/cover-tumbuh.png') !!}); background-size: cover;">
                <h4 class="text-3xl font-bold text-white mb-4 p-10">Daftar Akun Kelompok Ternak</h4>
            </div>
            <!-- Name -->
            <div>
                <label for="name" class="{{$errors->has('nama') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Nama</label>
                <input name="nama" type="text" id="name" class="{{$errors->has('nama') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} "   />
                @if($errors->has('nama'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('name')}}</span></p>
                @endif
            </div>
        
            <div>
                <label for="no_hp" class="{{$errors->has('no_hp') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">No telepon</label>
                <input type="text" name="no_hp" id="no_hp" class="{{$errors->has('no_hp') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} " />
                @if($errors->has('no_hp'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('no_hp')}}</span></p>
                @endif
            </div>
            
            <!-- Email -->
            <div>
                <label for="email" class="{{$errors->has('email') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Email</label>
                <input type="email" name="email" id="email" class="{{$errors->has('email') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} " placeholder="email@gmail.com" />
                @if($errors->has('email'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('email')}}</span></p>
                @endif
            </div>
            
            <!-- Alamat -->
            <div>
                <label for="alamat" class="{{$errors->has('alamat') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="{{$errors->has('alamat') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} " placeholder="Alamat" />
                @if($errors->has('alamat'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('alamat')}}</span></p>
                @endif
            </div>
        
            <!-- Password -->
            <div>
                <label for="password" class="{{$errors->has('password') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••" class="{{$errors->has('password') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} " />
                @if($errors->has('password'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('password')}}</span></p>
                @endif
            </div>

            <!-- Foto -->
            <div>
                <label for="foto" class="{{$errors->has('foto') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Upload foto profil</label>
                <input type="file" name="foto" id="foto" class="{{$errors->has('foto') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} " />
                @if($errors->has('foto'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('foto')}}</span></p>
                @endif
            </div>

            <!-- Surat Ajuan -->
            <div>
                <label for="surat_ajuan" class="{{$errors->has('surat_ajuan') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Surat Ajuan</label>
                <input type="file" name="surat_ajuan" id="surat_ajuan" class="{{$errors->has('surat_ajuan') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} " />
                @if($errors->has('surat_ajuan'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('surat_ajuan')}}</span></p>
                @endif
            </div>
        
            <!-- Buttons -->
            <div class="flex ">
                
                <a href="{{route('landing')}}" class="mt-9 text-center focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-10 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 w-44">Batal</a>
                
                <button type="submit" class="mt-9 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 w-44">Daftar</button>
            </div>
        </form>
    </div>
</x-app-layout>