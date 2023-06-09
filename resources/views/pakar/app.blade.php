<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/custom.select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @livewireStyles
</head>

<body class="bg-slate-100">
    @include('pakar.sidebar')
    <section id="dashboard">
        <div class="h-full">
            <div class="container mx-auto my-auto pt-20 pb-4 ">
                @yield('content')
            </div>

        </div>
    </section>

    <script src={{ asset('assets/js/jquery-3.6.3.min.js') }}></script>
    <script src={{ asset('assets/js/fontawesome.js') }} type="text/javascript"></script>
    <script src={{ asset('assets/js/flowbite.min.js') }} type="text/javascript"></script>
    <script src={{ asset('assets/js/select2.min.js') }} type="text/javascript"></script>

    @stack('select2')
    @stack('select2-dynamic')
    @stack('datatable-pengguna')
    @stack('datatable-sorting')
    @stack('scripts-chart')
</body>

</html>
