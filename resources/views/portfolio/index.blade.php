<x-frontend-layout>
    <div x-data="{ showNoVacancyModal: false }">
    <!-- Hero / Showcase Header -->
    <section class="bg-[#FAFAFA] pt-2 pb-16 lg:pt-4 lg:pb-20 border-b border-gray-100">
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
                <div class="bg-white border border-gray-150 rounded-2xl sm:rounded-3xl overflow-hidden shadow-sm flex flex-col group transition duration-300">
                    <div class="aspect-video w-full overflow-hidden bg-zinc-900 relative">
                        <!-- Colorful image -->
                        <img src="{{ asset('images/portfolio/original_productions.jpg') }}" class="w-full h-full object-cover transition duration-500" alt="Original Productions" loading="lazy">
                    </div>
                    <div class="p-5 sm:p-8 flex-grow flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            <!-- Title block -->
                            <div class="flex items-center space-x-3 text-[#FF6A00]">
                                <i data-lucide="video" class="w-6 h-6 stroke-[2.5]"></i>
                                <h3 class="text-xl font-extrabold text-zinc-900 tracking-wide uppercase">Original Productions</h3>
                            </div>
                            <!-- List -->
                            <ul class="divide-y divide-gray-100 text-sm font-semibold text-zinc-800">
                                <li class="py-2.5 sm:py-3 flex items-center space-x-3">
                                    <i data-lucide="film" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Documentaries</span>
                                </li>
                                <li class="py-2.5 sm:py-3 flex items-center space-x-3">
                                    <i data-lucide="map-pin" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Travel Films</span>
                                </li>
                                <li class="py-2.5 sm:py-3 flex items-center space-x-3">
                                    <i data-lucide="landmark" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Heritage & Culture</span>
                                </li>
                                <li class="py-2.5 sm:py-3 flex items-center space-x-3">
                                    <i data-lucide="clapperboard" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Short Films</span>
                                </li>
                                <li class="py-2.5 sm:py-3 flex items-center space-x-3">
                                    <i data-lucide="mic" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Podcasts</span>
                                </li>
                                <li class="py-2.5 sm:py-3 flex items-center space-x-3">
                                    <i data-lucide="users" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Social Awareness Projects</span>
                                </li>
                            </ul>
                        </div>
                        <a href="{{ route('original-productions.index') }}" class="w-full py-4 rounded-xl bg-[#FF6A00] border border-[#FF6A00] text-white hover:bg-[#111111] hover:border-[#111111] hover:text-white font-bold text-xs uppercase tracking-wider text-center transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-md flex items-center justify-center space-x-2 group">
                            <span>Explore Originals</span>
                            <span class="group-hover:translate-x-1 transition-transform duration-200">&rarr;</span>
                        </a>
                    </div>
                </div>

                <!-- Card 2: Brand Campaigns -->
                <div class="bg-white border border-gray-150 rounded-2xl sm:rounded-3xl overflow-hidden shadow-sm flex flex-col group transition duration-300">
                    <div class="aspect-video w-full overflow-hidden bg-zinc-900 relative">
                        <!-- Colorful image -->
                        <img src="{{ asset('images/portfolio/brand_campaigns.jpg') }}" class="w-full h-full object-cover transition duration-500" alt="Brand Campaigns" loading="lazy">
                    </div>
                    <div class="p-5 sm:p-8 flex-grow flex flex-col justify-between space-y-6">
                        <div class="space-y-4">
                            <!-- Title block -->
                            <div class="flex items-center space-x-3 text-[#FF6A00]">
                                <i data-lucide="megaphone" class="w-6 h-6 stroke-[2.5]"></i>
                                <h3 class="text-xl font-extrabold text-zinc-900 tracking-wide uppercase">Brand Campaigns</h3>
                            </div>
                            <!-- List -->
                            <ul class="divide-y divide-gray-100 text-sm font-semibold text-zinc-800">
                                <li class="py-2.5 sm:py-3 flex items-center space-x-3">
                                    <i data-lucide="play" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Advertisement Reels</span>
                                </li>
                                <li class="py-2.5 sm:py-3 flex items-center space-x-3">
                                    <i data-lucide="shopping-bag" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Product Promotions</span>
                                </li>
                                <li class="py-2.5 sm:py-3 flex items-center space-x-3">
                                    <i data-lucide="briefcase" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Business Storytelling</span>
                                </li>
                                <li class="py-2.5 sm:py-3 flex items-center space-x-3">
                                    <i data-lucide="building-2" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Hotel Promotions</span>
                                </li>
                                <li class="py-2.5 sm:py-3 flex items-center space-x-3">
                                    <i data-lucide="heart" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Influencer Campaigns</span>
                                </li>
                                <li class="py-2.5 sm:py-3 flex items-center space-x-3">
                                    <i data-lucide="calendar" class="w-4 h-4 text-zinc-400"></i>
                                    <span>Event Coverage</span>
                                </li>
                            </ul>
                        </div>
                        @if(App\Models\Setting::get('disable_brand_projects_btn', '0') == '1')
                            <button @click="showNoVacancyModal = true" class="w-full py-4 rounded-xl bg-[#FF6A00] border border-[#FF6A00] text-white hover:bg-[#111111] hover:border-[#111111] hover:text-white font-bold text-xs uppercase tracking-wider text-center transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-md flex items-center justify-center space-x-2 group">
                                <span>View Brand Projects</span>
                                <span class="group-hover:translate-x-1 transition-transform duration-200">&rarr;</span>
                            </button>
                        @else
                            <a href="{{ route('brand-projects.index') }}" class="w-full py-4 rounded-xl bg-[#FF6A00] border border-[#FF6A00] text-white hover:bg-[#111111] hover:border-[#111111] hover:text-white font-bold text-xs uppercase tracking-wider text-center transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-md flex items-center justify-center space-x-2 group">
                                <span>View Brand Projects</span>
                                <span class="group-hover:translate-x-1 transition-transform duration-200">&rarr;</span>
                            </a>
                        @endif
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

        <!-- No Vacancy Popup Modal -->
        <div class="fixed inset-0 z-50 overflow-y-auto" x-show="showNoVacancyModal" x-transition x-cloak style="display: none;">
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-black/65 backdrop-blur-sm transition-opacity" @click="showNoVacancyModal = false"></div>
            
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="bg-white border border-[#ECECEC] rounded-[24px] max-w-md w-full p-8 relative shadow-2xl z-10 my-auto text-center space-y-6" @click.away="showNoVacancyModal = false">
                    <!-- Close button -->
                    <button @click="showNoVacancyModal = false" class="absolute top-5 right-5 text-gray-400 hover:text-[#111111] transition focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>

                    <!-- Icon -->
                    <div class="w-16 h-16 bg-[#FF6A00]/10 rounded-full flex items-center justify-center text-[#FF6A00] mx-auto">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>

                    <div class="space-y-3">
                        <h3 class="text-2xl font-bold text-[#111111]">No Open Positions</h3>
                        <p class="text-sm text-[#666666] leading-relaxed">
                            Thank you for your interest in joining us. There are currently no open positions. We encourage you to check back soon for new opportunities.
                        </p>
                    </div>

                    <div class="pt-2">
                        <button @click="showNoVacancyModal = false" class="w-full bg-[#111111] hover:bg-[#222222] text-white text-sm font-bold h-[48px] rounded-xl transition duration-300">
                            Got it
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend-layout>
