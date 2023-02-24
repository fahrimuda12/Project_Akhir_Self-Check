@extends('app')
@section('content')
    <section id="card-riwayat">
        <div class="container mx-auto lg:mt-9">
            <h1 class="text-center font-bold text-4xl lg:pb-4 md:py-4">Riwayat Kesehatan</h1>
            <div class="card rounded-2xl mt-2 md:mx-4" style="background-color: #F6F8FD">
                <div class="card-body lg:py-8 md:py-8">
                    <div class="grid grid-cols-2 lg:gap-1 items-end">
                        <div class="flex justify-start mx-auto">
                            {{-- <img src="https://img.icons8.com/ios/50/000000/medical-history.png" class="w-16 h-16" /> --}}
                            <img src={{ asset('images/riwayat-kesehatan.png') }}
                                class="w-48 h-40 lg:w-96 lg:h-80 md:w-72 md:h-60" alt="riwayat-kesehatan">
                        </div>
                        <div class="flex flex-col gap-2">
                            <h1 class="text-lg lg:text-5xl md:text-3xl  font-bold lg:w-96 md:w-72" style="color: #0C145A">
                                Check Kesehatan</h1>
                            <p>Lakukan penilaian gejala singkat. Informasi yang Anda berikan aman dan tidak akan dibagikan.
                            </p>
                            <p>Hasil akan mencakup: </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="soal">
        <form action="">
            @for ($i = 0; $i < 2; $i++)
                <div class="container mx-auto mt-4 md:mt-9">
                    <div class="card rounded-2xl md:mx-4" style="background-color: #F6F8FD">
                        <div class="card-body px-4 md:py-8 md:px-12 lg:py-8">
                            <h1>Apakah kamu merasa pusing?</h1>
                            <div class="mb-6 mt-6">
                                <div class="flex md:gap-10 justify-around pb-4 md:py-0">
                                    <div class="flex flex-col items-center px-1 md:px-0 md:mr-4 ">
                                        <input id="jenkel-radio" type="radio" value="pria" name="jenkel"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="jenkel"
                                            class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                    <div class="flex flex-col items-center px-1 md:px-0 md:mr-4">
                                        <input id="jenkel-radio" type="radio" value="perempuan" name="jenkel"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-radio"
                                            class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">Tidak
                                            Tahu</label>
                                    </div>
                                    <div class="flex flex-col items-center px-1 md:px-0 md:mr-4">
                                        <input id="jenkel-radio" type="radio" value="perempuan" name="jenkel"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-radio"
                                            class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">Sedikit
                                            Yakin</label>
                                    </div>
                                    <div class="flex flex-col items-center px-1 md:px-0 md:mr-4">
                                        <input id="jenkel-radio" type="radio" value="perempuan" name="jenkel"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-radio"
                                            class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">Cukup
                                            Yakin</label>
                                    </div>
                                    <div class="flex flex-col items-center px-1 md:px-0 md:mr-4 ">
                                        <input id="jenkel-radio" type="radio" value="perempuan" name="jenkel"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-radio"
                                            class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">Yakin</label>
                                    </div>
                                    <div class="flex flex-col items-center px-1 md:px-0 md:mr-4 ">
                                        <input id="jenkel-radio" type="radio" value="perempuan" name="jenkel"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-radio"
                                            class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">Sangat
                                            Yakin</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
            {{-- button --}}
            <div class="container mx-auto md:my-9">
                <div class="flex justify-end items-center w-full pr-5">
                    {{-- <button type="submit"
                        class=" bg-blue-500 hover:bg-blue-700 text-2xl font-medium text-white font-bold py-3 px-10 rounded-lg">
                        Diagnosa
                    </button> --}}
                    <a href={{ route('konsul.hasil') }}
                        class=" bg-blue-500 hover:bg-blue-700 text-md md:text-2xl font-medium text-white font-semibold md:font-bold py-1 px-4 md:py-3 md:px-10 rounded-lg">
                        Diagnosa
                    </a>
                </div>
            </div>
        </form>
    </section>
@endsection
