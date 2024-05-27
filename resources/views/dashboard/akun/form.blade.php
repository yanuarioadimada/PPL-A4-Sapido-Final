<x-dashboard-layout>
    <form action="{{route('akun.store')}}" method="POST">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="name" class="{{$errors->has('name') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Nama</label>
                <input name="name" type="text" id="name" class="{{$errors->has('name') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} " placeholder="Nama" required />
                @if($errors->has('name'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('name')}}</p>
                @endif
            </div>
            <div>
                <label for="email" class="{{$errors->has('email') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Email</label>
                <input name="email" type="email" id="email" class="{{$errors->has('email') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} " placeholder="Email" required />
                @if($errors->has('email'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('email')}}</p>
                @endif
            </div>
            <div>
                <label for="password" class="{{$errors->has('password') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Password</label>
                <input name="password" type="password id="password" class="{{$errors->has('password') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} " placeholder="Password" required />
                @if($errors->has('password'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('password')}}</p>
                @endif
            </div>
            <div>
                <label for="password_confirmation" class="{{$errors->has('password_confirmation') ? 'text-red-700' : 'text-gray-900'}} block mb-2 text-sm font-medium">Konfirmasi Password</label>
                <input name="password_confirmation" type="password id="password_confirmation" class="{{$errors->has('password_confirmation') ? 'bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500  focus:border-red-500 block w-full p-2.5  ' : 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'}} " placeholder="Konfirmasi Password" required />
                @if($errors->has('password_confirmation'))
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{$errors->first('password_confirmation')}}</p>
                @endif
            </div>
        </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

    </form>
</x-dashboard-layout>