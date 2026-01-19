<x-layout title="Contact">

    {{-- LINKEDIN CARD --}}
    <div class="flex flex-col sm:flex-row items-center bg-white/10 p-4 sm:p-5 gap-3 sm:gap-5 my-4 sm:my-5 rounded-lg">
        <img src="{{ asset('images/LI-In-Bug.png') }}" alt="LinkedIn logo"
            class="w-24 sm:w-full max-w-[140px] sm:max-w-[250px] h-auto object-contain">

        <div
            class="hidden sm:block w-0 h-0 border-l-[20px] border-l-[#921815] border-t-[14px] border-t-transparent border-b-[14px] border-b-transparent sm:mx-4">
        </div>

        <div class="text-center sm:text-left">
            <a href="https://www.linkedin.com/in/kasper-heuer-70976029b/" target="_blank"
                class="text-white font-serif text-[26px] sm:text-[45px] underline block hover:text-gray-300 transition-colors break-all">
                LinkedIn
            </a>
        </div>
    </div>

    {{-- EMAIL CARD --}}
    <div class="flex flex-col sm:flex-row items-center bg-white/10 p-4 sm:p-5 gap-3 sm:gap-5 my-4 sm:my-5 rounded-lg">
        <img src="{{ asset('images/email.png') }}" alt="Email"
            class="w-24 sm:w-full max-w-[140px] sm:max-w-[250px] h-auto object-contain">

        <div
            class="hidden sm:block w-0 h-0 border-l-[20px] border-l-[#921815] border-t-[14px] border-t-transparent border-b-[14px] border-b-transparent sm:mx-4">
        </div>

        <div class="text-center sm:text-left">
            <p id="emailTrigger"
                class="text-white font-serif text-[22px] sm:text-[45px] cursor-pointer underline hover:text-gray-300 transition-colors break-all">
                kasperheuer209@gmail.com
            </p>
        </div>
    </div>

    {{-- MODAL BACKDROP --}}
    <div id="contactFormContainer"
        class="fixed inset-0 bg-black/60 flex justify-center items-center opacity-0 invisible transition-opacity duration-300 z-50 px-4">

        {{-- MODAL --}}
        <form id="contactForm" action="{{ route('contact.submit') }}" method="POST"
            class="bg-gray-900 text-white flex flex-col w-full max-w-md p-5 sm:p-8 rounded-lg shadow-lg border border-[#921815]
                   transform scale-95 transition-transform duration-300 max-h-[90vh] overflow-y-auto">
            @csrf

            <label for="naam" class="mb-1 text-[16px] sm:text-[18px] font-serif">Naam</label>
            <input type="text" name="naam" id="naam" required
                class="form-input w-full h-11 sm:h-12 px-3 mb-3 rounded-md bg-gray-800 border border-gray-600
                       focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all">

            <label for="email" class="mb-1 text-[16px] sm:text-[18px] font-serif">Email</label>
            <input type="email" name="email" id="email" required
                class="form-input w-full h-11 sm:h-12 px-3 mb-3 rounded-md bg-gray-800 border border-gray-600
                       focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all">

            <label for="note" class="mb-1 text-[16px] sm:text-[18px] font-serif">Notitie</label>
            <textarea name="note" id="note" rows="4" required
                class="form-input w-full px-3 py-2 mb-4 rounded-md bg-gray-800 border border-gray-600
                       focus:outline-none focus:border-red-600 focus:ring-1 focus:ring-red-600 transition-all"></textarea>

            <input type="submit" value="Verstuur"
                class="bg-[#921815] hover:bg-red-700 transition-transform transform hover:scale-105 active:scale-95
                       text-white font-serif py-2.5 sm:py-3 rounded-md cursor-pointer">
        </form>
    </div>

    <script>
        const emailTrigger = document.getElementById('emailTrigger');
        const contactFormContainer = document.getElementById('contactFormContainer');

        emailTrigger.addEventListener('click', () => {
            contactFormContainer.classList.toggle('opacity-100');
            contactFormContainer.classList.toggle('visible');
            contactFormContainer.classList.toggle('opacity-0');
            contactFormContainer.classList.toggle('invisible');
        });
    </script>

</x-layout>
