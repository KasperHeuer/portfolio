<x-layout title="Contact">
    <section class="bg-black py-8 px-8">
        <div class="max-w-[115rem] mx-auto flex flex-col gap-12">

            <!-- Page Title -->
            <div class="flex justify-center">
                <x-chapter text="Neem contact op" triangle="false" class="text-5xl md:text-5xl" />
            </div>

            <!-- Contact Cards -->
            <div class="flex flex-col gap-8 max-w-7xl mx-auto w-full">

                <!-- LinkedIn Card -->
                <div class="flex flex-col lg:flex-row items-center gap-8 bg-white/5 rounded-xl p-8 hover:bg-white/10 transition-all duration-300 group">
                    
                    <div class="flex items-center justify-center bg-gray-500/20 rounded-lg p-6 w-full lg:w-auto">
                        <img src="{{ asset('images/LI-In-Bug.png') }}" 
                             alt="LinkedIn logo"
                             class="w-32 h-32 object-contain">
                    </div>

                    <!-- Triangle Separator (desktop only) -->
                    <div class="hidden lg:block w-0 h-0 border-l-[20px] border-l-red-800 border-t-[14px] border-t-transparent border-b-[14px] border-b-transparent"></div>

                    <div class="flex-1 flex flex-col gap-3 text-center lg:text-left">
                        <h3 class="text-2xl md:text-3xl font-serif text-white">LinkedIn</h3>
                        <a href="https://www.linkedin.com/in/kasper-heuer-70976029b/" 
                           target="_blank"
                           class="text-zinc-300 text-lg hover:text-red-800 transition-colors duration-300 underline decoration-2 underline-offset-4 break-all">
                            linkedin.com/in/kasper-heuer
                        </a>
                    </div>
                </div>

                <!-- Email Card -->
                <div class="flex flex-col lg:flex-row items-center gap-8 bg-white/5 rounded-xl p-8 hover:bg-white/10 transition-all duration-300 group cursor-pointer"
                     id="emailTrigger">
                    
                    <div class="flex items-center justify-center bg-gray-500/20 rounded-lg p-6 w-full lg:w-auto">
                        <img src="{{ asset('images/email.png') }}" 
                             alt="Email"
                             class="w-32 h-32 object-contain">
                    </div>

                    <!-- Triangle Separator (desktop only) -->
                    <div class="hidden lg:block w-0 h-0 border-l-[20px] border-l-red-800 border-t-[14px] border-t-transparent border-b-[14px] border-b-transparent"></div>

                    <div class="flex-1 flex flex-col gap-3 text-center lg:text-left">
                        <h3 class="text-2xl md:text-3xl font-serif text-white">Email</h3>
                        <p class="text-zinc-300 text-lg group-hover:text-red-800 transition-colors duration-300 underline decoration-2 underline-offset-4 break-all">
                            kasperheuer209@gmail.com
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Modal Backdrop -->
    <div id="contactFormContainer"
         class="fixed inset-0 bg-black/80 backdrop-blur-sm flex justify-center items-center opacity-0 invisible transition-all duration-300 z-50 px-4">

        <!-- Modal -->
        <div class="relative max-w-2xl w-full">
            <form id="contactForm" 
                  action="{{ route('contact.submit') }}" 
                  method="POST"
                  class="bg-[#1B1B1B] text-white flex flex-col p-8 rounded-xl shadow-2xl border-2 border-red-800/30
                         transform scale-95 transition-transform duration-300 max-h-[90vh] overflow-y-auto">
                @csrf

                <!-- Close Button -->
                <button type="button" 
                        id="closeModal"
                        class="absolute top-4 right-4 text-zinc-400 hover:text-white transition-colors text-2xl font-bold">
                    ×
                </button>

                <!-- Modal Title -->
                <h2 class="text-3xl font-serif mb-6 text-center">Stuur mij een bericht</h2>

                <!-- Form Fields -->
                <div class="space-y-5">
                    <div>
                        <label for="naam" class="block mb-2 text-lg font-serif text-zinc-300">
                            Naam <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="naam" 
                               id="naam" 
                               required
                               placeholder="Jouw naam"
                               class="w-full h-12 px-4 rounded-lg bg-black/50 border border-zinc-700 text-white
                                      focus:outline-none focus:border-red-800 focus:ring-2 focus:ring-red-800/20 
                                      transition-all placeholder-zinc-500">
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-lg font-serif text-zinc-300">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               required
                               placeholder="jouw@email.com"
                               class="w-full h-12 px-4 rounded-lg bg-black/50 border border-zinc-700 text-white
                                      focus:outline-none focus:border-red-800 focus:ring-2 focus:ring-red-800/20 
                                      transition-all placeholder-zinc-500">
                    </div>

                    <div>
                        <label for="note" class="block mb-2 text-lg font-serif text-zinc-300">
                            Bericht <span class="text-red-500">*</span>
                        </label>
                        <textarea name="note" 
                                  id="note" 
                                  rows="5" 
                                  required
                                  placeholder="Jouw bericht..."
                                  class="w-full px-4 py-3 rounded-lg bg-black/50 border border-zinc-700 text-white
                                         focus:outline-none focus:border-red-800 focus:ring-2 focus:ring-red-800/20 
                                         transition-all placeholder-zinc-500 resize-none"></textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="mt-6 bg-red-800 hover:bg-red-700 text-white font-serif text-lg py-3 rounded-lg
                               transition-all duration-300 transform hover:scale-[1.02] active:scale-95">
                    Verstuur bericht
                </button>
            </form>
        </div>
    </div>

    <script>
        const emailTrigger = document.getElementById('emailTrigger');
        const contactFormContainer = document.getElementById('contactFormContainer');
        const closeModal = document.getElementById('closeModal');
        const contactForm = document.getElementById('contactForm');

        // Open modal
        emailTrigger.addEventListener('click', () => {
            contactFormContainer.classList.remove('opacity-0', 'invisible');
            contactFormContainer.classList.add('opacity-100', 'visible');
            contactForm.classList.remove('scale-95');
            contactForm.classList.add('scale-100');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        });

        // Close modal function
        const closeModalFunc = () => {
            contactFormContainer.classList.add('opacity-0', 'invisible');
            contactFormContainer.classList.remove('opacity-100', 'visible');
            contactForm.classList.add('scale-95');
            contactForm.classList.remove('scale-100');
            document.body.style.overflow = ''; // Restore scrolling
        };

        // Close on button click
        closeModal.addEventListener('click', closeModalFunc);

        // Close on backdrop click
        contactFormContainer.addEventListener('click', (e) => {
            if (e.target === contactFormContainer) {
                closeModalFunc();
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !contactFormContainer.classList.contains('invisible')) {
                closeModalFunc();
            }
        });
    </script>

</x-layout>