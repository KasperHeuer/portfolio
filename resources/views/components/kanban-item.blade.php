@props([
    'id',
    'title' => 'Title',
    'description' => 'Description',
    'products' => [],
    'currentStatusId' => 1,
    'fistStatusId' => 1,
    'lastStatusId' => 1,
])

@php
    $productCount = count($products);
    $grandTotal = collect($products)->sum(fn($product) => $product->cost * $product->amount);
    $canDecrease = $fistStatusId < $currentStatusId;
    $canIncrease = $lastStatusId > $currentStatusId;
    $iconButton =
        'inline-flex h-7 w-7 items-center justify-center rounded-md text-zinc-400 transition-colors hover:bg-zinc-700 hover:text-zinc-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400';
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
                        <li class="rounded-md bg-zinc-900/60 p-2.5 text-xs">
                            <div class="flex items-start justify-between gap-3">
                                <span class="font-medium text-zinc-200">{{ $product->name }}</span>
                                <span class="shrink-0 font-medium text-zinc-200">
                                    &euro; {{ number_format($product->cost * $product->amount, 2, ',', '.') }}
                                </span>
                            </div>

                            @if ($product->description)
                                <p class="mt-0.5 text-zinc-500">{{ $product->description }}</p>
                            @endif

                            <p class="mt-1 text-zinc-500">
                                {{ $product->amount }} &times; &euro; {{ number_format($product->cost, 2, ',', '.') }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </details>
        @else
            <p class="text-xs text-zinc-500">Geen producten :&lt;</p>
        @endif
    </div>

    @if ($canDecrease || $canIncrease)
        <div class="mt-3 flex items-center justify-between border-t border-zinc-700/60 pt-2">
            @if ($canDecrease)
                <form action="{{ route('item.decrease') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id }}">
                    <button type="submit" class="{{ $iconButton }}" title="Naar vorige status"
                        aria-label="Naar vorige status">
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            @endif

            @if ($canIncrease)
                <form action="{{ route('item.increase') }}" method="POST" class="ml-auto">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id }}">
                    <button type="submit" class="{{ $iconButton }}" title="Naar volgende status"
                        aria-label="Naar volgende status">
                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            @endif
        </div>
    @endif
</div>
