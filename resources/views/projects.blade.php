<x-layout title="Projects">
    <section class="bg-black min-h-screen py-12 px-8">
        <div class="max-w-[115rem] mx-auto flex flex-col gap-16">

            <!-- Page Title -->
            <div class="flex justify-center">
                <x-chapter text="Mijn projecten" triangle="false" class="text-5xl md:text-5xl" />
            </div>

            <!-- Projects Grid -->
            <div class="flex flex-col gap-12">

                <!-- Project: GitHub -->
                <div
                    class="flex flex-col lg:flex-row items-center gap-8 bg-white/5 rounded-xl p-8 hover:bg-white/10 transition-all duration-300">

                    <div
                        class="flex-1 flex items-center justify-center bg-gray-500/20 rounded-lg p-8 h-[250px] lg:h-[300px]">
                        <img src="{{ asset('images/pngimg.com - github_PNG15.png') }}" alt="Github logo"
                            class="max-w-full max-h-full object-contain">
                    </div>

                    <div class="flex-1 flex flex-col gap-4">
                        <a href="https://github.com/KasperHeuer" target="_blank"
                            class="text-white text-3xl font-ringbearer md:text-4xl hover:text-red-800 transition-colors duration-300 underline decoration-2 underline-offset-4">
                            Github
                        </a>

                        <p class="text-zinc-300 text-lg md:text-xl leading-relaxed">
                            Bekijk mijn GitHub-profiel voor een overzicht van alle projecten waaraan ik heb gewerkt.
                        </p>

                        <div class="flex flex-wrap gap-2 mt-2">
                            @foreach (collect($github)->flatten() as $taal)
                                <span
                                    class="bg-red-800/20 text-red-300 px-4 py-2 rounded-full text-sm border border-red-800/30">
                                    {{ $taal }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Project: Tolkien -->
                <div
                    class="flex flex-col lg:flex-row-reverse items-center gap-8 bg-white/5 rounded-xl p-8 hover:bg-white/10 transition-all duration-300">

                    <div
                        class="flex-1 flex items-center justify-center bg-gray-500/20 rounded-lg p-8 h-[250px] lg:h-[300px]">
                        <img src="{{ asset('images/tolkien.png') }}" alt="Tolkien logo"
                            class="max-w-full max-h-full object-contain">
                    </div>

                    <div class="flex-1 flex flex-col gap-4">
                        <a href="{{ route('tolkien.home') }}"
                            class="text-white text-3xl font-ringbearer md:text-4xl hover:text-red-800 transition-colors duration-300 underline decoration-2 underline-offset-4">
                            Tolkien
                        </a>

                        <p class="text-zinc-300 text-lg md:text-xl leading-relaxed">
                            Een interactieve webapplicatie geïnspireerd op de werken van J.R.R. Tolkien, met  informatie over de lore uit Middle-earth.
                        </p>

                        <div class="flex flex-wrap gap-2 mt-2">
                            @foreach (collect($tolkien)->flatten() as $taal)
                                <span
                                    class="bg-red-800/20 text-red-300 px-4 py-2 rounded-full text-sm border border-red-800/30">
                                    {{ $taal }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Project: Math -->
                <div
                    class="flex flex-col lg:flex-row items-center gap-8 bg-white/5 rounded-xl p-8 hover:bg-white/10 transition-all duration-300">

                    <div
                        class="flex-1 flex items-center justify-center bg-gray-500/20 rounded-lg p-8 h-[250px] lg:h-[300px]">
                        <img src="{{ asset('images/marth.png') }}" alt="Math project"
                            class="max-w-full max-h-full object-contain">
                    </div>

                    <div class="flex-1 flex flex-col gap-4">
                        <a href="{{ url('/math/home') }}"
                            class="text-white text-3xl font-ringbearer md:text-4xl hover:text-red-800 transition-colors duration-300 underline decoration-2 underline-offset-4">
                            Wiskunde in code
                        </a>

                        <p class="text-zinc-300 text-lg md:text-xl leading-relaxed">
                            Een interactieve webapplicatie voor wiskundige berekeningen en visualisaties.
                        </p>

                        <div class="flex flex-wrap gap-2 mt-2">
                            @foreach (collect($casino)->flatten() as $taal)
                                <span
                                    class="bg-red-800/20 text-red-300 px-4 py-2 rounded-full text-sm border border-red-800/30">
                                    {{ $taal }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>



                <!-- Project: Casino/Blackjack -->
                <div
                    class="flex flex-col lg:flex-row-reverse items-center gap-8 bg-white/5 rounded-xl p-8 hover:bg-white/10 transition-all duration-300">

                    <div
                        class="flex-1 flex items-center justify-center bg-gray-500/20 rounded-lg p-8 h-[250px] lg:h-[300px]">
                        <img src="{{ asset('images/blackjack.jpg') }}" alt="Casino project"
                            class="max-w-full max-h-full object-contain rounded-lg">
                    </div>

                    <div class="flex-1 flex flex-col gap-4">
                        <a href="{{ url('/casino/home') }}"
                            class="text-white text-3xl font-ringbearer md:text-4xl hover:text-red-800 transition-colors duration-300 underline decoration-2 underline-offset-4">
                            Casino in code
                        </a>

                        <p class="text-zinc-300 text-lg md:text-xl leading-relaxed">
                            Een verzameling casino-spellen gebouwd met PHP en JavaScript, inclusief Blackjack.
                        </p>

                        <div class="flex flex-wrap gap-2 mt-2">
                            @foreach (collect($math)->flatten() as $taal)
                                <span
                                    class="bg-red-800/20 text-red-300 px-4 py-2 rounded-full text-sm border border-red-800/30">
                                    {{ $taal }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</x-layout>
