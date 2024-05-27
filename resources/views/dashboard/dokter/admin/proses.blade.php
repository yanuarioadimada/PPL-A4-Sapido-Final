
<x-dashboard-layout>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div>
            <h4 class="text-3xl font-bold text-gray-800 mb-4">Konsultasi Proses</h4>
        </div>
       
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Dokter
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No Telepon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Konsultasi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Waktu Konsultasi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-3">
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
                    <td class="px-6 py-4">
                        {{$index+1}}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->dokter->nama}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->dokter->alamat}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->dokter->no_telepon}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->tanggal_konsultasi}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->waktu_konsultasi}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->keterangan}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->status}}
                    </td>
                    <td class="px-6 py-4 text-center">
                        
                        <form action="{{route('admin.konsultasi.update',$item->id)}}" method="POST" class="inline mr-4">
                            @csrf
                            @method('PATCH')
                            <input name="status" type="text" value="diterima" hidden>
                            <button type="submit" class="font-medium  text-blue-600 dark:text-blue-500 hover:underline">diterima</button>
                        </form>
                    
                    
                        <form action="{{route('admin.konsultasi.update',$item->id)}}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <input name="status" type="text" value="ditolak" hidden>
                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">ditolak</button>
                        </form>
                    
                </td>
                </tr>
                @endforeach
                
    
            </tbody>
        </table>
    </div>
    
    </x-dashboard-layout>