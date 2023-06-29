@extends('app')
@section('content')
    <section id="hasil-diagnosa">
        <div class="container mx-auto lg:mt-9">
            <div class="flex mb-2 justify-between items-center">
                <h1 class="font-bold text-2xl lg:pb-4 md:py-4 md:mx-4">Hasil Diagnosa</h1>
                <div class="md:mx-4">
                    <a href="{{ route('konsul.quiz') }}"
                        class="flex items-center justify-center px-4 py-2 ml-auto text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z">
                            </path>
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12z"
                                clip-rule="evenodd">
                            </path>
                        </svg>
                        Konsultasi Lagi
                    </a>
                </div>
            </div>
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
                        @forelse($result as $val)
                            <tr class="dark:bg-gray-800 dark:border-gray-700">
                                <th class="px-6 py-4 text-xl font-bold text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $val['kodePenyakit'] }}
                                </th>
                                <td class="px-6 py-4 text-xl font-bold">
                                    {{ $val['penyakit'] }}
                                </td>
                                <td class="px-6 py-4 text-xl font-bold">
                                    {{-- ambil dua angka dibelakang koma --}}

                                    {{ $val['cf'] }}
                                </td>
                            </tr>
                        @empty
                            <p class="mb-2 py-4 text-center text-xl bg-slate-300 text-green-800">Anda Sehat tidak terkena
                                penyakit apa-apa</p>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection
