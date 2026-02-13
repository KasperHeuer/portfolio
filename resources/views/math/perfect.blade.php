<x-math-tool-layout>
    <x-math-tool name="Perfect Number Checker">
        <x-math-tool-explanation>
            What is a Perfect Number?<br>
            A perfect number is a positive integer that is equal to the sum of its proper divisors (excluding the number
            itself).<br><br>

            For example, 6 is a perfect number because its proper divisors are 1, 2, and 3, and 1 + 2 + 3 = 6.<br><br>

            Other examples of perfect numbers include 28, 496, and 8128.
        </x-math-tool-explanation>
        <x-math-form />
        @if (isset($result))
            <div class="mt-8 max-w-4xl w-full mx-auto bg-gradient-to-br from-white to-purple-50 rounded-2xl shadow-xl p-8 border border-purple-100">
                <!-- Result Header -->
                <div class="text-center mb-8">
                    <div class="inline-block mb-3">
                        <span class="text-sm font-semibold {{ $result['result'] ? 'text-green-600 bg-green-100' : 'text-orange-600 bg-orange-100' }} uppercase tracking-wide px-3 py-1 rounded-full">
                            {{ $result['result'] ? 'Perfect Number ✓' : 'Not Perfect' }}
                        </span>
                    </div>
                    <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-3">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r {{ $result['result'] ? 'from-green-600 to-emerald-600' : 'from-orange-600 to-red-600' }}">
                            {{ $result['number'] }}
                        </span>
                    </h2>
                    <p class="text-gray-700 text-lg font-medium">
                        {{ $result['result'] ? 'is a perfect number!' : 'is not a perfect number' }}
                    </p>
                </div>
    
                <!-- Divisors Section -->
                <div class="bg-white rounded-xl p-6 shadow-md border border-gray-200">
                    <div class="text-center mb-4">
                        <p class="text-sm font-semibold text-gray-700 uppercase tracking-wide mb-1">Proper Divisors</p>
                        <p class="text-xs text-gray-500">Numbers that divide {{ $result['number'] }} evenly (excluding itself)</p>
                    </div>
    
                    <!-- Divisors Display -->
                    <div class="flex flex-wrap justify-center items-center gap-2 mb-6">
                        @foreach ($result['devisors'] as $index => $devisor)
                            <div class="bg-gradient-to-br from-purple-500 to-indigo-600 text-white font-bold px-5 py-3 rounded-lg shadow-md hover:shadow-xl hover:scale-105 transition-all duration-200 text-lg">
                                {{ $devisor }}
                            </div>
                            @if ($index < count($result['devisors']) - 1)
                                <span class="text-purple-400 font-bold text-xl">+</span>
                            @endif
                        @endforeach
                        @if (count($result['devisors']) > 0)
                            <span class="text-purple-400 font-bold text-xl">=</span>
                            <div class="bg-gradient-to-br {{ $result['result'] ? 'from-green-500 to-emerald-600' : 'from-gray-500 to-gray-600' }} text-white font-bold px-5 py-3 rounded-lg shadow-md text-lg">
                                {{ array_sum($result['devisors']) }}
                            </div>
                        @endif
                    </div>
    
                    <!-- Explanation -->
                    <div class="pt-4 border-t border-gray-200">
                        <div class="bg-{{ $result['result'] ? 'green' : 'orange' }}-50 rounded-lg p-4">
                            <p class="text-sm text-gray-700 text-center">
                                @if ($result['result'])
                                    <span class="font-semibold text-green-700">Perfect!</span> The sum of divisors 
                                    <span class="font-bold">({{ array_sum($result['devisors']) }})</span> 
                                    equals the number itself 
                                    <span class="font-bold">({{ $result['number'] }})</span>
                                @else
                                    <span class="font-semibold text-orange-700">Not Perfect.</span> The sum of divisors 
                                    <span class="font-bold">({{ array_sum($result['devisors']) }})</span> 
                                    does not equal the number 
                                    <span class="font-bold">({{ $result['number'] }})</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
        @endif
    </x-math-tool>
    
</x-math-tool-layout>