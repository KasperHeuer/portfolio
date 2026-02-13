<x-math-tool-layout>
    <x-math-tool name="Exponent Calculator">
        <x-math-tool-explanation>
            <b>What are Exponents?<b><br>
                    An exponent represents repeated multiplication of a number by itself. For example, 3⁴ means
                    multiplying 3 four times: 3 × 3 × 3 × 3 = 81.<br><br>

                    Exponents are widely used in mathematics, physics, and computer science to express large numbers in
                    a compact form.
        </x-math-tool-explanation>
        <br>
        <form action="{{ url()->current() }}" method="POST"
            class="max-w-md mx-auto bg-gray-100 p-6 rounded-lg shadow-md space-y-4">
            @csrf

            <label for="number" class="block text-gray-700 font-semibold">Enter a number</label>
            <input required type="number" name="number" id="number" min="1"
                placeholder="e.g., {{ rand(1, 10) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">

            <input required type="number" name="exponent" id="exponent" min="1"
                placeholder="e.g., {{ rand(2, 15) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition-colors">
                Submit
            </button>
        </form>
        @if (isset($result))
            <div class="w-full max-w-4xl mx-auto mt-12">
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-gray-100 p-8 sm:p-12">
                    <h2
                        class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-8 text-center">
                        Calculation Result
                    </h2>
    
                    <div class="flex items-center justify-center gap-4 text-2xl sm:text-3xl font-bold">
                        <!-- Base Number -->
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-400 rounded-xl blur opacity-25">
                            </div>
                            <div
                                class="relative bg-gradient-to-br from-blue-500 to-purple-600 text-white px-5 py-3 rounded-xl shadow-lg">
                                {{ $result['number'] }}
                            </div>
                        </div>
    
                        <!-- Exponent -->
                        <span class="text-gray-400 text-lg sm:text-xl align-super -ml-2">{{ $result['exponent'] }}</span>
    
                        <!-- Equals Sign -->
                        <span class="text-gray-400 text-2xl">=</span>
    
                        <!-- Result -->
                        <div class="relative group">
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-400 rounded-xl blur opacity-30 group-hover:opacity-50 transition-opacity duration-300">
                            </div>
                            <div
                                class="relative bg-gradient-to-br from-purple-600 to-pink-600 text-white px-5 py-3 rounded-xl shadow-lg hover:scale-105 transform transition-all duration-300">
                                {{ $result['result'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-math-tool>


</x-math-tool-layout>
