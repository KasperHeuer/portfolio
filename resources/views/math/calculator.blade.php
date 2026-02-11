<x-math-tool-layout>
    <x-math-tool name="Calculator">
        <x-math-tool-explanation>
            <p class="text-gray-600 leading-relaxed">
                Use this calculator to perform basic arithmetic operations. Simply enter your expression and click
                "Calculate" to see the result.
            </p>
        </x-math-tool-explanation>
        @if (isset($result))
            <div
                class="mt-6 p-4 sm:p-6 bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-200 rounded-xl shadow-sm">
                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm font-medium text-blue-700 uppercase tracking-wide">Result</span>
                </div>
                @if ($result === 'Error')
                    <p class="text-red-600 font-semibold text-base sm:text-lg">Error: Division by zero</p>
                @elseif($result === 'Invalid operator')
                    <p class="text-red-600 font-semibold text-base sm:text-lg">Error: Invalid operator</p>
                @else
                    <p class="text-lg sm:text-2xl font-bold text-gray-800 break-all sm:break-normal">
                        <span class="text-gray-600">{{ $number1 }}</span>
                        <span class="text-blue-600 mx-1 sm:mx-2">{{ $operator }}</span>
                        <span class="text-gray-600">{{ $number2 }}</span>
                        <span class="text-gray-400 mx-1 sm:mx-2">=</span>
                        <span class="text-blue-700">{{ $result }}</span>
                    </p>
                @endif
            </div>
        @endif
        <form action="{{ route('calculator.create') }}" method="POST" class="space-y-4">
            @csrf

            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                <input required type="number" name="number" id="number" placeholder="e.g., {{ rand(1, 100) }}"
                    class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all text-base">

                <select name="operator"
                    class="px-4 py-2.5 border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all cursor-pointer font-medium text-gray-700 text-base">
                    <option value="+" @selected($operator === '+')>+</option>
                    <option value="-" @selected($operator === '-')>−</option>
                    <option value="*" @selected($operator === '*')>×</option>
                    <option value="/" @selected($operator === '/')>÷</option>
                    <option value="^" @selected($operator === '^')>^</option>
                    <option value="%" @selected($operator === '%')>%</option>
                </select>

                <input required type="number" name="number2" id="number2" placeholder="e.g., {{ rand(1, 100) }}"
                    class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all text-base">
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-3 px-6 rounded-lg hover:bg-blue-600 active:bg-blue-700 transition-colors font-medium shadow-sm hover:shadow-md text-base">
                Calculate
            </button>
        </form>
    </x-math-tool>


</x-math-tool-layout>
