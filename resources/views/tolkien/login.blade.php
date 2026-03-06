<x-tolkien-layout>
    <x-tolkien-form submitText="Login" :route="route('tolkien.authenticate')">

        @if ($errors->any())
            <div class="text-red-400 text-sm mb-4 text-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>— {{ $error }} —</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <x-tolkien-input name="username" type="text" placeholder="Username" :value="old('username')" />

        <x-tolkien-input name="password" type="password" placeholder="Password" />

        <x-slot name="footer">
            {{-- <a href="{{ route('tolkien.register') }}"
                class="font-fell italic text-gold/60 tracking-wide
                       hover:text-gold-light hover:tracking-wider
                       transition-all duration-300
                       underline underline-offset-4 decoration-gold/30 hover:decoration-gold/60">
                — or register —
            </a> --}}
            <x-tolkien-link href="{{ route('tolkien.register') }}">
                — or register —
            </x-tolkien-link>
        </x-slot>

    </x-tolkien-form>
</x-tolkien-layout>
