
<x-app-layout>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-10 m-4 bg-white">
        <div style="background-image: url({!! asset('img/cover-konsul.png') !!}); background-size: cover;">
            <h4 class="text-3xl font-bold text-white mb-4 p-10">Konsultasi</h4>
        </div>
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
        <div class="w-100 mb-4 flex justify-end">
            <a href="{{route('konsultasi.create')}}" type="button" class=" text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Ajukan konsultasi</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-900 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Nama Dokter
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        No Telepon
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Tanggal Konsultasi
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Waktu Konsultasi
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index=>$item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 text-center">
                        {{$index+1}}
                    </td>
                    <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->dokter->nama}}
                    </th>
                    <td class="px-6 py-4 text-center">
                        {{$item->dokter->alamat}}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{$item->dokter->no_telepon}}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{$item->tanggal_konsultasi}}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{$item->waktu_konsultasi}}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{$item->keterangan}}
                    </td>
                    <td class="px-6 py-4 text-center">
                        {{$item->status}}
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($item->status == "diterima")
                        @else
                        <a href="{{route('konsultasi.edit',$item->id)}}" class="font-medium mr-2 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <form action="{{route('konsultasi.destroy',$item->id)}}" method="post" class="inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
                
    
            </tbody>
        </table>
    </div>
    
    </x-app-layout>