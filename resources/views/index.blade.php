<?php
$schoolEinde = mktime(0, 0, 0, 6, 28, 2027);
$huidig = time();
$einde = $schoolEinde <= $huidig ? '2027' : 'heden';
?>

<x-layout title="Home">
    <section class="w-full flex flex-col md:flex-row items-center bg-[#1B1B1B] gap-4 md:gap-10 py-10 px-4 md:px-16">

        <img src="{{ asset('images/ich.jpg') }}" alt="ik" class="rounded-full w-72 md:w-80 ml-10">
        <div class="text-center md:text-left mt-6 md:mt-0">
            <h1 class="text-4xl md:text-5xl font-serif mb-2">Hallo ik ben Kasper Heuer</h1>
            <p class="text-2xl md:text-3xl mb-4">Vertrouwd met HTML, CSS, PHP en MySQL</p>
            <a href="{{ url('/contact') }}"
                class="bg-red-800 hover:bg-red-700 transition transform hover:scale-105 px-6 py-3 rounded-full text-xl md:text-2xl inline-block">Neem
                contact op</a>
        </div>
    </section>

    <section class="flex flex-col md:flex-row gap-10 mt-16">
        <!-- Talen -->
        <div class="bg-[#1B1B1B] w-full md:w-1/2 p-4">
            <h2 class="text-3xl md:text-4xl mb-4">Talen</h2>

            <div class="flex items-start gap-2">
                <x-triangle />
                <p class="text-xl mb-1">Nederlands</p>
                <x-bar skill='7' />
            </div>

            <div class="flex items-start gap-2">
                <x-triangle />
                <p class="text-xl mb-1">Engels</p>
                <x-bar skill='8' />
            </div>
        </div>

        <div class="bg-[#1B1B1B] w-full md:w-1/2 p-4">
            <h2 class="text-3xl md:text-4xl mb-4">Opleiding(en)</h2>

            <div class="space-y-4">
                <div class="flex items-start gap-2">
                    <x-triangle class="mt-1" />
                    <div>
                        <h3 class="text-2xl font-semibold">Willem van Oranje College</h3>
                        <p>Mavo (2019-2023)</p>
                    </div>
                </div>

                <!-- Second education item -->
                <div class="flex items-start gap-2">
                    <x-triangle class="mt-1" />
                    <div>
                        <h3 class="text-2xl font-semibold">ROC Tilburg/Yonder</h3>
                        <p>MBO Niveau 4, Software Development (2023-<?php echo $einde; ?>)</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

</x-layout>
