<div class="py-3 px-6 flex items-center cursor-pointer">
    <select class="py-2 rounded border border-gray-300 text-black" name="parent" wire:model="parent_id_key"
        wire:change="updateParentId" label="parentSelect">
        @if (isset($parent_id))
            @if ($parent_id == 0)
                <option value="{{ $parent_id }}" class="font-bold">Main Parent</option>
            @else
                <option value="{{ $parent_id }}" class="font-bold">{{ $parent_id }}</option>
            @endif
        @else
            <option value="">Root</option>
        @endif
        <option value="0">Main Parent</option>
        @foreach ($id as $key => $val)
            @if ($val == $parent_id || $val == $pertanyaan_id)
                @continue
            @endif
            <option value="{{ $id[$key] }}">{{ $id[$key] }}</option>
        @endforeach
    </select>
</div>
