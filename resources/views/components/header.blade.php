
<header class="flex flex-col md:flex-row justify-between items-center border-b-2 border-white">
    <!-- Logo container -->
    <div class="flex items-center mx-auto md:mx-0 md:ml-6">

        {{-- Logo 2 — square (800×810) | Animation: gentle float + red glow pulse --}}
        <img src="{{ asset('svg/logo2.svg') }}" alt="Logo 2"
             class="h-32 md:h-48 w-auto object-contain logo2">

        {{-- Logo 3 — landscape (1105×1019) | Animation: slow breathing scale + shimmer --}}
        <img src="{{ asset('svg/logo31.svg') }}" alt="Logo 3"
             class="h-48 md:h-56 w-auto object-contain logo31">

        {{-- Logo 4 — portrait (1059×1134) | Animation: spin --}}
        <img src="{{ asset('svg/logo4.svg') }}" alt="Logo 4"
             class="h-32 md:h-48 w-auto object-contain logo4">
    </div>

    <nav aria-label="Main navigation"
        class="flex flex-col md:flex-row gap-2 md:gap-8 mt-4 md:mt-0 text-xl md:text-5xl md:justify-end md:items-center w-full">
        <a href="{{ url('/') }}"
            class="inline-block  px-2 transition-colors hover:text-gray-300 {{ request()->is('/') ? 'border-b-2 border-red-800' : '' }}">
            Home
        </a>
        <a href="{{ url('/about') }}"
            class="inline-block  px-2 transition-colors hover:text-gray-300 {{ request()->is('about') ? 'border-b-2 border-red-800' : '' }}">
            Over mij
        </a>
        <a href="{{ url('/projects') }}"
            class="inline-block  px-2 transition-colors hover:text-gray-300 {{ request()->is('projects') ? 'border-b-2 border-red-800' : '' }}">
            Projecten
        </a>
        <a href="{{ url('/contact') }}"
            class="inline-block  px-2 transition-colors hover:text-gray-300 {{ request()->is('contact') ? 'border-b-2 border-red-800' : '' }}">
            Contact
        </a>
    </nav>

</header>