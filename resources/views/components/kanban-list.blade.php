@props(['title' => 'Title', 'colour' => '#71717a', 'count' => null])

<section class="w-80 shrink-0 rounded-xl border border-zinc-800 bg-zinc-900">
    <header class="flex items-center gap-2 px-4 py-3">
        {{-- Inline style is needed here: the colour comes from the database. --}}
        <span class="h-2.5 w-2.5 shrink-0 rounded-full" style="background-color: {{ $colour }}"></span>
        <h2 class="truncate text-sm font-semibold text-zinc-100">{{ $title }}</h2>

        @if (!is_null($count))
            <span class="ml-auto rounded-md bg-zinc-800 px-2 py-0.5 text-xs font-medium text-zinc-400">
                {{ $count }}
            </span>
        @endif
    </header>

    <div class="flex flex-col gap-3 px-3 pb-3">
        {{ $slot }}
    </div>
</section>