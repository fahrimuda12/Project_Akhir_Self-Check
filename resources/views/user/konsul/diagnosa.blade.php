@extends('app')
@section('content')
    <section id="hasil-diagnosa">
        <div class="container mx-auto lg:mt-9">
            <h1 class="font-bold text-2xl lg:pb-4 md:py-4 md:mx-4">Hasil Diagnosa</h1>
            <div class="relative overflow-x-auto p-10 rounded-2xl" style="background-color: #F6F8FD">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <colgroup>
                        <col style="width:10%">
                        <col style="width:30%">
                        <col style="width:10%">
                    </colgroup>
                    <thead class="text-xs text-gray-700 uppercase border-b-2 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Kode
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kemungkinan Penyakit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Persentase
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $val)
                            <tr class="dark:bg-gray-800 dark:border-gray-700">
                                <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $val['kodePenyakit'] }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $val['penyakit'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $val['cf'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection
