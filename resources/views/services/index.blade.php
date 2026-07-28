<x-frontend-layout>
    
    <!-- Alpine JS State for Service Modals & In-Page Navigation -->
    <div x-data="{ 
        activeModal: null,
        services: {
            @foreach($services as $service)
            '{{ $service->slug }}': {
                id: {{ json_encode($service->slug) }},
                title: {{ json_encode($service->title) }},
                tagline: {{ json_encode($service->tagline) }},
                desc: {{ json_encode($service->long_description) }},
                offeringsTitle: {{ json_encode($service->offerings_title ?: 'What We Offer') }},
                offerings: {{ json_encode($service->benefits ?: []) }}
            },
            @endforeach
        }
    }">

        <!-- HERO SECTION -->
        <section class="bg-gradient-to-b from-[#F8F9FA] via-white to-[#F8F9FA] pt-8 pb-16 lg:pt-12 lg:pb-24 border-b border-[#ECECEC] relative overflow-hidden">
            <!-- Background Ambient Glow -->
            <div class="absolute top-0 right-1/4 w-[600px] h-[600px] bg-[#FF6A00]/10 rounded-full blur-3xl pointer-events-none -z-10 animate-pulse"></div>
            
            <div class="max-w-5xl mx-auto px-6 text-center space-y-8">
                <span class="inline-flex items-center gap-2.5 px-5 py-2 rounded-full bg-[#FF6A00]/10 text-[#FF6A00] text-xs font-black tracking-[0.25em] uppercase border border-[#FF6A00]/25 shadow-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#FF6A00] animate-ping"></span> High-Performance Creative Agency
                </span>
                
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-black tracking-tight leading-[1.1]">
                    <span class="text-[#111111]">Creative Services</span> <span class="text-gray-400">Built to Grow Your Brand</span>
                </h1>
                
                <p class="text-base sm:text-xl text-gray-500 leading-relaxed max-w-3xl mx-auto font-light">
                    Strategy, content creation, and digital execution combined under one roof. Explore our specialized services designed to make your brand stand out and scale.
                </p>


            </div>
        </section>

        <!-- SERVICES BIG & ATTRACTIVE CARDS GRID -->
        <section class="pt-8 pb-16 lg:pt-12 lg:pb-20 bg-[#FAFAFA] relative overflow-hidden">
            <!-- Premium Subtle Parallax Background -->
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat bg-scroll md:bg-fixed opacity-[0.06] pointer-events-none" 
                 style="background-image: url('{{ asset('images/landing-shoot.jpg') }}');"></div>
            
            <div class="relative z-10 max-w-[1440px] mx-auto px-6 lg:px-[90px] space-y-12">
                
                <div class="text-center space-y-4">
                    <span class="text-xs font-black text-[#FF6A00] tracking-[0.25em] uppercase block">
                        OUR CORE CAPABILITIES
                    </span>
                    <h2 class="text-4xl sm:text-5xl lg:text-[54px] font-black tracking-tight leading-tight text-[#111111]">
                        Complete Marketing & Creative <span class="text-gray-600">Solutions</span>
                    </h2>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-6 lg:gap-8 items-stretch">
                    
                    @foreach($services as $index => $service)
                    <a href="/services/{{ $service->slug }}" 
                       @click.prevent="activeModal = '{{ $service->slug }}'" 
                       id="{{ $service->slug }}" 
                       class="bg-white border-2 border-[#EAEAEA] hover:border-[#111111] p-4 sm:p-6 lg:p-8 rounded-[16px] sm:rounded-[24px] transition-all duration-300 flex flex-col justify-between group shadow-md hover:shadow-2xl hover:-translate-y-1.5 space-y-4 sm:space-y-6 scroll-mt-28" 
                       data-aos="fade-up" 
                       data-aos-delay="{{ ($index % 3) * 100 }}">
                        <div class="space-y-3 sm:space-y-5">
                            <!-- Big Title & Tagline -->
                            <div class="space-y-1">
                                <h3 class="text-sm sm:text-lg md:text-xl lg:text-2xl font-black tracking-tight text-[#111111] leading-snug sm:leading-tight pr-1 sm:pr-0">{{ $service->title }}</h3>
                                @if($service->tagline)
                                    <p class="text-[9px] sm:text-xs font-bold text-[#FF6A00] tracking-wide">{{ $service->tagline }}</p>
                                @elseif(count($service->benefits ?: []) > 0)
                                    <p class="text-[9px] sm:text-xs font-bold text-[#FF6A00] tracking-wide">{{ $service->benefits[0] }}</p>
                                @else
                                    <p class="text-[9px] sm:text-xs font-bold text-[#FF6A00] tracking-wide">Complete Solutions</p>
                                @endif
                            </div>

                            <!-- Description -->
                            <p class="text-[11px] sm:text-xs md:text-sm text-gray-500 leading-relaxed font-light">
                                {{ $service->short_description }}
                            </p>
                        </div>
                    </a>
                    @endforeach

                </div>
            </div>
        </section>

        <!-- WHY CHOOSE KKSB STUDIOS (PREMIUM WHITE CARD) WITH PROCESS -->
        <section class="pt-0 pb-10 lg:pt-0 lg:pb-24 bg-[#FAFAFA] border-t border-[#ECECEC]">
            <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px]">
                <div class="bg-white border border-[#ECECEC] rounded-[20px] sm:rounded-[40px] pt-4 px-4 pb-6 sm:pt-6 sm:px-12 sm:pb-12 lg:pt-8 lg:px-16 lg:pb-16 space-y-6 sm:space-y-16 shadow-sm relative overflow-hidden">
                    <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-[#FF6A00]/5 rounded-full blur-3xl pointer-events-none"></div>
                    
                    <!-- Process Grid / HOW WE WORK -->
                    <div class="space-y-6 sm:space-y-10 relative z-10">
                        <div class="text-left space-y-2">
                            <span class="text-[12.5px] font-bold text-[#FF6A00] tracking-[0.2em] uppercase block">
                                // HOW WE WORK
                            </span>
                            <h3 class="text-2xl font-black tracking-tight text-[#111111] uppercase font-heading">
                                Our Process
                            </h3>
                            <p class="text-sm text-[#666666] font-light max-w-xl">
                                A transparent and proven process that ensures great results every time.
                            </p>
                        </div>
 
                        <!-- 6 Steps Grid -->
                        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-6 gap-3 sm:gap-4 pt-2">
                            <!-- Step 1 -->
                            <div class="relative bg-[#FAFAFA] border border-[#ECECEC] rounded-[20px] sm:rounded-[24px] p-4 sm:p-6 hover:bg-[#111111] hover:border-[#111111] hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group overflow-hidden">
                                <span class="absolute top-2 right-4 text-xl sm:text-3xl font-black text-gray-100 select-none pointer-events-none group-hover:text-white/10 transition-colors duration-300 font-heading">
                                    01
                                </span>
                                <div class="w-10 h-10 mb-3 sm:w-12 sm:h-12 sm:mb-5 rounded-xl sm:rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 group-hover:scale-110 group-hover:bg-white group-hover:text-[#111111] transition-all duration-300">
                                    <i data-lucide="search" class="w-4 h-4 sm:w-5 sm:h-5"></i>
                                </div>
                                <h4 class="text-xs sm:text-base font-extrabold text-[#111111] tracking-tight uppercase group-hover:text-white transition-colors">
                                    Discover
                                </h4>
                                <p class="text-[10px] sm:text-[12px] text-[#666666] leading-relaxed font-light mt-2 group-hover:text-zinc-300">
                                    We understand your business, goals and target audience.
                                </p>
                            </div>
                            
                            <!-- Step 2 -->
                            <div class="relative bg-[#FAFAFA] border border-[#ECECEC] rounded-[20px] sm:rounded-[24px] p-4 sm:p-6 hover:bg-[#111111] hover:border-[#111111] hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group overflow-hidden">
                                <span class="absolute top-2 right-4 text-xl sm:text-3xl font-black text-gray-100 select-none pointer-events-none group-hover:text-white/10 transition-colors duration-300 font-heading">
                                    02
                                </span>
                                <div class="w-10 h-10 mb-3 sm:w-12 sm:h-12 sm:mb-5 rounded-xl sm:rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 group-hover:scale-110 group-hover:bg-white group-hover:text-[#111111] transition-all duration-300">
                                    <i data-lucide="file-text" class="w-4 h-4 sm:w-5 sm:h-5"></i>
                                </div>
                                <h4 class="text-xs sm:text-base font-extrabold text-[#111111] tracking-tight uppercase group-hover:text-white transition-colors">
                                    Research
                                </h4>
                                <p class="text-[10px] sm:text-[12px] text-[#666666] leading-relaxed font-light mt-2 group-hover:text-zinc-300">
                                    In-depth research on your industry, audience and competitors.
                                </p>
                            </div>
 
                            <!-- Step 3 -->
                            <div class="relative bg-[#FAFAFA] border border-[#ECECEC] rounded-[20px] sm:rounded-[24px] p-4 sm:p-6 hover:bg-[#111111] hover:border-[#111111] hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group overflow-hidden">
                                <span class="absolute top-2 right-4 text-xl sm:text-3xl font-black text-gray-100 select-none pointer-events-none group-hover:text-white/10 transition-colors duration-300 font-heading">
                                    03
                                </span>
                                <div class="w-10 h-10 mb-3 sm:w-12 sm:h-12 sm:mb-5 rounded-xl sm:rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 group-hover:scale-110 group-hover:bg-white group-hover:text-[#111111] transition-all duration-300">
                                    <i data-lucide="target" class="w-4 h-4 sm:w-5 sm:h-5"></i>
                                </div>
                                <h4 class="text-xs sm:text-base font-extrabold text-[#111111] tracking-tight uppercase group-hover:text-white transition-colors">
                                    Strategize
                                </h4>
                                <p class="text-[10px] sm:text-[12px] text-[#666666] leading-relaxed font-light mt-2 group-hover:text-zinc-300">
                                    We create a customized strategy aligned with your objectives.
                                </p>
                            </div>
 
                            <!-- Step 4 -->
                            <div class="relative bg-[#FAFAFA] border border-[#ECECEC] rounded-[20px] sm:rounded-[24px] p-4 sm:p-6 hover:bg-[#111111] hover:border-[#111111] hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group overflow-hidden">
                                <span class="absolute top-2 right-4 text-xl sm:text-3xl font-black text-gray-100 select-none pointer-events-none group-hover:text-white/10 transition-colors duration-300 font-heading">
                                    04
                                </span>
                                <div class="w-10 h-10 mb-3 sm:w-12 sm:h-12 sm:mb-5 rounded-xl sm:rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 group-hover:scale-110 group-hover:bg-white group-hover:text-[#111111] transition-all duration-300">
                                    <i data-lucide="edit-3" class="w-4 h-4 sm:w-5 sm:h-5"></i>
                                </div>
                                <h4 class="text-xs sm:text-base font-extrabold text-[#111111] tracking-tight uppercase group-hover:text-white transition-colors">
                                    Create
                                </h4>
                                <p class="text-[10px] sm:text-[12px] text-[#666666] leading-relaxed font-light mt-2 group-hover:text-zinc-300">
                                    Our team produces high-quality content and creatives.
                                </p>
                            </div>
 
                            <!-- Step 5 -->
                            <div class="relative bg-[#FAFAFA] border border-[#ECECEC] rounded-[20px] sm:rounded-[24px] p-4 sm:p-6 hover:bg-[#111111] hover:border-[#111111] hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group overflow-hidden">
                                <span class="absolute top-2 right-4 text-xl sm:text-3xl font-black text-gray-100 select-none pointer-events-none group-hover:text-white/10 transition-colors duration-300 font-heading">
                                    05
                                </span>
                                <div class="w-10 h-10 mb-3 sm:w-12 sm:h-12 sm:mb-5 rounded-xl sm:rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 group-hover:scale-110 group-hover:bg-white group-hover:text-[#111111] transition-all duration-300">
                                    <i data-lucide="send" class="w-4 h-4 sm:w-5 sm:h-5"></i>
                                </div>
                                <h4 class="text-xs sm:text-base font-extrabold text-[#111111] tracking-tight uppercase group-hover:text-white transition-colors">
                                    Publish
                                </h4>
                                <p class="text-[10px] sm:text-[12px] text-[#666666] leading-relaxed font-light mt-2 group-hover:text-zinc-300">
                                    We launch across the right platforms at the right time.
                                </p>
                            </div>
 
                            <!-- Step 6 -->
                            <div class="relative bg-[#FAFAFA] border border-[#ECECEC] rounded-[20px] sm:rounded-[24px] p-4 sm:p-6 hover:bg-[#111111] hover:border-[#111111] hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group overflow-hidden">
                                <span class="absolute top-2 right-4 text-xl sm:text-3xl font-black text-gray-100 select-none pointer-events-none group-hover:text-white/10 transition-colors duration-300 font-heading">
                                    06
                                </span>
                                <div class="w-10 h-10 mb-3 sm:w-12 sm:h-12 sm:mb-5 rounded-xl sm:rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-800 group-hover:scale-110 group-hover:bg-white group-hover:text-[#111111] transition-all duration-300">
                                    <i data-lucide="trending-up" class="w-4 h-4 sm:w-5 sm:h-5"></i>
                                </div>
                                <h4 class="text-xs sm:text-base font-extrabold text-[#111111] tracking-tight uppercase group-hover:text-white transition-colors">
                                    Optimize
                                </h4>
                                <p class="text-[10px] sm:text-[12px] text-[#666666] leading-relaxed font-light mt-2 group-hover:text-zinc-300">
                                    We analyze, learn and optimize for maximum results.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Intro Header & CTA Buttons (Strategic Advantage) -->
                    <div class="pt-12 border-t border-[#ECECEC] flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8 relative z-10">
                        <div class="max-w-3xl space-y-4">
                            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#FF6A00]/10 text-[#FF6A00] text-xs font-black uppercase tracking-widest border border-[#FF6A00]/20">
                                💡 Strategic Advantage
                            </span>
                            <h2 class="text-3xl lg:text-5xl font-black tracking-tight text-[#111111] font-heading uppercase">
                                Why Choose KKSB STUDIOS?
                            </h2>
                            <p class="text-base lg:text-lg text-[#666666] leading-relaxed font-light">
                                We combine creativity, strategy, and storytelling to deliver marketing solutions that don't just look good—they drive real business growth. From branding and content creation to digital marketing and website development, our team works as your long-term creative partner, helping your business stand out in an increasingly competitive digital world.
                            </p>
                        </div>
                        <div class="flex flex-col sm:flex-row items-center gap-4 flex-shrink-0 self-start lg:self-center">
                            <a href="/contact" class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 bg-zinc-950 hover:bg-zinc-800 text-white font-bold h-[54px] px-8 rounded-[12px] text-sm transition-all shadow-lg shadow-black/10 hover:-translate-y-0.5">
                                <span>Start Your Project</span>
                                <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                            </a>
                            <a href="/portfolio" class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 border border-[#ECECEC] hover:border-zinc-400 text-zinc-900 bg-white hover:bg-zinc-50 font-bold h-[54px] px-8 rounded-[12px] text-sm transition-all hover:-translate-y-0.5 shadow-sm">
                                <span>Explore Our Work</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- INTERACTIVE DETAIL MODAL POPUP -->
        <div x-show="activeModal !== null" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-start justify-center p-4 sm:p-6 lg:p-8 bg-black/75 backdrop-blur-md overflow-y-auto"
             style="display: none;">
            
            <div @click.away="activeModal = null" 
                 x-show="activeModal !== null"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 class="bg-white rounded-[24px] sm:rounded-[28px] max-w-3xl w-full my-auto shadow-2xl border border-[#ECECEC] p-5 sm:p-8 lg:p-10 space-y-6 sm:space-y-8 relative">
                
                <!-- Close Button -->
                <button @click="activeModal = null" class="absolute top-4 right-4 sm:top-6 sm:right-6 text-gray-400 hover:text-black bg-gray-100 hover:bg-gray-200 p-2 rounded-full transition">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>

                <!-- Modal Content Dynamic Binding -->
                <template x-if="activeModal && services[activeModal]">
                    <div class="space-y-6 sm:space-y-8">
                        
                        <!-- Header -->
                        <div class="space-y-2 sm:space-y-3 pr-12 pr-16">
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-zinc-100 text-zinc-850 border border-zinc-200 text-xs font-bold uppercase tracking-wider">
                                Service Overview
                            </span>
                            <h2 class="text-2xl sm:text-4xl font-black text-[#111111]" x-text="services[activeModal].title"></h2>
                            <p class="text-xs sm:text-sm font-bold text-zinc-650" x-text="services[activeModal].tagline"></p>
                        </div>

                        <!-- Description -->
                        <div class="prose prose-sm max-w-none text-gray-600 leading-relaxed space-y-3">
                            <p class="text-xs sm:text-sm leading-relaxed" x-text="services[activeModal].desc"></p>
                        </div>

                        <!-- Offerings Checklist -->
                        <div class="bg-[#FAFAFA] border border-[#ECECEC] rounded-2xl p-5 sm:p-6 space-y-3 sm:space-y-4">
                            <h3 class="text-xs font-bold text-[#111111] uppercase tracking-wider" x-text="services[activeModal].offeringsTitle"></h3>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs font-medium text-gray-700">
                                <template x-for="item in services[activeModal].offerings" :key="item">
                                    <li class="flex items-center gap-2">
                                        <span class="w-4 h-4 rounded-full bg-zinc-150 text-zinc-900 border border-zinc-250 flex items-center justify-center font-bold text-[10px]">✓</span>
                                        <span x-text="item"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>

                        <!-- MANDATORY POPUP END SECTION: Why Choose KKSB STUDIOS? (BLACK CARD) -->
                        <div class="bg-[#111111] border border-zinc-800 text-white p-5 sm:p-8 rounded-2xl space-y-3 shadow-xl relative overflow-hidden">
                            <span class="text-[11px] font-extrabold uppercase tracking-widest text-zinc-400 block">💡 Why Choose KKSB STUDIOS?</span>
                            <p class="text-xs sm:text-sm leading-relaxed text-gray-200 font-light">
                                We combine creativity, strategy, and storytelling to deliver marketing solutions that don't just look good—they drive real business growth. From branding and content creation to digital marketing and website development, our team works as your long-term creative partner, helping your business stand out in an increasingly competitive digital world.
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between pt-4 border-t border-[#ECECEC]">
                            <button @click="activeModal = null" class="text-xs font-bold text-gray-500 hover:text-black">
                                Close Window
                            </button>
                            <a href="/contact" class="inline-flex items-center space-x-2 bg-zinc-950 hover:bg-zinc-800 text-white text-xs font-bold px-5 sm:px-6 py-3 sm:py-3.5 rounded-full transition shadow-md shadow-black/10">
                                <span>Inquire About This Service</span>
                                <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                            </a>
                        </div>

                    </div>
                </template>

            </div>
        </div>

    </div>

</x-frontend-layout>
