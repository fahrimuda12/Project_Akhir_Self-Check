@extends('pakar/app')
@section('content')
    @extends('pakar/sidebar')
    <div class="py-8 px-4 sm:ml-64">
        <form action="{{ route('pakar.gejala.tambah.post') }}" method="POST">
            @csrf
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="kode_gejala" id="floating_kode" value="{{ old('kode_gejala') }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_kode"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kode
                    Gejala</label>
            </div>
            @error('kode_gejala')
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="nama" id="floating_nama" value="{{ old('nama') }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_nama"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                    Gejala</label>
            </div>
            @error('nama')
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="relative z-0 w-full mb-6 group">
                <textarea name="pertanyaan" id="floating_pertanyaan" rows="2"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required>{{ old('pertanyaan') }}</textarea>
                <label for="floating_pertanyaan"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pertanyaan</label>
            </div>
            @error('pertanyaan')
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ $message }}
                </div>
            @enderror
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>

    <script type='text/javascript'>
        let i = 2;

        function addFields() {
            // // Generate a dynamic number of inputs
            // var number = document.getElementById("member").value;
            // Get the element where the inputs will be added to
            // var container = document.getElementById("input-gejala");
            console.log('click');

            i++;
            $("#input-gejala").append(`<div class="relative z-0 w-full mb-6 group">
                    <select name="gejala[]" id="floating_gejala"
                        class="block py-2.5 px-0 w-full capitalize text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option>Gejala` + i + `</option>
                        <option value="pria">Pria</option>
                        <option value="perempuan">perempuan</option>
                    </select>
                    <label for="floating_gejala"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Gejala
                        ` + i + `</label>
                </div>`);
            // Remove every children it had before
            // while (container.hasChildNodes()) {
            //     container.removeChild(container.lastChild);
            // }
            // for (i = 0; i < number; i++) {
            //     // Append a node with a random text
            //     container.appendChild(document.createTextNode("Member " + (i + 1)));
            //     // Create an <input> element, set its type and name attributes
            //     var input = document.createElement("input");
            //     input.type = "text";
            //     input.name = "member" + i;
            //     container.appendChild(input);
            //     // Append a line break
            //     container.appendChild(document.createElement("br"));
            // }
            // container.appendChild(document.createTextNode("Member " + (i + 1)));
            // // Create an <input> element, set its type and name attributes
            // var input = document.createElement("input");
            // input.type = "text";
            // input.name = "member" + i;
            // container.appendChild();
            // Append a line break
            // container.appendChild(document.createElement("br"));
        }
    </script>
@endsection
