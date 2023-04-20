@extends('app')
@section('content')
    <section id="Jumbotron">
        <div class="container mx-auto md:my-5">
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
        <div class="container mx-auto lg:mt-9">
            <h1 class="text-center font-bold text-2xl md:text-4xl lg:text-4xl py-8 lg:pb-4 md:py-4">Riwayat Kesehatan</h1>
            <div class="card rounded-2xl md:mx-4"style="background-color: #F6F8FD">
                <div class="card-body lg:py-8 md:py-8">
                    <div class="grid md:grid-rows-none md:grid-cols-2 lg:grid-cols-2 gap-4 md:gap-1">
                        <div class="flex justify-start mx-auto pt-4 md:pt-0 lg:pt-0">
                            {{-- <img src="https://img.icons8.com/ios/50/000000/medical-history.png" class="w-16 h-16" /> --}}
                            <img src={{ asset('images/riwayat-kesehatan.png') }}
                                class="w-48 h-40 lg:w-96 lg:h-80 md:w-72 md:h-60" alt="riwayat-kesehatan">
                        </div>
                        <div
                            class="flex flex-col items-center md:items-start lg:items-start gap-4 md:gap-0 lg:gap-0 mb-4 md:mb-0 lg:mb-0">
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
        <div class="container mx-auto lg:mt-9">
            <h1 class="text-center font-bold text-2xl md:text-4xl lg:text-4xl py-8 lg:pb-4 md:py-4">Riwayat Pengobatan</h1>
            <div class="card rounded-2xl md:mx-4"style="background-color: #F6F8FD">
                <div class="card-body lg:py-8 md:py-8">
                    <div class="grid md:grid-rows-none md:grid-cols-2 lg:grid-cols-2 gap-4 md:gap-1">
                        <div
                            class="flex flex-col items-center md:items-start lg:items-start gap-4 md:gap-0 lg:gap-0 mb-4 md:mb-0 lg:mb-0 order-2 md:order-1 lg:order-1">
                            <h1 class="text-center md:text-start lg:text-start text-lg lg:text-5xl md:text-3xl  font-bold w-1/2 lg:w-96 md:w-72"
                                style="color:#0C145A">
                                Kamu belum memiliki riwayat pengobatan</h1>
                            {{-- button --}}
                            <div class="flex items-start">
                                <a href="" class=" px-4 py-2 text-white bg-blue-800 rounded-full ">Check
                                    Kesehatan</a>
                            </div>
                        </div>
                        <div class="flex justify-start mx-auto pt-4 md:pt-0 lg:pt-0">
                            {{-- <img src="https://img.icons8.com/ios/50/000000/medical-history.png" class="w-16 h-16" /> --}}
                            <img src={{ asset('images/riwayat-kesehatan.png') }}
                                class="w-48 h-40 lg:w-96 lg:h-80 md:w-72 md:h-60" alt="riwayat-kesehatan">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
