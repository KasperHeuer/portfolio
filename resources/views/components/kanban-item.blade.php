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

    // Shared column template so the totals, the paid input and the remaining amount line up on the right.
    $ledger = 'grid grid-cols-[1fr_auto_3.75rem] items-center gap-x-2';
@endphp

<div class="rounded-lg border border-zinc-700/60 bg-zinc-800 p-3 shadow-sm transition-colors hover:border-zinc-600">
    <h3 class="text-sm font-medium text-zinc-100">{{ $title }}</h3>
    <p class="mt-1 whitespace-pre-line text-sm text-zinc-400">{{ $description }}</p>

    <div class="mt-3 border-t border-zinc-700/60 pt-3">
        @if ($productCount > 0)
            <details class="group">
                <summary
                    class="flex cursor-pointer list-none items-center justify-between rounded text-xs text-zinc-400 hover:text-zinc-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400 [&::-webkit-details-marker]:hidden">
                    <span class="flex items-center gap-1.5">
                        <svg class="h-3.5 w-3.5 transition-transform group-open:rotate-90" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $productCount }} {{ $productCount === 1 ? 'product' : 'producten' }}
                    </span>
                    <span class="font-medium text-zinc-200">&euro; {{ number_format($grandTotal, 2, ',', '.') }}</span>
                </summary>

                <ul class="mt-3 space-y-2">
                    @foreach ($products as $product)
                        @php
                            $lineTotal = $product->cost * $product->amount;
                            // Rounded to cents so floating point noise can't leave a product "unpaid" by 0.0000001.
                            $remaining = round($lineTotal - $product->amount_paid_for, 2);
                            $isPaid = $remaining <= 0;
                        @endphp

                        <li class="rounded-md bg-zinc-900/60 p-2.5 text-xs">
                            <p class="font-medium text-zinc-200">{{ $product->name }}</p>

                            @if ($product->description)
                                <p class="mt-0.5 text-zinc-500">{{ $product->description }}</p>
                            @endif

                            <p class="mt-1 text-zinc-500">
                                {{ $product->amount }} &times; &euro; {{ number_format($product->cost, 2, ',', '.') }}
                            </p>

                            <div class="mt-2.5 space-y-1.5 border-t border-zinc-800 pt-2.5">
                                {{-- Total --}}
                                <div class="{{ $ledger }}">
                                    <span class="text-zinc-500">Totaal</span>
                                    <span class="font-medium text-zinc-200">
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
                                            class="pointer-events-none absolute left-2 top-1/2 -translate-y-1/2 text-zinc-500">&euro;</span>
                                        <input type="number" name="amount_paid_for"
                                            id="amount-paid-{{ $product->id }}"
                                            value="{{ $product->amount_paid_for }}" min="0" step="0.01"
                                            class="block w-full rounded-lg border border-zinc-700 bg-zinc-800 py-1.5 pl-5 pr-2 text-right text-xs text-zinc-100 transition-colors [appearance:textfield] focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none" />
                                    </div>

                                    <button type="submit"
                                        class="w-full rounded-lg border border-zinc-600 bg-zinc-700 px-2 py-1.5 text-xs font-medium text-zinc-100 transition-colors hover:bg-zinc-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400">
                                        Change
                                    </button>
                                </form>

                                {{-- Minus line --}}
                                <div class="{{ $ledger }}" aria-hidden="true">
                                    <div class="col-span-2 flex items-center gap-1.5">
                                        <span class="h-px flex-1 bg-zinc-700"></span>
                                        <span class="leading-none text-zinc-500">&minus;</span>
                                    </div>
                                </div>

                                {{-- Remaining: amber while not paid off, green once completely paid --}}
                                <div
                                    class="{{ $ledger }} -mx-1.5 rounded-md px-1.5 py-1.5 {{ $isPaid ? 'bg-emerald-500/10' : 'bg-amber-500/10' }}">
                                    <span
                                        class="flex items-center gap-1.5 font-medium {{ $isPaid ? 'text-emerald-300' : 'text-amber-300' }}">
                                        @if ($isPaid)
                                            <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
                                                aria-hidden="true">
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
                                    <span class="font-semibold {{ $isPaid ? 'text-emerald-300' : 'text-amber-300' }}">
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

    <div class="mt-3 border-t border-zinc-700/60 pt-3">
        <x-kanban-dropdown :data="$status_dropdown" label="Status" name="status" :status_id="$status_id" :item_id="$id" />
    </div>
</div>
