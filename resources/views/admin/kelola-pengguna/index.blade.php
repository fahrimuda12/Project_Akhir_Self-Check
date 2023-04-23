@extends('admin/app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/datatable.css') }}" />
    @if (session('success'))
        <div id="alert-3"
            class="sm:ml-64 flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif
    <div class="py-8 px-4 sm:ml-64">
        <section class="kelolaPengguna mb-10 px-8 py-10 bg-white rounded-3xl">
            <div class="mb-2">
                <div class="flex items-center justify-items-start justify-between mb-4">
                    <p class="text-lg font-semibold whitespace-nowrap">User</p>
                    <a href="{{ route('admin.kelola-pengguna.tambah-user') }}" data-mdb-ripple="true"
                        data-mdb-ripple-color="light"
                        class="inline-block
                                    px-7 py-2 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded
                                    shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg
                                    focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150
                                    ease-in-out">
                        Tambah Pengguna +
                    </a>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="lg:table-fixed w-full text-sm text-left text-gray-500 shadow border" id="table-pengguna">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-gray-700">
                                    NRP
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Jenis Kelamin
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Umur
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Alamat
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    <span>Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as  $key => $user)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-600 items-center">
                                    <td class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                        {{ $user->nrp }}
                                    </td>
                                    <td class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                        {{ $user->nama }}
                                    </td>
                                    <td class="px-6 py-4 font-medium  whitespace-nowrap dark:text-white">
                                        {{ $user->jenkel }}
                                    </td>
                                    <td class="px-6 py-4 font-medium  whitespace-nowrap dark:text-white">
                                        {{ $user->umur }}
                                    </td>
                                    <td class="px-6 py-4 font-medium  whitespace-nowrap dark:text-white">
                                        {{ $user->alamat }}
                                    </td>
                                    <td class="px-6 py-4 flex gap-2">
                                        <a href="{{ route('admin.kelola-pengguna.edit-user', ['id' => Illuminate\Support\Facades\Crypt::encrypt($user->nrp)]) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <a href="{{ route('admin.kelola-pengguna.delete-user', ['id' => Illuminate\Support\Facades\Crypt::encrypt($user->nrp)]) }}"
                                            class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
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
            </div>
        </section>
        <section class="kelolaPengguna mb-10 px-8 py-10 bg-white rounded-3xl">
            <div class="my-2">
                <div class="flex items-center justify-items-start justify-between mb-4">
                    <p class="text-lg font-semibold whitespace-nowrap">Dokter</p>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 shadow border" id="table-dokter">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    NIP
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
                                    class="bg-white border-b items-center dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 font-medium dark:text-white">
                                        {{ $data->nip_dokter }}
                                    </td>
                                    <td class="px-6 py-4 font-medium dark:text-white">
                                        {{ $data->nama_dokter }}
                                    </td>
                                    <td class="px-6 py-4 font-medium dark:text-white">
                                        {{ $data->email }}
                                    </td>
                                    <td class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                        {{ $data->no_hp }}
                                    </td>
                                    <td class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                        {{ $data->alamat ? $data->alamat : '-' }}
                                    </td>
                                    <td class="px-6 py-4  items-center">
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.kelola-pengguna.edit-user', ['id' => Illuminate\Support\Facades\Crypt::encrypt($data->nip_dokter)]) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            <a href="{{ route('admin.kelola-pengguna.delete-user', ['id' => Illuminate\Support\Facades\Crypt::encrypt($data->nip_dokter)]) }}"
                                                class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
                                        </div>
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
            </div>
        </section>
        <section class="kelolaPengguna mb-10 px-8 py-10 bg-white rounded-3xl">
            <div class="my-2">
                <div class="flex items-center justify-items-start justify-between mb-4">
                    <p class="text-lg font-semibold whitespace-nowrap">Admin</p>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 shadow border" id="table-admin">
                        <thead class="text-xs text-gray-700 uppercase bg-blue-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    NIP
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
                            @forelse ($admin as  $key => $data)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                        {{ $data->nip }}
                                    </td>
                                    <td class="px-6 py-4 font-medium dark:text-white">
                                        {{ $data->nama_pegawai }}
                                    </td>
                                    <td class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                        {{ $data->email }}
                                    </td>
                                    <td class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                        {{ $data->no_hp }}
                                    </td>
                                    <td class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                        {{ $data->alamat ? $data->alamat : '-' }}
                                    </td>
                                    <td class="px-6 py-4 flex gap-2">
                                        <a href="{{ route('admin.kelola-pengguna.edit-user', ['id' => Illuminate\Support\Facades\Crypt::encrypt($data->nip)]) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <a href="{{ route('admin.kelola-pengguna.delete-user', ['id' => Illuminate\Support\Facades\Crypt::encrypt($data->nip)]) }}"
                                            class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
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
            </div>
        </section>
    </div>
    @push('datatable-pengguna')
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#table-pengguna').DataTable({
                    pagingType: 'first_last_numbers',
                    "language": {
                        "paginate": {
                            "first": "<",
                            "last": ">"
                        }
                    }
                });
                $('#table-dokter').DataTable({
                    pagingType: 'first_last_numbers',
                    "language": {
                        "paginate": {
                            "first": "<",
                            "last": ">"
                        }
                    }
                });
                $('#table-admin').DataTable({
                    pagingType: 'first_last_numbers',
                    "language": {
                        "paginate": {
                            "first": "<",
                            "last": ">"
                        }
                    }
                });
            });

            // $('tr').removeAttr("background-color");
        </script>
    @endpush
@endsection
