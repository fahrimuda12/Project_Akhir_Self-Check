@extends('pakar/app')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-3 gap-4 mb-4">
                @foreach ($penyakit as $key => $data)
                    <div
                        class="flex basis-1/3 p-4 gap-2 items-center justify-around  rounded shadow bg-white dark:bg-gray-800">
                        <div>
                            <img src="{{ asset('images/logo-penyakit.jpg') }}" alt="" width="100" height="100">
                        </div>
                        <div class="flex flex-col gap-3 items-center">
                            <p class="text-xl font-medium text-center text-gray-700 dark:text-gray-500">
                                {{ $data->nama_penyakit }}</p>
                            <form action="{{ route('pakar.sorting', ['kode' => $data->kode_penyakit]) }}" method="get">
                                @csrf
                                <button type="submit"
                                    class="px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded active:bg-green-500 hover:bg-green-700 focus:outline-none focus:shadow-outline-red">
                                    Urutkan
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="flex basis-1/3 p-4 items-center justify-around  rounded shadow bg-yellow-500 dark:bg-gray-800">
                    <img src="{{ asset('images/admin-profile.png') }}" alt="" width="100" height="100">
                    <div class="flex flex-col gap-4 items-center">
                        <p class="text-2xl text-gray-700 dark:text-gray-500">Batuk</p>
                        <button
                            class="px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                            Urutkan
                        </button>
                    </div>
                </div>
                <div class="flex basis-1/3 p-4 items-center justify-around  rounded shadow bg-yellow-500 dark:bg-gray-800">
                    <img src="{{ asset('images/admin-profile.png') }}" alt="" width="100" height="100">
                    <div class="flex flex-col gap-4 items-center">
                        <p class="text-2xl text-gray-700 dark:text-gray-500">Batuk</p>
                        <form action="{{ route('pakar.sorting', ['kode' => 'P01']) }}" method="get">
                            @csrf
                            <button
                                class="px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                Urutkan
                            </button>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
