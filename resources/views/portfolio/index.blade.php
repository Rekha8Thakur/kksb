<x-frontend-layout>
    
    <!-- Hero -->
    <section class="bg-[#F8F8F8] pt-8 pb-16 lg:pt-10 lg:pb-20 border-b border-gray-150">
        <div class="max-w-4xl mx-auto px-6 text-center space-y-6">
            <span class="text-xs font-bold text-zinc-600 uppercase tracking-widest block">Our Work</span>
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight leading-tight">
                <span class="text-[#111111]">Case Studies</span> <span class="text-gray-400">& Visual Results</span>
            </h1>
            <p class="text-base sm:text-lg text-gray-500 leading-relaxed max-w-2xl mx-auto">
                Real projects. Real impact. Explore how we help hotels, restaurants, academies and builders grow through high-impact creatives.
            </p>
        </div>
    </section>

    <!-- Filters & Portfolio Grid -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-6 space-y-12">
            
            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($projects as $project)
                    <div class="bg-white border border-gray-100 hover:border-gray-200 shadow-sm hover:shadow-2xl rounded-3xl overflow-hidden group transition duration-300 flex flex-col" data-aos="fade-up">
                        <div class="aspect-video w-full overflow-hidden bg-gray-100 relative">
                            <img src="{{ asset($project->main_image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $project->title }}">
                            <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-[10px] font-bold text-gray-800 px-3 py-1 rounded-full uppercase tracking-wider">
                                {{ $project->category->name }}
                            </span>
                        </div>
                        <div class="p-5 sm:p-6 flex-grow flex flex-col justify-between space-y-5">
                            <div class="space-y-3">
                                <h3 class="text-lg sm:text-xl font-bold text-gray-900 leading-tight">{{ $project->title }}</h3>
                                <p class="text-xs text-gray-400 leading-relaxed font-semibold">Client: {{ $project->client }}</p>
                                
                                <div class="bg-[#F8F8F8] p-3 sm:p-4 rounded-xl border border-gray-100 space-y-1">
                                    <span class="text-[9px] uppercase font-bold text-zinc-500 tracking-wider">Key Result Achieved</span>
                                    <p class="text-xs sm:text-sm text-gray-700 font-semibold">{{ $project->results }}</p>
                                </div>
                            </div>
                            
                            <a href="/portfolio/{{ $project->slug }}" class="inline-flex items-center space-x-2 text-xs font-bold text-[#111111] hover:text-black transition group">
                                <span>Read Case Study</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 group-hover:translate-x-1 transition"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center text-gray-500 dark:text-zinc-500">
                        <i data-lucide="folder" class="w-12 h-12 mx-auto text-gray-300 mb-3"></i>
                        <p class="font-medium text-base">No projects found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

</x-frontend-layout>
