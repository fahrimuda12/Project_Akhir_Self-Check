@extends('admin/app')
@section('content')
    @extends('admin/sidebar')
    <div class="py-8 sm:ml-64">
        <section id="tabel-user" class="mb-10">
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
    </div>
@endsection
