{{-- @php
    dd($route);
@endphp --}}
<div>
    <table class="lg:table-fixed w-full text-sm text-left text-gray-500 shadow border">
        <thead class="text-xs text-gray-700 uppercase bg-blue-50">
            <tr>
                @foreach ($this->columns() as $column)
                    @if ($column->label == 'ID' || $column->label == 'Kode')
                        <th class="w-1/12" wire:click="sort('{{ $column->key }}')">
                            <div
                                class="py-3 px-6 flex justify-center items-center cursor-pointer border-b-2 border-blue-200">
                                {{ $column->label }}
                                @if ($sortBy === $column->key)
                                    @if ($sortDirection === 'asc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                @endif
                            </div>
                        </th>
                    @else
                        <th wire:click="sort('{{ $column->key }}')">
                            <div
                                class="py-3 px-6 flex justify-center items-center cursor-pointer border-b-2 border-blue-200">
                                {{ $column->label }}
                                @if ($sortBy === $column->key)
                                    @if ($sortDirection === 'asc')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                @endif
                            </div>
                        </th>
                    @endif

                @endforeach
                <th>
                    <div class="py-3 px-6 flex justify-center items-center cursor-pointer border-b-2 border-blue-200">
                        Action
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            {{-- @if ($this->dataFilter()[0] != null)
                @foreach ($this->dataFilter() as $row)
                    <tr
                        class="bg-red-300 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        @foreach ($this->columns() as $column)
                            <td>
                                <div class="py-3 px-6 flex items-center cursor-pointer">
                                    @if ($row != null)
                                        <x-dynamic-component :component="$column->component" :value="$row[$column->key]">
                                        </x-dynamic-component>
                                    @endif
                                </div>
                            </td>
                        @endforeach
                        <td>
                            <div class="py-3 px-6 flex items-center justify-between gap-2 cursor-pointer">
                                <a href="{{ route($route['edit'], ['id' => $row[$this->columns()[0]->key]]) }}">Edit</a>
                                <a
                                    href="{{ route($route['delete'], ['id' => $row[$this->columns()[0]->key]]) }}">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif --}}
            @foreach ($this->data() as $row)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    @foreach ($this->columns() as $column)
                        @if ($column->label == 'ID' || $column->label == 'Kode')
                            <td class="w-1/12">
                                <div class="py-3 px-6 flex justify-center items-center cursor-pointer">
                                    <x-dynamic-component :component="$column->component" :value="$row[$column->key]">
                                    </x-dynamic-component>
                                </div>
                            </td>
                        @elseif($column->label == 'Penginput')
                            <td>
                                <div class="py-3 px-6 flex justify-center items-center cursor-pointer">
                                    <x-dynamic-component :component="$column->component" :value="$row[$column->key] ?? $row['nama_pegawai']">
                                    </x-dynamic-component>
                                </div>
                            </td>
                        @else
                            <td>
                                <div class="py-3 px-6 flex justify-center items-center cursor-pointer">
                                    <x-dynamic-component :component="$column->component" :value="$row[$column->key]">
                                    </x-dynamic-component>
                                </div>
                            </td>
                        @endif
                    @endforeach
                    <td>
                        <div class="flex flex-col lg:flex-row justify-center items-center  py-4 space-x-3">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route($route['delete'], $row[$this->columns()[0]->key]) }}" method="POST"
                                class="flex gap-3 justify-around">
                                @csrf
                                @method('DELETE')

                                <div>
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        href="{{ route($route['edit'], Illuminate\Support\Facades\Crypt::encrypt($row[$this->columns()[0]->key])) }}">Edit</a>
                                </div>
                                <div>
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                                </div>


                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $this->data()->links() }}
</div>
{{--
<script>
    // Tambahkan event listener pada tombol
    document.querySelector('#inputField').addEventListener('click', function() {
        // Tampilkan prompt konfirmasi
        var result = confirm('Anda yakin ingin mengubah nilai ?');
        // Jika user menekan tombol OK, maka kirim request ke server
        if (result) {
            // Kirim request ke server menggunakan Livewire
            Livewire.emit('editField');
        }
    });
</script> --}}
