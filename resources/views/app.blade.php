<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
</head>

<body>
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5  dark:bg-gray-900">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="/" class="flex items-center">
                {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo" /> --}}
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"> <img
                        src={{ asset('images/logo/logo-text.svg') }} class="h-8 mr-3" alt="FlowBite Logo" /></span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="flex flex-col p-4 mt-4 items-center
                    border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    @auth
                        <li>
                            <a href={{ route('home') }}
                                class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
                                aria-current="page">Home</a>
                        </li>
                    @endauth
                    @guest
                        <li>
                            <a href={{ route('landing') }}
                                class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
                                aria-current="page">Home</a>
                        </li>
                    @endguest
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Layanan</a>
                    </li>
                    @auth
                        <li>
                            <a href="{{ route('konsul.riwayat') }}"
                                class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Riwayat
                                Kesehatan</a>
                        </li>
                    @endauth
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Tentang</a>
                    </li>
                    @guest
                        <li>
                            <a href={{ route('auth.login') }}
                                class="block py-2 px-4  text-blue-400 bg-slate-100 rounded-full ">Masuk</a>
                        </li>
                        <li>
                            <a href={{ route('auth.register') }}
                                class="block py-2 px-4  text-white bg-blue-800 rounded-full ">Daftar</a>
                        </li>
                    @endguest
                    @auth
                        @if (Auth::guard('admin')->check())
                            <li>
                                <a href={{ route('auth.login') }}
                                    class="block py-2 px-4  text-blue-400 bg-slate-100 rounded-full ">{{ Auth::guard('admin')->user()->nama_pegawai }}</a>
                            </li>
                        @else
                            <li>
                                <a href={{ route('profile.edit', Auth::guard()->user()->nrp) }}
                                    class="block py-2 px-4  text-blue-400 bg-slate-100 rounded-full ">{{ Auth::guard()->user()->nama }}</a>
                            </li>
                        @endif
                        <li>
                            <a href={{ route('auth.logout') }}
                                class="block py-2 px-4  text-white bg-blue-800 rounded-full ">Logout</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://kit.fontawesome.com/c7aacba508.js" crossorigin="anonymous"></script>
    <script src={{ asset('assets/js/flowbite.min.js') }} type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.number-input').inputmask("99.9.9.999.9.99.999999");
        });
    </script>

    {{-- <script>
        function formatNumber(num) {
            return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        const numberInput = document.querySelector('.number-input');

        numberInput.addEventListener('blur', (event) => {
            const num = event.target.value;
            const formattedNum = formatNumber(num);
            event.target.value = formattedNum;
        });
    </script> --}}
</body>


</html>
