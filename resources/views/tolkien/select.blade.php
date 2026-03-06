<x-tolkien-layout title="Select">
    <div class="max-w-sm mx-auto mt-16 flex flex-col gap-4">

        <x-tolkien-link href="{{ route('tolkien.class.create') }}" class="justify-between w-full px-5 py-3 text-sm">
            <span>Add class</span>
            <span class="text-gold/30 group-hover:text-gold/60 transition-colors duration-300">⟩</span>
        </x-tolkien-link>

        <x-tolkien-link href="{{ route('tolkien.family.create') }}" class="justify-between w-full px-5 py-3 text-sm">
            <span>Add family</span>
            <span class="text-gold/30 group-hover:text-gold/60 transition-colors duration-300">⟩</span>
        </x-tolkien-link>

        <x-tolkien-link href="{{ route('tolkien.item.create') }}" class="justify-between w-full px-5 py-3 text-sm">
            <span>Add item</span>
            <span class="text-gold/30 group-hover:text-gold/60 transition-colors duration-300">⟩</span>
        </x-tolkien-link>

    </div>
</x-tolkien-layout>
