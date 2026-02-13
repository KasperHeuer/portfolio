<x-layout>
    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto space-y-8">

            <!-- Header -->
            <div class="text-center mb-12">
                <x-dashboard-header text="Dashboard" />
                <div class="mt-4 flex justify-center gap-2">
                    <div class="h-px w-16 bg-gradient-to-r from-transparent via-amber-600 to-transparent"></div>
                </div>
            </div>

            <!-- Contact Attempts Section -->
            <div
                class="bg-gradient-to-br from-gray-900 via-gray-800 to-black border border-gray-700 rounded-2xl shadow-2xl p-6 sm:p-8">
                <x-dashboard-header text="Contact attempts" />
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Name</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Email</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Note</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['contactAttempts'] as $contact)
                                <tr class="border-b border-gray-800 hover:bg-black/30 transition-colors duration-200">
                                    <td class="py-3 px-4 text-gray-200">{{ $contact->name }}</td>
                                    <td class="py-3 px-4 text-gray-200">{{ $contact->email }}</td>
                                    <td class="py-3 px-4 text-gray-200">{{ $contact->note }}</td>
                                    <td class="py-3 px-4 text-gray-200">{{ $contact->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $data['contactAttempts']->links() }}
                </div>
            </div>

            <!-- Jobs Section -->
            <div
                class="bg-gradient-to-br from-gray-900 via-gray-800 to-black border border-gray-700 rounded-2xl shadow-2xl p-6 sm:p-8">
                <x-dashboard-header text="Jobs" />
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Name</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['jobs'] as $job)
                                <tr class="border-b border-gray-800 hover:bg-black/30 transition-colors duration-200">
                                    <td class="py-3 px-4 text-gray-200">{{ $job->Name }}</td>
                                    <td class="py-3 px-4 text-gray-200">{{ $job->Amount }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Job Tests Section -->
            <div
                class="bg-gradient-to-br from-gray-900 via-gray-800 to-black border border-gray-700 rounded-2xl shadow-2xl p-6 sm:p-8">
                <x-dashboard-header text="Job Tests Status" />
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Collatz</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Exponent</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Factorial</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Fibonacci</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Perfect Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-800 hover:bg-black/30 transition-colors duration-200">
                                @foreach (['collatzSuccessful', 'exponentSuccessful', 'factorialSuccessful', 'fibonacciSuccessful', 'perfectNumberSuccessful'] as $key)
                                    <td class="py-3 px-4">
                                        <span
                                            class="px-3 py-1 rounded-full text-sm font-medium
                                            {{ $data['jobTests'][$key] ?? false ? 'bg-green-900/50 text-green-300' : 'bg-red-900/50 text-red-300' }}">
                                            {{ $data['jobTests'][$key] ?? false ? 'Successful' : 'Failed' }}
                                        </span>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pages Section -->
            <div
                class="bg-gradient-to-br from-gray-900 via-gray-800 to-black border border-gray-700 rounded-2xl shadow-2xl p-6 sm:p-8">
                <x-dashboard-header text="Page Views" />
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Link</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Page Name</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">View Count</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Last Seen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['pages'] as $page)
                                <tr class="border-b border-gray-800 hover:bg-black/30 transition-colors duration-200">
                                    <td class="py-3 px-4">
                                        <a href="{{ url($page->name) }}" target="_blank"
                                            class="text-amber-400 hover:text-amber-300 underline transition-colors duration-200">
                                            {{ url($page->name) }}
                                        </a>
                                    </td>
                                    <td class="py-3 px-4 text-gray-200">{{ $page->name }}</td>
                                    <td class="py-3 px-4 text-gray-200">{{ $page->amount }}</td>
                                    <td class="py-3 px-4 text-gray-200">{{ $page->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Casino Section -->
            <div
                class="bg-gradient-to-br from-gray-900 via-gray-800 to-black border border-gray-700 rounded-2xl shadow-2xl p-6 sm:p-8">
                <x-dashboard-header text="Casino Wins" />
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Casino Game Name</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Amount Played</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Amount Won</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Last Played</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['casinoGames'] as $casinoGame)
                                <tr class="border-b border-gray-800 hover:bg-black/30 transition-colors duration-200">
                                    <td class="py-3 px-4 text-gray-200">{{ $casinoGame->casino_game }}</td>
                                    <td class="py-3 px-4 text-gray-200">{{ $casinoGame->amount_played }}</td>
                                    <td class="py-3 px-4 text-gray-200">{{ $casinoGame->amount_won }}</td>
                                    <td class="py-3 px-4 text-gray-200">{{ $casinoGame->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-layout>
