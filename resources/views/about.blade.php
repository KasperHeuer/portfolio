<x-layout>
    <section class="bg-black p-5 min-h-screen flex flex-col gap-8">
        <div class="flex flex-col lg:flex-row flex-1 gap-8">
            <div class="flex-1 flex flex-col items-start gap-4">
                <img src="{{ asset('images/ich.jpg') }}" alt="ik" class="w-64 md:w-96 rounded-lg shadow-lg">
                <x-chapter text="Kasper Heuer" />

                <div class="space-y-4 text-white text-base md:text-lg">
                    <div>
                        <h2 class="text-xl md:text-2xl font-serif">Leeftijd</h2>
                        <p class="ml-2">{{ $aboutInfo[0] }} jaar</p>
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-serif">Opleidingen</h2>
                        <p class="ml-2">Mavo (2019-2023)</p>
                        <p class="ml-2">MBO niveau 4 - Software development (2023-{{ $aboutInfo[1] }})</p>
                    </div>
                    <div>
                        <h2 class="text-xl md:text-2xl font-serif">Werkervaring</h2>
                        <p class="ml-2">Huishoudelijke dienst woonzorgcentrum (2023-2024)</p>
                    </div>
                </div>
            </div>

            <div class="flex-1 flex flex-col gap-4">
                <x-chapter text="Meer over mij" />
                <p class="text-white text-base md:text-lg leading-relaxed">
                    Ik ben geboren op 3 april 2007 in Tilburg.<br><br>
                    Van jongs af aan herken ik mezelf in de volgende karaktereigenschappen: positief, inlevend,
                    enthousiast en vooral rustig.<br><br>
                    In 2011 ben ik begonnen op de basisschool De Lage Weijkens in Loon op Zand. In 2019 heb ik deze
                    afgerond en ben ik naar het Willem van Oranje College in Waalwijk gegaan.<br><br>
                    Begin 2023 zat ik in mijn laatste jaar van de MAVO op het Willem, en toen stond ik voor een keuze:
                    ga ik voor het MBO of voor de HAVO? Toen ik naar een MBO-opleiding ging kijken, kreeg ik uitleg van
                    een medewerker van, toen nog, ROC Tilburg over de Webdevelopment-opleiding die de school
                    aanbiedt.<br>
                    Sinds die dag wist ik zeker dat ik die opleiding wilde volgen.<br><br>
                    Nadat ik mijn MAVO-examens had gehaald, ben ik doorgestroomd naar de Webdevelopment-opleiding op ROC
                    Tilburg.<br><br>
                    In het begin van het tweede schooljaar werd ik benaderd door een kennis die een nieuwe website nodig
                    had. Ik heb het ontwerp gemaakt met Figma, en ik ben nog steeds bezig met het schrijven van de code
                    met behulp van HTML, CSS en PHP.
                </p>
            </div>
        </div>

        <div class="flex justify-center mb-8">
            <x-chapter text="Code talen" triangle="false" />
        </div>

        <div class="flex flex-col lg:flex-row flex-1 gap-8 mt-0">
            <div class="flex-1 flex flex-col gap-4">
                <h3 class="text-white text-2xl font-serif mb-2">Front-end</h3>
                <div>
                    <p class="text-white">HTML</p>
                    <x-bar skill="6" />
                </div>
                <div>
                    <p class="text-white">CSS</p>
                    <x-bar skill="5" />
                </div>
                <div>
                    <p class="text-white">Javascript</p>
                    <x-bar skill="1" />
                </div>
            </div>

            <div class="flex-1 flex flex-col gap-4">
                <h3 class="text-white text-2xl font-serif mb-2">Back-end</h3>
                <div>
                    <p class="text-white">PHP</p>
                    <x-bar skill="6" />
                </div>
                <div>
                    <p class="text-white">MYSQL</p>
                    <x-bar skill="7" />
                </div>
                <div>
                    <p class="text-white">Laravel</p>
                    <x-bar skill="6" />
                </div>
            </div>
        </div>

    </section>
</x-layout>
