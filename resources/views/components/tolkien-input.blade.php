@props(['name', 'type' => 'text', 'placeholder' => '', 'label' => '', 'value' => ''])

<div class="mb-5">

    @if ($label)
        <label for="{{ $name }}" class="block font-fell italic text-gold-light/80 text-sm tracking-widest mb-1.5">
            {{ $label }}
        </label>
    @endif

    <input required type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        @if ($type !== 'password') value="{{ old($name, $value) }}" @endif
        {{ $attributes->merge([
            'class' => 'w-full bg-shadow/80 text-parchment font-fell
                               border border-gold/25 rounded-sm
                               px-4 py-2.5 text-base
                               placeholder:text-parchment/25 placeholder:italic
                               focus:outline-none focus:border-gold/70 focus:ring-1 focus:ring-gold/30
                               hover:border-gold/40
                               shadow-[inset_0_2px_8px_rgba(0,0,0,0.4)]
                               transition-all duration-200',
        ]) }} />

</div>
