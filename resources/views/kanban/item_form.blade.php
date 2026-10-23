<x-kanban-layout :paymentOverview="$paymentOverview">
    <x-kanban-form title="Nieuw item">

        <x-kanban-input label="Item naam" name="title" :value="$item->title ?? ''" />
        <x-kanban-input type="textarea" label="Item beschrijving" name="description" :value="$item->description ?? ''" />
        <x-kanban-input type="number" label="Prioriteit" name="priority" :value="$item->priority ?? ''" />

        <section class="space-y-3 border-t border-zinc-800 pt-5">
            <h2 class="text-sm font-semibold text-zinc-200">Producten</h2>

            <div id="products" class="space-y-3">
                @if (isset($products))
                    @foreach ($products as $product)
                        <div class="product-row space-y-4 rounded-lg border border-zinc-800 bg-zinc-950/50 p-4">
                            <x-kanban-input label="Product" name="product[]" :value="$product['name']" />
                            <x-kanban-input type="textarea" label="Product beschrijving" name="productDescription[]"
                                :value="$product['description']" />
                            <div class="grid grid-cols-2 gap-4">
                                <x-kanban-input type="number" label="Product hoeveelheid" name="productAmount[]"
                                    :value="$product['amount']" />
                                <x-kanban-input type="number" label="Product kosten" name="productCost[]"
                                    :value="$product['cost']" />
                            </div>
                            <p class="text-right text-sm text-zinc-400">
                                Totaal: <span class="product-total font-medium text-zinc-200">€ 0,00</span>
                            </p>
                        </div>
                    @endforeach
                @endif

                <div class="product-row space-y-4 rounded-lg border border-zinc-800 bg-zinc-950/50 p-4">
                    <x-kanban-input label="Product" name="product[]" />
                    <x-kanban-input type="textarea" label="Product beschrijving" name="productDescription[]" />
                    <div class="grid grid-cols-2 gap-4">
                        <x-kanban-input type="number" label="Product hoeveelheid" name="productAmount[]" />
                        <x-kanban-input type="number" label="Product kosten" name="productCost[]" />
                    </div>
                    <p class="text-right text-sm text-zinc-400">
                        Totaal: <span class="product-total font-medium text-zinc-200">€ 0,00</span>
                    </p>
                </div>
            </div>

            <button type="button" id="add-product"
                class="w-full rounded-lg border border-dashed border-zinc-700 py-2 text-sm font-medium text-zinc-400 transition-colors hover:border-zinc-500 hover:text-zinc-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400">
                + Product toevoegen
            </button>

            <div class="flex items-center justify-between border-t border-zinc-800 pt-4">
                <span class="text-sm font-semibold text-zinc-200">Totaal</span>
                <span id="grand-total" class="text-sm font-semibold text-zinc-100">€ 0,00</span>
            </div>

            <template id="product-template">
                <div class="product-row space-y-4 rounded-lg border border-zinc-800 bg-zinc-950/50 p-4">
                    <x-kanban-input label="Product" name="product[]" />
                    <x-kanban-input type="textarea" label="Product beschrijving" name="productDescription[]" />
                    <div class="grid grid-cols-2 gap-4">
                        <x-kanban-input type="number" label="Product hoeveelheid" name="productAmount[]" />
                        <x-kanban-input type="number" label="Product kosten" name="productCost[]" />
                    </div>
                    <p class="text-right text-sm text-zinc-400">
                        Totaal: <span class="product-total font-medium text-zinc-200">€ 0,00</span>
                    </p>
                </div>
            </template>
        </section>
    </x-kanban-form>

    <script>
        const productsEl = document.getElementById('products');
        const grandTotalEl = document.getElementById('grand-total');
        const money = new Intl.NumberFormat('nl-NL', { style: 'currency', currency: 'EUR' });

        function recalculate() {
            let grandCents = 0;

            productsEl.querySelectorAll('.product-row').forEach(row => {
                const amount = parseFloat(row.querySelector('[name="productAmount[]"]').value) || 0;
                const cost = parseFloat(row.querySelector('[name="productCost[]"]').value) || 0;

                // Work in cents to avoid floating point drift in the grand total
                const cents = Math.round(amount * cost * 100);

                row.querySelector('.product-total').textContent = money.format(cents / 100);
                grandCents += cents;
            });

            grandTotalEl.textContent = money.format(grandCents / 100);
        }

        // One listener covers existing rows and rows added later
        productsEl.addEventListener('input', e => {
            if (e.target.matches('[name="productAmount[]"], [name="productCost[]"]')) {
                recalculate();
            }
        });

        document.getElementById('add-product').addEventListener('click', () => {
            const template = document.getElementById('product-template');
            productsEl.appendChild(template.content.cloneNode(true));
            recalculate();
        });

        // Initial calculation for products loaded from the database
        recalculate();
    </script>
</x-kanban-layout>