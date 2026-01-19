<x-layout title='Projects'>
    <div class="flex flex-col gap-10 my-5 mb-20">

        <!-- Project: GitHub -->
        <div class="flex flex-col lg:flex-row items-center justify-between
                    bg-white/10
                    p-5
                    gap-5
                    h-auto lg:h-[300px]">

            <img
                src="{{ asset('images/pngimg.com - github_PNG15.png') }}"
                alt="Github logo"
                class="bg-gray-500/50
                       flex-1
                       w-full
                       max-w-full lg:max-w-[1000px]
                       h-[200px] lg:h-full
                       object-contain"
            >

            <div class="flex-1 lg:ml-12 max-w-[600px] text-center lg:text-left">
                <a href="https://github.com/KasperHeuer"
                   target="_blank"
                   class="text-white font-serif text-[45px] block underline">
                    Github
                </a>

                <p class="text-white font-serif text-[45px]">
                    {{ collect($codetalen['github'])->flatten()->implode(', ') }}
                </p>
            </div>
        </div>

        <!-- Project: Math -->
        <div class="flex flex-col lg:flex-row items-center justify-between
                    bg-white/10
                    p-5
                    gap-5
                    h-auto lg:h-[300px]">

            <img
                src="{{ asset('images/marth.png') }}"
                alt="Math image"
                class="bg-gray-500/50
                       flex-1
                       w-full
                       max-w-full lg:max-w-[1000px]
                       h-[200px] lg:h-full
                       object-contain"
            >

            <div class="flex-1 lg:ml-12 max-w-[600px] text-center lg:text-left">
                <a href="#"
                   class="text-white font-serif text-[45px] block underline">
                   Wiskunde in code
                </a>

                <p class="text-white font-serif text-[45px]">
                    {{ collect($codetalen['math'])->flatten()->implode(', ') }}
                </p>
            </div>
        </div>

    </div>
</x-layout>
