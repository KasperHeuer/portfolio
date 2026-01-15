@props(['image', 'title', 'url', 'tags'])
<div class="bg-white/10 flex flex-col lg:flex-row justify-between items-center my-5 lg:mb-20 p-5 lg:h-[300px] gap-5">
    <img src="{{ asset($image) }}" class="bg-gray-500/50 flex-1 max-w-full lg:max-w-[1000px] h-full object-contain">
    <div class="flex-1 lg:ml-12 max-w-[600px] text-center lg:text-left">
        <a href="{{ $url }}" target="_blank" class="text-3xl md:text-5xl font-bold">{{ $title }}</a>
        <p class="text-2xl mt-4 text-gray-300">{{ is_array($tags) ? implode(', ', $tags) : $tags }}</p>
    </div>
</div>