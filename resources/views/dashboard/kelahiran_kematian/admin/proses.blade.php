<x-dashboard-layout>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="p-5"> 
            <h4 class="text-3xl font-bold text-gray-800 mb-2">Kelahiran dan Kematian - Proses</h4>
            <p class="mb-4 text-xl font-bold text-gray-500">- Admin -</p>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ID Hewan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        jenis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        foto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        keterangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index=>$item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{$index+1}}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$item->hewan->nomor_hewan}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->jenis}}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a target="_blank" class="w-4" href="{{$item->gambar ? url($item->gambar) : ''}}">
                                @if($item->gambar)
                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 2048 2048" width="34" height="34" style="shape-rendering:geometricPrecision;text-rendering:geometricPrecision;image-rendering:optimizeQuality;fill-rule:evenodd;clip-rule:evenodd"><defs><style>.fil0{fill:none}.fil1{fill:#1355d0;fill-rule:nonzero}</style></defs><g id="Layer_x0020_1"><path class="fil0" d="M0 0h2048v2048H0z"/><g id="_445077192"><path id="_445069968" class="fil0" d="M255.996 255.996h1536v1536h-1536z"/><path id="_445079832" class="fil1" d="m360.399 1696.12 292.069-568.851-.048-.025c9.738-19.23 24.198-36.673 41.294-49.147 17.288-12.612 37.291-20.324 58.265-20.324h671.8v-95.729c0-12.238-4.73-23.3-12.473-31.601-8.101-8.685-19.41-14.465-32.073-15.629l5.75-63.5c28.839 2.65 54.6 15.825 73.073 35.629 18.454 19.781 29.725 46.075 29.725 75.101v95.729h256.906l.25.125c13.84.126 27.184 3.625 38.79 9.964 11.798 6.44 21.884 15.829 29.05 27.645 7.126 11.75 11.23 25.647 11.09 41.115-.135 14.832-4.163 30.938-13.266 47.607l-.007-.004-271.256 506.561.045.024c-9.355 17.739-26.757 35.502-46.372 48.226-19.195 12.45-41.441 20.807-61.894 20.807v-.125l-1088.43.156v.125a119.572 119.572 0 0 1-45.171-8.864c-14.207-5.792-27.316-14.374-38.543-25.402-11.211-11.065-19.955-24.085-25.882-38.225-5.944-14.18-9.09-29.455-9.09-44.986h.126l.157-821.168h-.126c0-32.415 13.373-61.849 35.004-83.198 21.453-21.175 51.01-34.288 83.604-34.288v.125l79.552-.146v63.751l-79.552.147v.125c-15.248 0-28.977 6.038-38.855 15.786-9.733 9.607-15.75 22.94-15.75 37.698h-.126l-.157 821.168h.125c0 7.15 1.415 14.107 4.089 20.485a52.934 52.934 0 0 0 11.63 17.225c5.096 5.006 11.15 8.943 17.794 11.652 6.595 2.689 13.775 4.113 21.17 4.113v.126l17.713-.003zm348.896-540-277.251 539.99 999.074-.143v-.125c7.722 0 17.639-4.139 27.144-10.305 10.974-7.119 20.24-16.164 24.623-24.476l.124-.125 271.467-506.957.125-.25c3.798-6.956 5.472-12.834 5.516-17.608.028-3.102-.655-5.66-1.84-7.614-1.146-1.891-2.906-3.474-5.05-4.644-2.508-1.37-5.442-2.144-8.54-2.21v.122H751.98c-6.925 0-14.11 2.969-20.765 7.823-8.781 6.408-16.42 15.786-21.795 26.397l-.125.125z"/><path id="_445069632" class="fil1" d="m448.125 1395.7.008-1012.59h-.125c0-27.576 11.56-55.66 29.86-76.38 18.392-20.821 43.836-34.782 72.061-34.782h551.995c8.784 0 17.54 1.944 25.714 5.583 7.917 3.521 15.152 8.738 21.172 15.396l178.251 197.126.055-.05c5.403 5.876 9.603 12.73 12.467 20.157 2.905 7.534 4.424 15.413 4.424 23.231h-.126l-.002 482.588h-63.751l.002-482.588h-.125c0-.22.077-.16.09-.18l-.105-.208-178.185-197.053H549.93c-8.74 0-17.422 5.23-24.31 13.03-8.34 9.444-13.61 22.003-13.61 34.13h-.125l-.008 1012.59h-63.751zm653.516-1059.93-.004.008c-.007-.016-.141-.169-.079-.1l.083.092zm-.004.008v.003c-.11-.049-.054-.02.037.026l-.033-.037-.004.008z"/><path id="_445068864" class="fil1" d="M672.001 575.998c-17.673 0-32 14.328-32 32C640 625.673 654.327 640 672 640h448.001c17.673 0 32-14.328 32-32.001s-14.327-32.001-32-32.001H672.001z"/><path id="_445079376" class="fil1" d="M672.001 736.001c-17.673 0-32 14.328-32 32 0 17.674 14.327 32.002 32 32.002h448.001c17.673 0 32-14.328 32-32.001s-14.327-32.001-32-32.001H672.001z"/><path id="_445068984" class="fil1" d="M672.001 896.004c-17.673 0-32 14.328-32 32 0 17.674 14.327 32.002 32 32.002h448.001c17.673 0 32-14.328 32-32.001s-14.327-32.001-32-32.001H672.001z"/></g></g></svg>
                                @endif
                            </a>
                        </td>
                        <td class="px-6 py-4">
                            {{$item->keterangan}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->update_at ?  $item->update_at->format('d-m-Y') : $item->created_at->format('d-m-Y')}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->status}}
                        </td>
                        <td class="px-6 py-4 text-right">
                            
                                <form action="{{route('admin.kelahiran-kematian.update',$item->id)}}" method="POST" class="inline mr-4">
                                    @csrf
                                    @method('PATCH')
                                    <input name="status" type="text" value="diterima" hidden>
                                    <button type="submit" class="font-medium  text-blue-600 dark:text-blue-500 hover:underline">diterima</button>
                                </form>
                            
                            
                                <form action="{{route('admin.kelahiran-kematian.update',$item->id)}}" method="POST" class="inline">
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