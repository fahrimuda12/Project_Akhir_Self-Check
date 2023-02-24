@extends('pakar/app')
@section('content')
    @extends('pakar/sidebar')
    <div class="py-8 px-4 sm:ml-64">
        <div class="flex items-center justify-items-start justify-between mb-4">
            <p class="text-lg font-semibold whitespace-nowrap">Gejala</p>
            <a href="{{ route('pakar.gejala.tambah') }}" data-mdb-ripple="true" data-mdb-ripple-color="light"
                class="inline-block
                                px-7 py-2 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded
                                shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg
                                focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150
                                ease-in-out">
                Tambah Data +
            </a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
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
                            <a href="" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
