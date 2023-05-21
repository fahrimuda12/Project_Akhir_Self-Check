<div class="py-3 px-6 flex items-center cursor-pointer">
    <select class="py-2 rounded border border-gray-300 text-black" name="skalar" wire:model="skalar"
        wire:change="updateSkalarValue" label="skalarSelect">
        @if ($cf > 0)
            @if ($cf == 1)
                <option value="{{ $cf }}" class="font-bold">Faktor Mayor</option>
            @elseif ($cf == 0.8)
                <option value="{{ $cf }}" class="font-bold">Faktor Menengah</option>
            @else
                <option value="{{ $cf }}" class="font-bold">Faktor Minor</option>
            @endif
        @else
            <option value="">Belum Ditentukan</option>
        @endif
        <option value="1">Faktor Mayor</option>
        <option value="0.8">Faktor Menengah</option>
        <option value="0.5">Faktor Minor</option>
    </select>
</div>
