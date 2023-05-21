<div>
    <form action="{{ route('konsul.hasil') }}" method="POST">
        @csrf
        @foreach ($data as $key => $value)
            <div class="container mx-auto mt-4 md:mt-9">
                <div class="card rounded-2xl mx-4 md:mx-4" style="background-color: #F6F8FD">
                    <div class="card-body px-4 md:py-8 md:px-12 lg:py-8">
                        <h1>{{ $value->pertanyaan }}</h1>
                        <input type="text" hidden name={{ 'data[' . $key . ']' . '[kode_gejala]' }}
                            value={{ $value->kode_gejala }}>
                        <div class="mb-6 mt-6">
                            <div
                                class="flex flex-col md:flex-row md:gap-10 justify-center pb-4 md:py-0 space-y-2 md:space-y-0">
                                @if (isset($value->opsi_1))
                                    @if ($value->opsi_1->type == 'pilgan')
                                        <div
                                            class="flex gap-2 md:gap-0 md:flex-col md:items-center px-1 md:px-0 md:mr-4 ">
                                            <input id="jenkel-radio" type="radio"
                                                value={{ $value->opsi_1->bobot_nilai }}
                                                name={{ 'data[' . $key . ']' . '[nilai]' }}
                                                class="w-4 h-4 text-purple-400 checked:text-[rgb(135,97,224)] bg-black  border-gray-300 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="jenkel"
                                                class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">{{ $value->opsi_1->skalar }}</label>
                                        </div>
                                        @if (isset($value->opsi_2))
                                            <div
                                                class="flex gap-2 md:gap-0 md:flex-col md:items-center px-1 md:px-0 md:mr-4 ">
                                                <input id="jenkel-radio" type="radio"
                                                    value={{ $value->opsi_2->bobot_nilai }}
                                                    name={{ 'data[' . $key . ']' . '[nilai]' }}
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="jenkel"
                                                    class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">{{ $value->opsi_2->skalar }}</label>
                                            </div>
                                        @endif
                                        @if (isset($value->opsi_3))
                                            <div
                                                class="flex gap-2 md:gap-0 md:flex-col md:items-center px-1 md:px-0 md:mr-4 ">
                                                <input id="jenkel-radio" type="radio"
                                                    value={{ $value->opsi_3->bobot_nilai }}
                                                    name={{ 'data[' . $key . ']' . '[nilai]' }}
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="jenkel"
                                                    class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">{{ $value->opsi_3->skalar }}</label>
                                            </div>
                                        @endif
                                        @if (isset($value->opsi_4))
                                            <div
                                                class="flex gap-2 md:gap-0 md:flex-col md:items-center px-1 md:px-0 md:mr-4 ">
                                                <input id="jenkel-radio" type="radio"
                                                    value={{ $value->opsi_4->bobot_nilai }}
                                                    name={{ 'data[' . $key . ']' . '[nilai]' }}
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="jenkel"
                                                    class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">{{ $value->opsi_4->skalar }}</label>
                                            </div>
                                        @endif
                                        @if (isset($value->opsi_5))
                                            <div
                                                class="flex gap-2 md:gap-0 md:flex-col md:items-center px-1 md:px-0 md:mr-4 ">
                                                <input id="jenkel-radio" type="radio"
                                                    value={{ $value->opsi_5->bobot_nilai }}
                                                    name={{ 'data[' . $key . ']' . '[nilai]' }}
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="jenkel"
                                                    class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">{{ $value->opsi_5->skalar }}</label>
                                            </div>
                                        @endif
                                        @if (isset($value->opsi_6))
                                            <div
                                                class="flex gap-2 md:gap-0 md:flex-col md:items-center px-1 md:px-0 md:mr-4 ">
                                                <input id="jenkel-radio" type="radio"
                                                    value={{ $value->opsi_6->bobot_nilai }}
                                                    name={{ 'data[' . $key . ']' . '[nilai]' }}
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="jenkel"
                                                    class="md:ml-2 text-center text-xs md:text-sm font-medium text-gray-900 dark:text-gray-300">{{ $value->opsi_6->skalar }}</label>
                                            </div>
                                        @endif
                                    @elseif ($value->opsi_1->type == 'isian')
                                        <div
                                            class="flex gap-2 md:gap-0 md:flex-col md:items-center px-1 md:px-0 md:mr-4">
                                            <input type="text" name={{ 'data[' . $key . ']' . '[skalar]' }}
                                                value={{ json_encode($value->mergeBobot) }} hidden>
                                            <input type="number" name={{ 'data[' . $key . ']' . '[hari]' }}
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder=" ">
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- button --}}
        <div class="container mx-auto md:my-9">
            <div class="flex justify-end items-center w-full pr-5">
                @if ($currentStep == 1)
                    <div></div>
                @endif

                @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                    <button type="button"
                        class=" bg-blue-500 hover:bg-blue-700 text-md md:text-2xl font-medium text-white font-semibold md:font-bold py-1 px-4 md:py-3 md:px-10 rounded-lg"
                        wire:click="decreaseStep()">Back</button>
                @endif

                @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                    <button type="button"
                        class=" bg-blue-500 hover:bg-blue-700 text-md md:text-2xl font-medium text-white font-semibold md:font-bold py-1 px-4 md:py-3 md:px-10 rounded-lg"
                        wire:click="increaseStep()">Next</button>
                @endif

                @if ($currentStep == 4)
                    <button type="submit"
                        class=" bg-blue-500 hover:bg-blue-700 text-md md:text-2xl font-medium text-white font-semibold md:font-bold py-1 px-4 md:py-3 md:px-10 rounded-lg">
                        Diagnosa
                    </button>
                @endif
            </div>
        </div>
    </form>
</div>
