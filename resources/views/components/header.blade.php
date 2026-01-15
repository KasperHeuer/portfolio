<header class="flex flex-col md:flex-row justify-between items-center border-b-2 border-white p-5 md:min-h-[220px] ">
    <div class="relative md:absolute top-5 md:ml-4 w-[300px]">
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

    <nav
        class="flex flex-col md:flex-row gap-2 md:gap-5 mt-4 md:mt-0 text-2xl md:text-5xl md:justify-end md:items-center w-full">
        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'border-b-2 border-red-800' : '' }}">
            Home
        </a>

        <a href="{{ url('/about') }}" class="{{ request()->is('about') ? 'border-b-2 border-red-800' : '' }}">
            Over mij
        </a>

        <a href="{{ url('/projects') }}" class=" {{ request()->is('projects') ? 'border-b-2 border-red-800' : '' }}">
            Projecten
        </a>

        <a href="{{ url('/contact') }}" class=" {{ request()->is('contact') ? 'border-b-2 border-red-800' : '' }}">
            Contact
        </a>
    </nav>

</header>

<style>
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
        position: absolute;
        top: 20px;
        width: 300px;
        height: auto;
        stroke: silver;
        stroke-width: 41px;
        fill: none;
        height: auto;
        margin-left: 1vw;
        position: absolute;
    }
</style>
