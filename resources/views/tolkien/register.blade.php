<x-tolkien-layout title="Register">
    <x-tolkien-form submitText="Register" :route="route('tolkien.create')">

        @if ($errors->any())
            <div class="text-red-400 text-sm mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>— {{ $error }} —</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <x-tolkien-input name="username" type="text" placeholder="Username" :value="old('username')" />

        <x-tolkien-input name="email" type="text" placeholder="Email" :value="old('email')" />

        <x-tolkien-input name="password" type="password" placeholder="Password" />
        <x-tolkien-input name="password_confirmation" type="password" placeholder="Confirm Password" />

        <x-slot name="footer">
            <x-tolkien-link href="{{ route('tolkien.login') }}">
                — or login —
            </x-tolkien-link>
        </x-slot>

    </x-tolkien-form>
</x-tolkien-layout>
