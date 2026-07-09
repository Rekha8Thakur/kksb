<x-frontend-layout>
    
    <!-- Hero Section with Background Slider -->
    <section class="relative min-h-[90vh] flex items-center bg-zinc-950 text-white overflow-hidden py-20"
             x-data="{ 
                activeSlide: 0, 
                slides: [
                    'https://images.unsplash.com/photo-1601506521937-0121a7fc2a6b?q=80&w=1920&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1920&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?q=80&w=1920&auto=format&fit=crop',
                    'https://images.unsplash.com/photo-1542744094-3a31f103e35f?q=80&w=1920&auto=format&fit=crop'
                ],
                init() {
                    setInterval(() => {
                        this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                    }, 5000);
                }
             }">
        <!-- Background Slides -->
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index"
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-1000"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 z-0 opacity-40 bg-cover bg-center"
                 :style="'background-image: url(' + slide + ');'"
                 style="display: none;">
            </div>
        </template>
        <div class="absolute inset-0 bg-zinc-950/65 z-0"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10 w-full grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-8 space-y-6">
                <span class="hero-badge inline-flex px-3 py-1 rounded-full text-xs font-bold bg-[#2E7D32]/20 text-[#2E7D32] border border-[#2E7D32]/30 uppercase tracking-wider opacity-0">Himachal's Premier Creative Agency</span>
                <h1 class="hero-title text-5xl sm:text-7xl font-extrabold tracking-tight text-white leading-tight opacity-0">
                    {{ App\Models\Setting::get('home_hero_title', 'Let’s Build Something People Remember.') }}
                </h1>
                <p class="hero-subtitle text-base sm:text-lg text-zinc-350 leading-relaxed max-w-xl opacity-0">
                    {{ App\Models\Setting::get('home_hero_subtitle', 'From social media campaigns to high-impact video production, tell us what you’re building — we’ll help you make it stand out.') }}
                </p>

                <!-- CTA & Contact buttons -->
                <div class="hero-cta flex flex-wrap items-center gap-4 pt-4 opacity-0">
                    <a href="/contact" class="inline-flex items-center space-x-2 bg-white hover:bg-zinc-100 text-[#111111] text-sm font-bold px-6 py-3.5 rounded-full transition shadow-lg">
                        <span>Start Your Project</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <a href="https://wa.me/{{ str_replace(' ', '', App\Models\Setting::get('contact_whatsapp', '917876146353')) }}" target="_blank" 
                       class="inline-flex items-center space-x-2 border border-zinc-700 bg-zinc-900/50 hover:bg-zinc-800 hover:border-zinc-600 text-white text-sm font-bold px-6 py-3.5 rounded-full transition">
                        <i data-lucide="phone-call" class="w-4 h-4 text-[#2E7D32]"></i>
                        <span>WhatsApp Us</span>
                    </a>
                </div>
            </div>

            <!-- Interactive Staggered Grid Column -->
            <div class="lg:col-span-4 hidden lg:flex items-center justify-center relative" id="interactive-grid-container">
                <!-- Outer glowing ring -->
                <div class="absolute w-[340px] h-[340px] border border-emerald-500/10 rounded-full animate-pulse z-0"></div>
                <div class="grid grid-cols-5 gap-3 max-w-[280px] relative z-10">
                    <!-- 25 interactive boxes for the wave effect -->
                    @for($i = 0; $i < 25; $i++)
                        <div class="interactive-el aspect-square w-11 rounded-xl bg-gradient-to-br from-emerald-500/15 to-teal-500/5 border border-emerald-500/20 hover:border-emerald-400 hover:from-emerald-500/30 cursor-pointer shadow-md opacity-0"></div>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    <!-- Client Logo Showcase (Infinite Marquee) -->
    @if($clients->isNotEmpty())
    <section class="py-10 border-b border-gray-150 bg-[#F8F8F8] overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 mb-3">
            <p class="text-center text-xs font-bold text-gray-400 uppercase tracking-widest">Trusted By Leading Brands</p>
        </div>
        
        <!-- Marquee Row -->
        <div class="relative w-full overflow-hidden flex items-center py-4 bg-[#F8F8F8]">
            <!-- Left/Right Fade Mask -->
            <div class="absolute left-0 top-0 bottom-0 w-20 bg-gradient-to-r from-[#F8F8F8] to-transparent z-10 pointer-events-none"></div>
            <div class="absolute right-0 top-0 bottom-0 w-20 bg-gradient-to-l from-[#F8F8F8] to-transparent z-10 pointer-events-none"></div>
            
            <div class="animate-marquee flex items-center space-x-12 whitespace-nowrap">
                <!-- First Set of Logos -->
                @foreach($clients as $client)
                    <a href="{{ $client->website_url }}" target="_blank" class="h-16 w-44 flex-shrink-0 flex items-center justify-center group transition-all duration-300">
                        <img src="{{ asset($client->logo) }}" 
                             class="max-h-full max-w-full object-contain hover:scale-110 transition duration-300 transform" 
                             alt="{{ $client->name }}">
                    </a>
                @endforeach
                <!-- Duplicate Set for Continuous Loop -->
                @foreach($clients as $client)
                    <a href="{{ $client->website_url }}" target="_blank" class="h-16 w-44 flex-shrink-0 flex items-center justify-center group transition-all duration-300">
                        <img src="{{ asset($client->logo) }}" 
                             class="max-h-full max-w-full object-contain hover:scale-110 transition duration-300 transform" 
                             alt="{{ $client->name }}">
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Custom CSS for Infinite Scrolling -->
    <style>
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 20s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
    @endif

    <!-- Services Section -->
    <section class="py-24 bg-white" id="services">
        <div class="max-w-7xl mx-auto px-6 space-y-16">
            <!-- Section Header -->
            <div class="text-center space-y-4 max-w-2xl mx-auto">
                <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest">What We Do</span>
                <h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight">Our Creative Services</h2>
                <p class="text-sm text-gray-550">End-to-end creative and digital solutions to help your brand stand out and grow consistently.</p>
            </div>

            <!-- Staggered Bento Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                @foreach($services as $index => $service)
                    @php
                        // Create a staggered pattern for 12 columns: 8, 4, 4, 8, 8, 4
                        $mod = $index % 4;
                        $cols = 'lg:col-span-4';
                        if ($mod == 0 || $mod == 3) {
                            $cols = 'lg:col-span-8';
                        }
                    @endphp
                    <div class="{{ $cols }} bg-zinc-950 text-white rounded-[32px] p-8 lg:p-12 transition duration-500 group flex flex-col justify-end overflow-hidden relative min-h-[420px] border border-zinc-800 hover:border-zinc-700 hover:shadow-2xl" data-aos="fade-up">
                        
                        <!-- Background Image Hover Zoom (Motion) -->
                        @if($service->image_path)
                        <div class="absolute inset-0 z-0 opacity-40 group-hover:opacity-30 transition-all duration-700 ease-out bg-cover bg-center scale-100 group-hover:scale-110" style="background-image: url('{{ $service->image_path }}');"></div>
                        @endif
                        
                        <!-- Dark Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/40 to-transparent z-10 transition-all duration-500 group-hover:from-zinc-950/90"></div>

                        <!-- Content wrapper -->
                        <div class="relative z-20 space-y-6">
                            <!-- Icon -->
                            <div class="w-12 h-12 bg-white/10 backdrop-blur-md rounded-2xl flex items-center justify-center text-white border border-white/15 shadow-sm group-hover:bg-[#2E7D32] group-hover:text-white transition duration-300">
                                <i data-lucide="{{ $service->icon ?? 'briefcase' }}" class="w-5 h-5"></i>
                            </div>
                            
                            <div class="space-y-3">
                                <h3 class="text-2xl font-bold tracking-tight text-white group-hover:text-[#2E7D32] transition duration-300">{{ $service->title }}</h3>
                                <p class="text-xs text-zinc-300 leading-relaxed max-w-xl transition-all duration-500 group-hover:text-white">{{ $service->short_description }}</p>
                            </div>

                            <!-- Expandable Features List with Motion -->
                            @if(!empty($service->features))
                                <div class="max-h-0 opacity-0 overflow-hidden group-hover:max-h-40 group-hover:opacity-100 transition-all duration-700 ease-in-out">
                                    <ul class="space-y-2 pt-4 border-t border-white/10">
                                        @foreach(array_slice($service->features, 0, 3) as $feature)
                                            <li class="flex items-center space-x-2 text-[11px] text-zinc-300">
                                                <span class="w-1.5 h-1.5 rounded-full bg-[#2E7D32]"></span>
                                                <span>{{ $feature }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            <!-- Card CTA Actions -->
                            <div class="pt-4 flex items-center justify-between border-t border-white/10 group-hover:border-transparent transition-all duration-500">
                                <a href="/services/{{ $service->slug }}" class="inline-flex items-center space-x-1.5 text-xs font-bold text-white hover:text-[#2E7D32] transition pb-0.5">
                                    <span>Learn More</span>
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 transition group-hover:translate-x-1"></i>
                                </a>
                                <span class="text-[9px] font-extrabold text-[#2E7D32] bg-[#2E7D32]/20 px-2.5 py-1 rounded-full uppercase tracking-wider">Free of Cost</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Why Choose Us / Statistics -->
    <section class="py-24 bg-[#F8F8F8]">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            <div class="lg:col-span-5 space-y-6" data-aos="fade-right">
                <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest">Why Choose Us</span>
                <h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-tight">Results that speak for themselves.</h2>
                <p class="text-sm text-gray-500 leading-relaxed">
                    We combine local market understanding with premium production quality to execute campaigns that don't just look good, but drive real business metrics.
                </p>
                <div class="pt-4">
                    <a href="/about" class="inline-flex items-center space-x-2 bg-[#111111] hover:bg-[#2E7D32] text-white text-xs font-bold px-6 py-3.5 rounded-full transition shadow-md">
                        <span>Our Studio Story</span>
                        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>
            </div>

            <!-- Statistics Grid -->
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-8">
                <!-- Stat 1 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 space-y-2" data-aos="fade-up">
                    <div class="text-4xl sm:text-5xl font-black text-[#111111]">250+</div>
                    <h4 class="font-bold text-sm text-[#111111]">Businesses Worked With</h4>
                    <p class="text-xs text-gray-400">From local Himachali resorts to state campaigns and corporate brands.</p>
                </div>
                <!-- Stat 2 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 space-y-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl sm:text-5xl font-black text-[#2E7D32]">Millions+</div>
                    <h4 class="font-bold text-sm text-[#111111]">Organic Views Generated</h4>
                    <p class="text-xs text-gray-400">Through our viral Reels strategy and story-based vertical videos.</p>
                </div>
                <!-- Stat 3 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 space-y-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl sm:text-5xl font-black text-[#111111]">Himachal</div>
                    <h4 class="font-bold text-sm text-[#111111]">Focused Market Experts</h4>
                    <p class="text-xs text-gray-400">We understand the local culture, demographics, and tourism dynamics.</p>
                </div>
                <!-- Stat 4 -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 space-y-2" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl sm:text-5xl font-black text-[#2E7D32]">End-to-End</div>
                    <h4 class="font-bold text-sm text-[#111111]">Strategy & Distribution</h4>
                    <p class="text-xs text-gray-400">We don't just shoot videos; we script, produce, and distribute them for ROI.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Projects (Portfolio) -->
    @if($projects->isNotEmpty())
    <section class="py-24 bg-white" id="portfolio">
        <div class="max-w-7xl mx-auto px-6 space-y-16">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6">
                <div class="space-y-4">
                    <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest">Our Work</span>
                    <h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight">Featured Projects & Results</h2>
                </div>
                <a href="/portfolio" class="inline-flex items-center space-x-2 border border-gray-300 hover:border-[#111111] hover:bg-[#F8F8F8] text-[#111111] text-xs font-bold px-6 py-3.5 rounded-full transition">
                    <span>View All Work</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($projects as $project)
                    <div class="bg-white border border-gray-100 hover:border-gray-200 shadow-sm hover:shadow-2xl rounded-3xl overflow-hidden group transition duration-300 flex flex-col" data-aos="fade-up">
                        <div class="aspect-video w-full overflow-hidden bg-gray-100 relative">
                            <img src="{{ asset($project->main_image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $project->title }}">
                            <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-[10px] font-bold text-gray-800 px-3 py-1 rounded-full uppercase tracking-wider">
                                {{ $project->category->name }}
                            </span>
                        </div>
                        <div class="p-8 flex-grow flex flex-col justify-between space-y-6">
                            <div class="space-y-4">
                                <h3 class="text-2xl font-bold text-gray-900 leading-tight">{{ $project->title }}</h3>
                                <p class="text-xs text-gray-500 leading-relaxed font-semibold">Client: {{ $project->client }}</p>
                                
                                <div class="bg-[#F8F8F8] p-4 rounded-2xl border border-gray-100 space-y-1">
                                    <span class="text-[10px] uppercase font-bold text-[#2E7D32] tracking-wider">Key Result Achieved</span>
                                    <p class="text-sm text-gray-700 font-semibold">{{ $project->results }}</p>
                                </div>
                            </div>
                            
                            <a href="/portfolio/{{ $project->slug }}" class="inline-flex items-center space-x-2 text-xs font-bold text-[#111111] hover:text-[#2E7D32] transition group">
                                <span>Read Case Study</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 group-hover:translate-x-1 transition"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Our Simple Process -->
    <section class="py-24 bg-[#F8F8F8]">
        <div class="max-w-7xl mx-auto px-6 space-y-16">
            <div class="text-center space-y-4 max-w-2xl mx-auto">
                <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest">How We Work</span>
                <h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight">Our Simple Process</h2>
                <p class="text-sm text-gray-500">A transparent and proven process that ensures great results every time.</p>
            </div>

            <!-- Timeline steps -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm relative group space-y-4" data-aos="fade-up">
                    <div class="w-10 h-10 bg-zinc-100 rounded-full flex items-center justify-center font-bold text-[#111111] text-sm">01</div>
                    <h3 class="font-bold text-lg">We Review</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">We review your enquiry details, business model, and existing marketing footprints.</p>
                </div>
                <!-- Step 2 -->
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm relative group space-y-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-10 h-10 bg-zinc-100 rounded-full flex items-center justify-center font-bold text-[#111111] text-sm">02</div>
                    <h3 class="font-bold text-lg">We Understand</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">We suggestion alignment call to understand your target audience, goals, and content vision.</p>
                </div>
                <!-- Step 3 -->
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm relative group space-y-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-10 h-10 bg-zinc-100 rounded-full flex items-center justify-center font-bold text-[#111111] text-sm">03</div>
                    <h3 class="font-bold text-lg">We Recommend</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">We present a tailormade strategy outline: shoot lists, posting calendars, or funnel structures.</p>
                </div>
                <!-- Step 4 -->
                <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm relative group space-y-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-10 h-10 bg-zinc-100 rounded-full flex items-center justify-center font-bold text-[#111111] text-sm">04</div>
                    <h3 class="font-bold text-lg">We Connect</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">We schedule the shoots and launch marketing execution with weekly optimization cycles.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    @if($testimonials->isNotEmpty())
    <section class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-6 space-y-12 text-center" x-data="{ active: 0, count: {{ $testimonials->count() }} }">
            <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest block">Client Feedback</span>
            
            <div class="relative min-h-[220px] flex items-center justify-center">
                @foreach($testimonials as $index => $testimonial)
                    <div x-show="active === {{ $index }}" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="space-y-6" style="display: none;">
                        <p class="text-xl sm:text-2xl font-medium text-gray-800 italic leading-relaxed">
                            "{{ $testimonial->feedback }}"
                        </p>
                        <div class="flex items-center justify-center space-x-3">
                            @if($testimonial->client_avatar)
                                <img src="{{ asset($testimonial->client_avatar) }}" class="w-10 h-10 rounded-full object-cover border" alt="">
                            @endif
                            <div class="text-left">
                                <h4 class="font-bold text-sm text-[#111111]">{{ $testimonial->client_name }}</h4>
                                <p class="text-xs text-gray-400 font-semibold">{{ $testimonial->client_company }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- slider controls -->
            <div class="flex justify-center items-center space-x-4 pt-4">
                <button @click="active = (active - 1 + count) % count" class="p-2 border rounded-full hover:bg-gray-50 text-gray-500 transition focus:outline-none">
                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                </button>
                <button @click="active = (active + 1) % count" class="p-2 border rounded-full hover:bg-gray-50 text-gray-500 transition focus:outline-none">
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </button>
            </div>
        </div>
    </section>
    @endif

    <!-- FAQs Section -->
    @if($faqs->isNotEmpty())
    <section class="py-24 bg-[#F8F8F8]">
        <div class="max-w-4xl mx-auto px-6 space-y-12" x-data="{ active: null }">
            <div class="text-center space-y-4 max-w-xl mx-auto">
                <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest block">Questions</span>
                <h2 class="text-4xl font-extrabold tracking-tight">Frequently Asked Questions</h2>
            </div>

            <div class="space-y-4">
                @foreach($faqs as $index => $faq)
                    <div class="bg-white rounded-2xl border border-gray-150 overflow-hidden transition duration-300">
                        <button @click="active = (active === {{ $index }} ? null : {{ $index }})" 
                                class="w-full flex items-center justify-between p-6 font-bold text-left text-sm sm:text-base text-gray-900 focus:outline-none">
                            <span>{{ $faq->question }}</span>
                            <span class="text-gray-400 transition-transform duration-200" :class="active === {{ $index }} ? 'rotate-45' : ''">
                                <i data-lucide="plus" class="w-4 h-4"></i>
                            </span>
                        </button>
                        <div x-show="active === {{ $index }}" x-transition class="p-6 pt-0 text-xs sm:text-sm text-gray-500 leading-relaxed border-t border-gray-50">
                            {{ $faq->answer }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Call To Action (CTA) banner -->
    <section class="relative bg-zinc-950 text-white py-24 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0 opacity-20 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=1200&auto=format&fit=crop');"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/80 to-zinc-950 z-0"></div>

        <div class="max-w-5xl mx-auto px-6 relative z-10 text-center space-y-8" data-aos="fade-up">
            <h2 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-white leading-tight">
                Have a project in mind?<br>Let's talk.
            </h2>
            <p class="text-sm text-zinc-400 max-w-md mx-auto leading-relaxed">
                Tell us your goal, timeline and budget — we'll help you figure out the right next step to elevate your brand.
            </p>
            <div class="flex flex-wrap justify-center items-center gap-4 pt-4">
                <a href="/contact" class="inline-flex items-center space-x-2 bg-[#2E7D32] hover:bg-[#2E7D32]/90 text-white text-xs font-bold px-6 py-3.5 rounded-full transition shadow-lg">
                    <span>Send Enquiry</span>
                    <i data-lucide="send" class="w-3.5 h-3.5"></i>
                </a>
                <a href="https://wa.me/{{ str_replace(' ', '', App\Models\Setting::get('contact_whatsapp', '917876146353')) }}" target="_blank" 
                   class="inline-flex items-center space-x-2 border border-zinc-700 bg-zinc-900/50 hover:bg-zinc-800 text-white text-xs font-bold px-6 py-3.5 rounded-full transition">
                    <i data-lucide="phone-call" class="w-3.5 h-3.5 text-[#2E7D32]"></i>
                    <span>WhatsApp Us</span>
                </a>
            </div>
        </div>
    <!-- Anime.js Animations Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Initial Timeline for Hero Text
            const tl = anime.timeline({
                easing: 'easeOutExpo',
                duration: 1000
            });
            
            tl
            .add({
                targets: '.hero-badge',
                translateY: [30, 0],
                opacity: [0, 1],
                delay: 200
            })
            .add({
                targets: '.hero-title',
                translateY: [40, 0],
                opacity: [0, 1],
                offset: '-=700'
            })
            .add({
                targets: '.hero-subtitle',
                translateY: [30, 0],
                opacity: [0, 1],
                offset: '-=750'
            })
            .add({
                targets: '.hero-cta',
                translateY: [20, 0],
                opacity: [0, 1],
                offset: '-=800'
            });

            // Grid Entrance Animation
            anime({
                targets: '#interactive-grid-container .interactive-el',
                scale: [0, 1],
                opacity: [0, 1],
                delay: anime.stagger(50, {grid: [5, 5], from: 'center'}),
                duration: 1200,
                easing: 'easeOutElastic(1, .8)',
                delay: 600
            });

            // Ripple Click animation for interactive grid
            const container = document.getElementById('interactive-grid-container');
            if (container) {
                container.addEventListener('click', (e) => {
                    const el = e.target.closest('.interactive-el');
                    if (!el) return;
                    
                    const els = Array.from(container.querySelectorAll('.interactive-el'));
                    const index = els.indexOf(el);
                    
                    anime({
                        targets: '#interactive-grid-container .interactive-el',
                        scale: [
                            {value: 0.8, easing: 'easeOutSine', duration: 150},
                            {value: 1.15, easing: 'easeInOutQuad', duration: 250},
                            {value: 1.0, easing: 'easeOutQuad', duration: 200}
                        ],
                        backgroundColor: [
                            {value: '#10b981', duration: 150}, // Glow green
                            {value: 'rgba(16, 185, 129, 0.2)', duration: 450} // Back to transparent gradient
                        ],
                        rotate: '1turn',
                        delay: anime.stagger(50, {grid: [5, 5], from: index})
                    });
                });
            }
        });
    </script>

</x-frontend-layout>
