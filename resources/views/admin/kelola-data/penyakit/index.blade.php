@extends('admin/app')
@section('content')
    {{-- @extends('admin/sidebar') --}}
    <div class="sm:ml-64">
        <section id="penyakit" class="mb-10 px-8 py-10 bg-white rounded-3xl">
            <div class="flex items-center justify-items-start justify-between md:justify-between mb-4">
                <p class="text-lg font-semibold whitespace-nowrap">Penyakit</p>
                <a href="{{ route('admin.kelola-data.tambah-penyakit') }}" data-mdb-ripple="true" data-mdb-ripple-color="light"
                    class="inline-block
                                    px-2 md:px-7 py-2 bg-blue-600 text-white font-normal md:font-medium text-xs md:text-sm leading-snug uppercase rounded
                                    shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg
                                    focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150
                                    ease-in-out">
                    Tambah Data +
                </a>
            </div>
            <div class="relative overflow-x-auto">
                <livewire:penyakit-table></livewire:penyakit-table>
            </div>
        </section>
        <section id="rule" class="mb-10 px-8 py-10 bg-white rounded-3xl">
            <div class="flex items-center justify-items-start md:justify-between mb-4">
                <p class="text-lg font-semibold whitespace-nowrap">Rule</p>
                {{-- <a href="{{ route('admin.kelola-data.tambah-penyakit') }}" data-mdb-ripple="true"
                    data-mdb-ripple-color="light"
                    class="inline-block
                                    px-7 py-2 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded
                                    shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg
                                    focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150
                                    ease-in-out">
                    Tambah Data +
                </a> --}}
            </div>
            <div class="relative overflow-x-auto">
                <livewire:rulers-table></livewire:rulers-table>
            </div>
        </section>
        {{-- <livewire:table :config="App\Tables\RuleTable::class" /> --}}
    </div>
@endsection
