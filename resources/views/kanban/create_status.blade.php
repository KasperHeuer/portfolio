<x-kanban-layout :paymentOverview="$paymentOverview">
    <x-kanban-form title="Nieuwe status">
        <x-kanban-input label="Status naam" name="title" />
        <x-kanban-input type="color" label="Status kleur" name="colour" />
        <x-kanban-input type="number" label="Status prioriteit" name="priority" />
    </x-kanban-form>
</x-kanban-layout>
