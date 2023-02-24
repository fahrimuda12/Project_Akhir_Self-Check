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
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js"
        integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
</body>

</html>
