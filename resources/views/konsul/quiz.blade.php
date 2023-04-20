@extends('app')
@section('content')
    <section id="card-riwayat">
        <div class="container mx-auto mb-10 md:mb-0 lg:mt-2">
            <div class="card rounded-2xl mt-2 md:mx-4">
                <div class="card-body lg:py-8 md:py-8">
                    <div class="flex flex-col space-y-8 md:space-y-0 md:flex-row px-8 md:px-4 items-center justify-center">
                        <div class="flex  justify-center lg:justify-center basis-1/2">
                            {{-- <img src="https://img.icons8.com/ios/50/000000/medical-history.png" class="w-16 h-16" /> --}}
                            <img src={{ asset('images/banner-quiz.png') }}
                                class="w-48 h-40 lg:w-[300px] lg:h-[350px] md:w-60 md:h-60" alt="riwayat-kesehatan">
                        </div>
                        <div class="flex flex-col space-y-2 md:space-y-4 basis-1/2">
                            <h1 class="text-center md:text-left text-2xl lg:text-4xl md:text-3xl  font-bold lg:w-96 md:w-72"
                                style="color: #0C145A">
                                Check Kesehatan</h1>
                            <p class="text-left md:text-sm lg:text-lg lg:w-8/12">Lakukan penilaian gejala
                                singkat. Informasi yang Anda berikan aman dan
                                tidak
                                akan dibagikan.
                            </p>
                            <p>Hasil akan mencakup: </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="soal">
        <form action="{{ route('konsul.hasil') }}" method="POST">
            @csrf
            @foreach ($data as $key => $value)
                {{-- {{ dd($value) }} --}}
                <div class="container mx-auto mt-4 md:mt-9">
                    <div class="card rounded-2xl mx-4 md:mx-4" style="background-color: #F6F8FD">
                        <div class="card-body px-4 md:py-8 md:px-12 lg:py-8">
                            <h1>{{ $value->pertanyaan }}</h1>
                            {{-- <input type="text" hidden name={{ 'data[' . $key . ']' . '[kode]' }}
                                value={{ $value['kode'] }}> --}}
                            <input type="text" hidden name={{ 'data[' . $key . ']' . '[kode_gejala]' }}
                                value={{ $value->kode_gejala }}>
                            <div class="mb-6 mt-6">
                                <div
                                    class="flex flex-col md:flex-row md:gap-10 justify-center pb-4 md:py-0 space-y-2 md:space-y-0">
                                    @if (isset($value->opsi_1))
                                        @if ($value->opsi_1->type == 'pilgan')
                                            <div
                                                class="flex gap-2 md:gap-0 md:flex-col md:items-center px-1 md:px-0 md:mr-4 ">
                                                <input id="jenkel-radio" type="radio"
                                                    value={{ $value->opsi_1->bobot_nilai }}
                                                    name={{ 'data[' . $key . ']' . '[nilai]' }}
                                                    class="w-4 h-4 text-purple-400 checked:text-[rgb(135,97,224)] bg-black  border-gray-300 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="jenkel"
                                                    class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">{{ $value->opsi_1->skalar }}</label>
                                            </div>
                                            @if (isset($value->opsi_2))
                                                <div
                                                    class="flex gap-2 md:gap-0 md:flex-col md:items-center px-1 md:px-0 md:mr-4 ">
                                                    <input id="jenkel-radio" type="radio"
                                                        value={{ $value->opsi_2->bobot_nilai }}
                                                        name={{ 'data[' . $key . ']' . '[nilai]' }}
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="jenkel"
                                                        class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">{{ $value->opsi_2->skalar }}</label>
                                                </div>
                                            @endif
                                            @if (isset($value->opsi_3))
                                                <div
                                                    class="flex gap-2 md:gap-0 md:flex-col md:items-center px-1 md:px-0 md:mr-4 ">
                                                    <input id="jenkel-radio" type="radio"
                                                        value={{ $value->opsi_3->bobot_nilai }}
                                                        name={{ 'data[' . $key . ']' . '[nilai]' }}
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="jenkel"
                                                        class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">{{ $value->opsi_3->skalar }}</label>
                                                </div>
                                            @endif
                                            @if (isset($value->opsi_4))
                                                <div
                                                    class="flex gap-2 md:gap-0 md:flex-col md:items-center px-1 md:px-0 md:mr-4 ">
                                                    <input id="jenkel-radio" type="radio"
                                                        value={{ $value->opsi_4->bobot_nilai }}
                                                        name={{ 'data[' . $key . ']' . '[nilai]' }}
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="jenkel"
                                                        class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">{{ $value->opsi_4->skalar }}</label>
                                                </div>
                                            @endif
                                            @if (isset($value->opsi_5))
                                                <div
                                                    class="flex gap-2 md:gap-0 md:flex-col md:items-center px-1 md:px-0 md:mr-4 ">
                                                    <input id="jenkel-radio" type="radio"
                                                        value={{ $value->opsi_5->bobot_nilai }}
                                                        name={{ 'data[' . $key . ']' . '[nilai]' }}
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="jenkel"
                                                        class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">{{ $value->opsi_5->skalar }}</label>
                                                </div>
                                            @endif
                                            @if (isset($value->opsi_6))
                                                <div
                                                    class="flex gap-2 md:gap-0 md:flex-col md:items-center px-1 md:px-0 md:mr-4 ">
                                                    <input id="jenkel-radio" type="radio"
                                                        value={{ $value->opsi_6->bobot_nilai }}
                                                        name={{ 'data[' . $key . ']' . '[nilai]' }}
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="jenkel"
                                                        class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">{{ $value->opsi_6->skalar }}</label>
                                                </div>
                                            @endif
                                        @elseif ($value->opsi_1->type == 'isian')
                                            <div
                                                class="flex gap-2 md:gap-0 md:flex-col md:items-center px-1 md:px-0 md:mr-4">
                                                <input type="text" name={{ 'data[' . $key . ']' . '[skalar]' }}
                                                    value={{ json_encode($value->mergeBobot) }} hidden>
                                                <input type="number" name={{ 'data[' . $key . ']' . '[hari]' }}
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder=" " required>
                                                {{-- <input type="number" id="score" name="score" min="0"
                                                    max="10" value="{{ old('score') ?? 0 }}" step="1"
                                                    list="scores">
                                                <datalist id="scores">
                                                    <option value="0">Poor</option>
                                                    <option value="1">Average</option>
                                                    <option value="4">Good</option>
                                                </datalist> --}}
                                            </div>
                                        @endif
                                    @endif



                                    {{-- @foreach ($indikators as $indikator)
                                        @if ($indikator['kode'] == $value['indikator'])
                                            @foreach ($indikator['indikator'] as $deep)
                                                <div class="flex flex-col items-center px-1 md:px-0 md:mr-4 ">
                                                    <input id="jenkel-radio" type="radio" value={{ $deep[1] }}
                                                        name={{ 'data[' . $key . ']' . '[nilai]' }}
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="jenkel"
                                                        class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">{{ $deep }}</label>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach --}}
                                    {{-- <div class="flex flex-col items-center px-1 md:px-0 md:mr-4 ">
                                        <input id="jenkel-radio" type="radio" value="0"
                                            name={{ 'indikator' . $value['kode'] }}
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="jenkel"
                                            class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                    <div class="flex flex-col items-center px-1 md:px-0 md:mr-4">
                                        <input id="jenkel-radio" type="radio" value="0.2" name="indikator"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-radio"
                                            class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">Tidak
                                            Tahu</label>
                                    </div>
                                    <div class="flex flex-col items-center px-1 md:px-0 md:mr-4">
                                        <input id="jenkel-radio" type="radio" value="0.4" name="indikator"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-radio"
                                            class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">Sedikit
                                            Yakin</label>
                                    </div>
                                    <div class="flex flex-col items-center px-1 md:px-0 md:mr-4">
                                        <input id="jenkel-radio" type="radio" value="0.6" name="indikator"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-radio"
                                            class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">Cukup
                                            Yakin</label>
                                    </div>
                                    <div class="flex flex-col items-center px-1 md:px-0 md:mr-4 ">
                                        <input id="jenkel-radio" type="radio" value="0.8" name="indikator"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-radio"
                                            class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">Yakin</label>
                                    </div>
                                    <div class="flex flex-col items-center px-1 md:px-0 md:mr-4 ">
                                        <input id="jenkel-radio" type="radio" value="1" name="indikator"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-radio"
                                            class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">Sangat
                                            Yakin</label>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- button --}}
            <div class="container mx-auto md:my-9">
                <div class="flex justify-end items-center w-full pr-5">
                    {{-- <button type="submit"
                        class=" bg-blue-500 hover:bg-blue-700 text-2xl font-medium text-white font-bold py-3 px-10 rounded-lg">
                        Diagnosa
                    </button> --}}
                    <button type="submit"
                        class=" bg-blue-500 hover:bg-blue-700 text-md md:text-2xl font-medium text-white font-semibold md:font-bold py-1 px-4 md:py-3 md:px-10 rounded-lg">
                        Diagnosa
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection
