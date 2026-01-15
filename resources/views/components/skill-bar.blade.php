@props(['label', 'width'])
<div class="mb-4">
    <p class="text-2xl ml-12">{{ $label }}</p>
    <div class="h-5 relative border-2 border-gray-500 w-[40vw] overflow-hidden ml-4 hidden md:block">
        <div class="bg-red-600 h-5 skill-bar" style="--target-width: {{ $width }};"></div>
    </div>
</div>