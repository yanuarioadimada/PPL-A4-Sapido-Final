<x-dashboard-layout>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="p-5"> 
            <h4 class="text-3xl font-bold text-gray-800 mb-2">BIMTEK</h4>
            <p class="mb-4 text-xl font-bold text-gray-500">- Admin -</p>
        </div>
        <div class="w-100 mb-4 flex justify-end">
            <a href="{{route('admin.bimtek.create')}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Buat Bimtek</a>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No Hp
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acara
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peserta as $index=>$item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{$index+1}}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->nama}}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->no_hp}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->alamat}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->bimtek->judul}}
                        </td>
                        
                </tr>
                @endforeach 
                
    
            </tbody>
        </table>
    </div>
    
    </x-dashboard-layout>