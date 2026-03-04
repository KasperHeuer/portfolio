<header class="flex flex-col md:flex-row justify-between items-center border-b-2 border-white">
    <div class="flex items-center mx-auto md:mx-0 md:ml-8 p-1">
        <img src="{{ asset('svg/logo.svg') }}" alt="Logo" class="h-24 md:h-36 lg:h-44 w-auto">
        {{-- <img src="{{ asset('svg/logo2.svg') }}" alt="Logo" class="h-24 md:h-36 lg:h-44 w-auto"> --}}
    </div>

    <nav aria-label="Main navigation"
        class="flex flex-col md:flex-row gap-1 mt-2 md:mt-0 text-sm md:text-xl lg:text-[2.5rem] md:justify-end md:items-center w-full md:pr-8">
        <a href="{{ url('/') }}"
            class="px-3 py-1 transition-colors hover:text-gray-300 {{ request()->is('/') ? 'border-b-2 border-red-800' : '' }} flex items-center mb-3 md:mb-0 ">
            Home
        </a>
        <a href="{{ url('/about') }}"
            class="px-3 py-1 transition-colors hover:text-gray-300 {{ request()->is('about') ? 'border-b-2 border-red-800' : '' }} flex items-center mb-3 md:mb-0 ">
            Over mij
        </a>
        <a href="{{ url('/projects') }}"
            class="px-3 py-1 transition-colors hover:text-gray-300 {{ request()->is('projects') ? 'border-b-2 border-red-800' : '' }} flex items-center mb-3 md:mb-0 ">
            Projecten
        </a>
        <a href="{{ url('/contact') }}"
            class="px-3 py-1 transition-colors hover:text-gray-300 {{ request()->is('contact') ? 'border-b-2 border-red-800' : '' }} flex items-center mb-3 md:mb-0 ">
            Contact
        </a>
    </nav>
</header>
