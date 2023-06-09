@extends('app')
@section('content')
    {{-- show respon success login --}}

    <section id="Jumbotron">
        <div class="container mx-auto md:my-5">
            @if (session('success'))
                <div id="alert-border-3"
                    class="flex p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-3" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif
            <div class="flex flex-col md:flex-row justify-around gap-2 lg:mx-24 md:mx-12 mx-2">
                <div
                    class="flex flex-col items-center px-2 md:px-0 md:items-baseline md:w-1/2 pt-10 md:pt-20 space-y-2 md:space-y-3 lg:space-y-5">
                    <h1 class="lg:w-9/12 flex text-center md:text-left text-2xl md:text-3xl lg:text-5xl font-bold">Selamat
                        Datang
                        di
                        PENS
                        Clinic</h1>
                    <p class="lg:w-10/12 text-center md:text-left md:text-sm lg:text-lg">Kami menyediakan layanan check
                        kesehatan, check
                        riwayat kesehatan
                        Hingga
                        Pemesanan
                        Obat</p>
                    <div class="flex md:pt-2 lg:pt-8 items-start">
                        <a href={{ route('konsul.quiz') }}
                            class="px-5 md:px-5 py-2 md:py-2 lg:px-11 lg:py-3 text-white bg-blue-800 rounded-full ">Check
                            Kesehatan</a>
                    </div>
                </div>
                <div class="flex mt-10 md:mt-0 md:relative md:top-5 justify-around lg:left-24">
                    <img src={{ asset('images/banner-woman.png') }} alt="banner"
                        class="w-9/12 md:w-6/12 lg:w-8/12 h-[60%] md:h-full">
                </div>
            </div>
        </div>

    </section>
    <section id="card-feature">
        <div class="container mx-auto">
            <div class="rounded-2xl lg:mt-5 lg:p-11 md:mx-4 md:p-2" style="background-color: #F6F8FD">
                <h1 class="py-4 font-bold text-xl md:text-4xl lg:text-4xl text-center md:mb-10 lg:mb-10">3 Langkah Mudah
                </h1>
                <div
                    class="grid grid-rows-3 md:grid-rows-none md:grid-cols-3 gap-10 md:mb-11 lg:mb-11 p-4 lg:px-14 md:mx-4">
                    <div class="flex flex-col items-center md:items-start">
                        {{-- <img src="https://img.icons8.com/ios/50/000000/medical-history.png" class="w-10 h-10" /> --}}
                        <i class="fa-solid fa-users fa-xl py-5 text-blue-600"></i>
                        <h1 class="font-semibold text-lg md:text-xl lg:text-xl">Check Kesehatan</h1>
                        <p class="text-center md:text-left">Lakukan check kesehatan dengan menjawab pertanyaan!</p>
                    </div>
                    <div class="flex flex-col items-center md:items-start">
                        <i class="fa-solid fa-stethoscope fa-xl py-5"></i>
                        <h1 class="font-semibold text-lg md:text-xl lg:text-xl">Dapatkan Diagnosa</h1>
                        <p class="text-center md:text-left">Dapatkan hasil diagnosa penyakit secara komprehensif!</p>
                    </div>
                    <div class="flex flex-col items-center md:items-start">
                        <i class="fa-solid fa-capsules fa-xl py-5"></i>
                        <h1 class="font-semibold text-lg md:text-xl lg:text-xl">Pesan Obat</h1>
                        <p class="text-center md:text-left">Dapatkan rekomendasi pengobatan dan pesan obat!</p>
                    </div>
                    {{-- <div class="bg-white rounded-xl shadow-lg p-4">
                        <div class="flex justify-center">
                            <img src="https://img.icons8.com/ios/50/000000/medical-history.png" class="w-16 h-16" />
                        </div>
                        <h1 class="text-center font-bold text-xl">Isi Data Diri</h1>
                        <p class="text-center">Isi data diri anda dengan lengkap dan benar</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <section id="card-riwayat">
        <div class="container mx-auto lg:my-9">
            <h1 class="text-center font-bold text-2xl md:text-4xl lg:text-4xl py-8 lg:pb-4 md:py-4">Riwayat Kesehatan</h1>
            <div class="card rounded-2xl md:mx-4"style="background-color: #F6F8FD">
                <div class="card-body md:pb-8">
                    <div
                        class="flex flex-col md:flex-row items-center md:items-baseline justify-center md:gap-12 lg:gap-24">
                        <div class="flex md:relative md:w-72 md:h-60 lg:w-96 lg:h-80 pt-4 md:pt-0 lg:pt-0">
                            {{-- <img src="https://img.icons8.com/ios/50/000000/medical-history.png" class="w-16 h-16" /> --}}
                            <div class="md:absolute md:top-[2rem]">
                                <img src={{ asset('images/dokter1.png') }} class="w-48 h-40 lg:w-96 lg:h-80 md:w-72 md:h-60"
                                    alt="riwayat-kesehatan">
                            </div>
                        </div>
                        <div class="flex flex-col self-center items-center md:items-start gap-4 md:gap-10 mb-4 md:mb-0">
                            <h1 class="text-center md:text-start lg:text-start text-lg lg:text-5xl md:text-3xl  font-bold w-1/2 lg:w-96 md:w-72"
                                style="color: #0C145A">
                                Kamu belum
                                memiliki
                                riwayat
                                Kesehatan</h1>
                            {{-- button --}}
                            <div class=" flex items-start">
                                <a href={{ route('konsul.quiz') }}
                                    class=" px-4 py-2 text-white bg-blue-800 rounded-full ">Check
                                    Kesehatan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container mx-auto lg:mt-9">
            <h1 class="text-center font-bold text-2xl md:text-4xl lg:text-4xl py-8 lg:pb-4 md:py-4">Riwayat Pengobatan</h1>
            <div class="card rounded-2xl md:mx-4"style="background-color: #F6F8FD">
                <div class="card-body lg:py-8 md:py-8">
                    <div class="grid md:grid-rows-none md:grid-cols-2 lg:grid-cols-2 gap-4 md:gap-1">
                        <div
                            class="flex flex-col items-center md:items-start lg:items-start gap-4 md:gap-0 lg:gap-0 mb-4 md:mb-0 lg:mb-0 order-2 md:order-1 lg:order-1">
                            <h1 class="text-center md:text-start lg:text-start text-lg lg:text-5xl md:text-3xl  font-bold w-1/2 lg:w-96 md:w-72"
                                style="color:#0C145A">
                                Kamu belum memiliki riwayat pengobatan</h1>
                            <div class="flex items-start">
                                <a href="" class=" px-4 py-2 text-white bg-blue-800 rounded-full ">Check
                                    Kesehatan</a>
                            </div>
                        </div>
                        <div class="flex justify-start mx-auto pt-4 md:pt-0 lg:pt-0">

                            <img src={{ asset('images/riwayat-kesehatan.png') }}
                                class="w-48 h-40 lg:w-96 lg:h-80 md:w-72 md:h-60" alt="riwayat-kesehatan">
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>
    <footer>

    </footer>
@endsection
