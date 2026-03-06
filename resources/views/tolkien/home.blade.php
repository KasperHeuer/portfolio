<x-tolkien-layout>

    {{-- Success message --}}
    @if (session('success'))
        <div class="flex items-center gap-3 mb-10
                    border border-gold/25 bg-gold/5 rounded-sm
                    px-5 py-3 shadow-[inset_0_1px_6px_rgba(0,0,0,0.3)]">
            <span class="text-gold/60 text-sm">✦</span>
            <p class="font-fell italic text-gold-light/80 text-sm tracking-wide">
                {{ session('success') }}
            </p>
        </div>
    @endif

    {{-- Items grid --}}
    <div class="flex flex-col gap-8 mt-4 max-w-4xl mx-auto">
        @foreach ($items as $item)
            <div class="group relative flex flex-col gap-5
                        border border-gold/20 hover:border-gold/40
                        bg-ink/40 hover:bg-ink/60
                        rounded-sm px-10 py-8
                        shadow-[inset_0_2px_10px_rgba(0,0,0,0.4)]
                        hover:shadow-[0_0_30px_rgba(201,168,76,0.08)]
                        transition-all duration-300">

                {{-- Top ornament --}}
                <span class="absolute top-4 right-6 text-gold/20 group-hover:text-gold/50 text-base transition-colors duration-300">✦</span>

                <h2 class="font-ringbearer text-gold/90 text-4xl md:text-5xl leading-tight tracking-wide">
                    {{ $item->name }}
                </h2>

                {{-- Divider --}}
                <div class="flex items-center gap-3">
                    <div class="h-px flex-1 bg-gradient-to-r from-gold/40 to-transparent"></div>
                    <span class="text-gold/25 text-xs">❧</span>
                </div>

                <p class="font-fell italic text-parchment/65 text-lg leading-relaxed flex-1">
                    {{ $item->description }}
                </p>

            </div>
        @endforeach
    </div>

</x-tolkien-layout>