@extends('app')
@section('content')
    <section id="hasil-diagnosa">
        <div class="container mx-auto lg:mt-9">
            <h1 class="font-bold text-2xl lg:pb-4 md:py-4 md:mx-4">Hasil Diagnosa</h1>
            <div class="relative overflow-x-auto p-10 rounded-2xl" style="background-color: ">
                @if ($riwayat->count() > 0)
                    <table
                        class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse border-slate-700">
                        <colgroup>
                            <col style="width:40%">
                            <col style="width:30%">
                            <col style="width:30%">
                        </colgroup>
                        <thead class="text-xs text-gray-700 uppercase border-b-2 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="bg-sky-200">
                                <th scope="col" class="px-6 py-4 text-center">
                                    Tanggal Pengecekan
                                </th>
                                <th scope="col" class="px-6 py-4 text-center">
                                    Kemungkinan Penyakit
                                </th>
                                <th scope="col" class="px-6 py-4 text-center">
                                    Persentase
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat as $key => $val)
                                <tr class="{{ $key % 2 ? 'bg-sky-200' : 'bg-sky-100' }}">
                                    {{-- merge cell tanggal menjadi satu --}}

                                    <td class="px-6 py-4 text-center">
                                        {{ $val->pivot->created_at }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        {{ $val->nama_penyakit }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-center {{ $val->pivot->nilai_cf > 80 ? 'text-red-700' : '' }}">
                                        {{ $val->pivot->nilai_cf }}
                                    </td>
                                </tr>
                                @if ($key > 1)
                                    @if (date('Y-m-d', strtotime($val->pivot->created_at)) < date('Y-m-d', strtotime($riwayat[$key - 1]->pivot->created_at)))
                                        <tr>
                                            <td class="px-6 py-4 w-full bg-slate-200 rounded" colspan="3">
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="mb-2 py-4 text-center text-xl bg-slate-300 text-green-800">Anda belum pernah melakukan
                        diagnosa</p>
                @endif
            </div>

        </div>
    </section>
@endsection
