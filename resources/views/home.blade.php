<x-frontend-layout>
    @section('head')
        <link rel="preload" as="video" type="video/mp4" href="https://d8j0ntlcm91z4.cloudfront.net/user_38xzZboKViGWJOttwIXH07lWA1P/hf_20260619_191346_9d19d66e-86a4-47f7-8dc6-712c1788c3b2.mp4">
    @endsection

    <!-- Inject Google Font Barlow -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
    <!-- Hero Section with Background Fading Video -->
    <section class="relative h-screen flex items-center bg-zinc-950 text-white overflow-hidden">
        
        <!-- Fading Background Video (Matches React FadingVideo component) -->
        <div x-data="{
            sources: ['https://d8j0ntlcm91z4.cloudfront.net/user_38xzZboKViGWJOttwIXH07lWA1P/hf_20260619_191346_9d19d66e-86a4-47f7-8dc6-712c1788c3b2.mp4'],
            index: 0,
            opacity: 0,
            fadingOut: false,
            rafId: null,
            fadeInMs: 500,
            fadeOutMs: 550,
            fadeOutThreshold: 0.55,
            init() {
                const video = this.$refs.video;
                if (!video) return;
                
                const onMetadataLoaded = () => {
                    this.fadingOut = false;
                    this.animateOpacity(0, 1, this.fadeInMs);
                };
                
                if (video.readyState >= 1) {
                    onMetadataLoaded();
                } else {
                    video.addEventListener('loadedmetadata', onMetadataLoaded);
                }
                
                video.addEventListener('timeupdate', () => {
                    if (!video.duration || this.fadingOut) return;
                    const remaining = video.duration - video.currentTime;
                    if (remaining <= this.fadeOutThreshold) {
                        this.fadingOut = true;
                        this.animateOpacity(1, 0, this.fadeOutMs);
                    }
                });
                
                video.addEventListener('ended', () => {
                    if (this.sources.length === 1) {
                        video.currentTime = 0;
                        this.fadingOut = false;
                        video.play().catch(() => {});
                        this.animateOpacity(0, 1, this.fadeInMs);
                    } else {
                        this.fadingOut = false;
                        this.index = (this.index + 1) % this.sources.length;
                        video.src = this.sources[this.index];
                        video.load();
                        video.play().catch(() => {});
                    }
                });

                // Explicitly load and start playing on mount to trigger loadedmetadata
                video.load();
                video.play().catch(() => {});
            },
            animateOpacity(from, to, duration) {
                const start = performance.now();
                const step = (now) => {
                    const elapsed = now - start;
                    const t = Math.min(elapsed / duration, 1);
                    this.opacity = from + (to - from) * t;
                    if (t < 1) {
                        this.rafId = requestAnimationFrame(step);
                    }
                };
                if (this.rafId) cancelAnimationFrame(this.rafId);
                this.rafId = requestAnimationFrame(step);
            }
        }" class="absolute inset-0 z-0 h-full w-full pointer-events-none opacity-65">
            <video x-ref="video" src="https://d8j0ntlcm91z4.cloudfront.net/user_38xzZboKViGWJOttwIXH07lWA1P/hf_20260619_191346_9d19d66e-86a4-47f7-8dc6-712c1788c3b2.mp4" :style="{ opacity: opacity, width: '120%', height: '120%', transform: 'translate(-10%, -10%)' }" autoplay muted playsinline preload="auto" class="w-full h-full object-cover object-top max-w-none"></video>
        </div>
        <div class="absolute inset-0 bg-zinc-950/40 z-0"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10 w-full grid grid-cols-1 lg:grid-cols-12 gap-12 items-center pt-24 md:pt-0">
            <div class="lg:col-span-9 space-y-6 text-left">
                <span class="hero-badge liquid-glass inline-flex px-4 py-1.5 rounded-full text-xs font-bold text-white border border-white/10 uppercase tracking-widest opacity-0 font-barlow">// Himachal's Premier Creative Agency</span>
                
                <h1 class="hero-title blur-reveal font-barlow italic text-5xl sm:text-7xl font-extrabold tracking-tight text-white leading-[0.9] tracking-[-3px] uppercase opacity-0 text-left">
                    {{ App\Models\Setting::get('home_hero_title', 'Let’s Build Something People Remember.') }}
                </h1>
                
                <p class="hero-subtitle text-base sm:text-lg text-white/80 leading-relaxed max-w-xl opacity-0 font-barlow font-light text-left">
                    {{ App\Models\Setting::get('home_hero_subtitle', 'From social media campaigns to high-impact video production, tell us what you’re building — we’ll help you make it stand out.') }}
                </p>

                <!-- CTA & Contact buttons -->
                <div class="hero-cta flex flex-wrap items-center gap-4 pt-4 opacity-0">
                    <a href="/contact" class="inline-flex items-center space-x-2 bg-white hover:bg-zinc-100 text-black text-sm font-bold px-6 py-3.5 rounded-full transition shadow-lg">
                        <span>Start Your Project</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                    <a href="https://wa.me/{{ str_replace(' ', '', App\Models\Setting::get('contact_whatsapp', '917876146353')) }}" target="_blank" 
                       class="liquid-glass-strong inline-flex items-center space-x-2 border border-white/10 hover:bg-white/10 text-white text-sm font-bold px-6 py-3.5 rounded-full transition">
                        <i data-lucide="phone-call" class="w-4 h-4 text-emerald-500"></i>
                        <span>WhatsApp Us</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Client Logo Showcase (Infinite Marquee) -->
    @if($clients->isNotEmpty())
    <section class="py-10 border-y border-white/10 bg-zinc-950 overflow-hidden relative">
        <div class="max-w-7xl mx-auto px-6 mb-3">
            <p class="text-center text-xs font-bold text-white/50 uppercase tracking-widest font-barlow">// Trusted By Leading Brands</p>
        </div>
        
        <!-- Marquee Row -->
        <div class="relative w-full overflow-hidden flex items-center py-4 bg-zinc-950">
            <!-- Left/Right Fade Mask -->
            <div class="absolute left-0 top-0 bottom-0 w-20 bg-gradient-to-r from-zinc-950 to-transparent z-10 pointer-events-none"></div>
            <div class="absolute right-0 top-0 bottom-0 w-20 bg-gradient-to-l from-zinc-950 to-transparent z-10 pointer-events-none"></div>
            
            <div class="animate-marquee flex items-center space-x-12 whitespace-nowrap">
                <!-- First Set of Logos -->
                @foreach($clients as $client)
                    <a href="{{ $client->website_url }}" target="_blank" class="h-16 w-44 flex-shrink-0 flex items-center justify-center group transition-all duration-300">
                        <img src="{{ asset($client->logo) }}" 
                             class="max-h-full max-w-full object-contain opacity-80 hover:opacity-100 hover:scale-110 transition duration-300 transform" 
                             alt="{{ $client->name }}">
                    </a>
                @endforeach
                <!-- Duplicate Set for Continuous Loop -->
                @foreach($clients as $client)
                    <a href="{{ $client->website_url }}" target="_blank" class="h-16 w-44 flex-shrink-0 flex items-center justify-center group transition-all duration-300">
                        <img src="{{ asset($client->logo) }}" 
                             class="max-h-full max-w-full object-contain opacity-80 hover:opacity-100 hover:scale-110 transition duration-300 transform" 
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
    <section class="py-24 bg-zinc-950 relative overflow-hidden" id="services">
        <!-- Capabilities Background Video -->
        <div x-data="{
            sources: ['https://d8j0ntlcm91z4.cloudfront.net/user_38xzZboKViGWJOttwIXH07lWA1P/hf_20260622_093722_ccfc7ebf-182f-419f-8a62-2dc02db7dd9d.mp4'],
            index: 0,
            opacity: 0,
            fadingOut: false,
            rafId: null,
            fadeInMs: 500,
            fadeOutMs: 550,
            fadeOutThreshold: 0.55,
            init() {
                const video = this.$refs.video;
                if (!video) return;
                
                const onMetadataLoaded = () => {
                    this.fadingOut = false;
                    this.animateOpacity(0, 1, this.fadeInMs);
                };
                
                if (video.readyState >= 1) {
                    onMetadataLoaded();
                } else {
                    video.addEventListener('loadedmetadata', onMetadataLoaded);
                }
                
                video.addEventListener('timeupdate', () => {
                    if (!video.duration || this.fadingOut) return;
                    const remaining = video.duration - video.currentTime;
                    if (remaining <= this.fadeOutThreshold) {
                        this.fadingOut = true;
                        this.animateOpacity(1, 0, this.fadeOutMs);
                    }
                });
                
                video.addEventListener('ended', () => {
                    if (this.sources.length === 1) {
                        video.currentTime = 0;
                        this.fadingOut = false;
                        video.play().catch(() => {});
                        this.animateOpacity(0, 1, this.fadeInMs);
                    } else {
                        this.fadingOut = false;
                        this.index = (this.index + 1) % this.sources.length;
                        video.src = this.sources[this.index];
                        video.load();
                        video.play().catch(() => {});
                    }
                });

                // Explicitly load and start playing on mount
                video.load();
                video.play().catch(() => {});
            },
            animateOpacity(from, to, duration) {
                const start = performance.now();
                const step = (now) => {
                    const elapsed = now - start;
                    const t = Math.min(elapsed / duration, 1);
                    this.opacity = from + (to - from) * t;
                    if (t < 1) {
                        this.rafId = requestAnimationFrame(step);
                    }
                };
                if (this.rafId) cancelAnimationFrame(this.rafId);
                this.rafId = requestAnimationFrame(step);
            }
        }" class="absolute inset-0 z-0 h-full w-full pointer-events-none opacity-35">
            <video x-ref="video" :src="sources[index]" :style="{ opacity: opacity }" autoplay muted playsinline preload="auto" class="w-full h-full object-cover"></video>
        </div>
        <div class="absolute inset-0 bg-zinc-950/70 z-0"></div>

        <div class="max-w-7xl mx-auto px-6 space-y-16 relative z-10">
            <!-- Section Header (Liquid Glass Capsule with frosted light sheen) -->
            <div class="text-center space-y-4 max-w-2xl mx-auto p-8 rounded-3xl liquid-glass border border-white/10 bg-white/5 backdrop-blur-md">
                <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest font-barlow block">// What We Do</span>
                <h2 class="blur-reveal font-barlow italic text-4xl sm:text-6xl font-extrabold tracking-tight text-white leading-[0.9]">Our Creative Services</h2>
                <p class="text-xs sm:text-sm text-white/90 max-w-md mx-auto font-barlow font-light">End-to-end creative and digital solutions to help your brand stand out and grow consistently.</p>
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
                    <div class="{{ $cols }} liquid-glass text-white rounded-[32px] p-8 lg:p-12 transition duration-500 group flex flex-col justify-end overflow-hidden relative min-h-[420px] border border-white/10 hover:border-white/20 hover:shadow-2xl" data-aos="fade-up">
                        
                        <!-- Background Image Hover Zoom (Motion) -->
                        @if($service->image_path)
                        <div class="absolute inset-0 z-0 opacity-25 group-hover:opacity-35 transition-all duration-700 ease-out bg-cover bg-center scale-100 group-hover:scale-110" style="background-image: url('{{ $service->image_path }}');"></div>
                        @endif
                        
                        <!-- Dark Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/60 to-black/20 z-10 transition-all duration-500 group-hover:from-black/100 group-hover:via-black/85 group-hover:to-black/30"></div>

                        <!-- Content wrapper -->
                        <div class="relative z-20 space-y-6">
                            <!-- Icon -->
                            <div class="w-12 h-12 liquid-glass rounded-2xl flex items-center justify-center text-white border border-white/10 shadow-sm group-hover:bg-emerald-600 group-hover:border-emerald-500 transition duration-300">
                                <i data-lucide="{{ $service->icon ?? 'briefcase' }}" class="w-5 h-5"></i>
                            </div>
                            
                            <div class="space-y-3">
                                <h3 class="text-2xl font-bold tracking-tight text-white group-hover:text-emerald-400 transition duration-300 font-barlow">{{ $service->title }}</h3>
                                <p class="text-sm text-white/90 leading-relaxed max-w-xl transition-all duration-500 group-hover:text-white font-barlow">{{ $service->short_description }}</p>
                            </div>

                            <!-- Expandable Features List with Motion -->
                            @if(!empty($service->features))
                                <div class="transition-all duration-300">
                                    <ul class="space-y-2 pt-4 border-t border-white/10">
                                        @foreach(array_slice($service->features, 0, 3) as $feature)
                                            <li class="flex items-center space-x-2 text-[12px] text-white/90">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                                <span class="font-barlow">{{ $feature }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            <!-- Card CTA Actions -->
                            <div class="pt-4 flex items-center justify-between border-t border-white/10 group-hover:border-transparent transition-all duration-500">
                                <a href="/services/{{ $service->slug }}" class="inline-flex items-center space-x-1.5 text-sm font-bold text-white hover:text-emerald-400 transition pb-0.5 font-barlow">
                                    <span>Learn More</span>
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 transition group-hover:translate-x-1"></i>
                                </a>
                                <span class="text-[10px] font-extrabold text-emerald-400 bg-emerald-400/20 px-2.5 py-1 rounded-full uppercase tracking-wider font-barlow">Free of Cost</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us / Statistics -->
    <section class="py-24 bg-zinc-950 text-white relative">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            <div class="lg:col-span-5 space-y-6" data-aos="fade-right">
                <span class="text-xs font-bold text-emerald-500 uppercase tracking-widest font-barlow">// Why Choose Us</span>
                <h2 class="blur-reveal font-barlow italic text-4xl sm:text-6xl font-extrabold tracking-tight leading-[0.9] text-white">Results that speak for themselves.</h2>
                <p class="text-sm text-white/70 leading-relaxed font-barlow font-light">
                    We combine local market understanding with premium production quality to execute campaigns that don't just look good, but drive real business metrics.
                </p>
                <div class="pt-4">
                    <a href="/about" class="inline-flex items-center space-x-2 bg-white hover:bg-zinc-200 text-black text-xs font-bold px-6 py-3.5 rounded-full transition shadow-md">
                        <span>Our Studio Story</span>
                        <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>
            </div>

            <!-- Statistics Grid -->
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-8">
                <!-- Stat 1 -->
                <div class="liquid-glass p-8 rounded-3xl border border-white/10 space-y-2" data-aos="fade-up">
                    <div class="text-4xl sm:text-5xl font-black text-white font-barlow">250+</div>
                    <h4 class="font-bold text-sm text-white font-barlow">Businesses Worked With</h4>
                    <p class="text-xs text-white/60 font-barlow font-light">From local Himachali resorts to state campaigns and corporate brands.</p>
                </div>
                <!-- Stat 2 -->
                <div class="liquid-glass p-8 rounded-3xl border border-white/10 space-y-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-4xl sm:text-5xl font-black text-emerald-500 font-barlow">Millions+</div>
                    <h4 class="font-bold text-sm text-white font-barlow">Organic Views Generated</h4>
                    <p class="text-xs text-white/60 font-barlow font-light">Through our viral Reels strategy and story-based vertical videos.</p>
                </div>
                <!-- Stat 3 -->
                <div class="liquid-glass p-8 rounded-3xl border border-white/10 space-y-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-4xl sm:text-5xl font-black text-white font-barlow">Himachal</div>
                    <h4 class="font-bold text-sm text-white font-barlow">Focused Market Experts</h4>
                    <p class="text-xs text-white/60 font-barlow font-light">We understand the local culture, demographics, and tourism dynamics.</p>
                </div>
                <!-- Stat 4 -->
                <div class="liquid-glass p-8 rounded-3xl border border-white/10 space-y-2" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-4xl sm:text-5xl font-black text-emerald-500 font-barlow">End-to-End</div>
                    <h4 class="font-bold text-sm text-white font-barlow">Strategy & Distribution</h4>
                    <p class="text-xs text-white/60 font-barlow font-light">We don't just shoot videos; we script, produce, and distribute them for ROI.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Projects (Portfolio) -->
    @if($projects->isNotEmpty())
    <section class="py-24 bg-zinc-950 text-white" id="portfolio">
        <div class="max-w-7xl mx-auto px-6 space-y-16">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6">
                <div class="space-y-4">
                    <span class="text-xs font-bold text-emerald-500 uppercase tracking-widest font-barlow">// Our Work</span>
                    <h2 class="blur-reveal font-barlow italic text-4xl sm:text-6xl font-extrabold tracking-tight text-white leading-[0.9]">Featured Projects & Results</h2>
                </div>
                <a href="/portfolio" class="inline-flex items-center space-x-2 border border-white/10 hover:border-white/30 hover:bg-white/5 text-white text-xs font-bold px-6 py-3.5 rounded-full transition">
                    <span>View All Work</span>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($projects as $project)
                    <div class="liquid-glass border border-white/10 hover:border-white/20 shadow-sm hover:shadow-2xl rounded-3xl overflow-hidden group transition duration-300 flex flex-col" data-aos="fade-up">
                        <div class="aspect-video w-full overflow-hidden bg-zinc-900 relative">
                            <img src="{{ asset($project->main_image) }}" class="w-full h-full object-cover scale-100 group-hover:scale-105 transition duration-500" alt="{{ $project->title }}">
                            <span class="absolute top-4 left-4 liquid-glass text-[10px] font-bold text-white px-3 py-1 rounded-full uppercase tracking-wider border border-white/10">
                                {{ $project->category->name }}
                            </span>
                        </div>
                        <div class="p-8 flex-grow flex flex-col justify-between space-y-6">
                            <div class="space-y-4">
                                <h3 class="text-2xl font-bold text-white leading-tight font-barlow">{{ $project->title }}</h3>
                                <p class="text-xs text-white/70 leading-relaxed font-semibold font-barlow font-light">Client: {{ $project->client }}</p>
                                
                                <div class="liquid-glass p-4 rounded-2xl border border-white/10 space-y-1">
                                    <span class="text-[10px] uppercase font-bold text-emerald-400 tracking-wider font-barlow">// Key Result Achieved</span>
                                    <p class="text-sm text-white font-semibold font-barlow">{{ $project->results }}</p>
                                </div>
                            </div>
                            
                            <a href="/portfolio/{{ $project->slug }}" class="inline-flex items-center space-x-2 text-xs font-bold text-white hover:text-emerald-400 transition group font-barlow">
                                <span>Read Case Study</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 group-hover:translate-x-1 transition text-emerald-400"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Our Simple Process -->
    <section class="py-24 bg-zinc-950 text-white">
        <div class="max-w-7xl mx-auto px-6 space-y-16">
            <div class="text-center space-y-4 max-w-2xl mx-auto">
                <span class="text-xs font-bold text-emerald-500 uppercase tracking-widest font-barlow">// How We Work</span>
                <h2 class="blur-reveal font-barlow italic text-4xl sm:text-6xl font-extrabold tracking-tight text-white leading-[0.9]">Our Simple Process</h2>
                <p class="text-sm text-white/70 font-barlow">A transparent and proven process that ensures great results every time.</p>
            </div>

            <!-- Timeline steps -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="liquid-glass p-8 rounded-3xl border border-white/10 shadow-sm relative group space-y-4" data-aos="fade-up">
                    <div class="w-10 h-10 liquid-glass rounded-full flex items-center justify-center font-bold text-white text-sm border border-white/10">01</div>
                    <h3 class="font-bold text-lg text-white font-barlow">We Review</h3>
                    <p class="text-xs text-white/70 leading-relaxed font-barlow font-light">We review your enquiry details, business model, and existing marketing footprints.</p>
                </div>
                <!-- Step 2 -->
                <div class="liquid-glass p-8 rounded-3xl border border-white/10 shadow-sm relative group space-y-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-10 h-10 liquid-glass rounded-full flex items-center justify-center font-bold text-white text-sm border border-white/10">02</div>
                    <h3 class="font-bold text-lg text-white font-barlow">We Understand</h3>
                    <p class="text-xs text-white/70 leading-relaxed font-barlow font-light">We suggestion alignment call to understand your target audience, goals, and content vision.</p>
                </div>
                <!-- Step 3 -->
                <div class="liquid-glass p-8 rounded-3xl border border-white/10 shadow-sm relative group space-y-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-10 h-10 liquid-glass rounded-full flex items-center justify-center font-bold text-white text-sm border border-white/10">03</div>
                    <h3 class="font-bold text-lg text-white font-barlow">We Recommend</h3>
                    <p class="text-xs text-white/70 leading-relaxed font-barlow font-light">We present a tailormade strategy outline: shoot lists, posting calendars, or funnel structures.</p>
                </div>
                <!-- Step 4 -->
                <div class="liquid-glass p-8 rounded-3xl border border-white/10 shadow-sm relative group space-y-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-10 h-10 liquid-glass rounded-full flex items-center justify-center font-bold text-white text-sm border border-white/10">04</div>
                    <h3 class="font-bold text-lg text-white font-barlow">We Connect</h3>
                    <p class="text-xs text-white/70 leading-relaxed font-barlow font-light">We schedule the shoots and launch marketing execution with weekly optimization cycles.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    @if($testimonials->isNotEmpty())
    <section class="py-24 bg-zinc-950 text-white">
        <div class="max-w-4xl mx-auto px-6 space-y-12 text-center" x-data="{ active: 0, count: {{ $testimonials->count() }} }">
            <span class="text-xs font-bold text-emerald-500 uppercase tracking-widest block font-barlow">// Client Feedback</span>
            
            <div class="relative min-h-[220px] flex items-center justify-center">
                @foreach($testimonials as $index => $testimonial)
                    <div x-show="active === {{ $index }}" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="space-y-6" style="display: none;">
                        <p class="text-xl sm:text-2xl font-medium text-white italic leading-relaxed font-barlow">
                            "{{ $testimonial->feedback }}"
                        </p>
                        <div class="flex items-center justify-center space-x-3">
                            @if($testimonial->client_avatar)
                                <img src="{{ asset($testimonial->client_avatar) }}" class="w-10 h-10 rounded-full object-cover border border-white/10" alt="">
                            @endif
                            <div class="text-left">
                                <h4 class="font-bold text-sm text-white font-barlow">{{ $testimonial->client_name }}</h4>
                                <p class="text-xs text-white/60 font-semibold font-barlow font-light">{{ $testimonial->client_company }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- slider controls -->
            <div class="flex justify-center items-center space-x-4 pt-4">
                <button @click="active = (active - 1 + count) % count" class="p-2 border border-white/10 rounded-full hover:bg-white/5 text-white/70 transition focus:outline-none">
                    <i data-lucide="chevron-left" class="w-4 h-4"></i>
                </button>
                <button @click="active = (active + 1) % count" class="p-2 border border-white/10 rounded-full hover:bg-white/5 text-white/70 transition focus:outline-none">
                    <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </button>
            </div>
        </div>
    </section>
    @endif

    <!-- FAQs Section -->
    @if($faqs->isNotEmpty())
    <section class="py-24 bg-zinc-950 text-white">
        <div class="max-w-4xl mx-auto px-6 space-y-12" x-data="{ active: null }">
            <div class="text-center space-y-4 max-w-xl mx-auto">
                <span class="text-xs font-bold text-emerald-500 uppercase tracking-widest block font-barlow">// Questions</span>
                <h2 class="blur-reveal font-barlow italic text-4xl font-extrabold tracking-tight text-white leading-[0.9]">Frequently Asked Questions</h2>
            </div>

            <div class="space-y-4">
                @foreach($faqs as $index => $faq)
                    <div class="liquid-glass rounded-2xl border border-white/10 overflow-hidden transition duration-300">
                        <button @click="active = (active === {{ $index }} ? null : {{ $index }})" 
                                class="w-full flex items-center justify-between p-6 font-bold text-left text-sm sm:text-base text-white hover:text-emerald-400 focus:outline-none font-barlow">
                            <span>{{ $faq->question }}</span>
                            <span class="text-white/60 transition-transform duration-200" :class="active === {{ $index }} ? 'rotate-45' : ''">
                                <i data-lucide="plus" class="w-4 h-4"></i>
                            </span>
                        </button>
                        <div x-show="active === {{ $index }}" x-transition class="p-6 pt-0 text-xs sm:text-sm text-white/70 leading-relaxed border-t border-white/5 font-barlow font-light">
                            {{ $faq->answer }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Call To Action (CTA) banner with fading loop backdrop -->
    <section class="relative bg-zinc-950 text-white py-24 overflow-hidden">
        <!-- Background Video for CTA -->
        <div x-data="{
            sources: ['https://d8j0ntlcm91z4.cloudfront.net/user_38xzZboKViGWJOttwIXH07lWA1P/hf_20260619_191346_9d19d66e-86a4-47f7-8dc6-712c1788c3b2.mp4'],
            index: 0,
            opacity: 0,
            fadingOut: false,
            rafId: null,
            fadeInMs: 500,
            fadeOutMs: 550,
            fadeOutThreshold: 0.55,
            init() {
                const video = this.$refs.video;
                if (!video) return;
                
                const onMetadataLoaded = () => {
                    this.fadingOut = false;
                    this.animateOpacity(0, 1, this.fadeInMs);
                };
                
                if (video.readyState >= 1) {
                    onMetadataLoaded();
                } else {
                    video.addEventListener('loadedmetadata', onMetadataLoaded);
                }
                
                video.addEventListener('timeupdate', () => {
                    if (!video.duration || this.fadingOut) return;
                    const remaining = video.duration - video.currentTime;
                    if (remaining <= this.fadeOutThreshold) {
                        this.fadingOut = true;
                        this.animateOpacity(1, 0, this.fadeOutMs);
                    }
                });
                
                video.addEventListener('ended', () => {
                    if (this.sources.length === 1) {
                        video.currentTime = 0;
                        this.fadingOut = false;
                        video.play().catch(() => {});
                        this.animateOpacity(0, 1, this.fadeInMs);
                    } else {
                        this.fadingOut = false;
                        this.index = (this.index + 1) % this.sources.length;
                        video.src = this.sources[this.index];
                        video.load();
                        video.play().catch(() => {});
                    }
                });

                // Explicitly load and start playing on mount
                video.load();
                video.play().catch(() => {});
            },
            animateOpacity(from, to, duration) {
                const start = performance.now();
                const step = (now) => {
                    const elapsed = now - start;
                    const t = Math.min(elapsed / duration, 1);
                    this.opacity = from + (to - from) * t;
                    if (t < 1) {
                        this.rafId = requestAnimationFrame(step);
                    }
                };
                if (this.rafId) cancelAnimationFrame(this.rafId);
                this.rafId = requestAnimationFrame(step);
            }
        }" class="absolute inset-0 z-0 h-full w-full pointer-events-none opacity-45">
            <video x-ref="video" src="https://d8j0ntlcm91z4.cloudfront.net/user_38xzZboKViGWJOttwIXH07lWA1P/hf_20260619_191346_9d19d66e-86a4-47f7-8dc6-712c1788c3b2.mp4" :style="{ opacity: opacity, width: '120%', height: '120%', transform: 'translate(-10%, -10%)' }" autoplay muted playsinline preload="auto" class="w-full h-full object-cover object-top max-w-none"></video>
        </div>
        <div class="absolute inset-0 bg-zinc-950/40 z-0"></div>

        <div class="max-w-5xl mx-auto px-6 relative z-10 text-center space-y-8" data-aos="fade-up">
            <h2 class="blur-reveal font-barlow italic text-4xl sm:text-6xl font-extrabold tracking-tight text-white leading-[0.9]">
                Have a project in mind?<br>Let's talk.
            </h2>
            <p class="text-sm text-white/70 max-w-md mx-auto leading-relaxed font-barlow font-light">
                Tell us your goal, timeline and budget — we'll help you figure out the right next step to elevate your brand.
            </p>
            <div class="flex flex-wrap justify-center items-center gap-4 pt-4">
                <a href="/contact" class="inline-flex items-center space-x-2 bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold px-6 py-3.5 rounded-full transition shadow-lg">
                    <span>Send Enquiry</span>
                    <i data-lucide="send" class="w-3.5 h-3.5"></i>
                </a>
                <a href="https://wa.me/{{ str_replace(' ', '', App\Models\Setting::get('contact_whatsapp', '917876146353')) }}" target="_blank" 
                   class="liquid-glass-strong inline-flex items-center space-x-2 border border-white/10 hover:bg-white/10 text-white text-xs font-bold px-6 py-3.5 rounded-full transition">
                    <i data-lucide="phone-call" class="w-3.5 h-3.5 text-emerald-500"></i>
                    <span>WhatsApp Us</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Anime.js Animations Script & BlurReveal Handler -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Initial Timeline for Hero Text
            const tl = anime.timeline({
                easing: 'easeOutExpo',
                duration: 1000
            });
            
            tl
            .add({
                targets: '.header-animate',
                translateY: [-20, 0],
                opacity: [0, 1],
                duration: 800,
                delay: 100
            })
            .add({
                targets: '.hero-badge',
                translateY: [30, 0],
                opacity: [0, 1],
                offset: '-=600'
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

            // Word-by-word Blur reveal script (Replicating React BlurText)
            const reveals = document.querySelectorAll('.blur-reveal');
            reveals.forEach((el) => {
                const text = el.textContent.trim();
                el.textContent = ''; // clear
                const words = text.split(/\s+/);
                
                words.forEach((word, index) => {
                    const span = document.createElement('span');
                    span.textContent = word;
                    span.style.display = 'inline-block';
                    span.style.marginRight = '0.28em';
                    span.style.filter = 'blur(10px)';
                    span.style.opacity = '0';
                    span.style.transform = 'translateY(30px)';
                    span.style.transition = 'filter 0.8s ease-out, opacity 0.8s ease-out, transform 0.8s ease-out';
                    span.style.transitionDelay = `${index * 80}ms`;
                    el.appendChild(span);
                });

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            const spans = el.querySelectorAll('span');
                            spans.forEach((span) => {
                                span.style.filter = 'blur(0px)';
                                span.style.opacity = '1';
                                span.style.transform = 'translateY(0)';
                            });
                            observer.unobserve(el);
                        }
                    });
                }, { threshold: 0.15 });

                observer.observe(el);
            });
        });
    </script>
</x-frontend-layout>
