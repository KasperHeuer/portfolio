@props(['footer' => null, 'submitText' => 'submit', 'route'])

<form action="{{ $route }}" method="POST"
    class="relative bg-ink/60 border border-gold/25 rounded-sm px-8 py-8 max-w-xl mx-auto
           shadow-[0_0_40px_rgba(201,168,76,0.07)] backdrop-blur-sm">

    {{-- Top ornamental rule --}}
    <div class="flex items-center gap-3 mb-7">
        <div class="h-px flex-1 bg-gradient-to-r from-transparent to-gold/40"></div>
        <span class="text-gold/50 text-xs tracking-widest">✦</span>
        <div class="h-px flex-1 bg-gradient-to-l from-transparent to-gold/40"></div>
    </div>

    @csrf
    {{ $slot }}

    {{-- Bottom ornamental rule --}}
    <div class="flex items-center gap-3 mt-7 mb-6">
        <div class="h-px flex-1 bg-gradient-to-r from-transparent to-gold/40"></div>
        <span class="text-gold/50 text-xs">❧</span>
        <div class="h-px flex-1 bg-gradient-to-l from-transparent to-gold/40"></div>
    </div>

    <button type="submit"
        class="w-full font-ringbearer text-ink bg-gradient-to-b from-gold-light to-gold
               hover:from-gold hover:to-ember
               px-6 py-3 text-lg tracking-widest
               border border-gold/60 rounded-sm
               shadow-[0_2px_12px_rgba(201,168,76,0.25)]
               hover:shadow-[0_2px_18px_rgba(201,168,76,0.45)]
               transition-all duration-300 cursor-pointer">
        {{ $submitText }}
    </button>

    {{-- Optional footer slot for links --}}
    @if ($footer)
        <div class="mt-5 text-center">
            {{ $footer }}
        </div>
    @endif

</form>
