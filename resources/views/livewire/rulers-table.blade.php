{{-- @php
    dd($route);
@endphp --}}
<div>
    <table class="lg:table-fixed w-full text-sm text-left text-gray-500 shadow border">

        <thead class="text-xs text-gray-700 uppercase bg-blue-50">
            <tr>
                @foreach ($this->columns() as $column)
                    @if (isset($column->label))
                        <th class="w-1/12" wire:click="sort('{{ $column->key }}')">
                            <div class="py-3 px-6 flex items-center cursor-pointer border-b-2 border-blue-200">
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
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($this->data() as $key => $row)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    @foreach ($this->columns() as $column)
                        @if ($column->key == 'id')
                            <td class="w-1/12">
                                <div class="py-3 px-6 flex items-center cursor-pointer">
                                    <x-dynamic-component :component="$column->component" :value="++$key">
                                    </x-dynamic-component>
                                </div>
                            </td>
                        @elseif ($column->label == 'Nilai CF')
                            @if ($row['nilai_cf'] != null)
                                <td>
                                    <div class="py-3 px-6 flex items-center cursor-pointer">
                                        <x-dynamic-component :component="$column->component" :value="$row[$column->key]">
                                        </x-dynamic-component>
                                    </div>
                                </td>
                            @else
                                <td>
                                    <div class="py-3 px-6 flex items-center cursor-pointer">
                                        <input id="inputField" type="text" wire:model='data'
                                            class="px-2 w-full border-gray-200 border rounded" placeholder="input"
                                            wire:change={{ "editField('" . $model . "'" . ',' . "'" . $this->columns()[0]->key . "'" . ',' . "'" . $row[$this->columns()[0]->key] . "'" . ')" ?>' }}>
                                    </div>
                                </td>
                            @endif
                        @else
                            <td class="w-1/12">
                                <div class="py-3 px-6 flex items-center cursor-pointer">
                                    <x-dynamic-component :component="$column->component" :value="$row[$column->key]">
                                    </x-dynamic-component>
                                </div>
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $this->data()->links() }}
</div>
