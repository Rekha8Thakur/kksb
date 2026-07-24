<x-frontend-layout>
    
    <!-- Hero / Showcase Header -->
    <section class="bg-[#FAFAFA] pt-12 pb-16 lg:pt-16 lg:pb-20 border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <span class="text-xs font-bold text-[#FF6A00] uppercase tracking-[0.2em] block mb-2">Our Work</span>
            <h1 class="text-4xl sm:text-6xl font-black tracking-tight leading-[1.1] text-zinc-900 uppercase">
                Stories That Inspire.<br>
                <span class="text-gray-400">Campaigns That Convert.</span>
            </h1>
            
            <div class="w-16 h-1 bg-[#FF6A00] mx-auto my-6 rounded-full"></div>
            
            <p class="text-sm sm:text-base text-[#666666] leading-relaxed max-w-2xl mx-auto font-light">
                From powerful documentaries to performance-driven brand films, we create content that connects and delivers real impact.
            </p>

            <!-- Grid columns matching template -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto mt-12 text-left">
                <!-- Card 1: Original Productions -->
                <div class="bg-white border border-gray-150 rounded-3xl overflow-hidden shadow-sm flex flex-col group transition duration-300">
                    <div class="aspect-video w-full overflow-hidden bg-zinc-900 relative">
                        <!-- Grayscale image -->
                        <img src="{{ asset('images/portfolio/original_productions.jpg') }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500" alt="Original Productions">
                        <!-- Play overlay -->
                        <div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/35 transition duration-300">
                            <div class="w-16 h-16 rounded-full border-2 border-white flex items-center justify-center text-white bg-white/10 backdrop-blur-sm transition duration-300 group-hover:scale-110">
                                <svg class="w-6 h-6 fill-current translate-x-0.5" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 flex-grow flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            <!-- Title block -->
                            <div class="flex items-center space-x-3 text-[#FF6A00]">
                                <i data-lucide="video" class="w-6 h-6 stroke-[2.5]"></i>
                                <h3 class="text-xl font-extrabold text-zinc-900 tracking-wide uppercase">Original Productions</h3>
                            </div>
                            <!-- List -->
                            <ul class="divide-y divide-gray-100 text-sm font-semibold text-zinc-800">
                                <li class="py-3 flex items-center space-x-3">
                                    <i data-lucide="film" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Documentaries</span>
                                </li>
                                <li class="py-3 flex items-center space-x-3">
                                    <i data-lucide="map-pin" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Travel Films</span>
                                </li>
                                <li class="py-3 flex items-center space-x-3">
                                    <i data-lucide="landmark" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Heritage & Culture</span>
                                </li>
                                <li class="py-3 flex items-center space-x-3">
                                    <i data-lucide="clapperboard" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Short Films</span>
                                </li>
                                <li class="py-3 flex items-center space-x-3">
                                    <i data-lucide="mic" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Podcasts</span>
                                </li>
                                <li class="py-3 flex items-center space-x-3">
                                    <i data-lucide="users" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Social Awareness Projects</span>
                                </li>
                            </ul>
                        </div>
                        <a href="#case-studies" class="w-full py-4 rounded-xl border border-[#FF6A00] text-[#FF6A00] font-bold text-xs uppercase tracking-wider text-center transition duration-300 hover:bg-[#FF6A00] hover:text-white flex items-center justify-center space-x-2">
                            <span>Explore Originals</span>
                            <span>&rarr;</span>
                        </a>
                    </div>
                </div>

                <!-- Card 2: Brand Campaigns -->
                <div class="bg-white border border-gray-150 rounded-3xl overflow-hidden shadow-sm flex flex-col group transition duration-300">
                    <div class="aspect-video w-full overflow-hidden bg-zinc-900 relative">
                        <!-- Grayscale image -->
                        <img src="{{ asset('images/portfolio/brand_campaigns.jpg') }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition duration-500" alt="Brand Campaigns">
                        <!-- Play overlay -->
                        <div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/35 transition duration-300">
                            <div class="w-16 h-16 rounded-full border-2 border-white flex items-center justify-center text-white bg-white/10 backdrop-blur-sm transition duration-300 group-hover:scale-110">
                                <svg class="w-6 h-6 fill-current translate-x-0.5" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 flex-grow flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            <!-- Title block -->
                            <div class="flex items-center space-x-3 text-[#FF6A00]">
                                <i data-lucide="megaphone" class="w-6 h-6 stroke-[2.5]"></i>
                                <h3 class="text-xl font-extrabold text-zinc-900 tracking-wide uppercase">Brand Campaigns</h3>
                            </div>
                            <!-- List -->
                            <ul class="divide-y divide-gray-100 text-sm font-semibold text-zinc-800">
                                <li class="py-3 flex items-center space-x-3">
                                    <i data-lucide="play" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Advertisement Reels</span>
                                </li>
                                <li class="py-3 flex items-center space-x-3">
                                    <i data-lucide="shopping-bag" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Product Promotions</span>
                                </li>
                                <li class="py-3 flex items-center space-x-3">
                                    <i data-lucide="briefcase" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Business Storytelling</span>
                                </li>
                                <li class="py-3 flex items-center space-x-3">
                                    <i data-lucide="building-2" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Hotel Promotions</span>
                                </li>
                                <li class="py-3 flex items-center space-x-3">
                                    <i data-lucide="heart" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Influencer Campaigns</span>
                                </li>
                                <li class="py-3 flex items-center space-x-3">
                                    <i data-lucide="calendar" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Event Coverage</span>
                                </li>
                            </ul>
                        </div>
                        <a href="#case-studies" class="w-full py-4 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white font-bold text-xs uppercase tracking-wider text-center transition duration-300 flex items-center justify-center space-x-2">
                            <span>View Brand Projects</span>
                            <span class="text-[#FF6A00]">&rarr;</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer Badge -->
            <div class="flex items-center justify-center space-x-3 max-w-md mx-auto mt-12 bg-white border border-gray-150 rounded-full py-3 px-6 text-xs font-semibold text-zinc-850 shadow-sm">
                <div class="p-1 bg-[#FF6A00]/10 text-[#FF6A00] rounded-full">
                    <i data-lucide="target" class="w-4 h-4"></i>
                </div>
                <span>Every frame has a <span class="text-[#FF6A00] font-bold">purpose</span>. Every story leaves an <span class="text-[#FF6A00] font-bold">impact</span>.</span>
            </div>
        </div>
    </section>

    <!-- Filters & Case Studies Grid -->
    <section id="case-studies" class="py-16 bg-white scroll-mt-6">
        <div class="max-w-7xl mx-auto px-6 space-y-12">
            
            <div class="text-center space-y-3">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-zinc-900">Explore Case Studies</h2>
                <p class="text-sm text-gray-500 leading-relaxed font-light">Detailed look into the creative process, metrics and results delivered for our partners.</p>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects as $project)
                    <div class="bg-white border border-gray-150 hover:border-gray-200 shadow-sm hover:shadow-2xl rounded-3xl overflow-hidden group transition duration-300 flex flex-col" data-aos="fade-up">
                        <div class="aspect-video w-full overflow-hidden bg-gray-100 relative">
                            <img src="{{ asset($project->main_image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $project->title }}">
                            <span class="absolute top-4 left-4 bg-white/95 backdrop-blur text-[10px] font-bold text-gray-800 px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">
                                {{ $project->category->name }}
                            </span>
                        </div>
                        <div class="p-6 flex-grow flex flex-col justify-between space-y-5">
                            <div class="space-y-3">
                                <h3 class="text-lg font-bold text-gray-900 leading-tight">{{ $project->title }}</h3>
                                <p class="text-xs text-gray-400 leading-relaxed font-semibold">Client: {{ $project->client }}</p>
                                
                                <div class="bg-[#FAFAFA] p-4 rounded-2xl border border-gray-100 space-y-1">
                                    <span class="text-[9px] uppercase font-bold text-zinc-500 tracking-wider">Key Result Achieved</span>
                                    <p class="text-xs sm:text-sm text-gray-700 font-semibold">{{ $project->results }}</p>
                                </div>
                            </div>
                            
                            <a href="/portfolio/{{ $project->slug }}" class="inline-flex items-center space-x-2 text-xs font-bold text-zinc-900 hover:text-[#FF6A00] transition group">
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
