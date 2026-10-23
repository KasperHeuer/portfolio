<!DOCTYPE html>
<html lang="en" class="[color-scheme:dark]">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Home' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="min-h-screen bg-zinc-950 font-sans text-zinc-100 antialiased">
    <header class="sticky top-0 z-10 border-b border-zinc-800 bg-zinc-950/80 backdrop-blur">
        <div class="flex items-center justify-between px-6 py-3">
            <a href="{{ url('/kanban') }}"
                class="rounded-md text-base font-semibold tracking-tight text-zinc-100 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400">
                Kanban
            </a>

            <nav class="flex items-center gap-2">
                <a href="{{ url('/kanban/status/create') }}"
                    class="rounded-lg px-3 py-1.5 text-sm font-medium text-zinc-300 transition-colors hover:bg-zinc-800 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400">
                    Nieuwe status
                </a>
                <a href="{{ url('/kanban/item/create') }}"
                    class="rounded-lg bg-indigo-500 px-3 py-1.5 text-sm font-medium text-white transition-colors hover:bg-indigo-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-300">
                    Nieuw item
                </a>
            </nav>
        </div>
    </header>

    <main class="p-6">
        @php
            $costs = (float) ($paymentOverview['costs'] ?? 0);
            $paid = (float) ($paymentOverview['amountPaid'] ?? 0);
            $remaining = round($costs - $paid, 2);

            $hasCosts = $costs > 0;
            $isPaid = $hasCosts && $remaining <= 0;
            $percentPaid = $hasCosts ? (int) min(100, max(0, round(($paid / $costs) * 100))) : 0;
        @endphp

        {{-- Payment overview: amber while something is still open, green once everything is paid --}}
        <section aria-label="Betalingsoverzicht"
            class="mx-auto mb-6 w-full max-w-xl overflow-hidden rounded-xl border border-zinc-800 bg-zinc-900">
            <dl class="grid grid-cols-1 divide-y divide-zinc-800 sm:grid-cols-3 sm:divide-x sm:divide-y-0">
                <div class="px-4 py-3">
                    <dt class="text-xs font-medium text-zinc-400">Kosten</dt>
                    <dd class="mt-1 text-lg font-semibold tabular-nums text-zinc-100">
                        &euro; {{ number_format($costs, 2, ',', '.') }}
                    </dd>
                </div>

                <div class="px-4 py-3">
                    <dt class="text-xs font-medium text-zinc-400">Betaald</dt>
                    <dd class="mt-1 text-lg font-semibold tabular-nums text-zinc-100">
                        &euro; {{ number_format($paid, 2, ',', '.') }}
                    </dd>
                </div>

                <div class="px-4 py-3 {{ $isPaid ? 'bg-emerald-500/10' : ($hasCosts ? 'bg-amber-500/10' : '') }}">
                    <dt
                        class="flex items-center gap-1.5 text-xs font-medium {{ $isPaid ? 'text-emerald-300' : ($hasCosts ? 'text-amber-300' : 'text-zinc-400') }}">
                        @if ($isPaid)
                            <svg class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                    clip-rule="evenodd" />
                            </svg>
                            Volledig betaald
                        @else
                            @if ($hasCosts)
                                <span class="h-1.5 w-1.5 shrink-0 rounded-full bg-amber-400"></span>
                            @endif
                            Nog te betalen
                        @endif
                    </dt>
                    <dd
                        class="mt-1 text-lg font-semibold tabular-nums {{ $isPaid ? 'text-emerald-300' : ($hasCosts ? 'text-amber-300' : 'text-zinc-100') }}">
                        &euro; {{ number_format($remaining, 2, ',', '.') }}
                    </dd>
                </div>
            </dl>

            {{-- Inline style is needed here: the width is calculated at runtime. --}}
            <div class="h-1 bg-zinc-800" role="progressbar" aria-label="Betaald" aria-valuemin="0" aria-valuemax="100"
                aria-valuenow="{{ $percentPaid }}">
                <div class="h-full transition-all {{ $isPaid ? 'bg-emerald-400' : 'bg-indigo-500' }}"
                    style="width: {{ $percentPaid }}%"></div>
            </div>
        </section>

        {{-- Flash messages: ->with('success', ...), ->with('error', ...) and validation errors --}}
        @if (session('success') || session('error') || $errors->any())
            <div class="mx-auto mb-6 w-full max-w-xl space-y-3">
                @if (session('success'))
                    <div role="status"
                        class="flex items-start justify-between gap-3 rounded-lg border border-emerald-500/30 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
                        <p>{{ session('success') }}</p>
                        <button type="button" onclick="this.parentElement.remove()" aria-label="Sluiten"
                            class="-mr-1 -mt-0.5 rounded px-1.5 text-lg leading-none text-emerald-300/70 transition-colors hover:text-emerald-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-emerald-400">
                            &times;
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div role="alert"
                        class="flex items-start justify-between gap-3 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-300">
                        <p>{{ session('error') }}</p>
                        <button type="button" onclick="this.parentElement.remove()" aria-label="Sluiten"
                            class="-mr-1 -mt-0.5 rounded px-1.5 text-lg leading-none text-red-300/70 transition-colors hover:text-red-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-red-400">
                            &times;
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div role="alert"
                        class="rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-300">
                        <p class="font-medium">Controleer de volgende velden:</p>
                        <ul class="mt-1.5 list-inside list-disc space-y-0.5 text-red-300/90">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endif

        {{ $slot }}
    </main>
</body>

</html>
