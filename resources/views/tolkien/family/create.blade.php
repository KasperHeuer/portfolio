<x-tolkien-layout title="Add class">
    <x-tolkien-form submitText="Add class" :route="route('tolkien.family.store')">


        <div class="mb-5">
            <label for="class_id" class="block font-fell italic text-gold-light/80 text-sm tracking-widest mb-1.5">
                Family
            </label>
            <div class="relative">
                <select name="class_id"
                    class="w-full appearance-none bg-shadow/80 text-parchment font-fell italic
                           border border-gold/25 rounded-sm
                           px-4 py-2.5 text-base
                           focus:outline-none focus:border-gold/70 focus:ring-1 focus:ring-gold/30
                           hover:border-gold/40
                           shadow-[inset_0_2px_8px_rgba(0,0,0,0.4)]
                           transition-all duration-200
                           cursor-pointer">
                    @foreach ($classes as $class)
                        <option value="{{ $class['id'] }}" class="bg-shadow text-parchment not-italic">
                            {{ $class['name'] }}
                        </option>
                    @endforeach
                </select>
                <span
                    class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 text-gold/40 text-xs">❧</span>
            </div>
        </div>
        <x-tolkien-input name="name" type="text" placeholder="Family Name" :value="old('name')" />
        <x-tolkien-textarea name="description" placeholder="Write the description here..." />
    </x-tolkien-form>
</x-tolkien-layout>
