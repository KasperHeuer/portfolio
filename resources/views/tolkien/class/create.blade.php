<x-tolkien-layout title="Add class">
    <x-tolkien-form submitText="Add class" :route="route('tolkien.class.store')">
        <x-tolkien-input name="name" type="text" placeholder="Class Name" :value="old('name')" />
        <x-tolkien-textarea name="description" placeholder="Write the description here..." />
    </x-tolkien-form>

</x-tolkien-layout>
