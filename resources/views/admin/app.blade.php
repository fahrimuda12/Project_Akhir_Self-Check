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
    {{-- This is login page --}}
    <section id="dashboard">
        <div class="container mx-auto my-auto">
            {{-- @yield('sidebar') --}}
            @yield('content')
        </div>
    </section>
    {{-- <script src="https://kit.fontawesome.com/c7aacba508.js" crossorigin="anonymous"></script> --}}
    <script src={{ asset('assets/js/fontawesome.js') }} type="text/javascript"></script>
    <script src={{ asset('assets/js/flowbite.min.js') }} type="text/javascript"></script>
</body>

</html>
