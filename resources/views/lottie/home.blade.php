<x-layout title="Lottie">
    <section class="mx-auto w-full max-w-5xl px-4 py-10">
        <div class="mx-auto w-full max-w-xl rounded-xl border border-gray-700 bg-gray-900 p-4 shadow-lg">
            <div class="flex justify-center">
                <dotlottie-wc src="{{ secure_asset('lottie/Confetti.json') }}" style="width: 300px; height: 300px" autoplay
                    loop></dotlottie-wc>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.9.3/dist/dotlottie-wc.js" type="module"></script>
</x-layout>
