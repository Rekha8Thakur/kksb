<x-frontend-layout>
    <!-- Services Single Page -->
    <section class="py-24 bg-zinc-950 text-white">
        <div class="max-w-7xl mx-auto px-6 space-y-12">
            <!-- Dropdown Menu -->
            <div class="text-center">
                <label for="service-select" class="block text-sm font-barlow text-emerald-500 uppercase mb-2">Select Service</label>
                <select id="service-select" class="bg-zinc-800 text-white p-3 rounded-md focus:outline-none" onchange="if(this.value) { location.hash = this.value; }">
                    <option value="" disabled selected>-- Choose a Service --</option>
                    @foreach($services as $service)
                        <option value="service-{{ $service->slug }}">{{ $service->title }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Services List -->
            @foreach($services as $service)
                <article id="service-{{ $service->slug }}" class="liquid-glass border border-white/10 rounded-3xl overflow-hidden group hover:border-white/20 hover:shadow-2xl transition duration-300">
                    <div class="relative">
                        @if($service->image_path)
                            <img src="{{ asset($service->image_path) }}" alt="{{ $service->title }}" class="w-full h-64 object-cover group-hover:scale-105 transition duration-500" loading="lazy" />
                        @else
                            <div class="w-full h-64 bg-gray-700"></div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                    </div>
                    <div class="p-8 space-y-4">
                        <h2 class="text-3xl font-barlow font-extrabold text-white">{{ $service->title }}</h2>
                        @if($service->short_description)
                            <p class="text-white/80 font-barlow">{{ $service->short_description }}</p>
                        @endif
                        <a href="/services/{{ $service->slug }}" class="inline-flex items-center space-x-2 text-emerald-500 font-bold hover:underline">
                            <span>Learn More</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</x-frontend-layout>
