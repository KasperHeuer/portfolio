<x-math-tool-layout>
    <x-math-tool name="Surface Calculator">
        <x-math-tool-explanation>
            <b>Calculate the surface area of different shapes</b><br><br>
            Select a shape and enter the required measurements to calculate its surface area.
        </x-math-tool-explanation>

        <!-- Form -->
        <form action="{{ route('surface.submit') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="shape" class="block font-medium text-gray-700 mb-2">Shape</label>
                <select name="shape" id="shape"
                    class="border rounded-lg px-3 py-2 w-full max-w-xs focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">-- Select Shape --</option>
                    <option value="rectangle">Rectangle</option>
                    <option value="circle">Circle</option>
                    <option value="triangle">Triangle</option>
                    <option value="square">Square</option>
                </select>
            </div>

            <!-- Dynamic inputs container -->
            <div id="shape-inputs" class="mb-4 space-y-3"></div>

            <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                Calculate
            </button>

        </form>

        <script>
            const shapeSelect = document.getElementById('shape');
            const inputsContainer = document.getElementById('shape-inputs');

            shapeSelect.addEventListener('change', function() {
                const shape = this.value;
                inputsContainer.innerHTML = '';

                switch (shape) {
                    case 'rectangle':
                        inputsContainer.innerHTML = `
                            <div class="flex flex-wrap gap-x-4 gap-y-3">
                                <div class="flex-1">
                                    <label class="block text-gray-700 font-medium">Length</label>
                                    <input type="number" name="length" step="0.01" min="0" 
                                        class="border rounded-lg px-3 py-2 w-full">
                                </div>
                                <div class="flex-1">
                                    <label class="block text-gray-700 font-medium">Width</label>
                                    <input type="number" name="width" step="0.01" min="0" 
                                        class="border rounded-lg px-3 py-2 w-full">
                                </div>
                            </div>`;
                        break;
                    case 'square':
                        inputsContainer.innerHTML = `
                            <div class="flex flex-wrap gap-x-4 gap-y-3">
                                <div class="flex-1">
                                    <label class="block text-gray-700 font-medium">Length</label>
                                    <input type="number" name="length" step="0.01" min="0" 
                                        class="border rounded-lg px-3 py-2 w-full">
                                </div>
                                <div class="flex-1">
                                    <label class="block text-gray-700 font-medium">Width</label>
                                    <input type="number" name="width" step="0.01" min="0" 
                                        class="border rounded-lg px-3 py-2 w-full">
                                </div>
                            </div>`;
                        break;
                    case 'circle':
                        inputsContainer.innerHTML = `
                            <div class="flex flex-wrap gap-x-4 gap-y-3">
                                <div class="flex-1">
                                    <label class="block text-gray-700 font-medium">Diameter</label>
                                    <input type="number" name="diameter" step="0.01" min="0" 
                                        class="border rounded-lg px-3 py-2 w-full">
                                </div>
                            </div>`;
                        break;
                    case 'triangle':
                        inputsContainer.innerHTML = `
                            <div class="flex flex-wrap gap-x-4 gap-y-3">
                                <div class="flex-1">
                                    <label class="block text-gray-700 font-medium">Base</label>
                                    <input type="number" name="base" step="0.01" min="0" 
                                        class="border rounded-lg px-3 py-2 w-full">
                                </div>
                                <div class="flex-1">
                                    <label class="block text-gray-700 font-medium">Height</label>
                                    <input type="number" name="height" step="0.01" min="0" 
                                        class="border rounded-lg px-3 py-2 w-full">
                                </div>
                            </div>`;
                        break;
                    default:
                        break;
                }
            });
        </script>
    </x-math-tool>

    @if (isset($result))
        <div
            class="mt-8 max-w-4xl w-full mx-auto bg-gradient-to-br from-white to-indigo-50 rounded-2xl shadow-xl p-8 border border-indigo-100">
            <!-- Result Header -->
            <div class="text-center mb-8">
                <div class="inline-block mb-3">
                    <span
                        class="text-sm font-semibold text-indigo-600 bg-indigo-100 uppercase tracking-wide px-3 py-1 rounded-full">
                        Surface Area Calculated
                    </span>
                </div>
                <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-2">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">
                        {{ number_format($result['result'], 2) }}
                    </span>
                    <span class="text-2xl text-gray-600">units²</span>
                </h2>
                <p class="text-gray-700 text-lg font-medium capitalize">
                    {{ $result['shape'] }} Surface Area
                </p>
            </div>

            <!-- Shape Visualization & Formula -->
            <div class="bg-white rounded-xl p-6 shadow-md border border-gray-200">
                <!-- Shape Icon/Name -->
                <div class="text-center mb-6">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full mb-3">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            @if ($result['shape'] === 'square' || $result['shape'] === 'rectangle')
                                <rect x="4" y="4" width="16" height="16" stroke-width="2" rx="2" />
                            @elseif($result['shape'] === 'circle')
                                <circle cx="12" cy="12" r="8" stroke-width="2" />
                            @elseif($result['shape'] === 'triangle')
                                <path d="M12 4 L20 20 L4 20 Z" stroke-width="2" stroke-linejoin="round" />
                            @endif
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 capitalize">{{ $result['shape'] }}</h3>
                </div>

                <!-- Measurements -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                    @if ($result['shape'] === 'rectangle')
                        <div
                            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg p-4 border border-indigo-200">
                            <p class="text-sm text-gray-600 font-medium mb-1">Length</p>
                            <p class="text-2xl font-bold text-indigo-700">{{ $result['length'] }}</p>
                        </div>
                        <div
                            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg p-4 border border-indigo-200">
                            <p class="text-sm text-gray-600 font-medium mb-1">Width</p>
                            <p class="text-2xl font-bold text-indigo-700">{{ $result['width'] }}</p>
                        </div>
                    @elseif($result['shape'] === 'square')
                        <div
                            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg p-4 border border-indigo-200 sm:col-span-2">
                            <p class="text-sm text-gray-600 font-medium mb-1">Side Length</p>
                            <p class="text-2xl font-bold text-indigo-700">{{ $result['length'] }}</p>
                        </div>
                    @elseif($result['shape'] === 'circle')
                        <div
                            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg p-4 border border-indigo-200 sm:col-span-2">
                            <p class="text-sm text-gray-600 font-medium mb-1">Diameter</p>
                            <p class="text-2xl font-bold text-indigo-700">{{ $result['diameter'] }}</p>
                            <p class="text-xs text-gray-500 mt-1">Radius:
                                {{ number_format($result['diameter'] / 2, 2) }}</p>
                        </div>
                    @elseif($result['shape'] === 'triangle')
                        <div
                            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg p-4 border border-indigo-200">
                            <p class="text-sm text-gray-600 font-medium mb-1">Base</p>
                            <p class="text-2xl font-bold text-indigo-700">{{ $result['base'] }}</p>
                        </div>
                        <div
                            class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg p-4 border border-indigo-200">
                            <p class="text-sm text-gray-600 font-medium mb-1">Height</p>
                            <p class="text-2xl font-bold text-indigo-700">{{ $result['height'] }}</p>
                        </div>
                    @endif
                </div>

                <!-- Formula Display -->
                <div class="bg-gradient-to-r from-purple-50 to-indigo-50 rounded-lg p-5 border border-purple-200">
                    <p class="text-sm font-semibold text-gray-700 uppercase tracking-wide mb-3 text-center">Formula Used
                    </p>
                    <div class="text-center">
                        @if ($result['shape'] === 'rectangle')
                            <p class="text-lg font-mono text-gray-800">
                                Area = Length × Width
                            </p>
                            <p class="text-md text-gray-600 mt-2">
                                {{ $result['length'] }} × {{ $result['width'] }} = <span
                                    class="font-bold text-indigo-600">{{ number_format($result['result'], 2) }}</span>
                            </p>
                        @elseif($result['shape'] === 'square')
                            <p class="text-lg font-mono text-gray-800">
                                Area = Side²
                            </p>
                            <p class="text-md text-gray-600 mt-2">
                                {{ $result['length'] }}² = <span
                                    class="font-bold text-indigo-600">{{ number_format($result['result'], 2) }}</span>
                            </p>
                        @elseif($result['shape'] === 'circle')
                            <p class="text-lg font-mono text-gray-800">
                                Area = π × r²
                            </p>
                            <p class="text-md text-gray-600 mt-2">
                                π × {{ number_format($result['diameter'] / 2, 2) }}² = <span
                                    class="font-bold text-indigo-600">{{ number_format($result['result'], 2) }}</span>
                            </p>
                        @elseif($result['shape'] === 'triangle')
                            <p class="text-lg font-mono text-gray-800">
                                Area = ½ × Base × Height
                            </p>
                            <p class="text-md text-gray-600 mt-2">
                                ½ × {{ $result['base'] }} × {{ $result['height'] }} = <span
                                    class="font-bold text-indigo-600">{{ number_format($result['result'], 2) }}</span>
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Additional Info Footer -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-500">
                    Calculated for a <span
                        class="font-semibold text-indigo-600 capitalize">{{ $result['shape'] }}</span> shape
                </p>
            </div>
        </div>
    @endif
</x-math-tool-layout>
