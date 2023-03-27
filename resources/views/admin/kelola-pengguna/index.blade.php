@extends('admin/app')
@section('content')
    {{-- @extends('admin/sidebar') --}}
    <div class="py-8 px-4 sm:ml-64">
        <section id="tabel-user" class="mb-10">
            <div class="flex items-center justify-items-start justify-between mb-4">
                <p class="text-lg font-semibold whitespace-nowrap">User</p>
                <a href="{{ route('admin.kelola-pengguna.tambah-user') }}" data-mdb-ripple="true" data-mdb-ripple-color="light"
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
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jenis Kelamin
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

                        @forelse ($users as  $key => $user)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->nama }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->jenkel }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->umur }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->alamat }}
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="{{ route('admin.kelola-pengguna.edit-user', ['id' => $user->nrp]) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                Belum ada data
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
        <section id="tabel-dokter" class="mb-10">
            <div class="flex items-center justify-items-start justify-between mb-4">
                <p class="text-lg font-semibold whitespace-nowrap">Dokter</p>
                <a href="{{ route('admin.kelola-pengguna.tambah-dokter') }}" data-mdb-ripple="true"
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
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor Handphone
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
                        @forelse ($dokter as  $key => $data)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data->nama_dokter }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data->email }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->no_hp }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->alamat }}
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="{{ route('admin.kelola-pengguna.edit-user', ['id' => $user->nrp]) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                Belum ada data
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
