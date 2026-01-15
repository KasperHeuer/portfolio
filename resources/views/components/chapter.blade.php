@props([
    'text',
    'triangle' => true,
])

@php
    $triangle = filter_var($triangle, FILTER_VALIDATE_BOOLEAN);
@endphp

<div class="flex items-center space-x-2">
    @if ($triangle)
        <x-triangle class="text-red-700" />
    @endif
    <h1 class="text-3xl font-ringbearer">{{ $text }}</h1>
</div>
