<x-tolkien-layout>

    {{-- Success message --}}
    @if (session('success'))
        <div
            class="flex items-center gap-3 mb-10
                    border border-gold/25 bg-gold/5 rounded-sm
                    px-5 py-3 shadow-[inset_0_1px_6px_rgba(0,0,0,0.3)]">
            <span class="text-gold/60 text-sm">✦</span>
            <p class="font-fell italic text-gold-light/80 text-sm tracking-wide">
                {{ session('success') }}
            </p>
        </div>
    @endif

    {{-- Items grid --}}
    <div class="flex flex-col gap-6 mt-4 max-w-4xl mx-auto">
        @if ($items->isNotEmpty())
            @foreach ($items as $item)
                <a href="{{ route('tolkien.family.view', ['class_id' => $item->id]) }}">
                    <div
                        class="group relative flex flex-col gap-4
                    border border-gold/15 hover:border-gold/35
                    border-l-2 border-l-gold/50 hover:border-l-gold/80
                    bg-gradient-to-br from-ink/60 via-ink/40 to-shadow/60
                    hover:from-ink/70 hover:via-ink/50 hover:to-shadow/70
                    rounded-sm pl-8 pr-10 py-7
                    shadow-[inset_0_1px_8px_rgba(0,0,0,0.5),inset_4px_0_12px_rgba(201,168,76,0.04)]
                    hover:shadow-[inset_0_1px_8px_rgba(0,0,0,0.5),inset_4px_0_16px_rgba(201,168,76,0.08),0_0_24px_rgba(201,168,76,0.06)]
                    transition-all duration-300">

                        {{-- Top ornament --}}
                        <span
                            class="absolute top-4 right-5 text-gold/20 group-hover:text-gold/45 text-xs transition-colors duration-300">✦</span>

                        {{-- Item number / index indicator --}}
                        <span
                            class="absolute -left-px top-7 w-0.5 h-6 bg-gradient-to-b from-gold/70 to-gold/10 rounded-full"></span>

                        <h2
                            class="font-ringbearer text-gold/85 group-hover:text-gold/95 text-3xl md:text-4xl leading-tight tracking-wide transition-colors duration-300">
                            {{ $item->name }}
                        </h2>

                        {{-- Divider --}}
                        <div class="flex items-center gap-3">
                            <div class="h-px w-8 bg-gold/30"></div>
                            <span class="text-gold/20 text-xs">❧</span>
                            <div class="h-px flex-1 bg-gradient-to-r from-gold/15 to-transparent"></div>
                        </div>

                        <p
                            class="font-fell italic text-parchment/60 group-hover:text-parchment/70 text-base leading-relaxed transition-colors duration-300">
                            {{ $item->description }}
                        </p>
                        @if (Auth::check() && Auth::user()->permission_level > 2)
                        <div class="flex justify-end mt-2">
                            <a href="{{ route('tolkien.class.delete', ['class_id' => $item->id]) }}"
                                onclick="return confirm('Are you sure you wish to delete \'{{ addslashes($item->name) }}\'? This cannot be undone.')"
                                class="text-red-500 hover:text-red-700 text-sm font-fell italic transition-colors duration-300">
                                Delete
                            </a>
                        </div>
                        @endif
                    </div>
                </a>
            @endforeach
        @else
            <p class="text-center text-parchment/50 italic tracking-wide">
                Nothing found.
            </p>
        @endif
    </div>

</x-tolkien-layout>
