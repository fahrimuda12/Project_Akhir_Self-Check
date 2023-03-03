<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $title }}</title>

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/datatable.min.css') }}"> --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @livewireStyles
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
    {{-- <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script> --}}
    <script src={{ asset('assets/js/fontawesome.js') }} type="text/javascript"></script>
    <script src={{ asset('assets/js/flowbite.min.js') }} type="text/javascript"></script>
    {{-- <script src={{ asset('assets/js/datatable.min.js') }} type="text/javascript"></script> --}}

    {{-- <script>
        $(document).ready(function() {
            // $('#example').DataTable({
            //     ajax: {
            //         url: '/admin/api/rule',
            //         type: "GET",
            //         dataSrc: "",
            //         complete: function(xhr, responseText) {
            //             console.log(xhr);
            //             console.log(responseText); //*** responseJSON: Array[0]
            //         }
            //     },
            //     // columns: [
            //     //     data: 'kode_penyakit',
            //     //     data: 'name'
            //     // ]
            // });
            $('#example').DataTable();
            $('#table-penyakit').DataTable();
            $('#table-penyakit').removeClass('dataTable');
            // $('#table-penyakit_length').removeClass('dataTables_length').addClass(
            //     'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown button <svg class="w-4 h-4 ml-2'
            // );
        });
    </script> --}}

    @livewireScripts
</body>

</html>
