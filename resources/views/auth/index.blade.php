@extends('app')
@section('content')
    {{-- This is login page --}}
    <section id="login">
        <div class="container mx-auto my-auto">
            <div
                class="mb-4 md:mt-8 flex xl:justify-around
                    lg:justify-around
                    md:px-10 gap-10
                    justify-center items-start flex-wrap h-full">
                <div class="mb-12 md:mb-0">
                    <span class="lg:text-4xl mb-8 text-center">
                        <h1 class="">Selamat Datang</h1>
                        <h1> Silahkan Masuk Kembali</h1>
                        {{-- <h1></h1>
                        <h1 class="font-bold"></h1> --}}
                    </span>
                    <form action={{ route('auth.login.post') }} method="POST">
                        @csrf
                        {{-- @method('POST') --}}
                        <!-- Password input -->
                        <div class="mb-6 mt-3">
                            <div class="items-center">
                                <p for="password" class="block text-sm text-center font-medium text-gray-700 ">
                                    Login Sebagai
                                </p>
                            </div>
                            <div class="flex flex-row md:items-center justify-around md:gap-3 lg:gap-0 lg:justify-around">
                                <div class="inline-block ">
                                    <input class="appearance-none peer" type="radio" id="admin" name="role"
                                        value="1">
                                    <label for="admin"
                                        class="px-2 py-1 gap-1 rounded-lg flex justify-center items-center text-sm lg:text-lg  w-10 h-10 lg:w-full lg:h-12 cursor-pointer
                                        peer-checked:flex-col peer-checked:w-16 peer-checked:gap-0
                                        "><i
                                            class="fa-solid fa-user-lock"></i> Admin
                                    </label>
                                </div>
                                <div class="inline-block">
                                    <input class="appearance-none peer" type="radio" id="user" name="role"
                                        value="2">
                                    <label for="user"
                                        class="px-2 py-1 gap-1 rounded-lg flex justify-center items-center text-sm lg:text-lg  w-10 h-10 lg:w-full lg:h-12 cursor-pointer
                                    peer-checked:flex-col peer-checked:w-16 peer-checked:gap-0"><i
                                            class="fa-solid fa-user-lock"></i> User
                                    </label>
                                </div>
                                <div class="inline-block">
                                    <input class="appearance-none peer" type="radio" id="dokter" name="role"
                                        value="3">
                                    <label for="dokter"
                                        class="px-2 py-1 gap-1 rounded-lg flex justify-center items-center text-sm lg:text-lg  w-10 h-10 lg:w-full lg:h-12 cursor-pointer
                                    peer-checked:flex-col peer-checked:w-16 peer-checked:gap-0"><i
                                            class="fa-solid fa-user-lock"></i> Dokter
                                    </label>
                                </div>

                            </div>
                        </div>

                        <!-- Email input -->
                        <div class="flex flex-col mb-6 mt-6">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Alamat Email
                            </label>
                            <input type="text"
                                class="form-control block px-3 py-1 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="email" name="email" placeholder="Masukkan Alamat Email"
                                value="{{ old('email') }}" />
                            @error('email')
                                <div class="p-4
                                mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="flex flex-col mb-6">
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                Password
                            </label>
                            <input type="password"
                                class="form-control block px-3 py-1 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="password" name="password" placeholder="Password" />
                            @error('password')
                                <div class="p-4
                                mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="flex justify-between md:justify-between gap-2 md:gap-4 items-center mb-6">
                            <div class="form-group form-check">
                                <input type="checkbox"
                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    id="exampleCheck2" />
                                <label class="form-check-label inline-block text-gray-800" for="exampleCheck2">Remember
                                    me</label>
                            </div>
                            <a href="#!" class="text-blue-800 hover:underline">Forgot password?</a>
                        </div>

                        <div class="text-center md:text-start lg:text-left">
                            <button type="submit" data-mdb-ripple="true" data-mdb-ripple-color="light"
                                class="inline-block md:w-full
                                px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded
                                shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg
                                focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150
                                ease-in-out">
                                Login
                            </button>
                            <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                                Don't have an account?
                                <a href="{{ route('auth.register') }}"
                                    class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out">Register</a>
                            </p>
                        </div>

                        <div
                            class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5">
                            <p class="text-center font-semibold mx-4 mb-0">Or</p>
                        </div>

                        <div class="flex flex-row items-center justify-center lg:justify-start md:justify-start">
                            <p class="text-lg mb-0 mr-4">Sign in with</p>
                            <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light"
                                class="inline-block p-3 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out mx-1">
                                <!-- Facebook -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-4 h-4">
                                    <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                    <path fill="currentColor"
                                        d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                                </svg>
                            </button>

                            <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light"
                                class="inline-block p-3 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out mx-1">
                                <!-- Twitter -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4">
                                    <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                    <path fill="currentColor"
                                        d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                                </svg>
                            </button>

                            <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light"
                                class="inline-block p-3 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out mx-1">
                                <!-- Linkedin -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4">
                                    <!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                    <path fill="currentColor"
                                        d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
                                </svg>
                            </button>
                        </div>


                    </form>
                </div>
                <div
                    class="flex items-center shrink-0 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-1/2 mb-12 md:mb-0 md:block hidden">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="" alt="Sample image" />
                </div>

            </div>
        </div>
    </section>
    <script>
        window.onload = function() {
            document.getElementById("email").focus();
        };
    </script>
@endsection
