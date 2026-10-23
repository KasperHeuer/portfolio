@props([
    'id',
    'title' => 'Title',
    'description' => 'Description',
    'products' => [],
    'status_dropdown' => [],
    'status_id' => 1,
])

@php
    $productCount = count($products);
    $grandTotal = collect($products)->sum(fn($product) => $product->cost * $product->amount);

    // Every ledger row uses the same column template, so the right edge of the totals,
    // the paid input and the remaining amount always line up.
    $ledger = 'grid grid-cols-[1fr_auto_4.25rem] items-center gap-x-2';

    // Icon buttons are 40px so they are easy to hit with a finger as well as a mouse.
    $actionButton =
        'inline-flex h-10 w-10 items-center justify-center rounded-lg text-zinc-400 transition-colors focus-visible:outline-none focus-visible:ring-2';
    $editButton = $actionButton . ' hover:bg-zinc-700 hover:text-zinc-100 focus-visible:ring-indigo-400';
    $deleteButton = $actionButton . ' hover:bg-red-500/10 hover:text-red-400 focus-visible:ring-red-400';
@endphp

<div class="rounded-lg border border-zinc-700/60 bg-zinc-800 p-3 shadow-sm transition-colors hover:border-zinc-600">

    {{-- Item header: text on the left, actions on the right --}}
    <div class="flex items-start justify-between gap-2">
        <div class="min-w-0">
            <h3 class="break-words text-sm font-semibold leading-snug text-zinc-100">{{ $title }}</h3>
            @if ($description)
                <p class="mt-1 whitespace-pre-line break-words text-sm text-zinc-400">{{ $description }}</p>
            @endif
        </div>

        {{-- Negative margins pull the 40px hit areas back so the icons line up with the card padding --}}
        <div class="-mr-2 -mt-2.5 flex shrink-0 items-center gap-0.5">
            <a href="/kanban/item/edit/{{ $id }}" title="Item bewerken" aria-label="Item bewerken"
                class="{{ $editButton }}">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
                </svg>
            </a>

            <form action="{{ route('item.delete') }}" method="POST"
                onsubmit="return confirm('Dit item verwijderen?')">
                <x-kanban-input type="hidden" name="item_id" :value="$id" />
                @csrf
                @method('DELETE')
                <button type="submit" title="Item verwijderen" aria-label="Item verwijderen"
                    class="{{ $deleteButton }}">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <polyline points="3 6 5 6 21 6" />
                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                        <path d="M10 11v6" />
                        <path d="M14 11v6" />
                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    {{-- Products --}}
    <div class="mt-3 border-t border-zinc-700/60 pt-3">
        @if ($productCount > 0)
            <details class="group">
                <summary
                    class="flex cursor-pointer list-none items-center justify-between gap-2 rounded py-1 text-xs text-zinc-400 transition-colors hover:text-zinc-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400 [&::-webkit-details-marker]:hidden">
                    <span class="flex items-center gap-1.5">
                        <svg class="h-3.5 w-3.5 transition-transform group-open:rotate-90" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $productCount }} {{ $productCount === 1 ? 'product' : 'producten' }}
                    </span>
                    <span class="font-medium tabular-nums text-zinc-200">
                        &euro; {{ number_format($grandTotal, 2, ',', '.') }}
                    </span>
                </summary>

                <ul class="mt-3 space-y-3">
                    @foreach ($products as $product)
                        @php
                            $lineTotal = $product->cost * $product->amount;
                            $remaining = round($lineTotal - $product->amount_paid_for, 2);
                            $isPaid = $remaining <= 0;
                        @endphp

                        <li class="rounded-lg bg-zinc-900/60 p-3 text-xs">

                            {{-- Product header --}}
                            <div class="flex items-start justify-between gap-2">
                                <p class="min-w-0 break-words text-sm font-semibold leading-snug text-zinc-100">
                                    {{ $product->name }}
                                </p>

                                <div class="-mr-2 -mt-2.5 flex shrink-0 items-center gap-0.5">
                                    <a href="/kanban/product/edit/{{ $product->id }}" title="Product bewerken"
                                        aria-label="Product bewerken" class="{{ $editButton }}">
                                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" aria-hidden="true">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('product.delete') }}" method="POST"
                                        onsubmit="return confirm('Dit product verwijderen?')">
                                        <x-kanban-input type="hidden" name="product_id" :value="$product->id" />
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Product verwijderen"
                                            aria-label="Product verwijderen" class="{{ $deleteButton }}">
                                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" aria-hidden="true">
                                                <polyline points="3 6 5 6 21 6" />
                                                <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                                <path d="M10 11v6" />
                                                <path d="M14 11v6" />
                                                <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            @if ($product->description)
                                <p class="mt-1 break-words text-sm text-zinc-400">{{ $product->description }}</p>
                            @endif

                            <p class="mt-1.5 text-sm tabular-nums text-zinc-500">
                                {{ $product->amount }} &times; &euro; {{ number_format($product->cost, 2, ',', '.') }}
                            </p>

                            {{-- Ledger: total, paid, remaining --}}
                            <div class="mt-3 space-y-2 border-t border-zinc-800 pt-3">

                                {{-- Total --}}
                                <div class="{{ $ledger }}">
                                    <span class="text-zinc-500">Totaal</span>
                                    <span class="whitespace-nowrap font-medium tabular-nums text-zinc-200">
                                        &euro; {{ number_format($lineTotal, 2, ',', '.') }}
                                    </span>
                                </div>

                                {{-- Paid --}}
                                <form action="{{ route('product.change_amount_paid_for') }}" method="POST"
                                    class="{{ $ledger }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    <label for="amount-paid-{{ $product->id }}" class="text-zinc-500">Betaald</label>

                                    <div class="relative w-24">
                                        <span
                                            class="pointer-events-none absolute left-2.5 top-1/2 -translate-y-1/2 text-sm text-zinc-500">&euro;</span>
                                        <input type="number" name="amount_paid_for"
                                            id="amount-paid-{{ $product->id }}"
                                            value="{{ $product->amount_paid_for }}" min="0" step="0.01"
                                            inputmode="decimal"
                                            class="block w-full rounded-lg border border-zinc-700 bg-zinc-800 py-2 pl-6 pr-2 text-right text-sm tabular-nums text-zinc-100 transition-colors [appearance:textfield] focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none" />
                                    </div>

                                    <button type="submit"
                                        class="w-full rounded-lg border border-zinc-600 bg-zinc-700 px-1.5 py-2 text-sm font-medium text-zinc-100 transition-colors hover:bg-zinc-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400">
                                        Opslaan
                                    </button>
                                </form>

                                {{-- Minus line --}}
                                <div class="{{ $ledger }}" aria-hidden="true">
                                    <div class="col-span-2 flex items-center gap-1.5">
                                        <span class="h-px flex-1 bg-zinc-700"></span>
                                        <span class="leading-none text-zinc-500">&minus;</span>
                                    </div>
                                </div>

                                {{-- Remaining: amber while open, green once fully paid --}}
                                <div
                                    class="{{ $ledger }} -mx-1.5 rounded-md px-1.5 py-2 {{ $isPaid ? 'bg-emerald-500/10' : 'bg-amber-500/10' }}">
                                    <span
                                        class="flex min-w-0 items-center gap-1.5 font-medium {{ $isPaid ? 'text-emerald-300' : 'text-amber-300' }}">
                                        @if ($isPaid)
                                            <svg class="h-3.5 w-3.5 shrink-0" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Volledig betaald
                                        @else
                                            <span class="h-1.5 w-1.5 shrink-0 rounded-full bg-amber-400"></span>
                                            Nog te betalen
                                        @endif
                                    </span>
                                    <span
                                        class="whitespace-nowrap font-semibold tabular-nums {{ $isPaid ? 'text-emerald-300' : 'text-amber-300' }}">
                                        &euro; {{ number_format($remaining, 2, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </details>
        @else
            <p class="text-xs text-zinc-500">Geen producten :&lt;</p>
        @endif
    </div>

    {{-- Status --}}
    <div class="mt-3 border-t border-zinc-700/60 pt-3">
        <x-kanban-dropdown :data="$status_dropdown" label="Status" name="status" :status_id="$status_id"
            :item_id="$id" />
    </div>
</div>