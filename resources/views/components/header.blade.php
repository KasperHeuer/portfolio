<header class="flex flex-col md:flex-row justify-between items-center border-b-2 border-white p-5 md:min-h-[220px]">
    <!-- logo container — mobile: centered small, desktop: positioned larger -->
    <div class="relative w-48 md:w-[300px] mx-auto md:mx-0 md:absolute md:top-5 md:ml-4">
        <svg viewBox="0 0 550 300" preserveAspectRatio="xMidYMid meet" class="w-full h-auto stroke-silver fill-none">
            <path d="M 7.5 30 L 7.5 275" class="binnen" />
            <path d="M 7.5 150 L 75 150" class="binnen" />
            <path d="M 70 152.5 L 150 45" class="binnen" />
            <path d="M 70 152.5 L 150 275" class="binnen" />
            <path d="M 130 55 L 200 55" class="binnen" />
            <path d="M 200 35 L 200 275" class="binnen" />
            <path d="M 200 150 L 300 150" class="binnen" />
            <path d="M 300 35 L 300 275" class="binnen" />
            <path d="M 300 55 L 550 55" class="binnen" />
            <path d="M 530 55 L 530 175" class="binnen" />
            <path d="M 550 185 L 450 185" class="binnen" />
            <path d="M 450 205 L 450 125" class="binnen" />
            <path d="M 470 125 L 375 125" class="binnen" />
            <path d="M 375 105 L 375 250" class="binnen" />
            <path d="M 355 250 L 550 250" class="binnen" />
        </svg>
    </div>

    <nav aria-label="Main navigation"
         class="flex flex-col md:flex-row gap-2 md:gap-5 mt-4 md:mt-0 text-lg md:text-5xl md:justify-end md:items-center w-full">
        <a href="{{ url('/') }}"
           class="inline-block px-3 py-2 {{ request()->is('/') ? 'border-b-2 border-red-800' : '' }}">
            Home
        </a>

        <a href="{{ url('/about') }}"
           class="inline-block px-3 py-2 {{ request()->is('about') ? 'border-b-2 border-red-800' : '' }}">
            Over mij
        </a>

        <a href="{{ url('/projects') }}"
           class="inline-block px-3 py-2 {{ request()->is('projects') ? 'border-b-2 border-red-800' : '' }}">
            Projecten
        </a>

        <a href="{{ url('/contact') }}"
           class="inline-block px-3 py-2 {{ request()->is('contact') ? 'border-b-2 border-red-800' : '' }}">
            Contact
        </a>
    </nav>
</header>

<style>
    /* line animation */
    @keyframes draw {
        to {
            stroke-dashoffset: 0;
        }
    }

    .binnen {
        stroke-dasharray: 1000;
        stroke-dashoffset: 1000;
        animation: draw 4s ease forwards;
    }

    svg {
        position: static;
        width: 180px;
        height: auto;
        stroke: silver;
        stroke-width: 40px; 
        fill: none;
        display: block;
        margin: 0 auto;
    }

    /* Desktop & up: restore the original positioned large SVG */
    @media (min-width: 768px) {
        svg {
            position: absolute;
            top: 20px;
            width: 300px;
            height: auto;
            stroke-width: 41px;
            margin-left: 1vw;
        }
    }
</style>
