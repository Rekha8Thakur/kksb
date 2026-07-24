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
                        <a href="https://www.youtube.com/@KKSB" target="_blank" rel="noopener noreferrer" class="w-full py-4 rounded-xl border border-[#FF6A00] text-[#FF6A00] font-bold text-xs uppercase tracking-wider text-center transition duration-300 hover:bg-[#FF6A00] hover:text-white flex items-center justify-center space-x-2">
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
                        <a href="https://www.instagram.com/official_kksb/?hl=en" target="_blank" rel="noopener noreferrer" class="w-full py-4 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white font-bold text-xs uppercase tracking-wider text-center transition duration-300 flex items-center justify-center space-x-2">
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

</x-frontend-layout>
