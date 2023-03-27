@extends('admin/app')
@section('content')
    @extends('admin/sidebar')
    <div class="bg-white rounded-lg py-8 px-4 sm:ml-64">
        <form
            action="{{ route('admin.kelola-data.edit-gejala', ['id' => Illuminate\Support\Facades\Crypt::encrypt($data->kode_gejala)]) }}"
            method="POST">
            @csrf
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="kode_gejala" id="floating_kode" value="{{ $data->kode_gejala }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " readonly />
                <label for="floating_kode"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kode
                    Gejala</label>
            </div>
            @error('kode_gejala')
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="nama" id="floating_nama" value="{{ $data->gejala }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_nama"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                    Gejala</label>
            </div>
            @error('nama')
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="relative z-0 w-full mb-6 group">
                <textarea name="pertanyaan" id="floating_pertanyaan" rows="2"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required>{{ $data->pertanyaan }}</textarea>
                <label for="floating_pertanyaan"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pertanyaan</label>
            </div>
            @error('pertanyaan')
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="grid grid-cols-2 gap-4 relative z-0 w-full mb-6 group">
                <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                    <input type="radio" value="pilgan" name="skalarOption"
                        class="skalar-option w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-1"
                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pilihan
                        Ganda</label>
                </div>
                <div class="flex items-center pl-4 border border-gray-200 rounded dark:border-gray-700">
                    <input checked type="radio" value="hari" name="skalarOption"
                        class="skalar-option w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="bordered-radio-2"
                        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hari</label>
                </div>
            </div>
            <div id="pilganForm">
                {{-- <div class="relative w-full mb-2 group group-select md:mt-0 mt-2 ">
                    <select name="pilgan[]" data-placeholder="Seberapa yakin dengan gejalanya ?"
                        class="select2-nilai block py-2.5 px-2 w-full capitalize text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none rounded-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 target:text-lg focus:outline-none focus:ring-0 focus:border-blue-600 peer
                        ">
                        <option></option>
                        @forelse ($nilai as $val)
                            <option value="{{ $val->bobot_nilai }}">{{ $val->skalar }}</option>
                        @empty
                            <option>Lainnya</option>
                        @endforelse
                    </select>
                    <label for="floating_gejala"
                        class="peer-focus:font-medium
                        absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Skalar
                        Keyakinan</label>
                </div>
                <div class="relative w-full mb-2 group group-select md:mt-0 mt-2 ">
                    <select name="pilgan[]" data-placeholder="Seberapa yakin dengan gejalanya ?"
                        class="select2-nilai block py-2.5 px-2 w-full capitalize text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none rounded-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 target:text-lg focus:outline-none focus:ring-0 focus:border-blue-600 peer
                        ">
                        <option></option>
                        @forelse ($nilai as $val)
                            <option value="{{ $val->bobot_nilai }}">{{ $val->skalar }}</option>
                        @empty
                            <option>Lainnya</option>
                        @endforelse
                    </select>
                    <label for="floating_gejala"
                        class="peer-focus:font-medium
                        absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Skalar
                        Keyakinan</label>
                </div> --}}
            </div>
            <div id="hariForm" class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="hari" id="inputHari" value="{{ $data->skalar3 }}"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                    <label for="inputHari"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Rentang
                        Hari</label>
                </div>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
        </form>
    </div>
@endsection
