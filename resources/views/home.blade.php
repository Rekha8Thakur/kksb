<x-frontend-layout>
    <!-- CSS Animations for Infinite Marquee & Parallax Optimization -->
    <style>
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 30s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }
        [data-parallax-speed] {
            will-change: transform;
        }
        @media (min-width: 1024px) {
            .hero-outer-fullscreen {
                height: calc(100vh - 80px) !important;
            }
            .hero-fullscreen-frame {
                height: calc(100vh - 128px) !important;
            }
        }
        .hero-outer-fullscreen {
            min-height: calc(100vh - 80px);
        }
        .hero-fullscreen-frame {
            min-height: calc(100vh - 128px);
        }
    </style>

    <!-- Page Container -->
    <div class="relative overflow-hidden selection:bg-[#111111] selection:text-white" x-data="{
        scrollToShowreel() {
            const el = document.getElementById('showreel-section');
            if (el) {
                el.scrollIntoView({ behavior: 'smooth' });
            }
        }
    }">

        <!-- HERO SECTION -->
        <section class="relative bg-white flex items-center overflow-hidden py-4 lg:py-6 hero-outer-fullscreen">
            <div class="max-w-[1440px] w-full mx-auto px-6 lg:px-[90px]">
                <div class="relative w-full bg-[#FAFAFA] border border-[#ECECEC] rounded-[32px] overflow-hidden shadow-[0_10px_30px_rgba(0,0,0,0.015)] p-6 sm:p-10 lg:p-16 flex items-center hero-fullscreen-frame">
                    <!-- Ambient Parallax Background Glow Effects -->
                    <div class="absolute top-0 right-1/4 w-[550px] h-[550px] bg-gradient-to-br from-[#FF6A00]/8 via-[#FF6A00]/3 to-transparent rounded-full blur-3xl pointer-events-none -z-10 animate-pulse"
                         data-parallax-speed="0.25"></div>
                    <div class="absolute bottom-0 left-10 w-[450px] h-[450px] bg-gradient-to-tr from-[#FF6A00]/5 to-transparent rounded-full blur-2xl pointer-events-none -z-10"
                         data-parallax-speed="-0.2"></div>
                    
                    <!-- Floating Background Graphic Parallax Text -->
                    <div class="absolute top-8 left-1/2 -translate-x-1/2 text-[140px] md:text-[220px] font-black text-gray-900/[0.01] select-none pointer-events-none tracking-tighter uppercase whitespace-nowrap -z-10"
                         data-parallax-speed="0.35">
                        KKSB STUDIOS
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center w-full relative z-10">
                        <!-- Left Content (50%) -->
                        <div class="lg:col-span-6 space-y-5 md:space-y-6" data-aos="fade-up" data-aos-duration="1000" data-parallax-speed="-0.04">
                            <h1 class="text-3xl sm:text-4xl lg:text-[46px] xl:text-[52px] lg:leading-[1.12] font-extrabold tracking-tight">
                                <span class="text-[#111111]">We Build Brands</span> <span class="text-gray-400">That Grow & Inspire</span><span class="text-[#FF6A00]">.</span>
                            </h1>
                            <p class="text-[15px] sm:text-[16px] text-[#666666] leading-relaxed font-light max-w-xl">
                                KKSB Studios helps ambitious businesses stand out with creative strategy, compelling content and performance-driven marketing.
                            </p>

                            <!-- CTAs -->
                            <div class="pt-2 flex flex-col sm:flex-row items-center gap-3">
                                <a href="/services" 
                                   class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 bg-[#FF6A00] hover:bg-[#E55F00] text-white font-semibold h-[52px] px-[20px] rounded-[12px] text-[14px] transition-all duration-300 shadow-md shadow-[#FF6A00]/25 hover:shadow-lg hover:shadow-[#FF6A00]/35 hover:-translate-y-0.5 group">
                                    <span>Our Services</span>
                                    <i data-lucide="arrow-up-right" class="w-4 h-4 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform duration-200"></i>
                                </a>
                                <a href="/portfolio" 
                                   class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 border border-[#ECECEC] text-[#111111] hover:border-[#111111] hover:bg-white font-semibold h-[52px] px-[20px] rounded-[12px] text-[14px] transition-all duration-300 hover:-translate-y-0.5 shadow-sm group">
                                    <span>View Work</span>
                                    <i data-lucide="arrow-up-right" class="w-4 h-4 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform duration-200"></i>
                                </a>
                            </div>

                            <!-- Trust Indicators -->
                            <div class="flex flex-wrap items-center gap-y-2.5 gap-x-5 pt-6 border-t border-[#ECECEC] mt-6 text-[13px] text-[#666666] font-medium">
                                <span class="flex items-center space-x-2">
                                    <span class="text-[#FF6A00]"><i data-lucide="check-circle" class="w-4 h-4"></i></span>
                                    <span>Strategy</span>
                                </span>
                                <span class="flex items-center space-x-2">
                                    <span class="text-[#FF6A00]"><i data-lucide="check-circle" class="w-4 h-4"></i></span>
                                    <span>Production</span>
                                </span>
                                <span class="flex items-center space-x-2">
                                    <span class="text-[#FF6A00]"><i data-lucide="check-circle" class="w-4 h-4"></i></span>
                                    <span>Marketing</span>
                                </span>
                                <span class="flex items-center space-x-2">
                                    <span class="text-[#FF6A00]"><i data-lucide="check-circle" class="w-4 h-4"></i></span>
                                    <span>Growth</span>
                                </span>
                            </div>
                        </div>

                        <!-- Right Side Image with Parallax Depth -->
                        <div class="lg:col-span-6 relative" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200" data-parallax-speed="0.08">
                            <div class="relative overflow-hidden rounded-[20px] shadow-xl aspect-[16/10] bg-gray-100 group border border-[#ECECEC]">
                                <img src="{{ asset('images/landing-shoot.jpg') }}" 
                                     alt="KKSB Studios Video Production Shoot" 
                                     class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition duration-300"></div>

                                <!-- Floating Live Badge with Parallax -->
                                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md border border-white/40 rounded-full px-3.5 py-1.5 flex items-center space-x-2 shadow-md"
                                     data-parallax-speed="-0.12">
                                    <span class="w-2 h-2 rounded-full bg-[#FF6A00] animate-ping"></span>
                                    <span class="text-[11px] font-bold text-[#111111] tracking-wide">KKSB Production</span>
                                </div>

                                <!-- Floating Glassmorphic Card Effect with Counter Parallax -->
                                <div class="absolute bottom-4 left-4 right-4 sm:right-auto bg-black/80 backdrop-blur-md border border-white/10 rounded-xl p-3.5 text-white flex items-center space-x-3.5 shadow-xl max-w-xs"
                                     data-parallax-speed="0.12">
                                    <div class="w-9 h-9 rounded-lg bg-[#FF6A00] flex items-center justify-center flex-shrink-0 text-white shadow-md shadow-[#FF6A00]/30">
                                        <i data-lucide="video" class="w-4.5 h-4.5"></i>
                                    </div>
                                    <div>
                                        <p class="text-[12.5px] font-bold text-white leading-tight">High-Impact Production</p>
                                        <p class="text-[10.5px] text-gray-300 font-light mt-0.5">Creating content that connects & converts</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- TRUST STATS -->
        <section class="py-10 relative overflow-hidden" style="background-color: #0b0b0c; border-top: 1px solid #1f1f21;">
            <!-- Background Parallax Text -->
            <div class="absolute top-1/2 left-10 -translate-y-1/2 text-[180px] font-black pointer-events-none select-none uppercase"
                 data-parallax-speed="-0.2"
                 style="color: rgba(255, 255, 255, 0.015); z-index: 1;">
                STATS
            </div>
            <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px] relative z-10">
                <div class="text-center mb-8" data-aos="fade-up">
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#FF6A00]/10 text-[#FF6A00] text-xs font-bold tracking-[0.2em] uppercase mb-3 border border-[#FF6A00]/20">
                        <span class="w-2 h-2 rounded-full bg-[#FF6A00] animate-pulse"></span> Impact & Performance
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight uppercase">
                        <span class="text-white">TRUST</span> <span class="text-gray-500">STATS</span>
                    </h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                    <!-- Stat 1 -->
                    <div class="group relative rounded-[24px] p-6 sm:p-8 lg:p-5 xl:p-8 text-center hover:border-[#FF6A00] hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(255,106,0,0.12)] transition-all duration-300 overflow-hidden" 
                         data-aos="fade-up" data-aos-delay="100" data-parallax-speed="0.04"
                         style="background-color: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08);">
                        <div class="w-12 h-12 mx-auto mb-4 rounded-2xl bg-[#FF6A00]/10 flex items-center justify-center text-[#FF6A00] group-hover:scale-110 group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300">
                            <i data-lucide="handshake" class="w-6 h-6"></i>
                        </div>
                        <span class="text-3xl sm:text-4xl lg:text-[28px] xl:text-[40px] 2xl:text-[56px] font-extrabold text-white tracking-tight block transition-colors duration-300 group-hover:text-[#FF6A00]">
                            Over 300+
                        </span>
                        <span class="text-[11px] sm:text-[13px] text-gray-400 uppercase tracking-[0.15em] font-semibold mt-3 block">Brands Worked With</span>
                        <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#FF6A00] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></div>
                    </div>

                    <!-- Stat 2 -->
                    <div class="group relative rounded-[24px] p-6 sm:p-8 lg:p-5 xl:p-8 text-center hover:border-[#FF6A00] hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(255,106,0,0.12)] transition-all duration-300 overflow-hidden" 
                         data-aos="fade-up" data-aos-delay="200" data-parallax-speed="0.09"
                         style="background-color: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08);">
                        <div class="w-12 h-12 mx-auto mb-4 rounded-2xl bg-[#FF6A00]/10 flex items-center justify-center text-[#FF6A00] group-hover:scale-110 group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300">
                            <i data-lucide="trending-up" class="w-6 h-6"></i>
                        </div>
                        <span class="text-3xl sm:text-4xl lg:text-[28px] xl:text-[40px] 2xl:text-[56px] font-extrabold text-white tracking-tight block transition-colors duration-300 group-hover:text-[#FF6A00]">Millions+</span>
                        <span class="text-[11px] sm:text-[13px] text-gray-400 uppercase tracking-[0.15em] font-semibold mt-3 block">Organic Views Generated</span>
                        <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#FF6A00] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></div>
                    </div>

                    <!-- Stat 3 -->
                    <div class="group relative rounded-[24px] p-6 sm:p-8 lg:p-5 xl:p-8 text-center hover:border-[#FF6A00] hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(255,106,0,0.12)] transition-all duration-300 overflow-hidden" 
                         data-aos="fade-up" data-aos-delay="300" data-parallax-speed="0.04"
                         style="background-color: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08);">
                        <div class="w-12 h-12 mx-auto mb-4 rounded-2xl bg-[#FF6A00]/10 flex items-center justify-center text-[#FF6A00] group-hover:scale-110 group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300">
                            <i data-lucide="award" class="w-6 h-6"></i>
                        </div>
                        <span class="text-3xl sm:text-4xl lg:text-[28px] xl:text-[40px] 2xl:text-[56px] font-extrabold text-white tracking-tight block transition-colors duration-300 group-hover:text-[#FF6A00]">
                            7+
                        </span>
                        <span class="text-[11px] sm:text-[13px] text-gray-400 uppercase tracking-[0.15em] font-semibold mt-3 block">Years of Experience</span>
                        <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#FF6A00] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></div>
                    </div>

                    <!-- Stat 4 -->
                    <div class="group relative rounded-[24px] p-6 sm:p-8 lg:p-5 xl:p-8 text-center hover:border-[#FF6A00] hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(255,106,0,0.12)] transition-all duration-300 overflow-hidden" 
                         data-aos="fade-up" data-aos-delay="400" data-parallax-speed="0.09"
                         style="background-color: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08);">
                        <div class="w-12 h-12 mx-auto mb-4 rounded-2xl bg-[#FF6A00]/10 flex items-center justify-center text-[#FF6A00] group-hover:scale-110 group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300">
                            <i data-lucide="map-pin" class="w-6 h-6"></i>
                        </div>
                        <span class="text-2xl sm:text-3xl lg:text-[22px] xl:text-[30px] 2xl:text-[46px] font-extrabold text-white tracking-tight block transition-colors duration-300 group-hover:text-[#FF6A00]">Himachal Based</span>
                        <span class="text-[11px] sm:text-[13px] text-gray-400 uppercase tracking-[0.15em] font-semibold mt-3 block">Growing Beyond</span>
                        <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#FF6A00] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CLIENT LOGOS MARQUEE -->
        <section class="py-6 overflow-hidden" style="background-color: #0b0b0c;">
            <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px]">
                <div class="rounded-[32px] py-8 px-4 sm:px-8 shadow-[0_15px_30px_rgba(0,0,0,0.12)] overflow-hidden relative"
                     style="background-color: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.08);">
                    <div class="text-center mb-6" data-aos="fade-up">
                        <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#FF6A00]/10 text-[#FF6A00] text-xs font-bold tracking-[0.2em] uppercase mb-2 border border-[#FF6A00]/20">
                            <span class="w-2 h-2 rounded-full bg-[#FF6A00] animate-pulse"></span> Our Portfolio & Partners
                        </span>
                        <h2 class="text-xl sm:text-3xl lg:text-[38px] xl:text-[44px] font-black tracking-tight uppercase max-w-4xl mx-auto leading-tight">
                            <span class="text-white">TRUSTED BY BRANDS</span> <span class="text-gray-500">THAT CHOOSE TO GROW</span>
                        </h2>
                    </div>
                    
                    <!-- Infinite Horizontal Scrolling Logo Marquee -->
                    <div class="relative w-full flex items-center overflow-x-hidden">
                    <div class="animate-marquee flex items-center space-x-8 text-center select-none py-2">
                        <!-- List of 21 Real Brand Logos (Set 1) -->
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/bare-bakers.png') }}" alt="Bare Bakers" class="h-12 md:h-16 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/blackberrys.png') }}" alt="Blackberrys" class="h-11 md:h-15 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/devbhumi.jpg') }}" alt="Devbhumi" class="h-14 md:h-18 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/mcdonalds.png') }}" alt="McDonald's" class="h-13 md:h-16 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/belgian-waffle.jpg') }}" alt="The Belgian Waffle Co." class="h-14 md:h-18 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/gigo-bytes.jpg') }}" alt="Gigo Bytes" class="h-13 md:h-16 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/hero.png') }}" alt="Hero MotoCorp" class="h-12 md:h-15 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/hungry-point.png') }}" alt="Hungry Point" class="h-13 md:h-16 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/swiggy.png') }}" alt="Swiggy" class="h-10 md:h-14 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/laxmanjee.jpg') }}" alt="Laxmanjee" class="h-14 md:h-18 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/lenovo.png') }}" alt="Lenovo" class="h-10 md:h-13 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/lg.jpg') }}" alt="LG" class="h-12 md:h-15 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/liqo.jpg') }}" alt="Liqo" class="h-12 md:h-15 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/maini.jpg') }}" alt="Maini Tour N Travels" class="h-13 md:h-16 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/mehrus.jpg') }}" alt="Mehru's" class="h-13 md:h-16 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/nexa.png') }}" alt="Nexa" class="h-13 md:h-16 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/nfci.jpg') }}" alt="NFCI Solan" class="h-14 md:h-18 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/paris-parker.png') }}" alt="Paris Parker Aveda" class="h-10 md:h-13 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/peter-england.png') }}" alt="Peter England" class="h-12 md:h-15 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/zomato.png') }}" alt="Zomato" class="h-10 md:h-14 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/zorko.png') }}" alt="Zorko Brand of Food Lovers" class="h-12 md:h-15 w-auto object-contain max-w-[170px]">
                        </div>

                        <!-- List of 21 Real Brand Logos (Set 2 Duplicated for Seamless Infinite Loop) -->
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/bare-bakers.png') }}" alt="Bare Bakers" class="h-12 md:h-16 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/blackberrys.png') }}" alt="Blackberrys" class="h-11 md:h-15 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/devbhumi.jpg') }}" alt="Devbhumi" class="h-14 md:h-18 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/mcdonalds.png') }}" alt="McDonald's" class="h-13 md:h-16 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/belgian-waffle.jpg') }}" alt="The Belgian Waffle Co." class="h-14 md:h-18 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/gigo-bytes.jpg') }}" alt="Gigo Bytes" class="h-13 md:h-16 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/hero.png') }}" alt="Hero MotoCorp" class="h-12 md:h-15 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/hungry-point.png') }}" alt="Hungry Point" class="h-13 md:h-16 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/swiggy.png') }}" alt="Swiggy" class="h-10 md:h-14 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/laxmanjee.jpg') }}" alt="Laxmanjee" class="h-14 md:h-18 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/lenovo.png') }}" alt="Lenovo" class="h-10 md:h-13 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/lg.jpg') }}" alt="LG" class="h-12 md:h-15 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/liqo.jpg') }}" alt="Liqo" class="h-12 md:h-15 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/maini.jpg') }}" alt="Maini Tour N Travels" class="h-13 md:h-16 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/mehrus.jpg') }}" alt="Mehru's" class="h-13 md:h-16 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/nexa.png') }}" alt="Nexa" class="h-13 md:h-16 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/nfci.jpg') }}" alt="NFCI Solan" class="h-14 md:h-18 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/paris-parker.png') }}" alt="Paris Parker Aveda" class="h-10 md:h-13 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/peter-england.png') }}" alt="Peter England" class="h-12 md:h-15 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/zomato.png') }}" alt="Zomato" class="h-10 md:h-14 w-auto object-contain max-w-[170px]">
                        </div>
                        <div class="h-20 md:h-24 px-8 py-3 bg-white border border-[#ECECEC] rounded-[20px] flex items-center justify-center shadow-sm hover:shadow-lg hover:border-[#111111] transition duration-300">
                            <img src="{{ asset('images/clients/zorko.png') }}" alt="Zorko Brand of Food Lovers" class="h-12 md:h-15 w-auto object-contain max-w-[170px]">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- SERVICES SECTION (SINGLE ROW LAYOUT) -->
        <section class="py-20 lg:py-28 bg-white relative overflow-hidden">
            <!-- Ambient Parallax Backdrop -->
            <div class="absolute -right-20 top-1/3 w-96 h-96 bg-[#FF6A00]/5 rounded-full blur-3xl pointer-events-none -z-10" data-parallax-speed="-0.25"></div>
            
            <div class="max-w-[1440px] mx-auto px-6 lg:px-[60px]">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-6">
                    <div class="space-y-3" data-parallax-speed="-0.03">
                        <span class="text-[13px] font-semibold text-[#FF6A00] tracking-[0.2em] uppercase block">
                            OUR SERVICES
                        </span>
                        <h2 class="text-3xl lg:text-[48px] font-bold tracking-tight">
                            <span class="text-[#111111]">Everything You Need</span> <span class="text-gray-400">to Scale Your Brand.</span>
                        </h2>
                    </div>
                    <div>
                        <a href="/services" class="inline-flex items-center space-x-2 bg-[#FF6A00] hover:bg-[#E55F00] text-white text-[14px] font-semibold px-7 py-3.5 rounded-[12px] transition duration-300 group shadow-md shadow-[#FF6A00]/20">
                            <span>Explore All Services</span>
                            <span class="group-hover:translate-x-1 transition-transform duration-200">→</span>
                        </a>
                    </div>
                </div>

                <!-- Services Single Row Layout (6 Cards Side-by-Side) -->
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-5">
                    <!-- Service 1: Social Media Management -->
                    <div class="group border border-[#ECECEC] rounded-[20px] overflow-hidden bg-white hover:shadow-2xl hover:border-[#111111] hover:-translate-y-2 transition-all duration-500 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="50" data-parallax-speed="0.03">
                        <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&fit=crop&w=800&q=80" 
                                 alt="Social Media Management" 
                                 class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-50 group-hover:opacity-30 transition duration-300"></div>
                            <span class="absolute top-3 right-3 bg-white/90 backdrop-blur-md text-[#111111] p-2 rounded-full shadow-md">
                                <i data-lucide="share-2" class="w-4 h-4"></i>
                            </span>
                        </div>
                        <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
                            <div class="space-y-2">
                                <h3 class="text-[16px] font-bold text-[#111111] tracking-tight leading-snug group-hover:text-black transition">Social Media Management</h3>
                                <p class="text-[12px] text-[#666666] leading-relaxed font-light line-clamp-3">
                                    Engaging content that connects with your audience and builds your brand organically.
                                </p>
                            </div>
                            <a href="/services" class="inline-flex items-center space-x-1 text-[12px] font-bold text-[#111111] hover:underline group/link pt-1">
                                <span>Learn More</span>
                                <span class="group-hover/link:translate-x-1 transition-transform duration-200">→</span>
                            </a>
                        </div>
                    </div>

                    <!-- Service 2: Video Production -->
                    <div class="group border border-[#ECECEC] rounded-[20px] overflow-hidden bg-white hover:shadow-2xl hover:border-[#111111] hover:-translate-y-2 transition-all duration-500 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="100" data-parallax-speed="0.07">
                        <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=800&q=80" 
                                 alt="Video Production" 
                                 class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-50 group-hover:opacity-30 transition duration-300"></div>
                            <span class="absolute top-3 right-3 bg-white/90 backdrop-blur-md text-[#111111] p-2 rounded-full shadow-md">
                                <i data-lucide="video" class="w-4 h-4"></i>
                            </span>
                        </div>
                        <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
                            <div class="space-y-2">
                                <h3 class="text-[16px] font-bold text-[#111111] tracking-tight leading-snug group-hover:text-black transition">Video Production</h3>
                                <p class="text-[12px] text-[#666666] leading-relaxed font-light line-clamp-3">
                                    High-quality corporate videos, reels, and reels marketing commercials that tell your brand story.
                                </p>
                            </div>
                            <a href="/services" class="inline-flex items-center space-x-1 text-[12px] font-bold text-[#111111] hover:underline group/link pt-1">
                                <span>Learn More</span>
                                <span class="group-hover/link:translate-x-1 transition-transform duration-200">→</span>
                            </a>
                        </div>
                    </div>

                    <!-- Service 3: Brand Strategy -->
                    <div class="group border border-[#ECECEC] rounded-[20px] overflow-hidden bg-white hover:shadow-2xl hover:border-[#111111] hover:-translate-y-2 transition-all duration-500 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="150" data-parallax-speed="0.03">
                        <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&w=800&q=80" 
                                 alt="Brand Strategy" 
                                 class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-50 group-hover:opacity-30 transition duration-300"></div>
                            <span class="absolute top-3 right-3 bg-white/90 backdrop-blur-md text-[#111111] p-2 rounded-full shadow-md">
                                <i data-lucide="compass" class="w-4 h-4"></i>
                            </span>
                        </div>
                        <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
                            <div class="space-y-2">
                                <h3 class="text-[16px] font-bold text-[#111111] tracking-tight leading-snug group-hover:text-black transition">Brand Strategy</h3>
                                <p class="text-[12px] text-[#666666] leading-relaxed font-light line-clamp-3">
                                    Research-driven messaging guides and brand guidelines designed for long-term growth.
                                </p>
                            </div>
                            <a href="/services" class="inline-flex items-center space-x-1 text-[12px] font-bold text-[#111111] hover:underline group/link pt-1">
                                <span>Learn More</span>
                                <span class="group-hover/link:translate-x-1 transition-transform duration-200">→</span>
                            </a>
                        </div>
                    </div>

                    <!-- Service 4: Digital Campaigns -->
                    <div class="group border border-[#ECECEC] rounded-[20px] overflow-hidden bg-white hover:shadow-2xl hover:border-[#111111] hover:-translate-y-2 transition-all duration-500 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="200" data-parallax-speed="0.07">
                        <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80" 
                                 alt="Digital Campaigns" 
                                 class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-50 group-hover:opacity-30 transition duration-300"></div>
                            <span class="absolute top-3 right-3 bg-white/90 backdrop-blur-md text-[#111111] p-2 rounded-full shadow-md">
                                <i data-lucide="trending-up" class="w-4 h-4"></i>
                            </span>
                        </div>
                        <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
                            <div class="space-y-2">
                                <h3 class="text-[16px] font-bold text-[#111111] tracking-tight leading-snug group-hover:text-black transition">Digital Campaigns</h3>
                                <p class="text-[12px] text-[#666666] leading-relaxed font-light line-clamp-3">
                                    Paid acquisition and ad strategy campaigns generating conversions and measurable ROI.
                                </p>
                            </div>
                            <a href="/services" class="inline-flex items-center space-x-1 text-[12px] font-bold text-[#111111] hover:underline group/link pt-1">
                                <span>Learn More</span>
                                <span class="group-hover/link:translate-x-1 transition-transform duration-200">→</span>
                            </a>
                        </div>
                    </div>

                    <!-- Service 5: Influencer Marketing -->
                    <div class="group border border-[#ECECEC] rounded-[20px] overflow-hidden bg-white hover:shadow-2xl hover:border-[#111111] hover:-translate-y-2 transition-all duration-500 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="250" data-parallax-speed="0.03">
                        <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=800&q=80" 
                                 alt="Influencer Marketing" 
                                 class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-50 group-hover:opacity-30 transition duration-300"></div>
                            <span class="absolute top-3 right-3 bg-white/90 backdrop-blur-md text-[#111111] p-2 rounded-full shadow-md">
                                <i data-lucide="users" class="w-4 h-4"></i>
                            </span>
                        </div>
                        <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
                            <div class="space-y-2">
                                <h3 class="text-[16px] font-bold text-[#111111] tracking-tight leading-snug group-hover:text-black transition">Influencer Marketing</h3>
                                <p class="text-[12px] text-[#666666] leading-relaxed font-light line-clamp-3">
                                    Curating, negotiating, and managing creative campaigns with matching regional creators.
                                </p>
                            </div>
                            <a href="/services" class="inline-flex items-center space-x-1 text-[12px] font-bold text-[#111111] hover:underline group/link pt-1">
                                <span>Learn More</span>
                                <span class="group-hover/link:translate-x-1 transition-transform duration-200">→</span>
                            </a>
                        </div>
                    </div>

                    <!-- Service 6: Websites & Digital Presence -->
                    <div class="group border border-[#ECECEC] rounded-[20px] overflow-hidden bg-white hover:shadow-2xl hover:border-[#111111] hover:-translate-y-2 transition-all duration-500 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="300" data-parallax-speed="0.07">
                        <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80" 
                                 alt="Websites & Digital Presence" 
                                 class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-50 group-hover:opacity-30 transition duration-300"></div>
                            <span class="absolute top-3 right-3 bg-white/90 backdrop-blur-md text-[#111111] p-2 rounded-full shadow-md">
                                <i data-lucide="globe" class="w-4 h-4"></i>
                            </span>
                        </div>
                        <div class="p-5 flex-1 flex flex-col justify-between space-y-3">
                            <div class="space-y-2">
                                <h3 class="text-[16px] font-bold text-[#111111] tracking-tight leading-snug group-hover:text-black transition">Websites & Digital Presence</h3>
                                <p class="text-[12px] text-[#666666] leading-relaxed font-light line-clamp-3">
                                    Designing and developing fast, mobile-friendly landing pages and custom websites.
                                </p>
                            </div>
                            <a href="/services" class="inline-flex items-center space-x-1 text-[12px] font-bold text-[#111111] hover:underline group/link pt-1">
                                <span>Learn More</span>
                                <span class="group-hover/link:translate-x-1 transition-transform duration-200">→</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- HOW WE WORK SECTION -->
        <section class="pt-2 pb-20 bg-[#FAFAFA] border-t border-[#ECECEC] relative overflow-hidden">
            <!-- Background Parallax Accent -->
            <div class="absolute top-10 left-1/2 -translate-x-1/2 text-[160px] font-black text-gray-900/[0.015] pointer-events-none select-none uppercase -z-10"
                 data-parallax-speed="-0.18">
                PROCESS
            </div>

            <div class="max-w-[1440px] mx-auto px-6 lg:px-[60px]">
                <div class="text-center space-y-3 mb-16" data-parallax-speed="-0.03">
                    <span class="text-[13px] font-bold text-[#FF5500] tracking-[0.2em] uppercase block">
                        // HOW WE WORK
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-[52px] font-extrabold tracking-tight uppercase">
                        <span class="text-[#111111]">Our</span> <span class="text-gray-400">Process</span>
                    </h2>
                    <p class="text-[15px] text-[#666666] font-light max-w-xl mx-auto">
                        A transparent and proven process that ensures great results every time.
                    </p>
                </div>

                <!-- 6 Process Steps Premium Cards Grid (Single Row on Desktop) -->
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4 xl:gap-5">
                    <!-- Step 1 -->
                    <div class="relative bg-white border border-[#ECECEC] rounded-[20px] p-5 hover:border-[#FF6A00] hover:-translate-y-2 hover:shadow-[0_20px_30px_rgba(255,106,0,0.08)] transition-all duration-300 group overflow-hidden text-center" data-aos="fade-up" data-aos-delay="100">
                        <!-- Giant Step Number watermark -->
                        <span class="absolute top-2 right-4 text-[40px] font-black text-gray-100/70 select-none pointer-events-none group-hover:text-[#FF6A00]/5 transition-colors duration-300 font-heading">
                            01
                        </span>
                        
                        <!-- Circular Icon Container -->
                        <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-[#FF6A00]/10 flex items-center justify-center text-[#FF6A00] group-hover:scale-110 group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300 flex-shrink-0">
                            <i data-lucide="search" class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12"></i>
                        </div>
                        
                        <!-- Text Content -->
                        <h3 class="text-[16px] xl:text-[17px] font-extrabold text-[#111111] tracking-tight group-hover:text-[#FF6A00] transition-colors duration-300 uppercase">
                            Discover
                        </h3>
                        <p class="text-[12px] text-[#666666] leading-relaxed font-light mt-2 max-w-[160px] mx-auto">
                            We understand your business, goals and target audience.
                        </p>
                        
                        <!-- Underline decorative border highlight -->
                        <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#FF6A00] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative bg-white border border-[#ECECEC] rounded-[20px] p-5 hover:border-[#FF6A00] hover:-translate-y-2 hover:shadow-[0_20px_30px_rgba(255,106,0,0.08)] transition-all duration-300 group overflow-hidden text-center" data-aos="fade-up" data-aos-delay="200">
                        <!-- Giant Step Number watermark -->
                        <span class="absolute top-2 right-4 text-[40px] font-black text-gray-100/70 select-none pointer-events-none group-hover:text-[#FF6A00]/5 transition-colors duration-300 font-heading">
                            02
                        </span>
                        
                        <!-- Circular Icon Container -->
                        <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-[#FF6A00]/10 flex items-center justify-center text-[#FF6A00] group-hover:scale-110 group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300 flex-shrink-0">
                            <i data-lucide="file-text" class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12"></i>
                        </div>
                        
                        <!-- Text Content -->
                        <h3 class="text-[16px] xl:text-[17px] font-extrabold text-[#111111] tracking-tight group-hover:text-[#FF6A00] transition-colors duration-300 uppercase">
                            Research
                        </h3>
                        <p class="text-[12px] text-[#666666] leading-relaxed font-light mt-2 max-w-[160px] mx-auto">
                            In-depth research on your industry, audience and competitors.
                        </p>
                        
                        <!-- Underline decorative border highlight -->
                        <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#FF6A00] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative bg-white border border-[#ECECEC] rounded-[20px] p-5 hover:border-[#FF6A00] hover:-translate-y-2 hover:shadow-[0_20px_30px_rgba(255,106,0,0.08)] transition-all duration-300 group overflow-hidden text-center" data-aos="fade-up" data-aos-delay="300">
                        <!-- Giant Step Number watermark -->
                        <span class="absolute top-2 right-4 text-[40px] font-black text-gray-100/70 select-none pointer-events-none group-hover:text-[#FF6A00]/5 transition-colors duration-300 font-heading">
                            03
                        </span>
                        
                        <!-- Circular Icon Container -->
                        <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-[#FF6A00]/10 flex items-center justify-center text-[#FF6A00] group-hover:scale-110 group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300 flex-shrink-0">
                            <i data-lucide="target" class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12"></i>
                        </div>
                        
                        <!-- Text Content -->
                        <h3 class="text-[16px] xl:text-[17px] font-extrabold text-[#111111] tracking-tight group-hover:text-[#FF6A00] transition-colors duration-300 uppercase">
                            Strategize
                        </h3>
                        <p class="text-[12px] text-[#666666] leading-relaxed font-light mt-2 max-w-[160px] mx-auto">
                            We create a customized strategy aligned with your objectives.
                        </p>
                        
                        <!-- Underline decorative border highlight -->
                        <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#FF6A00] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></div>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative bg-white border border-[#ECECEC] rounded-[20px] p-5 hover:border-[#FF6A00] hover:-translate-y-2 hover:shadow-[0_20px_30px_rgba(255,106,0,0.08)] transition-all duration-300 group overflow-hidden text-center" data-aos="fade-up" data-aos-delay="400">
                        <!-- Giant Step Number watermark -->
                        <span class="absolute top-2 right-4 text-[40px] font-black text-gray-100/70 select-none pointer-events-none group-hover:text-[#FF6A00]/5 transition-colors duration-300 font-heading">
                            04
                        </span>
                        
                        <!-- Circular Icon Container -->
                        <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-[#FF6A00]/10 flex items-center justify-center text-[#FF6A00] group-hover:scale-110 group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300 flex-shrink-0">
                            <i data-lucide="edit-3" class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12"></i>
                        </div>
                        
                        <!-- Text Content -->
                        <h3 class="text-[16px] xl:text-[17px] font-extrabold text-[#111111] tracking-tight group-hover:text-[#FF6A00] transition-colors duration-300 uppercase">
                            Create
                        </h3>
                        <p class="text-[12px] text-[#666666] leading-relaxed font-light mt-2 max-w-[160px] mx-auto">
                            Our team produces high-quality content and creatives.
                        </p>
                        
                        <!-- Underline decorative border highlight -->
                        <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#FF6A00] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></div>
                    </div>

                    <!-- Step 5 -->
                    <div class="relative bg-white border border-[#ECECEC] rounded-[20px] p-5 hover:border-[#FF6A00] hover:-translate-y-2 hover:shadow-[0_20px_30px_rgba(255,106,0,0.08)] transition-all duration-300 group overflow-hidden text-center" data-aos="fade-up" data-aos-delay="500">
                        <!-- Giant Step Number watermark -->
                        <span class="absolute top-2 right-4 text-[40px] font-black text-gray-100/70 select-none pointer-events-none group-hover:text-[#FF6A00]/5 transition-colors duration-300 font-heading">
                            05
                        </span>
                        
                        <!-- Circular Icon Container -->
                        <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-[#FF6A00]/10 flex items-center justify-center text-[#FF6A00] group-hover:scale-110 group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300 flex-shrink-0">
                            <i data-lucide="send" class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12"></i>
                        </div>
                        
                        <!-- Text Content -->
                        <h3 class="text-[16px] xl:text-[17px] font-extrabold text-[#111111] tracking-tight group-hover:text-[#FF6A00] transition-colors duration-300 uppercase">
                            Publish
                        </h3>
                        <p class="text-[12px] text-[#666666] leading-relaxed font-light mt-2 max-w-[160px] mx-auto">
                            We launch across the right platforms at the right time.
                        </p>
                        
                        <!-- Underline decorative border highlight -->
                        <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#FF6A00] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></div>
                    </div>

                    <!-- Step 6 -->
                    <div class="relative bg-white border border-[#ECECEC] rounded-[20px] p-5 hover:border-[#FF6A00] hover:-translate-y-2 hover:shadow-[0_20px_30px_rgba(255,106,0,0.08)] transition-all duration-300 group overflow-hidden text-center" data-aos="fade-up" data-aos-delay="600">
                        <!-- Giant Step Number watermark -->
                        <span class="absolute top-2 right-4 text-[40px] font-black text-gray-100/70 select-none pointer-events-none group-hover:text-[#FF6A00]/5 transition-colors duration-300 font-heading">
                            06
                        </span>
                        
                        <!-- Circular Icon Container -->
                        <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-[#FF6A00]/10 flex items-center justify-center text-[#FF6A00] group-hover:scale-110 group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300 flex-shrink-0">
                            <i data-lucide="trending-up" class="w-6 h-6 transition-transform duration-300 group-hover:rotate-12"></i>
                        </div>
                        
                        <!-- Text Content -->
                        <h3 class="text-[16px] xl:text-[17px] font-extrabold text-[#111111] tracking-tight group-hover:text-[#FF6A00] transition-colors duration-300 uppercase">
                            Optimize
                        </h3>
                        <p class="text-[12px] text-[#666666] leading-relaxed font-light mt-2 max-w-[160px] mx-auto">
                            We analyze, learn and optimize for maximum results.
                        </p>
                        
                        <!-- Underline decorative border highlight -->
                        <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#FF6A00] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FEATURED WORK (PORTFOLIO SINGLE ROW LAYOUT) -->
        <section id="portfolio-section" class="py-20 lg:py-28 bg-[#FAFAFA] border-t border-b border-[#ECECEC] relative overflow-hidden">
            <!-- Background Parallax Accent -->
            <div class="absolute top-1/2 right-10 -translate-y-1/2 text-[180px] font-black text-gray-900/[0.015] pointer-events-none select-none uppercase -z-10"
                 data-parallax-speed="-0.22">
                WORK
            </div>

            <div class="max-w-[1440px] mx-auto px-6 lg:px-[60px]">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-6" data-parallax-speed="-0.03">
                    <div class="space-y-3">
                        <span class="text-[13px] font-semibold text-[#FF6A00] tracking-[0.2em] uppercase block">
                            FEATURED WORK
                        </span>
                        <h2 class="text-3xl lg:text-[48px] font-bold tracking-tight">
                            <span class="text-[#111111]">Work That Speaks</span> <span class="text-gray-400">Before We Do.</span>
                        </h2>
                    </div>
                    <div>
                        <a href="/portfolio" class="inline-flex items-center space-x-2 bg-[#FF6A00] hover:bg-[#E55F00] text-white text-[14px] font-semibold px-7 py-3.5 rounded-[12px] transition duration-300 group shadow-md shadow-[#FF6A00]/20">
                            <span>View All Projects</span>
                            <span class="group-hover:translate-x-1 transition-transform duration-200">→</span>
                        </a>
                    </div>
                </div>

                <!-- Portfolio Single Row Layout (4 Cards Side-by-Side) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Project 1: The Himalayan Resort -->
                    <div class="group border border-[#ECECEC] rounded-[20px] overflow-hidden bg-white hover:shadow-2xl hover:border-[#111111] hover:-translate-y-2 transition-all duration-500 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="100" data-parallax-speed="0.04">
                        <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1000&q=80" 
                                 alt="The Himalayan Resort" 
                                 class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition duration-300"></div>
                            <span class="absolute top-3.5 left-3.5 bg-white/90 backdrop-blur-md text-[10px] font-extrabold text-[#111111] px-3 py-1 rounded-full uppercase tracking-wider shadow-sm border border-white/50">
                                Hospitality & Tourism
                            </span>
                        </div>
                        
                        <div class="p-6 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div class="space-y-2">
                                <span class="text-[11px] font-bold text-gray-400 uppercase tracking-widest block">THE HIMALAYAN RESORT</span>
                                <h3 class="text-[20px] font-bold text-[#111111] tracking-tight leading-snug group-hover:text-black transition">The Himalayan Resort</h3>
                                <p class="text-[13px] text-[#666666] leading-relaxed font-light line-clamp-2">
                                    Cinematic brand shoot and targeted social ad campaign showcasing luxury mountain stays.
                                </p>
                            </div>
                            
                            <div class="space-y-3 pt-2">
                                <div class="bg-emerald-500/10 border border-emerald-500/20 px-3.5 py-2.5 rounded-[12px] flex items-center justify-between">
                                    <span class="text-[10px] font-bold text-emerald-800 uppercase tracking-wider">Growth Metric</span>
                                    <span class="text-[13px] font-extrabold text-emerald-700">+250% Bookings</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project 2: The Café Project -->
                    <div class="group border border-[#ECECEC] rounded-[20px] overflow-hidden bg-white hover:shadow-2xl hover:border-[#111111] hover:-translate-y-2 transition-all duration-500 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="200" data-parallax-speed="0.08">
                        <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=1000&q=80" 
                                 alt="The Café Project" 
                                 class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition duration-300"></div>
                            <span class="absolute top-3.5 left-3.5 bg-white/90 backdrop-blur-md text-[10px] font-extrabold text-[#111111] px-3 py-1 rounded-full uppercase tracking-wider shadow-sm border border-white/50">
                                Food & Beverage
                            </span>
                        </div>
                        
                        <div class="p-6 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div class="space-y-2">
                                <span class="text-[11px] font-bold text-gray-400 uppercase tracking-widest block">THE CAFÉ PROJECT</span>
                                <h3 class="text-[20px] font-bold text-[#111111] tracking-tight leading-snug group-hover:text-black transition">The Café Project</h3>
                                <p class="text-[13px] text-[#666666] leading-relaxed font-light line-clamp-2">
                                    Micro-influencer food campaign and viral Instagram reels series driving weekend footfall.
                                </p>
                            </div>
                            
                            <div class="space-y-3 pt-2">
                                <div class="bg-emerald-500/10 border border-emerald-500/20 px-3.5 py-2.5 rounded-[12px] flex items-center justify-between">
                                    <span class="text-[10px] font-bold text-emerald-800 uppercase tracking-wider">Growth Metric</span>
                                    <span class="text-[13px] font-extrabold text-emerald-700">3X Footfall</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project 3: Bhalla Dental Clinic -->
                    <div class="group border border-[#ECECEC] rounded-[20px] overflow-hidden bg-white hover:shadow-2xl hover:border-[#111111] hover:-translate-y-2 transition-all duration-500 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="300" data-parallax-speed="0.04">
                        <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=1000&q=80" 
                                 alt="Bhalla Dental Clinic" 
                                 class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition duration-300"></div>
                            <span class="absolute top-3.5 left-3.5 bg-white/90 backdrop-blur-md text-[10px] font-extrabold text-[#111111] px-3 py-1 rounded-full uppercase tracking-wider shadow-sm border border-white/50">
                                Healthcare
                            </span>
                        </div>
                        
                        <div class="p-6 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div class="space-y-2">
                                <span class="text-[11px] font-bold text-gray-400 uppercase tracking-widest block">BHALLA DENTAL CLINIC</span>
                                <h3 class="text-[20px] font-bold text-[#111111] tracking-tight leading-snug group-hover:text-black transition">Bhalla Dental Clinic</h3>
                                <p class="text-[13px] text-[#666666] leading-relaxed font-light line-clamp-2">
                                    Patient testimonial videos and localized lead generation campaigns establishing authority.
                                </p>
                            </div>
                            
                            <div class="space-y-3 pt-2">
                                <div class="bg-emerald-500/10 border border-emerald-500/20 px-3.5 py-2.5 rounded-[12px] flex items-center justify-between">
                                    <span class="text-[10px] font-bold text-emerald-800 uppercase tracking-wider">Growth Metric</span>
                                    <span class="text-[13px] font-extrabold text-emerald-700">200% Inquiries</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project 4: Peter England Solan -->
                    <div class="group border border-[#ECECEC] rounded-[20px] overflow-hidden bg-white hover:shadow-2xl hover:border-[#111111] hover:-translate-y-2 transition-all duration-500 flex flex-col justify-between" data-aos="fade-up" data-aos-delay="400" data-parallax-speed="0.08">
                        <div class="relative overflow-hidden aspect-[4/3] bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1000&q=80" 
                                 alt="Peter England Solan" 
                                 class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition duration-300"></div>
                            <span class="absolute top-3.5 left-3.5 bg-white/90 backdrop-blur-md text-[10px] font-extrabold text-[#111111] px-3 py-1 rounded-full uppercase tracking-wider shadow-sm border border-white/50">
                                Retail
                            </span>
                        </div>
                        
                        <div class="p-6 space-y-3.5 flex-1 flex flex-col justify-between">
                            <div class="space-y-2">
                                <span class="text-[11px] font-bold text-gray-400 uppercase tracking-widest block">PETER ENGLAND SOLAN</span>
                                <h3 class="text-[20px] font-bold text-[#111111] tracking-tight leading-snug group-hover:text-black transition">Peter England Solan</h3>
                                <p class="text-[13px] text-[#666666] leading-relaxed font-light line-clamp-2">
                                    Seasonal apparel launch commercial shoots and hyper-targeted regional customer ad drives.
                                </p>
                            </div>
                            
                            <div class="space-y-3 pt-2">
                                <div class="bg-emerald-500/10 border border-emerald-500/20 px-3.5 py-2.5 rounded-[12px] flex items-center justify-between">
                                    <span class="text-[10px] font-bold text-emerald-800 uppercase tracking-wider">Growth Metric</span>
                                    <span class="text-[13px] font-extrabold text-emerald-700">180% Store Visits</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- WHY KKSB STUDIOS -->
        <section class="py-20 lg:py-28 bg-white relative overflow-hidden">
            <!-- Background Parallax Accent -->
            <div class="absolute bottom-10 left-10 text-[180px] font-black text-gray-900/[0.015] pointer-events-none select-none uppercase -z-10"
                 data-parallax-speed="-0.2">
                AGENCY
            </div>

            <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px]">
                <div class="text-center mb-12" data-aos="fade-up">
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#FF6A00]/10 text-[#FF6A00] text-xs font-bold tracking-[0.2em] uppercase mb-3 border border-[#FF6A00]/20">
                        <span class="w-2 h-2 rounded-full bg-[#FF6A00] animate-pulse"></span> WHY KKSB STUDIOS
                    </span>
                    <h2 class="text-3xl lg:text-[48px] font-bold tracking-tight">
                        <span class="text-[#111111]">Not Just Content.</span> <span class="text-gray-400">A System Built for Growth.</span>
                    </h2>
                </div>

                <!-- Feature Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Feature 1 -->
                    <div class="relative bg-white border border-[#ECECEC] rounded-[24px] p-6 sm:p-8 hover:border-[#FF6A00] hover:-translate-y-1.5 hover:shadow-[0_20px_40px_rgba(255,106,0,0.06)] transition-all duration-300 group overflow-hidden" data-aos="fade-up" data-aos-delay="100" data-parallax-speed="0.03">
                        <!-- Giant watermark number -->
                        <span class="absolute top-2 right-6 text-[56px] font-black text-gray-100/50 select-none pointer-events-none group-hover:text-[#FF6A00]/5 transition-colors duration-300 font-heading">
                            01
                        </span>
                        <div class="space-y-4 relative z-10">
                            <!-- Icon Container -->
                            <div class="w-14 h-14 rounded-2xl bg-[#FF6A00]/10 flex items-center justify-center text-[#FF6A00] group-hover:scale-110 group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300">
                                <i data-lucide="search" class="w-7 h-7 transition-transform duration-300 group-hover:rotate-12"></i>
                            </div>
                            <h3 class="text-[18px] font-extrabold text-[#111111] group-hover:text-[#FF6A00] transition-colors duration-300">Research Before Execution</h3>
                            <p class="text-[13.5px] text-[#666666] leading-relaxed font-light">We understand your business, demographic and industry values before we sketch a layout.</p>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#FF6A00] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="relative bg-white border border-[#ECECEC] rounded-[24px] p-6 sm:p-8 hover:border-[#FF6A00] hover:-translate-y-1.5 hover:shadow-[0_20px_40px_rgba(255,106,0,0.06)] transition-all duration-300 group overflow-hidden" data-aos="fade-up" data-aos-delay="200" data-parallax-speed="0.07">
                        <!-- Giant watermark number -->
                        <span class="absolute top-2 right-6 text-[56px] font-black text-gray-100/50 select-none pointer-events-none group-hover:text-[#FF6A00]/5 transition-colors duration-300 font-heading">
                            02
                        </span>
                        <div class="space-y-4 relative z-10">
                            <!-- Icon Container -->
                            <div class="w-14 h-14 rounded-2xl bg-[#FF6A00]/10 flex items-center justify-center text-[#FF6A00] group-hover:scale-110 group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300">
                                <i data-lucide="clapperboard" class="w-7 h-7 transition-transform duration-300 group-hover:rotate-12"></i>
                            </div>
                            <h3 class="text-[18px] font-extrabold text-[#111111] group-hover:text-[#FF6A00] transition-colors duration-300">Strategy + Production In-house</h3>
                            <p class="text-[13.5px] text-[#666666] leading-relaxed font-light">From scriptboarding to high-end camera shoots and sound design — everything is executed under our roof.</p>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#FF6A00] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="relative bg-white border border-[#ECECEC] rounded-[24px] p-6 sm:p-8 hover:border-[#FF6A00] hover:-translate-y-1.5 hover:shadow-[0_20px_40px_rgba(255,106,0,0.06)] transition-all duration-300 group overflow-hidden" data-aos="fade-up" data-aos-delay="300" data-parallax-speed="0.03">
                        <!-- Giant watermark number -->
                        <span class="absolute top-2 right-6 text-[56px] font-black text-gray-100/50 select-none pointer-events-none group-hover:text-[#FF6A00]/5 transition-colors duration-300 font-heading">
                            03
                        </span>
                        <div class="space-y-4 relative z-10">
                            <!-- Icon Container -->
                            <div class="w-14 h-14 rounded-2xl bg-[#FF6A00]/10 flex items-center justify-center text-[#FF6A00] group-hover:scale-110 group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300">
                                <i data-lucide="map-pin" class="w-7 h-7 transition-transform duration-300 group-hover:rotate-12"></i>
                            </div>
                            <h3 class="text-[18px] font-extrabold text-[#111111] group-hover:text-[#FF6A00] transition-colors duration-300">Regional Market Insights</h3>
                            <p class="text-[13.5px] text-[#666666] leading-relaxed font-light">We know Himachal Pradesh, its culture, and the purchase hooks that appeal to local regional audiences.</p>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#FF6A00] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="relative bg-white border border-[#ECECEC] rounded-[24px] p-6 sm:p-8 hover:border-[#FF6A00] hover:-translate-y-1.5 hover:shadow-[0_20px_40px_rgba(255,106,0,0.06)] transition-all duration-300 group overflow-hidden" data-aos="fade-up" data-aos-delay="400" data-parallax-speed="0.07">
                        <!-- Giant watermark number -->
                        <span class="absolute top-2 right-6 text-[56px] font-black text-gray-100/50 select-none pointer-events-none group-hover:text-[#FF6A00]/5 transition-colors duration-300 font-heading">
                            04
                        </span>
                        <div class="space-y-4 relative z-10">
                            <!-- Icon Container -->
                            <div class="w-14 h-14 rounded-2xl bg-[#FF6A00]/10 flex items-center justify-center text-[#FF6A00] group-hover:scale-110 group-hover:bg-[#FF6A00] group-hover:text-white transition-all duration-300">
                                <i data-lucide="trending-up" class="w-7 h-7 transition-transform duration-300 group-hover:rotate-12"></i>
                            </div>
                            <h3 class="text-[18px] font-extrabold text-[#111111] group-hover:text-[#FF6A00] transition-colors duration-300">Creator Thinking + Agency Execution</h3>
                            <p class="text-[13.5px] text-[#666666] leading-relaxed font-light">Merging modern micro-influencer attention hooks with highly structured digital marketing frameworks.</p>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 h-[3px] bg-[#FF6A00] scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CINEMATIC PARALLAX BANNER (HIGH VISIBILITY TYPOGRAPHY) -->
        <section class="relative py-20 lg:py-28 bg-scroll md:bg-fixed bg-cover bg-center overflow-hidden my-10 lg:my-16 shadow-2xl" 
                 style="background-image: url('{{ asset('images/landing-shoot.jpg') }}');">
            <!-- Strong High-Contrast Dark Backdrop Mask -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/80 to-black/90 backdrop-blur-[2px]"></div>
            
            <div class="relative z-10 max-w-[1440px] mx-auto px-6 lg:px-[90px] text-center text-white space-y-8" data-aos="fade-up" data-parallax-speed="-0.08">
                <!-- Tag Badge -->
                <div>
                    <span class="inline-block bg-white/15 border border-white/30 text-white text-[13px] font-extrabold tracking-[0.25em] uppercase px-5 py-2 rounded-full backdrop-blur-md shadow-lg">
                        BEHIND THE LENS • CINEMATIC STORYTELLING
                    </span>
                </div>

                <!-- Main Heading with Drop Shadows -->
                <h2 class="text-4xl sm:text-5xl lg:text-[68px] font-black tracking-tight leading-tight max-w-4xl mx-auto text-white drop-shadow-[0_4px_16px_rgba(0,0,0,0.9)]">
                    Capturing Himachal's Soul.<br>
                    <span class="text-gray-100">Delivering National Impact.</span>
                </h2>

                <!-- Subtext -->
                <p class="text-[17px] sm:text-[20px] text-gray-100 max-w-3xl mx-auto font-medium leading-relaxed drop-shadow-[0_2px_8px_rgba(0,0,0,0.9)]">
                    We combine high-altitude field shoots, cinema-grade camera rigs, and growth-driven digital marketing strategy to turn brand stories into iconic campaigns.
                </p>

                <!-- High-Impact Action Buttons -->
                <div class="pt-6 flex flex-col sm:flex-row items-center justify-center gap-5">
                    <a href="/portfolio" 
                       class="w-full sm:w-auto bg-white text-[#111111] hover:bg-gray-100 font-extrabold px-9 py-4.5 rounded-[12px] text-[15px] transition duration-300 shadow-2xl flex items-center justify-center space-x-2 group hover:scale-105">
                        <span>Explore Portfolio</span>
                        <span class="group-hover:translate-x-1.5 transition-transform duration-200">→</span>
                    </a>
                    <a href="/about" 
                       class="w-full sm:w-auto bg-white/10 border-2 border-white text-white hover:bg-white hover:text-[#111111] font-bold px-9 py-4 rounded-[12px] text-[15px] transition-all duration-300 shadow-xl backdrop-blur-md">
                        Meet The Studio Team
                    </a>
                </div>
            </div>
        </section>

        <!-- SHOWREEL SECTION -->
        @php
            if (!function_exists('extractYoutubeId')) {
                function extractYoutubeId($url) {
                    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                    return $match[1] ?? null;
                }
            }

            $video1Url = App\Models\Setting::get('showreel_video_1', 'https://www.youtube.com/watch?v=H7ch9Z3_qeM');
            $video2Url = App\Models\Setting::get('showreel_video_2', 'https://www.youtube.com/watch?v=eyvS1WsEsNY');
            $video3Url = App\Models\Setting::get('showreel_video_3', 'https://www.youtube.com/watch?v=jJmfDRKFFGI');

            $video1Id = extractYoutubeId($video1Url) ?: 'H7ch9Z3_qeM';
            $video2Id = extractYoutubeId($video2Url) ?: 'eyvS1WsEsNY';
            $video3Id = extractYoutubeId($video3Url) ?: 'jJmfDRKFFGI';

            $title1 = App\Models\Setting::get('showreel_title_1', 'Mahasu Devta Documentary');
            $title2 = App\Models\Setting::get('showreel_title_2', 'Shoolini Mata Documentary');
            $title3 = App\Models\Setting::get('showreel_title_3', 'Laxmanjees Sweets Kandaghat');
        @endphp

        <section id="showreel-section" class="py-10 bg-white overflow-hidden">
            <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px]">
                <style>
                    @keyframes float-gentle {
                        0%, 100% { transform: translateY(0px) rotate(var(--rot, -1deg)); }
                        50% { transform: translateY(-8px) rotate(calc(var(--rot, -1deg) + 0.5deg)); }
                    }
                    @keyframes float-gentle-reverse {
                        0%, 100% { transform: translateY(0px) rotate(var(--rot, 1deg)); }
                        50% { transform: translateY(-8px) rotate(calc(var(--rot, 1deg) - 0.5deg)); }
                    }
                    .animate-float-1 {
                        animation: float-gentle 6s ease-in-out infinite;
                    }
                    .animate-float-2 {
                        animation: float-gentle-reverse 7s ease-in-out infinite;
                    }
                </style>

                <div class="relative bg-[#111111] text-white rounded-[32px] py-12 lg:py-16 px-6 lg:px-12 overflow-hidden shadow-xl" data-aos="fade-up">
                <!-- Dotgrid Pattern -->
                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:16px_16px] pointer-events-none"></div>

                <div class="relative z-10 max-w-[1280px] mx-auto space-y-12 text-center">
                    <div class="space-y-3" data-parallax-speed="-0.03">
                        <span class="text-[13px] font-semibold text-gray-400 tracking-[0.2em] uppercase block">
                            SHOWREEL
                        </span>
                        <h2 class="text-3xl sm:text-4xl lg:text-[48px] font-bold tracking-tight">
                            <span class="text-white">See What</span> <span class="text-gray-400">We Create.</span>
                        </h2>
                        <p class="text-[15px] sm:text-[16px] text-gray-400 font-light max-w-xl mx-auto leading-relaxed">
                            A glimpse of our work, our process and the results we create for brands.
                        </p>
                    </div>

                    <!-- Video Grid of 3 Videos with Rotating Hover Effect & Floating Animations -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-10 max-w-6xl mx-auto pt-4">
                        
                        <!-- Video 1 -->
                        <div x-data="{ playing: false }" 
                             class="animate-float-1 hover:[animation-play-state:paused] transition-all duration-500 transform lg:-rotate-1 lg:hover:rotate-0 hover:scale-[1.06] hover:-translate-y-2 hover:shadow-2xl hover:border-white/30 group relative aspect-video rounded-[20px] overflow-hidden border border-white/15 bg-zinc-950 cursor-pointer"
                             style="--rot: -1deg;">
                            
                            <!-- Thumbnail Cover -->
                            <div x-show="!playing" @click="playing = true" class="absolute inset-0 select-none">
                                <img src="https://img.youtube.com/vi/{{ $video1Id }}/hqdefault.jpg" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $title1 }}">
                                <div class="absolute inset-0 bg-black/45 group-hover:bg-black/35 transition-colors duration-300"></div>
                                <!-- Play Button -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-14 h-14 bg-[#FF6A00] hover:bg-[#FF8533] text-white rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:shadow-[0_0_20px_rgba(255,106,0,0.6)] transition-all duration-300">
                                        <i data-lucide="play" class="w-6 h-6 fill-white translate-x-0.5"></i>
                                    </div>
                                </div>
                                <!-- Title Overlay -->
                                <div class="absolute bottom-3 left-3 right-3 bg-black/75 backdrop-blur-md px-3 py-2 rounded-lg text-left text-[11px] font-semibold border border-white/10 line-clamp-2">
                                    {{ $title1 }}
                                </div>
                            </div>

                            <!-- Embedded Player (Autoplay on click) -->
                            <template x-if="playing">
                                <iframe class="w-full h-full rounded-[20px]" 
                                        src="https://www.youtube.com/embed/{{ $video1Id }}?autoplay=1" 
                                        title="{{ $title1 }}" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                        referrerpolicy="strict-origin-when-cross-origin" 
                                        allowfullscreen></iframe>
                            </template>
                        </div>

                        <!-- Video 2 -->
                        <div x-data="{ playing: false }" 
                             class="animate-float-2 hover:[animation-play-state:paused] transition-all duration-500 transform lg:rotate-1 lg:hover:rotate-0 hover:scale-[1.06] hover:-translate-y-2 hover:shadow-2xl hover:border-white/30 group relative aspect-video rounded-[20px] overflow-hidden border border-white/15 bg-zinc-950 cursor-pointer"
                             style="--rot: 1deg;">
                            
                            <!-- Thumbnail Cover -->
                            <div x-show="!playing" @click="playing = true" class="absolute inset-0 select-none">
                                <img src="https://img.youtube.com/vi/{{ $video2Id }}/hqdefault.jpg" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $title2 }}">
                                <div class="absolute inset-0 bg-black/45 group-hover:bg-black/35 transition-colors duration-300"></div>
                                <!-- Play Button -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-14 h-14 bg-[#FF6A00] hover:bg-[#FF8533] text-white rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:shadow-[0_0_20px_rgba(255,106,0,0.6)] transition-all duration-300">
                                        <i data-lucide="play" class="w-6 h-6 fill-white translate-x-0.5"></i>
                                    </div>
                                </div>
                                <!-- Title Overlay -->
                                <div class="absolute bottom-3 left-3 right-3 bg-black/75 backdrop-blur-md px-3 py-2 rounded-lg text-left text-[11px] font-semibold border border-white/10 line-clamp-2">
                                    {{ $title2 }}
                                </div>
                            </div>

                            <!-- Embedded Player (Autoplay on click) -->
                            <template x-if="playing">
                                <iframe class="w-full h-full rounded-[20px]" 
                                        src="https://www.youtube.com/embed/{{ $video2Id }}?autoplay=1" 
                                        title="{{ $title2 }}" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                        referrerpolicy="strict-origin-when-cross-origin" 
                                        allowfullscreen></iframe>
                            </template>
                        </div>

                        <!-- Video 3 -->
                        <div x-data="{ playing: false }" 
                             class="animate-float-1 hover:[animation-play-state:paused] transition-all duration-500 transform lg:-rotate-1 lg:hover:rotate-0 hover:scale-[1.06] hover:-translate-y-2 hover:shadow-2xl hover:border-white/30 group relative aspect-video rounded-[20px] overflow-hidden border border-white/15 bg-zinc-950 cursor-pointer"
                             style="--rot: -1deg;">
                            
                            <!-- Thumbnail Cover -->
                            <div x-show="!playing" @click="playing = true" class="absolute inset-0 select-none">
                                <img src="https://img.youtube.com/vi/{{ $video3Id }}/hqdefault.jpg" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $title3 }}">
                                <div class="absolute inset-0 bg-black/45 group-hover:bg-black/35 transition-colors duration-300"></div>
                                <!-- Play Button -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="w-14 h-14 bg-[#FF6A00] hover:bg-[#FF8533] text-white rounded-full flex items-center justify-center shadow-lg transform group-hover:scale-110 group-hover:shadow-[0_0_20px_rgba(255,106,0,0.6)] transition-all duration-300">
                                        <i data-lucide="play" class="w-6 h-6 fill-white translate-x-0.5"></i>
                                    </div>
                                </div>
                                <!-- Title Overlay -->
                                <div class="absolute bottom-3 left-3 right-3 bg-black/75 backdrop-blur-md px-3 py-2 rounded-lg text-left text-[11px] font-semibold border border-white/10 line-clamp-2">
                                    {{ $title3 }}
                                </div>
                            </div>

                            <!-- Embedded Player (Autoplay on click) -->
                            <template x-if="playing">
                                <iframe class="w-full h-full rounded-[20px]" 
                                        src="https://www.youtube.com/embed/{{ $video3Id }}?autoplay=1" 
                                        title="{{ $title3 }}" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                        referrerpolicy="strict-origin-when-cross-origin" 
                                        allowfullscreen></iframe>
                            </template>
                        </div>

                    </div>

                    <!-- Restored Explore YouTube Channel Button -->
                    <div class="pt-8">
                        <a href="https://www.youtube.com/@KKSBVLOGS" 
                           target="_blank"
                           class="inline-flex items-center space-x-2 bg-white text-[#111111] hover:bg-gray-100 font-semibold px-8 py-4 rounded-[12px] text-[14px] transition duration-300 shadow-md">
                            <span>Explore YouTube Channel</span>
                            <span>&rarr;</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>






        <!-- MOBILE STICKY BOTTOM BAR -->
        <div class="md:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-[#ECECEC] py-3 px-5 shadow-[0_-4px_12px_rgba(0,0,0,0.05)]">
            <div class="grid grid-cols-3 gap-3">
                <a href="tel:+917876148313" 
                   class="flex flex-col items-center justify-center h-[52px] text-[12px] font-semibold text-[#111111] border border-[#ECECEC] rounded-[10px] bg-[#FAFAFA] hover:border-[#111111] transition">
                    <span class="mb-0.5"><i data-lucide="phone" class="w-4 h-4"></i></span>
                    <span>Call</span>
                </a>
                <a href="https://wa.me/917876148313" target="_blank"
                   class="flex flex-col items-center justify-center h-[52px] text-[12px] font-semibold text-[#111111] border border-[#ECECEC] rounded-[10px] bg-[#FAFAFA] hover:border-[#111111] transition">
                    <span class="mb-0.5"><i data-lucide="message-circle" class="w-4 h-4"></i></span>
                    <span>WhatsApp</span>
                </a>
                <a href="/contact" 
                   class="flex flex-col items-center justify-center h-[52px] text-[12px] font-semibold text-white border border-[#111111] rounded-[10px] bg-[#111111] hover:bg-[#222222] transition">
                    <span class="mb-0.5"><i data-lucide="rocket" class="w-4 h-4"></i></span>
                    <span>Start Project</span>
                </a>
            </div>
        </div>

    </div>

    <!-- SMOOTH HARDWARE-ACCELERATED PARALLAX ENGINE -->
    <script>
        (function() {
            function initParallax() {
                const parallaxEls = document.querySelectorAll('[data-parallax-speed]');
                if (!parallaxEls.length) return;

                let ticking = false;

                function updateParallax() {
                    const viewportHeight = window.innerHeight;

                    parallaxEls.forEach(el => {
                        const speed = parseFloat(el.getAttribute('data-parallax-speed') || '0.1');
                        const rect = el.getBoundingClientRect();

                        if (rect.bottom >= -350 && rect.top <= viewportHeight + 350) {
                            const elementCenter = rect.top + rect.height / 2;
                            const distanceFromCenter = elementCenter - viewportHeight / 2;
                            const translateY = (distanceFromCenter * speed * -1).toFixed(1);
                            
                            el.style.transform = `translate3d(0, ${translateY}px, 0)`;
                        }
                    });

                    ticking = false;
                }

                window.addEventListener('scroll', function() {
                    if (!ticking) {
                        window.requestAnimationFrame(updateParallax);
                        ticking = true;
                    }
                }, { passive: true });

                window.addEventListener('resize', updateParallax, { passive: true });
                updateParallax();
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initParallax);
            } else {
                initParallax();
            }
        })();
    </script>
</x-frontend-layout>
