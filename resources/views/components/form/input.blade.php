<label>
    {{ $label }}
    <input
        type="{{ $type ?? 'text' }}"
        name="{{ $name }}"

        @isset($max)
            max="{{ $max }}"
        @endisset

        @isset($isWired)
            wire:model="{{ $name }}"
        @endisset
    />
    @error($name)
    <span class="bg-red-600 text-white">{{ $message }}</span>
    @enderror
</label>
