@props(['data' => [], 'label', 'name', 'required' => true, 'status_id' => 1, 'item_id'])

<form action="{{ route('item.change_status') }}" method="POST">
    @csrf
    <input type="hidden" name="item_id" value="{{ $item_id }}">

    <div class="flex items-end gap-2">
        {{-- The select is nested in the label, so no id is needed and repeated cards never share ids. --}}
        <label class="block min-w-0 flex-1">
            <span class="mb-1.5 block text-xs font-medium text-zinc-400">{{ $label }}</span>

            <div class="relative">
                <select name="{{ $name }}" @if ($required) required @endif
                    class="block w-full appearance-none truncate rounded-lg border border-zinc-700 bg-zinc-900 py-1.5 pl-2.5 pr-8 text-xs text-zinc-100 transition-colors focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
                    @foreach ($data as $item)
                        <option value="{{ $item['id'] }}" @if ((int) $status_id === (int) $item['id']) selected @endif>
                            {{ $item['title'] }}
                        </option>
                    @endforeach
                </select>

                <svg class="pointer-events-none absolute right-2 top-1/2 h-4 w-4 -translate-y-1/2 text-zinc-500"
                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </label>

        <button type="submit"
            class="shrink-0 rounded-lg border border-zinc-600 bg-zinc-700 px-3 py-1.5 text-xs font-medium text-zinc-100 transition-colors hover:bg-zinc-600 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400">
            Update
        </button>
    </div>
</form>