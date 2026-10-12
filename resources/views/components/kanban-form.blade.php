@props(['title' => null])

<form action="{{ url()->current() }}" method="POST"
    class="mx-auto w-full max-w-xl space-y-5 rounded-xl border border-zinc-800 bg-zinc-900 p-6">
    @csrf

    @if ($title)
        <h1 class="text-lg font-semibold text-zinc-100">{{ $title }}</h1>
    @endif

    {{ $slot }}

    <div class="flex justify-end pt-1">
        <button type="submit"
            class="rounded-lg bg-indigo-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-indigo-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-300 focus-visible:ring-offset-2 focus-visible:ring-offset-zinc-900">
            Opslaan
        </button>
    </div>
</form>