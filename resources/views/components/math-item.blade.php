@props(['name', 'icon' => 'chart-line'])

@php
    use Illuminate\Support\Str;

    $slug = Str::slug($name, '-');

    $colors = [
        'from-blue-500 to-blue-600',
        'from-purple-500 to-purple-600',
        'from-pink-500 to-pink-600',
        'from-green-500 to-green-600',
        'from-indigo-500 to-indigo-600',
        'from-teal-500 to-teal-600',
        'from-rose-500 to-rose-600',
        'from-amber-500 to-amber-600',
    ];

    // Use crc32 + an additional salt to reduce repetition in grids
    $unique_seed = $name . '_card';
    $index = (int) sprintf('%u', crc32($unique_seed)) % count($colors);
    $color = $colors[$index];
@endphp

<div
    class="group block rounded-2xl overflow-hidden bg-white shadow-lg transition-all duration-500 border border-gray-100 h-[400px] flex flex-col">

    {{-- Top part of the card --}}
    <div
        class="bg-gradient-to-br {{ $color }} text-white p-8 flex flex-col justify-center items-center text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-white/10" aria-hidden="true"></div>

        <div class="relative z-10">
            <div class="text-5xl mb-3 transform transition-transform duration-500 "
                aria-hidden="true">
                <i class="fas fa-{{ $icon }}" aria-hidden="true"></i>
            </div>

            <h2 class="text-2xl font-bold tracking-wide">
                {{ $name }}
            </h2>
        </div>
    </div>

    {{-- Bottom content and CTA --}}
    <div
        class="p-8 flex flex-col flex-grow bg-gradient-to-b from-white to-gray-50 justify-center items-center text-center">
        <p class="text-gray-700 text-base leading-relaxed mb-6">
            {{ $slot }}
        </p>

        {{-- CTA at the bottom --}}
        <a href="{{ url('/math/' . $slug) }}"
            class="inline-flex items-center gap-2 px-8 py-3 rounded-xl text-white font-semibold shadow-md transition-all duration-300 bg-gradient-to-r {{ $color }} hover:shadow-xl hover:brightness-110 hover:-translate-y-1">
            Explore {{  $name }}
            <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform duration-300"></i>
        </a>
    </div>
</div>
