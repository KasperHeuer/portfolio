<x-math-tool-layout>
    <x-math-tool Name="Wisdom of the Crowd">
        <x-math-tool-explanation>
            <b>What is the Wisdom of the Crowd?</b><br><br>

            The “Wisdom of the Crowd” is a phenomenon where a group of people can collectively make surprisingly
            accurate
            judgments. Individually, people may be wrong, but together their answers can be very close to the truth.
            This effect appears in many real situations such as estimating quantities, predicting outcomes, and
            making forecasts.

            In this experiment, you will give your own independent estimate to a question. After many people
            participate, we will compare the group result to the real answer.<br><br>

            <b>How many tons(metric) is this elephant?</b>
            <img src="https://images.unsplash.com/photo-1557050543-4d5f4e07ef46?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="Elephant">
        </x-math-tool-explanation>
        <x-math-form />
    </x-math-tool>
    @if (isset($result))
        <div class="mt-8 max-w-4xl w-full mx-auto space-y-6">
            <!-- Thank You Message -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl shadow-lg p-6 border border-green-200">
                <div class="text-center">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full mb-3">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Thank You for Participating!</h3>
                    <p class="text-gray-700">Your estimate has been recorded and added to the collective wisdom.</p>
                </div>
            </div>

            <!-- Results Display -->
            <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl shadow-xl p-8 border border-blue-100">
                <!-- Your Estimate -->
                <div class="text-center mb-8">
                    <div class="inline-block mb-3">
                        <span
                            class="text-sm font-semibold text-blue-600 bg-blue-100 uppercase tracking-wide px-3 py-1 rounded-full">
                            Your Estimate
                        </span>
                    </div>
                    <h2
                        class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 mb-2">
                        {{ number_format($result['guess'], 2) }}
                    </h2>
                    <p class="text-gray-600 text-lg">metric tons</p>
                </div>

                <!-- Collective Results -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <!-- Total Participants -->
                    <div class="bg-white rounded-xl p-5 shadow-md border border-gray-200 text-center">
                        <p class="text-sm text-gray-600 font-medium mb-2">Total Participants</p>
                        <p class="text-3xl font-bold text-purple-600">{{ $result['total_participants'] }}</p>
                        <p class="text-xs text-gray-500 mt-1">estimates collected</p>
                    </div>

                    <!-- Average Estimate (Crowd Wisdom) -->
                    <div
                        class="bg-gradient-to-br from-amber-50 to-yellow-50 rounded-xl p-5 shadow-md border-2 border-amber-300 text-center">
                        <p class="text-sm text-amber-800 font-semibold mb-2">🎯 Crowd's Average</p>
                        <p class="text-3xl font-bold text-amber-700">{{ number_format($result['avg'], 2) }}</p>
                        <p class="text-xs text-amber-600 mt-1">metric tons</p>
                    </div>

                    <!-- Actual Answer -->
                    <div
                        class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-5 shadow-md border-2 border-green-300 text-center">
                        <p class="text-sm text-green-800 font-semibold mb-2">✓ Actual Weight</p>
                        <p class="text-3xl font-bold text-green-700">6</p>
                        <p class="text-xs text-green-600 mt-1">metric tons</p>
                    </div>
                </div>

                <!-- Accuracy Comparison -->
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-6 border border-indigo-200 mb-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 text-center">Accuracy Comparison</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Your Accuracy -->
                        <div class="bg-white rounded-lg p-4 shadow-sm">
                            <p class="text-sm text-gray-600 font-medium mb-2">Your Error</p>
                            <p
                                class="text-2xl font-bold {{ abs($result['guess'] - 6) <= abs($result['avg'] - 6) ? 'text-green-600' : 'text-orange-600' }}">
                                {{ number_format(abs($result['guess'] - 6), 2) }} tons
                            </p>

                            <p class="text-xs text-gray-500 mt-1">
                                {{ number_format(abs((($result['guess'] - 6) / 6) * 100), 1) }}% off
                            </p>
                        </div>

                        <!-- Crowd Accuracy -->
                        <div class="bg-white rounded-lg p-4 shadow-sm">
                            <p class="text-sm text-gray-600 font-medium mb-2">Crowd's Error</p>
                            <p
                                class="text-2xl font-bold {{ abs($result['avg'] - 6) <= abs($result['guess'] - 6) ? 'text-green-600' : 'text-orange-600' }}">
                                {{ number_format(abs($result['avg'] - 6), 2) }} tons
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                {{ number_format(abs((($result['avg'] - 6) / 6) * 100), 1) }}% off
                            </p>
                        </div>
                    </div>

                    <!-- Winner Message -->
                    <div class="mt-4 text-center">
                        @if (abs($result['avg'] - 6) <= abs($result['guess'] - 6))
                            <p
                                class="text-sm font-semibold text-green-700 bg-green-100 inline-block px-4 py-2 rounded-full">
                                🏆 The Crowd was more accurate!
                            </p>
                        @else
                            <p
                                class="text-sm font-semibold text-blue-700 bg-blue-100 inline-block px-4 py-2 rounded-full">
                                🌟 You beat the crowd this time!
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Wisdom of the Crowd Explanation -->
            <div class="bg-gradient-to-br from-white to-purple-50 rounded-2xl shadow-xl p-8 border border-purple-100">
                <div class="text-center mb-6">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-full mb-3">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Understanding the Wisdom of the Crowd</h3>
                </div>

                <div class="prose prose-lg max-w-none text-gray-700 space-y-4">
                    <div class="bg-white rounded-lg p-5 shadow-sm border border-purple-100">
                        <h4 class="text-lg font-bold text-purple-900 mb-2">📊 How It Works</h4>
                        <p class="text-sm leading-relaxed">
                            When many people make independent estimates, their individual errors tend to cancel each
                            other out.
                            Some people guess too high, others too low, but the <strong>average</strong> of all guesses
                            often lands
                            remarkably close to the true value. This is the essence of collective intelligence.
                        </p>
                    </div>

                    </div>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        With <span class="font-bold text-purple-600">{{ $result['total_participants'] }}</span>
                        participants,
                        our crowd's estimate was off by only
                        <span
                            class="font-bold text-purple-600">{{ number_format(abs((($result['avg'] - 6) / 6) * 100), 1) }}%</span>
                    </p>
                </div>
            </div>
        </div>
    @endif
</x-math-tool-layout>
