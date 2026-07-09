<x-frontend-layout>
    
    <!-- Hero -->
    <section class="bg-[#F8F8F8] py-20 border-b border-gray-150">
        <div class="max-w-4xl mx-auto px-6 text-center space-y-6">
            <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest block">Agency Expertise</span>
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-[#111111] leading-tight">
                Creative Services Built to Grow Your Brand
            </h1>
            <p class="text-base sm:text-lg text-gray-500 leading-relaxed max-w-2xl mx-auto">
                Strategy. Creativity. Execution. We create content and campaigns that connect, engage and deliver real results for your business.
            </p>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 space-y-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="bg-[#F8F8F8] p-8 rounded-3xl hover:shadow-2xl transition duration-300 flex flex-col justify-between group space-y-6" data-aos="fade-up">
                        <div class="space-y-4">
                            <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-[#2E7D32] shadow-sm group-hover:bg-[#2E7D32] group-hover:text-white transition duration-300">
                                <i data-lucide="{{ $service->icon ?? 'briefcase' }}" class="w-5 h-5"></i>
                            </div>
                            <h3 class="text-xl font-bold tracking-tight text-[#111111]">{{ $service->title }}</h3>
                            <p class="text-xs text-gray-500 leading-relaxed">{{ $service->short_description }}</p>
                        </div>
                        <a href="/services/{{ $service->slug }}" class="inline-flex items-center space-x-1.5 text-xs font-bold text-[#111111] hover:text-[#2E7D32] transition pt-4">
                            <span>Explore Service Details</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 group-hover:translate-x-1 transition"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-frontend-layout>
