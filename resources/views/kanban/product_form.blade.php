@php
    $paymentOverview = $data['paymentOverview'];
    $title = $data['title'];
    $description = $data['description'];
    $name = $data['name'];
    $cost = $data['cost'];
    $amount = $data['amount'];
    $id = $data['product_id'];
@endphp

<x-kanban-layout :paymentOverview="$paymentOverview">
    <form action="{{ route('product.update') }}" method="POST"
        class="mx-auto w-full max-w-xl space-y-5 rounded-xl border border-zinc-800 bg-zinc-900 p-6">
        @csrf
        <x-kanban-input type="hidden" name="product_id" :value="$id" />
        <x-kanban-input label="Product naam" name="title" :value="$name" />
        <x-kanban-input type="textarea" label="Product description" name="description" :value="$description" />
        <x-kanban-input type="number" label="Product cost" name="cost" :value="$cost" />
        <x-kanban-input type="amount" label="Product amount" name="amount" :value="$amount" />
        <div class="flex justify-end pt-1">
            <button type="submit"
                class="rounded-lg bg-indigo-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-indigo-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-300 focus-visible:ring-offset-2 focus-visible:ring-offset-zinc-900">
                Opslaan
            </button>
        </div>
    </form>

</x-kanban-layout>
