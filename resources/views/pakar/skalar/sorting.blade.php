@extends('pakar/app')
@section('content')
    <div class="p-4 sm:ml-64">
        <section class="mb-10 px-8 py-10 bg-white rounded-3xl">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 shadow border" id="table-sorting">
                    <colgroup>
                        <col style="width:10%">
                        <col style="width:20%">
                        <col style="width:50%">
                        <col style="width:20%">
                    </colgroup>
                    <thead class="text-xs text-gray-700 uppercase bg-blue-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penyakit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gejala
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Skalar Keyakinan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penyakit->gejala as  $key => $data)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                    {{ ++$key }}
                                </td>
                                <td class="px-6 py-4 font-medium dark:text-white">
                                    {{ $penyakit->nama_penyakit }}
                                </td>
                                <td class="px-6 py-4 font-medium dark:text-white">
                                    {{ $data->gejala }}
                                </td>
                                <td>
                                    <livewire:select-dynamic :cf="$data->pivot->nilai_cf" :kode_gejala="$data->kode_gejala" :kode_penyakit="$penyakit->kode_penyakit"
                                        :wire:key="$loop->index">
                                </td>

                                {{-- @if ($data->pivot->nilai_cf > 0)
                                    <td class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                        {{ $data->pivot->nilai_cf }}
                                    </td>
                                @else
                                    <livewire:select-dynamic :value="$data->pivot->nilai_cf">
                                @endif --}}

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

    {{-- <div class="p-4 sm:ml-64">
        <div class="rounded-lg dark:border-gray-700">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <div class="flex flex-col gap-4 p-4 rounded shadow bg-yellow-500 dark:bg-gray-800" ondrop="drop(event)"
                    ondragover="allowDrop(event)">
                    <div class="flex justify-between">
                        <P>Belum Di Urutkan</P>
                        <p>0</p>
                    </div>
                    <div id="div1">
                        <ul class="w-full max-w-md">
                            @foreach ($penyakit1 as $val)
                                <li id="{{ $val->kode_gejala }}" draggable="true" ondragstart="drag(event)"
                                    ontouchstart="drag(event)"
                                    class="p-4 mb-3 flex justify-between items-center bg-white shadow rounded-lg cursor-move">
                                    {{ $val->gejala }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col gap-4 p-4 rounded shadow bg-yellow-500 dark:bg-gray-800" ondrop="drop(event)"
                    ondragover="allowDrop(event)">
                    <div class="flex justify-between">
                        <P>Berpengaruh</P>
                        <p>0.5</p>
                    </div>
                    <div id="div2">
                        <ul class="w-full max-w-md">
                            @foreach ($penyakit2 as $val)
                                <li id="{{ $val->kode_gejala }}" draggable="true" ondragstart="drag(event)"
                                    ontouchstart="drag(event)"
                                    class="p-4 mb-3 flex justify-between items-center bg-white shadow rounded-lg cursor-move">
                                    {{ $val->gejala }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col gap-4 p-4 rounded shadow bg-yellow-500 dark:bg-gray-800" ondrop="drop(event)"
                    ondragover="allowDrop(event)">
                    <div class="flex justify-between">
                        <P>Menengah</P>
                        <p>0.8</p>
                    </div>
                    <div id="div3">
                        <ul class="w-full max-w-md">
                            @foreach ($penyakit3 as $val)
                                <li id="{{ $val->kode_gejala }}" draggable="true" ondragstart="drag(event)"
                                    data-value="{{ $val->pivot->nilai_cf }}" ontouchstart="drag(event)"
                                    class="p-4 mb-3 flex justify-between items-center bg-white shadow rounded-lg cursor-move">
                                    {{ $val->gejala }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col gap-4 p-4 rounded shadow bg-yellow-500 dark:bg-gray-800" ondrop="drop(event)"
                    ondragover="allowDrop(event)">
                    <div class="flex justify-between">
                        <P>Sangat Berpengaruh</P>
                        <p>1</p>
                    </div>
                    <div id="div4">
                        <ul class="w-full max-w-md">
                            @foreach ($penyakit4 as $val)
                                <li id="{{ $val->kode_gejala }}" draggable="true" ondragstart="drag(event)"
                                    data-value={{ $val->nilai_cf }} ontouchstart="drag(event)"
                                    class="p-4 mb-3 flex justify-between items-center bg-white shadow rounded-lg cursor-move">
                                    {{ $val->gejala }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @livewireScripts
    {{-- <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script> --}}
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
            console.log(ev.target);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }
    </script>

    {{-- <script>
        const draggables = document.querySelectorAll(".gejala");
        const droppables = document.querySelectorAll(".drop-zone");

        draggables.forEach((gejala) => {
            gejala.addEventListener("dragstart", () => {
                gejala.classList.add("is-dragging");
            });
            gejala.addEventListener("dragend", () => {
                gejala.classList.remove("is-dragging");
            });
        });

        droppables.forEach((zone) => {
            zone.addEventListener("dragover", (e) => {
                e.preventDefault();
            });
        })
    </script> --}}

    @push('datatable-sorting')
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#table-sorting').DataTable({
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
