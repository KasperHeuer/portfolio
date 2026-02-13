@props(['text', 'triangle' => true])

@php
    $triangle = filter_var($triangle, FILTER_VALIDATE_BOOLEAN);
@endphp

<div class="flex items-center space-x-2 mb-4 border-b border-gray-700 pb-2">
    @if ($triangle)
        <x-triangle/>
    @endif
    <h1 {{ $attributes->merge(['class' => 'text-3xl font-ringbearer']) }}>{{ $text }}</h1>
</div>
