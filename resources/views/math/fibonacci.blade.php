<x-math-tool-layout>
    <x-math-tool name="Fibonacci Generator">
        <x-math-tool-explanation>
            This tool generates a Fibonacci sequence based on the number of terms you enter.
            Each number is the sum of the two numbers before it, starting from 0 and 1.
        </x-math-tool-explanation>

        <div class="input-label">
            Enter the number of terms:
        </div>

        <x-math-form />
        @if (isset($result))
            <div class="w-full max-w-6xl mx-auto mt-12">
                <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl border border-gray-100 p-8 sm:p-12">
                    <h2
                        class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-8 text-center">
                        Sequence Result
                    </h2>
                    <div class="flex flex-wrap gap-4 justify-center items-end">
                        @foreach ($result['sequence'] as $index => $number)
                            @php
                                $size = min($index * 8 + 40, 160);
                                $fontSize = min($index * 2 + 14, 32);
                            @endphp
                            <div class="group relative" style="width: {{ $size }}px; height: {{ $size }}px;">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-400 rounded-2xl blur opacity-25 group-hover:opacity-40 transition-opacity duration-300">
                                </div>
                                <div class="relative w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 text-white font-bold rounded-2xl shadow-lg hover:shadow-2xl hover:scale-105 transform transition-all duration-300 flex items-center justify-center"
                                    style="font-size: {{ $fontSize }}px;">
                                    {{ $number }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </x-math-tool>

</x-math-tool-layout>
