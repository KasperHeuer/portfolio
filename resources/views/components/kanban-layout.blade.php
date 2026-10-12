<!DOCTYPE html>
<html lang="en" class="[color-scheme:dark]">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Home' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('svg/favicon.svg') }}" type="image/x-icon">
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
        {{ $slot }}
    </main>
</body>

</html>
