@props(['title', 'url'])

<a href="{{ url('casino/' . $url) }}" class="group block">
    <div class="overflow-hidden rounded-xl my-6 lg:my-24">
        <div
            class="bg-white/5 backdrop-blur-md border border-white/20 flex flex-col lg:flex-row justify-between items-center p-6 lg:p-12 gap-6
                   transition-transform duration-300 transform hover:scale-105 hover:shadow-2xl hover:bg-white/10">
            <div class="flex-1 max-w-lg text-center lg:text-left lg:ml-16">
                <!-- Force chapter text to yellow -->
                <div class="!text-yellow-400">
                    <x-chapter text="{{ $title }}" triangle="false"/>
                </div>
            </div>
        </div>
    </div>
</a>
