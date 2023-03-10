{{-- <div class="w-full">
    <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
        <input class="p-1 px-2 appearance-none outline-none w-full text-gray-800" type="text"
            placeholder="Search Contacts..." wire:model="query" wire:keydown.escape="reset" wire:keydown.tab="reset"
            wire:keydown.arrow-up="decrementHighlight" wire:keydown.arrow-down="incrementHighlight"
            wire:keydown.enter="selectContact">
        <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
            <button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline x-show="!isOpen()" points="18 15 12 20 6 15"></polyline>
                    <polyline x-show="isOpen()" points="18 15 12 9 6 15"></polyline>
                </svg>
            </button>
        </div>
        <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
            <div class="list-item">Searching...</div>
        </div>
        @if (!empty($query))
            <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="reset"></div>
            <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
                <div class="flex flex-col w-full">
                    @if (!empty($gejala))
                        @foreach ($gejala as $i => $data)
                            <div wire:click="selectContact({{ $data->id }})"
                                class="flex w-full items-center border-transparent border-l-2 relative hover:border-teal-100 cursor-pointer">
                                {{ $data->gejala }}
                            </div>
                        @endforeach
                    @else
                        <div
                            class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100 cursor-pointer">
                            No result
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div> --}}

<div class="my-2 p-1 w-full bg-white border border-gray-200 rounded">
    <input type="text" class="py-1 appearance-none outline-none w-full text-gray-800" placeholder="Search Contacts..."
        wire:model="query" wire:keydown.arrow-up="decrementHighlight" wire:keydown.arrow-down="incrementHighlight"
        wire:keydown.enter="selectGejala" />

    <div wire:loading class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
        <div class="list-item">Searching...</div>
    </div>

    @if (!empty($query))
        <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="resetSearch"></div>
        <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
            <div class="flex flex-col w-full">
                @if (!empty($gejala))
                    @forelse ($gejala as $i => $data)
                        <div wire:click="selectGejala('{{ $data->gejala }}')"
                            class="border-transparent border-l-2 relative hover:border-teal-100 cursor-pointer">
                            {{ $data->gejala }}
                        </div>
                    @empty
                        <div
                            class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                            No result
                        </div>
                    @endforelse
                @else
                    <div
                        class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100 cursor-pointer">
                        No result
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>

{{-- <div class="absolute shadow bg-white top-100 z-40 w-full lef-0 rounded max-h-select overflow-y-auto ">
    <div class="flex flex-col w-full">
        <template x-for="(option, index) in filteredOptions()" :key="index">
            <div @click="onOptionClick(index)" :class="classOption(option.login.uuid, index)"
                :aria-selected="focusedOptionIndex === index">
                <div
                    class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
                    <div class="w-6 flex flex-col items-center">
                        <div
                            class="flex relative w-5 h-5 bg-orange-500 justify-center items-center m-1 mr-2 w-4 h-4 mt-1 rounded-full ">
                            <img class="rounded-full" alt="A" x-bind:src="option.picture.thumbnail">
                        </div>
                    </div>
                    <div class="w-full items-center flex">
                        <div class="mx-2 -mt-1"><span x-text="option.name.first + ' ' + option.name.last"></span>
                            <div class="text-xs truncate w-full normal-case font-normal -mt-1 text-gray-500"
                                x-text="option.email"></div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div> --}}


<!-- component -->
{{-- <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
    <input id="searchKey" type="text" class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
        placeholder="Input Gejala..." wire:model="query" wire:keydown.escape="reset" wire:keydown.tab="reset"
        wire:keydown.arrow-up="decrementHighlight" wire:keydown.arrow-down="incrementHighlight"
        wire:keydown.enter="selectContact">
    <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200">
        <button id="dropdownButton" data-dropdown-toggle="dropdown-gejala" data-dropdown-offset-distance="20"
            data-dropdown-offset-skidding="10" data-dropdown-placement="bottom-end"
            class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline x-show="!isOpen()" points="18 15 12 20 6 15"></polyline>
                <polyline x-show="isOpen()" points="18 15 12 9 6 15"></polyline>
            </svg>

        </button>
    </div>
</div>
<div id="dropdown-gejala"
    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-full dark:bg-gray-700">
    <div class="flex flex-col w-full">
        <div onclick="onSelected('a')"
            class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100 cursor-pointer">
            a
        </div>
        <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative hover:border-teal-100">
            b
        </div>
    </div>
</div> --}}

<script>
    function onSelected(selector) {
        let inputSearch = document.querySelector('#searchKey');
        inputSearch.value = selector;
    }
</script>

{{-- <script>
    const $targetEl = document.getElementById('dropdown-gejala');

    const options = {
        placement: 'top',
        triggerType: 'click',
        offsetSkidding: 0,
        offsetDistance: 10,
        delay: 300,
        onHide: () => {
            console.log('dropdown has been hidden');
        },
        onShow: () => {
            console.log('dropdown has been shown');
        },
        onToggle: () => {
            console.log('dropdown has been toggled');
        }
    };
</script> --}}
