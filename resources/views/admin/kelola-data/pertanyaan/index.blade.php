@extends('admin/app')
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
                                Gejala
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Pertanyaan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Parent_id
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pertanyaan as  $key => $data)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                                    {{ ++$key }}
                                </td>
                                <td class="px-6 py-4 font-medium dark:text-white">
                                    {{ $data->gejala->gejala }}
                                </td>
                                <td class="px-6 py-4 font-medium dark:text-white">
                                    {{ $data->pertanyaan }}
                                </td>
                                <td>
                                    <livewire:select-parent :node="$data->treePertanyaan" :pertanyaan_id="$data->id_pertanyaan" :wire:key="$loop->index">
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
    @livewireScripts
@endsection
