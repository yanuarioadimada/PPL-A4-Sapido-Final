<x-app-layout>
    <div class="overflow-hidden shadow-xl sm:rounded-lg" style="background-image: url({!! asset('img/bg-sapi-hitam.png') !!}); background-size: cover;">    <div class="mx-auto py-20 px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white p-10">
            <h1 class="text-6xl font-bold mb-2">BIMTEK TERNAK SAPIDO</h1>
            <p>Segera daftarkan diri kalian ke acara BIMTEK Ternak</p>
        </div>
        @foreach ($bimtek as $item)
        <div class="p-5 w-full mx-auto flex justify-center">
            <div class="max-w-2xl bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mr-4">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ asset($item->gambar) }}" alt="card1" />
                </a>
                <div class="p-5 text-center">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Judul Acara {{$item->judul}} #1</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$item->tanggal}}<br> {{$item->deskripsi}}</p>
                    <div class="flex justify-center">
                        <a href="{{route('bimtek.regis',$item->id)}}" class="inline-flex px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Daftar
                        </a>
                    </div>
                    
                </div>
            </div>
            
        </div>
        @endforeach
    
    
    </div>


    



</x-dashboard-layout>