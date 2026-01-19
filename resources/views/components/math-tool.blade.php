@props(['name'])

<div
    class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden w-full max-w-6xl mx-auto mt-10 flex flex-col">
    
    {{-- Title with gradient underline --}}
    <div class="p-10 sm:p-12 pb-8">
        <div class="inline-block w-full">
            <h3 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-900 mb-3">
                {{ $name }}
            </h3>
            <div class="h-1 w-full bg-gradient-to-r from-blue-500 to-purple-600 rounded-full"></div>
        </div>
    </div>

    {{-- Content slot --}}
    <div class="px-10 sm:px-12 pb-10 text-gray-700 w-full">
        {{ $slot }}
    </div>

    {{-- Footer link --}}
    <div class="px-10 sm:px-12 pb-10 pt-4 border-t border-gray-100">
        <a href="{{ route('math') }}"
            class="inline-flex items-center text-base font-medium text-gray-500 hover:text-blue-600 transition-colors duration-300 group">
            <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform duration-300"></i>
            Back to Math Tools
        </a>
    </div>
</div>
