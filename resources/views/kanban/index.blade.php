<x-kanban-layout>
    <div class="flex items-start gap-4 overflow-x-auto pb-4">
        <?php $fistStatusId = $statuses[0]->id;
        $lastStatusId = collect($statuses)->last()->id; ?>

        @forelse ($statuses as $status)
            @php($statusItems = $items[$status->id] ?? [])

            <x-kanban-list :title="$status->title" :colour="$status->colour" :count="count($statusItems)">
                @forelse ($statusItems as $item)
                    <x-kanban-item :id="$item->id" :title="$item->title" :description="$item->description" :products="$products[$item->id] ?? []"
                        :currentStatusId="$item->kan_ban_status_model_id" :fistStatusId="$fistStatusId" :lastStatusId="$lastStatusId" />
                @empty
                    <p
                        class="rounded-lg border border-dashed border-zinc-800 px-3 py-6 text-center text-sm text-zinc-500">
                        Geen items
                    </p>
                @endforelse
            </x-kanban-list>
        @empty
            <div class="w-full py-24 text-center">
                <p class="text-sm text-zinc-400">Er zijn nog geen statussen. Maak er een aan om kolommen op het bord te
                    krijgen.</p>
                <a href="{{ url('/kanban/status/create') }}"
                    class="mt-4 inline-block rounded-lg bg-indigo-500 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-indigo-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-300">
                    Status aanmaken
                </a>
            </div>
        @endforelse
    </div>
</x-kanban-layout>
