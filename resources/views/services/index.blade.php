<x-frontend-layout>
    
    <!-- Alpine JS State for Service Modals & In-Page Navigation -->
    <div x-data="{ 
        activeModal: null,
        services: {
            smm: {
                id: 'smm',
                icon: 'smartphone',
                title: 'Social Media Management',
                tagline: 'Build a Brand That People Remember',
                desc: 'At KKSB STUDIOS, we believe social media is more than just posting photos—it’s about creating meaningful connections with your audience and building a brand people trust. We develop platform-specific strategies that help businesses grow organically while maintaining a consistent and professional online presence. From planning monthly content calendars to designing creatives, editing engaging reels, writing compelling captions, and monitoring performance, we manage every aspect of your social media so you can focus on running your business. Whether you\'re a startup, local business, hotel, educational institute, restaurant, healthcare brand, or established company, we tailor every strategy to match your goals.',
                offeringsTitle: 'What We Offer',
                offerings: [
                    'Social Media Strategy',
                    'Content Planning',
                    'Content Calendar',
                    'Reels & Short Videos',
                    'Graphic Design',
                    'Caption Writing',
                    'Profile Optimization',
                    'Community Management',
                    'Analytics & Reporting'
                ]
            },
            video: {
                id: 'video',
                icon: 'video',
                title: 'Video Production',
                tagline: 'Bringing Stories to Life Through Visual Excellence',
                desc: 'Every business has a story worth telling. At KKSB STUDIOS, we create high-quality videos that don\'t just look beautiful—they communicate your message, build trust, and leave a lasting impression. From concept development and scripting to filming, drone cinematography, editing, motion graphics, and final delivery, our team handles the complete production process. Whether it\'s a commercial advertisement, promotional reel, corporate film, documentary, hospitality showcase, or social media content, every frame is crafted with creativity and purpose.',
                offeringsTitle: 'What We Produce',
                offerings: [
                    'Commercial Advertisements',
                    'Brand Films',
                    'Promotional Reels',
                    'Corporate Videos',
                    'Product Videos',
                    'Tourism & Hospitality Films',
                    'Documentary Production',
                    'Interviews & Podcasts',
                    'Drone Cinematography',
                    'Professional Editing'
                ]
            },
            strategy: {
                id: 'strategy',
                icon: 'target',
                title: 'Brand Strategy',
                tagline: 'Building Brands With Purpose',
                desc: 'A successful brand is built on clarity, consistency, and a strong identity. We help businesses define who they are, what they stand for, and how they should communicate with their audience. Our strategic approach combines market research, audience understanding, content direction, and brand positioning to create a roadmap for long-term growth. Every design, campaign, and piece of content becomes part of one unified brand experience.',
                offeringsTitle: 'Our Strategy Covers',
                offerings: [
                    'Brand Positioning',
                    'Audience Research',
                    'Competitor Analysis',
                    'Brand Messaging',
                    'Content Direction',
                    'Marketing Roadmap',
                    'Visual Identity Guidance',
                    'Brand Growth Consultation'
                ]
            },
            campaigns: {
                id: 'campaigns',
                icon: 'trending-up',
                title: 'Digital Campaigns',
                tagline: 'Performance Marketing That Delivers Results',
                desc: 'Successful advertising is driven by strategy, not guesswork. KKSB STUDIOS creates data-driven digital campaigns that help businesses increase visibility, generate quality leads, and achieve measurable growth. We plan, launch, monitor, and optimize campaigns across Meta platforms using audience insights, creative storytelling, and continuous performance analysis to maximize every advertising budget.',
                offeringsTitle: 'Campaign Services',
                offerings: [
                    'Meta Ads Management',
                    'Facebook & Instagram Campaigns',
                    'Lead Generation',
                    'Brand Awareness Campaigns',
                    'Audience Targeting',
                    'Retargeting Campaigns',
                    'Conversion Tracking',
                    'Campaign Optimization',
                    'Performance Reporting'
                ]
            },
            influencer: {
                id: 'influencer',
                icon: 'users',
                title: 'Influencer Marketing',
                tagline: 'Connecting Brands With Trusted Voices',
                desc: 'Influencer marketing works best when it feels authentic. At KKSB STUDIOS, we connect businesses with carefully selected creators whose audience genuinely aligns with your brand. From identifying the right influencers and managing collaborations to coordinating content and tracking campaign performance, we ensure every partnership creates meaningful impact and real engagement.',
                offeringsTitle: 'Our Services Include',
                offerings: [
                    'Influencer Discovery',
                    'Campaign Planning',
                    'Creator Coordination',
                    'Content Approval',
                    'Campaign Execution',
                    'Regional Influencer Marketing',
                    'Brand Collaborations',
                    'Performance Reporting'
                ]
            },
            website: {
                id: 'website',
                icon: 'globe',
                title: 'Websites & Digital Presence',
                tagline: 'Your Digital Identity Starts Here',
                desc: 'Your website is often the first interaction customers have with your business. We design modern, responsive, and user-friendly websites that reflect your brand, build credibility, and turn visitors into customers. Every website is developed with clean design, fast loading speeds, mobile responsiveness, and SEO-ready architecture to ensure a seamless experience across all devices.',
                offeringsTitle: 'Website Solutions',
                offerings: [
                    'Business Websites',
                    'Landing Pages',
                    'Portfolio Websites',
                    'Responsive Design',
                    'UI/UX Design',
                    'SEO-Friendly Development',
                    'Performance Optimization',
                    'Website Maintenance & Support'
                ]
            }
        }
    }">

        <!-- HERO SECTION -->
        <section class="bg-gradient-to-b from-[#F8F9FA] via-white to-[#F8F9FA] py-20 lg:py-28 border-b border-[#ECECEC] relative overflow-hidden">
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

                <!-- Quick Navigation Tags -->
                <div class="flex flex-wrap justify-center gap-3 pt-4">
                    <a href="#smm" class="px-5 py-2.5 bg-white border border-[#ECECEC] hover:border-[#FF6A00] hover:text-[#FF6A00] rounded-full text-xs font-bold text-gray-800 transition shadow-sm hover:shadow-md hover:-translate-y-0.5">📱 Social Media Management</a>
                    <a href="#video" class="px-5 py-2.5 bg-white border border-[#ECECEC] hover:border-[#FF6A00] hover:text-[#FF6A00] rounded-full text-xs font-bold text-gray-800 transition shadow-sm hover:shadow-md hover:-translate-y-0.5">🎬 Video Production</a>
                    <a href="#strategy" class="px-5 py-2.5 bg-white border border-[#ECECEC] hover:border-[#FF6A00] hover:text-[#FF6A00] rounded-full text-xs font-bold text-gray-800 transition shadow-sm hover:shadow-md hover:-translate-y-0.5">🎯 Brand Strategy</a>
                    <a href="#campaigns" class="px-5 py-2.5 bg-white border border-[#ECECEC] hover:border-[#FF6A00] hover:text-[#FF6A00] rounded-full text-xs font-bold text-gray-800 transition shadow-sm hover:shadow-md hover:-translate-y-0.5">📈 Digital Campaigns</a>
                    <a href="#influencer" class="px-5 py-2.5 bg-white border border-[#ECECEC] hover:border-[#FF6A00] hover:text-[#FF6A00] rounded-full text-xs font-bold text-gray-800 transition shadow-sm hover:shadow-md hover:-translate-y-0.5">🤝 Influencer Marketing</a>
                    <a href="#website" class="px-5 py-2.5 bg-white border border-[#ECECEC] hover:border-[#FF6A00] hover:text-[#FF6A00] rounded-full text-xs font-bold text-gray-800 transition shadow-sm hover:shadow-md hover:-translate-y-0.5">🌐 Websites & Digital Presence</a>
                </div>
            </div>
        </section>

        <!-- SERVICES BIG & ATTRACTIVE CARDS GRID -->
        <section class="py-16 lg:py-20 bg-[#FAFAFA] relative overflow-hidden">
            <!-- Premium Subtle Parallax Background -->
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat bg-scroll md:bg-fixed opacity-[0.12] pointer-events-none" 
                 style="background-image: url('{{ asset('images/landing-shoot.jpg') }}');"></div>
            
            <div class="relative z-10 max-w-[1440px] mx-auto px-6 lg:px-[90px] space-y-12">
                
                <div class="text-center space-y-4">
                    <span class="text-xs font-black text-[#FF6A00] tracking-[0.25em] uppercase block">
                        OUR CORE CAPABILITIES
                    </span>
                    <h2 class="text-4xl sm:text-5xl lg:text-[54px] font-black tracking-tight leading-tight">
                        <span class="text-[#111111]">Complete Marketing & Creative</span> <span class="text-gray-400">Solutions</span>
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 items-stretch">
                    
                    <!-- Card 1: Social Media Management -->
                    <div id="smm" class="bg-white border-2 border-[#EAEAEA] hover:border-[#111111] p-6 lg:p-8 rounded-[24px] transition-all duration-300 flex flex-col justify-between group shadow-md hover:shadow-2xl hover:-translate-y-1.5 space-y-6 scroll-mt-28" data-aos="fade-up">
                        <div class="space-y-5">
                            <!-- Big Title & Tagline -->
                            <div class="space-y-1">
                                <h3 class="text-xl sm:text-2xl font-black tracking-tight text-[#111111]">Social Media Management</h3>
                                <p class="text-xs font-bold text-[#FF6A00] tracking-wide">Build a Brand That People Remember</p>
                            </div>

                            <!-- Description -->
                            <p class="text-xs sm:text-sm text-gray-500 leading-relaxed font-light">
                                Build meaningful connections with your audience and grow organically with consistent, platform-specific content and management.
                            </p>
                        </div>

                        <!-- Footer: Popup Ability Trigger -->
                        <div class="pt-5 border-t border-[#ECECEC] flex items-center justify-between">
                            <button @click="activeModal = 'smm'" class="inline-flex items-center space-x-2 text-xs font-bold text-[#111111] hover:text-[#FF6A00] transition group-hover:translate-x-1">
                                <span>View Full Service Popup</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Card 2: Video Production -->
                    <div id="video" class="bg-white border-2 border-[#EAEAEA] hover:border-[#111111] p-6 lg:p-8 rounded-[24px] transition-all duration-300 flex flex-col justify-between group shadow-md hover:shadow-2xl hover:-translate-y-1.5 space-y-6 scroll-mt-28" data-aos="fade-up" data-aos-delay="100">
                        <div class="space-y-5">
                            <!-- Big Title & Tagline -->
                            <div class="space-y-1">
                                <h3 class="text-xl sm:text-2xl font-black tracking-tight text-[#111111]">Video Production</h3>
                                <p class="text-xs font-bold text-[#FF6A00] tracking-wide">Bringing Stories to Life Through Visual Excellence</p>
                            </div>

                            <!-- Description -->
                            <p class="text-xs sm:text-sm text-gray-500 leading-relaxed font-light">
                                Bring your brand's story to life through high-quality video creation, professional cinematography, and expert post-production.
                            </p>
                        </div>

                        <!-- Footer: Popup Ability Trigger -->
                        <div class="pt-5 border-t border-[#ECECEC] flex items-center justify-between">
                            <button @click="activeModal = 'video'" class="inline-flex items-center space-x-2 text-xs font-bold text-[#111111] hover:text-[#FF6A00] transition group-hover:translate-x-1">
                                <span>View Full Service Popup</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Card 3: Brand Strategy -->
                    <div id="strategy" class="bg-white border-2 border-[#EAEAEA] hover:border-[#111111] p-6 lg:p-8 rounded-[24px] transition-all duration-300 flex flex-col justify-between group shadow-md hover:shadow-2xl hover:-translate-y-1.5 space-y-6 scroll-mt-28" data-aos="fade-up" data-aos-delay="200">
                        <div class="space-y-5">
                            <!-- Big Title & Tagline -->
                            <div class="space-y-1">
                                <h3 class="text-xl sm:text-2xl font-black tracking-tight text-[#111111]">Brand Strategy</h3>
                                <p class="text-xs font-bold text-[#FF6A00] tracking-wide">Building Brands With Purpose</p>
                            </div>

                            <!-- Description -->
                            <p class="text-xs sm:text-sm text-gray-500 leading-relaxed font-light">
                                Define your identity, reach the right audience, and establish a clear roadmap for long-term business growth.
                            </p>
                        </div>

                        <!-- Footer: Popup Ability Trigger -->
                        <div class="pt-5 border-t border-[#ECECEC] flex items-center justify-between">
                            <button @click="activeModal = 'strategy'" class="inline-flex items-center space-x-2 text-xs font-bold text-[#111111] hover:text-[#FF6A00] transition group-hover:translate-x-1">
                                <span>View Full Service Popup</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Card 4: Digital Campaigns -->
                    <div id="campaigns" class="bg-white border-2 border-[#EAEAEA] hover:border-[#111111] p-6 lg:p-8 rounded-[24px] transition-all duration-300 flex flex-col justify-between group shadow-md hover:shadow-2xl hover:-translate-y-1.5 space-y-6 scroll-mt-28" data-aos="fade-up">
                        <div class="space-y-5">
                            <!-- Big Title & Tagline -->
                            <div class="space-y-1">
                                <h3 class="text-xl sm:text-2xl font-black tracking-tight text-[#111111]">Digital Campaigns</h3>
                                <p class="text-xs font-bold text-[#FF6A00] tracking-wide">Performance Marketing That Delivers Results</p>
                            </div>

                            <!-- Description -->
                            <p class="text-xs sm:text-sm text-gray-500 leading-relaxed font-light">
                                Maximize your ROI with data-driven advertising campaigns, precise targeting, and continuous optimization.
                            </p>
                        </div>

                        <!-- Footer: Popup Ability Trigger -->
                        <div class="pt-5 border-t border-[#ECECEC] flex items-center justify-between">
                            <button @click="activeModal = 'campaigns'" class="inline-flex items-center space-x-2 text-xs font-bold text-[#111111] hover:text-[#FF6A00] transition group-hover:translate-x-1">
                                <span>View Full Service Popup</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Card 5: Influencer Marketing -->
                    <div id="influencer" class="bg-white border-2 border-[#EAEAEA] hover:border-[#111111] p-6 lg:p-8 rounded-[24px] transition-all duration-300 flex flex-col justify-between group shadow-md hover:shadow-2xl hover:-translate-y-1.5 space-y-6 scroll-mt-28" data-aos="fade-up" data-aos-delay="100">
                        <div class="space-y-5">
                            <!-- Big Title & Tagline -->
                            <div class="space-y-1">
                                <h3 class="text-xl sm:text-2xl font-black tracking-tight text-[#111111]">Influencer Marketing</h3>
                                <p class="text-xs font-bold text-[#FF6A00] tracking-wide">Connecting Brands With Trusted Voices</p>
                            </div>

                            <!-- Description -->
                            <p class="text-xs sm:text-sm text-gray-500 leading-relaxed font-light">
                                Connect your brand with trusted creators and influencers to run authentic, high-impact collaboration campaigns.
                            </p>
                        </div>

                        <!-- Footer: Popup Ability Trigger -->
                        <div class="pt-5 border-t border-[#ECECEC] flex items-center justify-between">
                            <button @click="activeModal = 'influencer'" class="inline-flex items-center space-x-2 text-xs font-bold text-[#111111] hover:text-[#FF6A00] transition group-hover:translate-x-1">
                                <span>View Full Service Popup</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Card 6: Websites & Digital Presence -->
                    <div id="website" class="bg-white border-2 border-[#EAEAEA] hover:border-[#111111] p-6 lg:p-8 rounded-[24px] transition-all duration-300 flex flex-col justify-between group shadow-md hover:shadow-2xl hover:-translate-y-1.5 space-y-6 scroll-mt-28" data-aos="fade-up" data-aos-delay="200">
                        <div class="space-y-5">
                            <!-- Big Title & Tagline -->
                            <div class="space-y-1">
                                <h3 class="text-xl sm:text-2xl font-black tracking-tight text-[#111111]">Websites & Digital Presence</h3>
                                <p class="text-xs font-bold text-[#FF6A00] tracking-wide">Your Digital Identity Starts Here</p>
                            </div>

                            <!-- Description -->
                            <p class="text-xs sm:text-sm text-gray-500 leading-relaxed font-light">
                                Establish your digital footprint with custom, high-speed, and responsive websites optimized for conversions.
                            </p>
                        </div>

                        <!-- Footer: Popup Ability Trigger -->
                        <div class="pt-5 border-t border-[#ECECEC] flex items-center justify-between">
                            <button @click="activeModal = 'website'" class="inline-flex items-center space-x-2 text-xs font-bold text-[#111111] hover:text-[#FF6A00] transition group-hover:translate-x-1">
                                <span>View Full Service Popup</span>
                                <i data-lucide="arrow-right" class="w-4 h-4"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- WHY CHOOSE KKSB STUDIOS (PREMIUM BLACK CARD) -->
        <section class="py-20 lg:py-24 bg-white border-t border-[#ECECEC]">
            <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px]">
                <div class="bg-[#111111] border border-zinc-800 rounded-[36px] p-8 lg:p-16 text-white space-y-8 shadow-2xl relative overflow-hidden">
                    <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-[#FF6A00]/20 rounded-full blur-3xl pointer-events-none"></div>
                    
                    <div class="max-w-4xl space-y-4 relative z-10">
                        <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 text-[#FF6A00] text-xs font-black uppercase tracking-widest border border-white/20">
                            💡 Strategic Advantage
                        </span>
                        <h2 class="text-3xl lg:text-5xl font-black tracking-tight text-white">
                            Why Choose KKSB STUDIOS?
                        </h2>
                        <p class="text-base lg:text-lg text-gray-200 leading-relaxed font-light">
                            We combine creativity, strategy, and storytelling to deliver marketing solutions that don't just look good—they drive real business growth. From branding and content creation to digital marketing and website development, our team works as your long-term creative partner, helping your business stand out in an increasingly competitive digital world.
                        </p>
                    </div>

                    <div class="pt-6 border-t border-white/10 flex flex-col sm:flex-row items-center gap-4 relative z-10">
                        <a href="/contact" class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 bg-[#FF6A00] hover:bg-[#E55F00] text-white font-bold h-[52px] px-8 rounded-[12px] text-sm transition-all shadow-lg shadow-[#FF6A00]/25 hover:-translate-y-0.5">
                            <span>Start Your Project</span>
                            <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                        </a>
                        <a href="/portfolio" class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 border border-white/30 hover:border-white text-white font-bold h-[52px] px-8 rounded-[12px] text-sm transition hover:-translate-y-0.5">
                            <span>Explore Our Work</span>
                        </a>
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
                        <div class="space-y-2 sm:space-y-3 pr-12 sm:pr-16">
                            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#FF6A00]/10 text-[#FF6A00] text-xs font-bold uppercase tracking-wider">
                                Service Overview
                            </span>
                            <h2 class="text-2xl sm:text-4xl font-black text-[#111111]" x-text="services[activeModal].title"></h2>
                            <p class="text-xs sm:text-sm font-bold text-[#FF6A00]" x-text="services[activeModal].tagline"></p>
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
                                        <span class="w-4 h-4 rounded-full bg-[#FF6A00]/10 text-[#FF6A00] flex items-center justify-center font-bold text-[10px]">✓</span>
                                        <span x-text="item"></span>
                                    </li>
                                </template>
                            </ul>
                        </div>

                        <!-- MANDATORY POPUP END SECTION: Why Choose KKSB STUDIOS? (BLACK CARD) -->
                        <div class="bg-[#111111] border border-zinc-800 text-white p-5 sm:p-8 rounded-2xl space-y-3 shadow-xl relative overflow-hidden">
                            <span class="text-[11px] font-extrabold uppercase tracking-widest text-[#FF6A00] block">💡 Why Choose KKSB STUDIOS?</span>
                            <p class="text-xs sm:text-sm leading-relaxed text-gray-200 font-light">
                                We combine creativity, strategy, and storytelling to deliver marketing solutions that don't just look good—they drive real business growth. From branding and content creation to digital marketing and website development, our team works as your long-term creative partner, helping your business stand out in an increasingly competitive digital world.
                            </p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-between pt-4 border-t border-[#ECECEC]">
                            <button @click="activeModal = null" class="text-xs font-bold text-gray-500 hover:text-black">
                                Close Window
                            </button>
                            <a href="/contact" class="inline-flex items-center space-x-2 bg-[#FF6A00] hover:bg-[#E55F00] text-white text-xs font-bold px-5 sm:px-6 py-3 sm:py-3.5 rounded-full transition shadow-md shadow-[#FF6A00]/25">
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
