@extends('admin/app')
@section('content')
    @extends('admin/sidebar')
    <div class="py-8 sm:ml-64">
        <section id="tabel-penyakit" class="mb-10">
            <div class="flex items-center justify-items-start md:justify-between mb-4">
                <p class="text-lg font-semibold whitespace-nowrap">Penyakit</p>
                <a href="{{ route('admin.kelola-data.tambah-penyakit') }}" data-mdb-ripple="true" data-mdb-ripple-color="light"
                    class="inline-block
                                    px-7 py-2 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded
                                    shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg
                                    focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150
                                    ease-in-out">
                    Tambah Data +
                </a>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs md:text-sm text-gray-700 uppercase bg-zinc-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Kode Penyakit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Penyakit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penginput
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Umur
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span>Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($diseases as  $key => $penyakit)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $penyakit->kode_penyakit }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $penyakit->nama_penyakit }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $penyakit->nip_dokter }}
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center">Belum ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
        <section id="tabel-gejala" class="mb-10">
            <div class="flex items-center justify-items-start md:justify-between mb-4">
                <p class="text-lg font-semibold whitespace-nowrap">Gejala</p>
                <a href="{{ route('admin.kelola-data.tambah-penyakit') }}" data-mdb-ripple="true"
                    data-mdb-ripple-color="light"
                    class="inline-block
                                    px-7 py-2 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded
                                    shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg
                                    focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150
                                    ease-in-out">
                    Tambah Data +
                </a>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3 ">
                                Nama Penyakit
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                Terjangkit (Bulan)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gejala
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                Pertanyaan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                1
                            </th>
                            <td class="px-6 py-4">
                                Batuk Berdahak
                            </td>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                3 Orang
                            </td>
                            <td class="px-6 py-4 ">
                                <span class="flex flex-col md:flex-row items-center gap-2">
                                    <svg aria-hidden="true" class="svg-icon iconCheckmarkLg" width="14" height="14"
                                        viewBox="0 0 36 36">
                                        <path d="m6 14 8 8L30 6v8L14 30l-8-8v-8Z"></path>
                                    </svg>
                                    Verified
                                </span>
                            </td>
                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                <span class="flex flex-col md:flex-row items-center gap-2">
                                    <svg aria-hidden="true" class="svg-icon iconCheckmarkLg" width="14" height="14"
                                        viewBox="0 0 36 36">
                                        <path d="m6 14 8 8L30 6v8L14 30l-8-8v-8Z"></path>
                                    </svg>
                                    Verified
                                </span>
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href=""
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <section id="tabel-rule" class="mb-10">
            <div class="flex items-center justify-items-start md:justify-between mb-4">
                <p class="text-lg font-semibold whitespace-nowrap">Rule</p>
                <a href="{{ route('admin.kelola-data.tambah-penyakit') }}" data-mdb-ripple="true"
                    data-mdb-ripple-color="light"
                    class="inline-block
                                    px-7 py-2 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded
                                    shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg
                                    focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150
                                    ease-in-out">
                    Tambah Data +
                </a>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs md:text-sm text-gray-700 uppercase bg-zinc-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penyakit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gejala
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nilai CF
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span>Action</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($rules as  $key => $rule)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $rule->kode_gejala }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $penyakit->kode_penyakit }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $penyakit->nip_dokter }}
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center">Belum ada data</td>
                            </tr>
                        @endforelse
                        <tr>
                            <nav aria-label="Page navigation example">
                                <ul class="inline-flex -space-x-px">
                                    <li>
                                        <a href="#"
                                            class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                    </li>
                                    <li>
                                        <a href="#" aria-current="page"
                                            class="px-3 py-2 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </tr>


                    </tbody>

                </table>
                {{-- {{ $rules->links() }} --}}

            </div>
        </section>
    </div>
@endsection
