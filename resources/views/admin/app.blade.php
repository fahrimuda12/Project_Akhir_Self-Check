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
    {{-- This is login page --}}
    @include('admin.sidebar')
    <section id="dashboard">
        <div class="h-full">
            <div class="container mx-auto my-auto pt-20 pb-4 ">
                {{-- @yield('sidebar') --}}
                @yield('content')
            </div>

        </div>
    </section>

    <script src={{ asset('assets/js/jquery-3.6.3.min.js') }}></script>
    <script src={{ asset('assets/js/jquery-inputmask-5.0.6.min.js') }}></script>
    <script src={{ asset('assets/js/fontawesome.js') }} type="text/javascript"></script>
    <script src={{ asset('assets/js/flowbite.min.js') }} type="text/javascript"></script>
    <script src={{ asset('assets/js/select2.min.js') }} type="text/javascript"></script>

    @stack('select2')
    @stack('select2-dynamic')
    <script>
        console.log($('input[name="skalarOption"]:checked').val() == "pilgan");
        if ($('input[name="skalarOption"]:checked').val() == "pilgan") {
            console.log("benar");
            $('#hariForm').hide();
        } else {
            $('#pilganForm').hide();
        }

        $(document).ready(function() {

            const radioButtons = $('input[name="skalarOption"]');
            const formPilgan = $('#pilganForm');
            const formHari = $('#hariForm');



            radioButtons.change(function() {
                // Mengambil nilai value dari radio button yang dipilih
                const selectedValue = $(this).val();

                // Menampilkan atau menyembunyikan input field berdasarkan nilai yang dipilih
                if (selectedValue === "pilgan") {
                    formPilgan.show();
                    formHari.hide();
                } else if (selectedValue === "hari") {
                    formPilgan.hide();
                    formHari.show();
                }
            });


            // Format hari
            $('#inputHari').on('input', function() {
                // Mendapatkan input dari pengguna
                var input = $(this).val();

                // Menghilangkan tanda "-" yang sebelumnya disisipkan
                input = input.replace('-', '');

                // Menambahkan tanda "-" pada posisi yang benar
                if (input.length > 1) {
                    input = input.slice(0, 1) + '-' + input.slice(1);
                }

                // Menetapkan nilai input yang telah dimodifikasi kembali ke elemen input
                $(this).val(input);
            });
        });
    </script>
    @stack('datatable-pengguna')

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
