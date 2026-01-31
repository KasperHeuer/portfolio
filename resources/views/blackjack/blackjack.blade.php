<x-casino-layout>
    <div class="max-w-6xl mx-auto py-4 px-4">
        @if (!$data['playing'])
            <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-lg shadow-2xl p-8 sm:p-16 border border-gray-700 text-center">
                <h1 class="text-4xl sm:text-6xl font-ringbearer text-amber-400 mb-6 sm:mb-8 tracking-wide">Blackjack</h1>
                <a href="{{ route('blackjack.start') }}"
                    class="inline-block px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-amber-600 to-amber-700 hover:from-amber-500 hover:to-amber-600 text-gray-900 font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 font-serif text-lg sm:text-xl">
                    Start Game
                </a>
            </div>
        @else
            <!-- Dealer Section -->
            <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-lg shadow-2xl p-4 sm:p-8 mb-4 sm:mb-6 border border-gray-700">
                <h2 class="text-2xl sm:text-3xl font-ringbearer text-amber-400 mb-4 sm:mb-6">Dealer's Hand</h2>
                <div class="flex gap-2 sm:gap-4 mb-4 flex-wrap justify-center sm:justify-start">
                    <div class="bg-gray-800 border-2 border-amber-400 rounded-lg p-4 sm:p-6 w-16 sm:w-20 h-20 sm:h-24 flex items-center justify-center">
                        <span class="text-2xl sm:text-3xl font-bold text-white">{{ $data['dealerCards'][0] }}</span>
                    </div>
                    @if ($data['dealerFinished'] === false)
                        <div class="bg-gray-800 border-2 border-gray-600 rounded-lg p-4 sm:p-6 w-16 sm:w-20 h-20 sm:h-24 flex items-center justify-center">
                            <span class="text-2xl sm:text-3xl text-gray-600">?</span>
                        </div>
                    @else
                        @for ($j = 1; $j < count($data['dealerCards']); $j++)
                            <div class="bg-gray-800 border-2 border-amber-400 rounded-lg p-4 sm:p-6 w-16 sm:w-20 h-20 sm:h-24 flex items-center justify-center">
                                <span class="text-2xl sm:text-3xl font-bold text-white">{{ $data['dealerCards'][$j] }}</span>
                            </div>
                        @endfor
                    @endif
                </div>
                @if ($data['dealerFinished'] === true)
                    <div class="text-xl sm:text-2xl font-serif text-gray-300">
                        Total: <span class="text-amber-400 font-bold">{{ $data['dealerTotal'] }}</span>
                    </div>
                @endif
            </div>

            <!-- Player Section -->
            <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-lg shadow-2xl p-4 sm:p-8 mb-4 sm:mb-6 border border-gray-700">
                <h2 class="text-2xl sm:text-3xl font-ringbearer text-amber-400 mb-4 sm:mb-6">Your Hand</h2>
                <div class="flex gap-2 sm:gap-4 mb-4 flex-wrap justify-center sm:justify-start">
                    @for ($i = 0; $i < count($data['cards']); $i++)
                        <div class="bg-gray-800 border-2 border-green-500 rounded-lg p-4 sm:p-6 w-16 sm:w-20 h-20 sm:h-24 flex items-center justify-center">
                            <span class="text-2xl sm:text-3xl font-bold text-white">{{ $data['cards'][$i] }}</span>
                        </div>
                    @endfor
                </div>
                <div class="text-xl sm:text-2xl font-serif text-gray-300 mb-4 sm:mb-6">
                    Total: <span class="text-green-400 font-bold">{{ $data['total'] }}</span>
                </div>

                @if ($data['over'] === false && $data['finished'] === false)
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                        <a href="{{ route('blackjack.hit') }}"
                            class="w-full sm:w-auto text-center px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-500 hover:to-green-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 font-serif">
                            Hit
                        </a>
                        <a href="{{ route('blackjack.stand') }}"
                            class="w-full sm:w-auto text-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-500 hover:to-red-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 font-serif">
                            Stand
                        </a>
                    </div>
                @elseif ($data['over'] === true)
                    <div class="bg-red-900/50 border border-red-600 rounded-lg p-4 text-center">
                        <p class="text-red-200 text-lg sm:text-xl font-serif">Bust! You went over 21</p>
                    </div>
                @endif
            </div>

            <!-- Game Result -->
            @if ($data['dealerFinished'] === true && $data['finished'] === true)
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-lg shadow-2xl p-6 sm:p-8 mb-4 sm:mb-6 border-2 {{ $data['dealerFailed'] === true || $data['total'] > $data['dealerTotal'] ? 'border-green-500' : 'border-red-500' }}">
                    @if ($data['dealerFailed'] === true)
                        <div class="text-center">
                            <h3 class="text-3xl sm:text-4xl font-ringbearer text-green-400 mb-3 sm:mb-4">Victory!</h3>
                            <p class="text-lg sm:text-xl text-gray-300 font-serif">Dealer busted with {{ $data['dealerTotal'] }}</p>
                        </div>
                    @else
                        <div class="text-center">
                            @if ($data['dealerTotal'] >= $data['total'])
                                <h3 class="text-3xl sm:text-4xl font-ringbearer text-red-400 mb-3 sm:mb-4">Defeat</h3>
                                <p class="text-lg sm:text-xl text-gray-300 font-serif">Dealer: {{ $data['dealerTotal'] }} vs You: {{ $data['total'] }}</p>
                            @else
                                <h3 class="text-3xl sm:text-4xl font-ringbearer text-green-400 mb-3 sm:mb-4">Victory!</h3>
                                <p class="text-lg sm:text-xl text-gray-300 font-serif">You: {{ $data['total'] }} vs Dealer: {{ $data['dealerTotal'] }}</p>
                            @endif
                        </div>
                    @endif
                </div>
            @endif

            <!-- Reset Button -->
            <div class="text-center">
                <a href="{{ route('blackjack.reset') }}"
                    class="inline-block w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-gray-700 to-gray-800 hover:from-gray-600 hover:to-gray-700 text-gray-300 font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 font-serif">
                    Reset Game
                </a>
            </div>
        @endif
    </div>
</x-casino-layout>