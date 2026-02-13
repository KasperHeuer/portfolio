<x-layout title="About me">
    <section class="bg-black min-h-screen py-12 px-8">
        <div class="max-w-[115rem] mx-auto flex flex-col gap-16">

            <!-- TOP SECTION -->
            <div class="flex flex-col lg:flex-row items-center lg:items-start gap-16">

                <!-- LEFT COLUMN -->
                <div class="flex-1 flex flex-col items-center lg:items-start gap-8">
                    
                    <img src="{{ asset('images/ich.jpg') }}"
                         alt="ik"
                         class="w-64 md:w-96 rounded-xl shadow-lg">

                    <!-- Restored Chapter (with triangle) -->
                    <x-chapter text="Kasper Heuer" />

                    <div class="space-y-6 text-white text-base md:text-lg w-full">
                        <div>
                            <h2 class="text-lg md:text-xl font-serif text-zinc-300">Leeftijd</h2>
                            <p class="ml-2">{{ $jaren }} jaar</p>
                        </div>

                        <div>
                            <h2 class="text-lg md:text-xl font-serif text-zinc-300">Opleidingen</h2>
                            <p class="ml-2">Mavo (2019-2023)</p>
                            <p class="ml-2">MBO niveau 4 - Software development (2023-{{ $einde }})</p>
                        </div>

                        <div>
                            <h2 class="text-lg md:text-xl font-serif text-zinc-300">Werkervaring</h2>
                            <p class="ml-2">Huishoudelijke dienst woonzorgcentrum (2023-2024)</p>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN -->
                <div class="flex-1 flex flex-col gap-8 text-white">
                    
                    <!-- Restored Chapter -->
                    <x-chapter text="Meer over mij" />

                    <div class="space-y-6 text-base md:text-lg leading-relaxed text-zinc-200">
                        <p>
                            Ik ben geboren op 3 april 2007 in Tilburg.
                        </p>

                        <p>
                            Van jongs af aan herken ik mezelf in de volgende karaktereigenschappen:
                            positief, inlevend, enthousiast en vooral rustig.
                        </p>

                        <p>
                            In 2011 ben ik begonnen op de basisschool De Lage Weijkens in Loon op Zand.
                            In 2019 heb ik deze afgerond en ben ik naar het Willem van Oranje College in Waalwijk gegaan.
                        </p>

                        <p>
                            Begin 2023 zat ik in mijn laatste jaar van de MAVO op het Willem,
                            en toen stond ik voor een keuze: ga ik voor het MBO of voor de HAVO?
                            Toen ik naar een MBO-opleiding ging kijken, kreeg ik uitleg van een medewerker
                            van Koning Willem I College over de Webdevelopment-opleiding die de school aanbiedt.
                            Sinds die dag wist ik zeker dat ik die opleiding wilde volgen.
                        </p>

                        <p>
                            Nadat ik mijn MAVO-examens had gehaald, ben ik doorgestroomd naar de
                            Webdevelopment-opleiding op ROC Tilburg.
                        </p>

                        <p>
                            In het begin van het tweede schooljaar werd ik benaderd door een kennis
                            die een nieuwe website nodig had. Ik heb het ontwerp gemaakt met Figma,
                            en ik ben nog steeds bezig met het schrijven van de code met behulp van
                            HTML, CSS en PHP.
                        </p>
                    </div>
                </div>
            </div>

            <!-- SKILLS SECTION -->
            <div class="flex flex-col gap-12">

                <!-- Restored Chapter with no triangle -->
                <div class="flex justify-center">
                    <x-chapter text="Code talen" triangle="false" />
                </div>

                <div class="flex flex-col lg:flex-row gap-16">

                    <!-- FRONTEND -->
                    <div class="flex-1 flex flex-col gap-6">
                        <h3 class="text-xl md:text-2xl font-serif text-white">
                            Front-end
                        </h3>

                        <div class="flex items-center gap-6">
                            <p class="text-white w-28">HTML</p>
                            <div class="flex-1">
                                <x-bar skill="6" />
                            </div>
                        </div>

                        <div class="flex items-center gap-6">
                            <p class="text-white w-28">CSS</p>
                            <div class="flex-1">
                                <x-bar skill="4" />
                            </div>
                        </div>

                        <div class="flex items-center gap-6">
                            <p class="text-white w-28">Javascript</p>
                            <div class="flex-1">
                                <x-bar skill="1" />
                            </div>
                        </div>
                    </div>

                    <!-- BACKEND -->
                    <div class="flex-1 flex flex-col gap-6">
                        <h3 class="text-xl md:text-2xl font-serif text-white">
                            Back-end
                        </h3>

                        <div class="flex items-center gap-6">
                            <p class="text-white w-28">PHP</p>
                            <div class="flex-1">
                                <x-bar skill="6" />
                            </div>
                        </div>

                        <div class="flex items-center gap-6">
                            <p class="text-white w-28">MYSQL</p>
                            <div class="flex-1">
                                <x-bar skill="6" />
                            </div>
                        </div>

                        <div class="flex items-center gap-6">
                            <p class="text-white w-28">Laravel</p>
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
