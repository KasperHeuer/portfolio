@props(['type' => 'text', 'label', 'name', 'required' => true])

@php
    $field =
        'block w-full rounded-lg border border-zinc-700 bg-zinc-800 px-3 py-2 text-sm text-zinc-100 placeholder-zinc-500 transition-colors focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30';
@endphp

{{-- The input is nested in the label, so no id is needed and cloned rows never share ids. --}}
<label class="block space-y-1.5">
    <span class="block text-sm font-medium text-zinc-300">{{ $label }}</span>

    @if ($type === 'textarea')
        <textarea name="{{ $name }}" rows="4" placeholder="{{ $label }}" class="{{ $field }}"></textarea>
    @elseif ($type === 'color')
        <input type="color" name="{{ $name }}" @if ($required) required @endif
            class="block h-10 w-16 cursor-pointer rounded-lg border border-zinc-700 bg-zinc-800 p-1" />
    @else
        <input type="{{ $type }}" name="{{ $name }}" placeholder="{{ $label }}"
            @if ($required) required @endif @if ($type === 'number') min="1" @endif
            class="{{ $field }}" />
    @endif
</label>
