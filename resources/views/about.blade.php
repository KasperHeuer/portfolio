<x-layout title="About me">
    <section class="bg-black min-h-screen py-12 px-8">
        <div class="max-w-[115rem] mx-auto flex flex-col gap-16">

            <div class="flex flex-col lg:flex-row items-center lg:items-start gap-16">
                <div class="flex-1 flex flex-col items-center lg:items-start gap-8">

                    <img src="{{ asset('images/ich.jpg') }}" alt="ik" class="w-64 md:w-96 rounded-xl shadow-lg">


                    <x-chapter text="Kasper Heuer" />
                    <div
                        class="space-y-6 text-white text-base md:text-lg w-full border-l-2 border-dotted border-white-800 pl-4">
                        <div>
                            <h2 class="text-lg md:text-xl font-serif text-zinc-300">Leeftijd</h2>
                            <p class="ml-2">{{ $jaren }} jaar (geboren 3 april 2007)</p>
                        </div>

                        <div>
                            <h2 class="text-lg md:text-xl font-serif text-zinc-300">Opleidingen</h2>
                            <h3 class="text-md md:text-lg font-serif">Willem van Oranje College</h3>
                            <p class="ml-2 m-1">MAVO (2019-2023)</p>
                            <h3 class="text-md md:text-lg font-serif">Yonder/ROC Tilburg</h3>
                            <p class="ml-2 m-1">MBO niveau 4 - Software Development (2023-{{ $einde }})</p>
                        </div>

                        <div>
                            <h2 class="text-lg md:text-xl font-serif text-zinc-300">Werkervaring</h2>
                            <p class="ml-2">Huishoudelijke dienst in een woonzorgcentrum (2023-2024)</p>
                        </div>
                        <div>
                            <h2 class="text-lg md:text-xl font-serif text-zinc-300">Stage-ervaring</h2>
                            <p class="ml-2"><a href="http://r2h.nl/"
                                    class="text-white underline underline-offset-4 hover:text-zinc-300 transition-colors">R2H</a>
                                (augustus 2025 - januari 2026)</p>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="flex-1 flex flex-col gap-8 text-white">
                    <x-chapter text="Meer over mij" />

                    <div
                        class="space-y-6 text-base md:text-lg leading-relaxed text-zinc-200 border-l-2 border-dotted border-white-800 pl-4">
                        <p>
                            Ik ben geboren op 3 april 2007 in Tilburg.
                        </p>

                        <p>
                            Van jongs af aan herken ik bij mezelf de volgende eigenschappen:
                            positief, empathisch, enthousiast en vooral rustig.
                        </p>

                        <p>
                            In 2011 begon ik op basisschool De Lage Weijkens in Loon op Zand.
                            In 2019 rondde ik daar mijn basisschool af en ging ik naar het
                            Willem van Oranje College in Waalwijk.
                        </p>

                        <p>
                            Begin 2023 zat ik in mijn laatste jaar van de MAVO op het Willem.
                            Toen stond ik voor de keuze: ga ik voor het MBO of voor de HAVO?
                            Tijdens een open dag van het Koning Willem I College kreeg ik uitleg over
                            de opleiding Webdevelopment. Vanaf dat moment wist ik zeker dat ik
                            die richting op wilde.
                        </p>

                        <p>
                            Nadat ik mijn MAVO-examens had gehaald, ben ik doorgestroomd naar
                            de opleiding Webdevelopment op ROC Tilburg.
                        </p>

                        <p>
                            Aan het begin van mijn tweede schooljaar werd ik benaderd door een kennis
                            die een nieuwe website nodig had. Ik maakte het ontwerp in Figma en
                            werk nog steeds aan de uitwerking in HTML, CSS en PHP.
                        </p>
                    </div>
                    <x-chapter text="Hobby's" />
                    <div
                        class="space-y-6 text-white text-base md:text-lg border-l-2 border-dotted border-white-800 pl-4">

                        <div class="space-y-1">
                            <h2 class="text-lg md:text-xl font-serif text-zinc-300">Reddingszwemmen</h2>
                            <p class="ml-2 leading-relaxed">
                                Ik zwem al sinds ik een peuter was. Toen ik in mijn dorp alle diploma's
                                had behaald, ben ik op zoek gegaan naar mogelijkheden om verder te gaan met zwemmen.
                                Waardoor zit ik sinds circa 2019 bij Reddingsbrigade Tilburg.
                            </p>
                        </div>

                        <div class="space-y-1">
                            <h2 class="text-lg md:text-xl font-serif text-zinc-300">Scouting</h2>
                            <p class="ml-2  leading-relaxed">
                                Sinds circa 2016 ben ik actief bij Scouting Pastoor Simons Groep in
                                mijn dorp. Waar ik nog steeds lid van ben.
                            </p>
                        </div>

                        <div class="space-y-1">
                            <h2 class="text-lg md:text-xl font-serif text-zinc-300">Gaming</h2>
                            <p class="ml-2 leading-relaxed">
                                Natuurlijk game ik ook graag. Mijn voorkeur gaat vooral uit naar
                                singleplayer games en dan met name strategy-, sandbox- en puzzle games. Een aantal van
                                mijn favoriete
                                games zijn
                                <a href="https://store.steampowered.com/app/1142710/Total_War_WARHAMMER_III/"
                                    class="text-white underline underline-offset-4 hover:text-zinc-300 transition-colors"
                                    target="_blank">Total War: Warhammer 3</a>,
                                <a href="https://www.minecraft.net"
                                    class="text-white underline underline-offset-4 hover:text-zinc-300 transition-colors"
                                    target="_blank">Minecraft</a>
                                en
                                <a href="https://store.steampowered.com/app/1659040/HITMAN_World_of_Assassination/"
                                    target="_blank"
                                    class="text-white underline underline-offset-4 hover:text-zinc-300 transition-colors">Hitman:
                                    World of Assassination</a>.
                            </p>
                        </div>

                        <div class="space-y-1">
                            <h2 class="text-lg md:text-xl font-serif text-zinc-300">Programmeren</h2>
                            <p class="ml-2 leading-relaxed">
                                Natuurlijk ik programmeer ook graag. Mijn voorkeur ligt bij backend development,
                                vooral met Laravel (deze portfolio is daar ook mee gebouwd). Als ik
                                een project heb waaar ik trots op ben, plaats ik het dan op de
                                <a href="{{ route('projects') }}"
                                    class="text-white underline underline-offset-4 hover:text-zinc-300 transition-colors">projecten</a>
                                pagina.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-12 mt-10">
            <div class="flex justify-center">
                <x-chapter text="Programmeertalen" triangle="false" />
            </div>

            <div
                class="flex flex-col lg:flex-row gap-8 lg:gap-0 divide-y-2 lg:divide-y-0 lg:divide-x-2 divide-dotted divide-zinc-700">

                <!-- FRONT-END -->
                <div class="flex-1 flex flex-col gap-6 lg:pr-16 pb-8 lg:pb-0">
                    <h3 class="text-lg md:text-xl font-serif text-zinc-300">
                        Front-end
                    </h3>

                    <div class="flex items-center gap-6">
                        <p class="text-zinc-200 w-28 text-base md:text-lg">HTML</p>
                        <div class="flex-1">
                            <x-bar skill="6" />
                        </div>
                    </div>

                    <div class="flex items-center gap-6">
                        <p class="text-zinc-200 w-28 text-base md:text-lg">CSS</p>
                        <div class="flex-1">
                            <x-bar skill="4" />
                        </div>
                    </div>

                    <div class="flex items-center gap-6">
                        <p class="text-zinc-200 w-28 text-base md:text-lg">JavaScript</p>
                        <div class="flex-1">
                            <x-bar skill="1" />
                        </div>
                    </div>
                </div>

                <!-- BACK-END -->
                <div class="flex-1 flex flex-col gap-6 lg:pl-16 pt-8 lg:pt-0">
                    <h3 class="text-lg md:text-xl font-serif text-zinc-300">
                        Back-end
                    </h3>

                    <div class="flex items-center gap-6">
                        <p class="text-zinc-200 w-28 text-base md:text-lg">PHP</p>
                        <div class="flex-1">
                            <x-bar skill="6" />
                        </div>
                    </div>

                    <div class="flex items-center gap-6">
                        <p class="text-zinc-200 w-28 text-base md:text-lg">MySQL</p>
                        <div class="flex-1">
                            <x-bar skill="6" />
                        </div>
                    </div>

                    <div class="flex items-center gap-6">
                        <p class="text-zinc-200 w-28 text-base md:text-lg">Laravel</p>
                        <div class="flex-1">
                            <x-bar skill="7" />
                        </div>
                    </div>
                </div>

            </div>
        </div>

        </div>
    </section>
</x-layout>
