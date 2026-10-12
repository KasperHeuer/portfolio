<x-kanban-layout>
    <x-kanban-form title="Nieuw item">
        <x-kanban-input label="Item naam" name="title" />
        <x-kanban-input type="textarea" label="Item beschrijving" name="description" />
        <x-kanban-input type="number" label="Prioriteit" name="priority" />

        <section class="space-y-3 border-t border-zinc-800 pt-5">
            <h2 class="text-sm font-semibold text-zinc-200">Producten</h2>

            <div id="products" class="space-y-3">
                <div class="space-y-4 rounded-lg border border-zinc-800 bg-zinc-950/50 p-4">
                    <x-kanban-input label="Product" name="product[]" />
                    <x-kanban-input type="textarea" label="Product beschrijving" name="productDescription[]" />
                    <div class="grid grid-cols-2 gap-4">
                        <x-kanban-input type="number" label="Product hoeveelheid" name="productAmount[]" />
                        <x-kanban-input type="number" label="Product kosten" name="productCost[]" />
                    </div>
                </div>
            </div>

            <button type="button" id="add-product"
                class="w-full rounded-lg border border-dashed border-zinc-700 py-2 text-sm font-medium text-zinc-400 transition-colors hover:border-zinc-500 hover:text-zinc-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400">
                + Product toevoegen
            </button>

            <template id="product-template">
                <div class="space-y-4 rounded-lg border border-zinc-800 bg-zinc-950/50 p-4">
                    <x-kanban-input label="Product" name="product[]" />
                    <x-kanban-input type="textarea" label="Product beschrijving" name="productDescription[]" />
                    <div class="grid grid-cols-2 gap-4">
                        <x-kanban-input type="number" label="Product hoeveelheid" name="productAmount[]" />
                        <x-kanban-input type="number" label="Product kosten" name="productCost[]" />
                    </div>
                </div>
            </template>
        </section>
    </x-kanban-form>

    <script>
        document.getElementById('add-product').addEventListener('click', () => {
            const template = document.getElementById('product-template');
            document.getElementById('products').appendChild(template.content.cloneNode(true));
        });
    </script>
</x-kanban-layout>