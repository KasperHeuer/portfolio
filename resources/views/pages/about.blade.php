<x-layout title="About Me">

    @if(session('bericht'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('bericht') }}
        </div>
    @endif

    <section class="flex flex-col md:flex-row items-center bg-[#1B1B1B] gap-4 md:gap-10 py-10">
        <img src="{{ asset('images/ich.jpg') }}" alt="ik" class="rounded-full w-72 md:w-80">
        <div class="text-center md:text-left mt-6 md:mt-0">
            <h1 class="text-4xl md:text-5xl font-serif mb-2">Hallo ik ben Kasper Heuer</h1>
            <p class="text-2xl md:text-3xl mb-4">Vertrouwd met HTML, CSS, PHP en MySQL</p>
            <a href="{{ url('/contact') }}" class="bg-red-800 hover:bg-red-700 transition transform hover:scale-105 px-6 py-3 rounded-full text-xl md:text-2xl inline-block">Neem contact op</a>
        </div>
    </section>

    <!-- Contact links -->
    <div class="flex flex-col md:flex-row gap-4 mt-10">
        <div class="contact flex items-center gap-2">
            <img src="{{ asset('images/LI-In-Bug.png') }}" class="contactImg" alt="LinkedIn logo">
            <a href="https://www.linkedin.com/notifications/?filter=all" target="_blank" class="contactText text">LinkedIn</a>
        </div>
        <div class="contact flex items-center gap-2">
            <img src="{{ asset('images/email.png') }}" class="contactImg" alt="Email logo">
            <p class="contactText text cursor-pointer" id="emailText">kasperheuer209@gmail.com</p>
        </div>
    </div>

    <!-- Contact form -->
    <div class="contactFormContainer hidden mt-6">
        <form id="contactForm" class="contact-form flex flex-col gap-4" action="{{ route('contact.send') }}" method="POST">
            @csrf
            <label for="name" class="form-label text">Naam</label>
            <input type="text" id="name" class="form-input" name="naam" required>

            <label for="from" class="form-label text">Email</label>
            <input type="email" id="from" class="form-input" name="from" required>

            <label for="message" class="form-label text">Notitie</label>
            <textarea id="message" class="form-input" name="note" rows="5" required></textarea>

            <input type="submit" value="Verstuur" class="form-submit form-input text bg-red-800 hover:bg-red-700 px-4 py-2 rounded-full cursor-pointer">
        </form>
    </div>

    <script>
        document.getElementById("emailText").addEventListener("click", function() {
            let formContainer = document.querySelector(".contactFormContainer");
            formContainer.classList.toggle("hidden");
        });
    </script>

</x-layout>
