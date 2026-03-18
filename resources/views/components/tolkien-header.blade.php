<header
    class="relative text-center px-6 pt-10 pb-6 border-b border-gold/30 bg-gradient-to-b from-ember/10 to-transparent overflow-hidden">

    {{-- Left: back to portfolio --}}
    <div class="absolute top-6 left-6">
        <x-tolkien-link href="{{ route('index') }}" icon="left">return to portfolio</x-tolkien-link>
    </div>

    {{-- Right: auth actions --}}
    @if (Auth::check())
        <div class="absolute top-6 right-6 flex items-center gap-3">

            @if (Auth::user()->permission_level > 1)
                <x-tolkien-link href="{{ route('tolkien.select') }}">
                    <span class="text-gold/55 group-hover:text-gold/85 transition-colors duration-300">✦</span>
                    inscribe
                </x-tolkien-link>
                <span class="text-gold/20 text-xs">|</span>
            @endif

            <x-tolkien-link href="{{ route('tolkien.logout') }}" icon="right">depart to valinor</x-tolkien-link>

        </div>
    @endif

    {{-- Top decorative rule --}}
    <div class="flex items-center justify-center gap-3 mb-4">
        <div class="h-px w-16 bg-gradient-to-r from-transparent to-gold/60"></div>
        <span class="text-gold/60 text-xs tracking-widest">✦ ✦ ✦</span>
        <div class="h-px w-16 bg-gradient-to-l from-transparent to-gold/60"></div>
    </div>

    {{-- Eyebrow --}}
    <p class="font-fell italic text-gold-light/80 text-xs tracking-[0.35em] uppercase mb-5">
        The Legendarium of Middle-earth
    </p>

    {{-- Main title --}}
    <h1
        class="font-ringbearer text-gold leading-none text-7xl md:text-8xl lg:text-9xl drop-shadow-[0_2px_12px_rgba(201,168,76,0.4)]">
        Tolkien
    </h1>

    {{-- Subtitle --}}
    <p class="font-fell italic text-parchment/50 text-sm tracking-widest mt-3">
        "Not all those who wander are lost"
    </p>

</header>
