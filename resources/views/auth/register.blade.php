@extends('app')
@section('content')
    {{-- This is login page --}}
    <section id="login">
        <div class="container mx-auto my-auto">
            <div
                class="flex xl:justify-center
                    lg:justify-around lg:items-start lg:pt-12
                    md:px-10 md:pt-8 pt-14
                    justify-center items-center flex-wrap h-full g-6 mb-12">
                <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-1/2 mb-12 md:mb-0">
                    <span class="lg:text-4xl mb-8 lg:w-3/4">
                        <h1 class="">Buat akun baru Nikmati layanan kami </h1>
                        {{-- <h1></h1>
                        <h1 class="font-bold"></h1> --}}
                    </span>
                    <form action={{ route('auth.register.post') }} method="POST">
                        @csrf
                        @method('POST')
                        <!--nrp input -->
                        <div class="mb-6 mt-6">
                            <label for="nrp" class="block text-sm font-medium text-gray-700 mb-2">
                                NRP
                            </label>
                            <input type="text"
                                class="form-control block lg:w-3/4 px-3 py-1 text-lg font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                @error('nrp')
                                    'is-invalid'
                                @enderror"
                                id="nrp" name="nrp" placeholder="Masukkan Nomor Registrasi Peserta"
                                value="{{ old('nrp') }}" />
                            @error('nrp')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!--Name input -->
                        <div class="mb-6 mt-6">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap
                            </label>
                            <input type="text"
                                class="form-control block lg:w-3/4 px-3 py-1 text-lg font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                @error('nama')
                                    'is-invalid'
                                @enderror"
                                id="nama" name="nama" placeholder="Masukkan Nama Lengkap"
                                value="{{ old('nama') }}" />
                            @error('nama')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Kelamin input -->
                        <div class="mb-6 mt-6">
                            <label for="jenkel" class="block text-sm font-medium text-gray-700 mb-2">
                                Jenis Kelamin
                            </label>
                            <div class="flex">
                                <div class="flex items-center mr-4">
                                    <input checked id="jenkel-radio" type="radio" value="pria" name="jenkel"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="jenkel"
                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                                </div>
                                <div class="flex items-center mr-4">
                                    <input id="jenkel-radio" type="radio" value="perempuan" name="jenkel"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inline-radio"
                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                                </div>
                            </div>
                            @error('jenkel')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Umur input -->
                        <div class="mb-6">
                            <label for="umur" class="block text-sm font-medium text-gray-700 mb-2">
                                Umur
                            </label>
                            <input type="number"
                                class="form-control block lg:w-3/4 px-3 py-1 text-lg font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="umur" name="umur" placeholder="Masukkan Umur Anda"
                                value="{{ old('umur') }}" />
                            @error('umur')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Alamat input -->
                        <div class="mb-6 mt-6">
                            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">
                                Alamat
                            </label>
                            <textarea id="alamat" name="alamat" rows="3"
                                class="form-control block lg:w-3/4 px-3 py-1 text-lg font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Masukkan Alamat Lengkap" value="{{ old('alamat') }}"></textarea>
                            @error('alamat')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!--hp input -->
                        <div class="mb-6 mt-6">
                            <label for="hp" class="block text-sm font-medium text-gray-700 mb-2">
                                No Handphone
                            </label>
                            <input type="text"
                                class="form-control block lg:w-3/4 px-3 py-1 text-lg font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                                @error('hp')
                                    'is-invalid'
                                @enderror"
                                id="hp" name="hp" placeholder="Masukkan Nomor Handphone"
                                value="{{ old('hp') }}" />
                            @error('hp')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- email input -->
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>
                            <input type="text"
                                class="form-control block lg:w-3/4 px-3 py-1 text-lg font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="email" name="email" placeholder="Masukkan Email Anda"
                                value="{{ old('email') }}" />
                            @error('email')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="mb-6">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                Password
                            </label>
                            <input type="password"
                                class="form-control block lg:w-3/4 px-3 py-1 text-lg font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="password" name="password" placeholder="Password" />
                            @error('password')
                                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="text-center md:text-start lg:text-left">
                            <button type="submit"
                                class="inline-block lg:w-3/4 px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                Daftar
                            </button>
                            <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                                Sudah memiliki akun?
                                <a href={{ route('auth.login') }}
                                    class="text-green-600 hover:text-green-700 focus:text-green-700 transition duration-200 ease-in-out">login</a>
                            </p>
                        </div>
                    </form>
                </div>
                <div
                    class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-1/2 mb-12 md:mb-0 md:block hidden">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="w-full" alt="Sample image" />
                </div>

            </div>
        </div>
</section @endsection
