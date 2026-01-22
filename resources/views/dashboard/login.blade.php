<x-layout>
    <div class="flex items-center justify-center py-20 px-4">
        <div class="w-full max-w-md">
            <!-- Card Container -->
            <div class="bg-gradient-to-br from-gray-900 via-gray-800 to-black border border-gray-700 rounded-2xl shadow-2xl p-8 sm:p-10">

                <!-- Header -->
                <div class="text-center mb-8">
                  <x-dashboard-header text='Enter'/>
                    <p class="text-gray-400 text-sm">Access the dashboard</p>
                    <div class="mt-4 flex justify-center gap-2">
                        <div class="h-px w-16 bg-gradient-to-r from-transparent via-amber-600 to-transparent"></div>
                    </div>
                </div>

                <!-- Display Validation Errors -->
                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-500/20 text-red-700 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('dashboardLogin.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Username Field -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-300 mb-2">
                            Username
                        </label>
                        <input type="text" id="username" name="username"
                            value="{{ old('username') }}"
                            class="w-full bg-black/50 border border-gray-600 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300"
                            placeholder="Enter your username" required />
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                            Password
                        </label>
                        <input type="password" id="password" name="password"
                            class="w-full bg-black/50 border border-gray-600 rounded-lg px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300"
                            placeholder="Enter your password" required />
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-amber-600 to-amber-500 hover:from-amber-500 hover:to-amber-400 text-black font-bold py-3 px-6 rounded-lg shadow-lg hover:shadow-amber-500/50 transform hover:scale-[1.02] transition-all duration-300 mt-8">
                        Enter Dashboard
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
