<x-math-tool-layout>
    <x-math-tool name="Factorial Calculator">
        <x-math-tool-explanation>
            <b>What is a Factorial?</b><br>
            The factorial of a non-negative integer n, denoted by n!, is the product of all positive integers less than
            or equal to n. <br><br>

            For example, 5! = 5 × 4 × 3 × 2 × 1 = 120<br>

            By definition, 0! = 1
        </x-math-tool-explanation><br>
        <x-math-form />

        @if (isset($result))
            <div
                class="mt-8 max-w-4xl w-full mx-auto bg-gradient-to-br from-white to-blue-50 rounded-2xl shadow-xl p-8 border border-blue-100">

                <!-- Calculation Steps Label -->
                <div class="text-center mb-4">
                    <p class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Calculation Steps</p>
                </div>

                <!-- Sequence Display -->
                <div class="flex flex-wrap justify-center items-center gap-2 mb-8">
                    @foreach ($result['sequence'] as $index => $multiplier)
                        <div
                            class="bg-gradient-to-br from-blue-500 to-indigo-600 text-white font-bold px-5 py-3 rounded-lg shadow-md hover:shadow-xl hover:scale-105 transition-all duration-200 text-lg">
                            {{ $multiplier }}
                        </div>
                        @if ($index < count($result['sequence']) - 1)
                            <span class="text-gray-400 font-bold text-xl">×</span>
                        @endif
                    @endforeach
                </div>

                <!-- Factorial Result -->
                <div class="text-center">
                    <div class="inline-block mb-3">
                        <span
                            class="text-sm font-semibold text-blue-600 uppercase tracking-wide bg-blue-100 px-3 py-1 rounded-full">
                            Factorial Result
                        </span>
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-3">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">
                            {{ $result['result'] }}
                        </span>
                    </h2>
                    <p class="text-gray-600 text-lg">The factorial of your number</p>
                </div>

            </div>
        @endif
    </x-math-tool>
</x-math-tool-layout>
