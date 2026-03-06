@props(['href', 'icon' => null])

<a href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'group inline-flex items-center gap-2
                           font-fell italic text-sm md:text-base tracking-widest
                           text-parchment/75 hover:text-gold/90
                           border border-gold/25 hover:border-gold/55
                           px-3.5 py-2 rounded-sm
                           shadow-[inset_0_1px_6px_rgba(0,0,0,0.4)]
                           hover:shadow-[0_0_10px_rgba(201,168,76,0.2)]
                           transition-all duration-300',
    ]) }}>
    @if ($icon === 'left')
        <span class="text-gold/30 group-hover:text-gold/60 transition-colors duration-300">⟨</span>
    @endif

    {{ $slot }}

    @if ($icon === 'right')
        <span class="text-gold/30 group-hover:text-gold/60 transition-colors duration-300">⟩</span>
    @endif
</a>
