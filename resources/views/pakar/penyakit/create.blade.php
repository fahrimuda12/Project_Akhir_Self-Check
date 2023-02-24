@extends('pakar/app')
@section('content')
    @extends('pakar/sidebar')
    <div class="py-8 px-4 sm:ml-64">
        <form action="" method="POST">
            @csrf
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="kode" id="floating_kode"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_kode"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                    Penyakit</label>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6" id="input-gejala">
                <div class="relative z-0 w-full mb-6 group">

                    <select name="gejala[]" id="floating_gejala"
                        class="block py-2.5 px-0 w-full capitalize text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option>Gejala 1</option>
                        @forelse ($gejala as $data)
                            <option value="{{ $data->gejala }}">{{ $data->gejala }}</option>
                        @empty
                            <option>Lainnya</option>
                        @endforelse
                    </select>
                    <label for="floating_gejala"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Gejala
                        1</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <select name="gejala[]" id="floating_gejala"
                        class="block py-2.5 px-0 w-full capitalize text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option>Gejala 2</option>
                        @forelse ($gejala as $data)
                            <option value="{{ $data->gejala }}">{{ $data->gejala }}</option>
                        @empty
                            <option>Lainnya</option>
                        @endforelse
                    </select>
                    <label for="floating_gejala"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Gejala
                        2</label>
                </div>
                <div class="relative z-0 w-full mb-6 group order-last">
                    <button type="button" onclick="addFields()"
                        class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        Tambah Gejala
                        <svg aria-hidden="true" class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
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
            let data = [
                @forelse ($gejala as $data)
                    [`<option value = ` + "{{ $data->gejala }}" + `>` + "{{ $data->gejala }}" + `</option>`],
                @empty
                    [`<option> Lainnya </option>`],
                @endforelse
            ]
            i++;
            $("#input-gejala").append(`<div class="relative z-0 w-full mb-6 group">
                    <select name="gejala[]" id="floating_gejala"
                        class="block py-2.5 px-0 w-full capitalize text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                        <option>Gejala` + i + `</option> ` +
                data +
                `<option>Lainnya</option>
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
