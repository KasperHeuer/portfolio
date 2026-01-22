@php
    $contactAttempt = app(\App\Http\Controllers\DashboardController::class)->getContact();
    $jobs = app(\App\Http\Controllers\DashboardController::class)->getJobAmount();
    $pages = app(\App\Http\Controllers\DashboardController::class)->getPageAmount();
@endphp

<x-layout>
    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto space-y-8">

            <!-- Header -->
            <div class="text-center mb-12">
                <x-dashboard-header text='Dashboard' />
                <div class="mt-4 flex justify-center gap-2">
                    <div class="h-px w-16 bg-gradient-to-r from-transparent via-amber-600 to-transparent"></div>
                </div>
            </div>

            <!-- Contact Attempts Section -->
            <div
                class="bg-gradient-to-br from-gray-900 via-gray-800 to-black border border-gray-700 rounded-2xl shadow-2xl p-6 sm:p-8">
                <x-dashboard-header text='Contact attempts' />
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
                            @foreach ($contactAttempt as $contact)
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
                    {{ $contactAttempt->links() }}
                </div>
            </div>

            <!-- Jobs Section -->
            <div
                class="bg-gradient-to-br from-gray-900 via-gray-800 to-black border border-gray-700 rounded-2xl shadow-2xl p-6 sm:p-8">
                <x-dashboard-header text='Jobs' />
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Name</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr class="border-b border-gray-800 hover:bg-black/30 transition-colors duration-200">
                                    <td class="py-3 px-4 text-gray-200">{{ $job->Name }}</td>
                                    <td class="py-3 px-4 text-gray-200">{{ $job->Amount }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pages Section -->
            <div
                class="bg-gradient-to-br from-gray-900 via-gray-800 to-black border border-gray-700 rounded-2xl shadow-2xl p-6 sm:p-8">
                <x-dashboard-header text='Page Views' />
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-700">
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Link</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">Page Name</th>
                                <th class="text-left py-3 px-4 text-gray-300 font-medium">View Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                                <tr class="border-b border-gray-800 hover:bg-black/30 transition-colors duration-200">
                                    <td class="py-3 px-4">
                                        <a href="{{ url($page->name) }}" target="_blank"
                                            class="text-amber-400 hover:text-amber-300 underline transition-colors duration-200">
                                            {{ url($page->name) }}
                                        </a>
                                    </td>
                                    <td class="py-3 px-4 text-gray-200">{{ $page->name }}</td>
                                    <td class="py-3 px-4 text-gray-200">{{ $page->amount }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-layout>
