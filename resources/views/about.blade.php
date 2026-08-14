<x-frontend-layout>
    
    <!-- Hero/About Row 1 Section -->
    <section class="pt-6 pb-12 lg:pt-8 lg:pb-16 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-[90px] grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Column: Content -->
            <div class="lg:col-span-6 space-y-6" data-aos="fade-right">
                <div class="flex items-center space-x-2 text-xs font-bold text-[#111111] uppercase tracking-widest">
                    <span>—</span>
                    <span>ABOUT US</span>
                </div>
                
                @php
                    $heroTitle = App\Models\Setting::get('about_hero_title', 'Built in Himachal. Creating Beyond Boundaries.');
                    $heroParts = explode('.', $heroTitle, 2);
                    $heroFirst = trim($heroParts[0] ?? 'Built in Himachal');
                    $heroSecond = trim($heroParts[1] ?? 'Creating Beyond Boundaries');
                    if (str_ends_with($heroFirst, '.')) {
                        $heroFirst = rtrim($heroFirst, '.');
                    }
                @endphp
                <h1 class="text-4xl sm:text-5xl lg:text-[48px] font-black tracking-tight leading-[1.15] text-[#111111]">
                    {{ $heroFirst }}.<br>
                    <span class="text-gray-400">{{ $heroSecond }}</span>
                </h1>
                
                <p class="text-[15px] sm:text-[16px] text-gray-500 font-light leading-relaxed max-w-xl">
                    {{ App\Models\Setting::get('about_hero_subtitle', 'KKSB Studios is a creative and marketing agency combining strategy, storytelling, content production and digital execution to help brands grow.') }}
                </p>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center gap-4 pt-2">
                    <a href="/contact" style="background: linear-gradient(135deg, #111111, #222222); color: #ffffff;" class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 font-bold h-[52px] px-8 rounded-xl text-[14px] transition-all hover:scale-105 shadow-md">
                        <span>WORK WITH US</span>
                        <span>&rarr;</span>
                    </a>
                    <a href="#team-section" class="w-full sm:w-auto inline-flex items-center justify-center space-x-2 border border-gray-300 hover:border-gray-900 text-gray-900 font-bold h-[52px] px-8 rounded-xl text-[14px] transition-all">
                        <span>MEET OUR TEAM</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Right Column: Large Landscape Crew Image -->
            <div class="lg:col-span-6" data-aos="fade-left">
                <div class="rounded-3xl overflow-hidden shadow-xl bg-gray-50 border border-gray-100">
                    <img src="{{ asset('images/about/crew.png') }}" class="w-full h-auto object-cover" alt="KKSB Crew Production Shoot" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- Company Story Section -->
    <section class="py-12 lg:py-16 bg-[#FAFAFA] border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-[90px] grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            <!-- Left Column: Story text (40% width on large screens) -->
            <div class="lg:col-span-5 space-y-6" data-aos="fade-right">
                <span class="text-xs font-bold text-[#FF6A00] uppercase tracking-widest block">OUR STORY</span>
                
                @php
                    $storyTitle = App\Models\Setting::get('about_story_title', 'It Started With Stories. It Grew Into a Studio.');
                    $titleParts = explode('.', $storyTitle, 2);
                    $firstPart = trim($titleParts[0] ?? 'It Started With Stories');
                    $secondPart = trim($titleParts[1] ?? 'It Grew Into a Studio');
                    if (str_ends_with($firstPart, '.')) {
                        $firstPart = rtrim($firstPart, '.');
                    }
                @endphp
                <h2 class="text-3xl sm:text-4xl lg:text-[38px] font-black tracking-tight leading-snug text-[#111111]">
                    {{ $firstPart }}.<br>
                    <span class="text-gray-400">{{ $secondPart }}</span>
                </h2>
                
                <div class="text-[14px] sm:text-[15px] text-gray-500 leading-relaxed space-y-4 font-light">
                    <p>
                        {{ App\Models\Setting::get('about_story_text', 'What began as a passion for storytelling and creating content around Himachal\'s culture, people and places, slowly turned into a purpose. We understood the power of content to connect, influence and grow businesses.') }}
                    </p>
                    <p>
                        From a creator to a team, from local stories to brand journeys, KKSB Studios is a full-service creative and marketing agency trusted by hundreds of brands. We bridge the gap between creative visual narratives and performance metrics.
                    </p>
                </div>
            </div>
            
            <!-- Right Column: THEN / NOW Grid (60% width on large screens) -->
            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6" data-aos="fade-left">
                <!-- Card 1: THEN -->
                <div class="space-y-4">
                    <div class="relative rounded-2xl overflow-hidden shadow-md border border-gray-100 bg-gray-50 group">
                        <img src="{{ asset('images/about/then.jpg') }}" class="w-full h-auto transition-transform duration-500 group-hover:scale-105" alt="Then - A Creator with a Camera" loading="lazy">
                        <!-- THEN Badge Overlay -->
                        <div class="absolute bottom-4 left-4 bg-[#111111] text-white text-[10px] font-black tracking-widest px-3 py-1 rounded">
                            THEN
                        </div>
                    </div>
                    <p class="text-[13px] font-semibold text-gray-700 leading-snug">
                        A Creator with a Camera and a Story to Tell.
                    </p>
                </div>

                <!-- Card 2: NOW -->
                <div class="space-y-4">
                    <div class="relative rounded-2xl overflow-hidden shadow-md border border-gray-150 bg-gray-50 group">
                        <img src="{{ asset('images/about/now.jpg') }}" class="w-full h-auto transition-transform duration-500 group-hover:scale-105" alt="Now - Creative Studio" loading="lazy">
                        <!-- NOW Badge Overlay -->
                        <div class="absolute bottom-4 left-4 bg-[#111111] text-white text-[10px] font-black tracking-widest px-3 py-1 rounded">
                            NOW
                        </div>
                    </div>
                    <p class="text-[13px] font-semibold text-gray-700 leading-snug">
                        A Creative Studio Helping Brands Grow.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Founders Quote/Details -->
    <section class="py-20 lg:py-28 bg-[#FCFCFC] border-y border-gray-100 relative overflow-hidden">
        <!-- Ambient radial glow in background (very soft orange/amber) -->
        <div class="absolute top-1/2 left-1/4 -translate-y-1/2 w-96 h-96 bg-[#FF6A00]/3 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 right-10 w-96 h-96 bg-amber-500/3 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-6xl mx-auto px-6 lg:px-[90px] grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-20 items-center relative z-10">
            <!-- Left Column: Portrait -->
            <div class="lg:col-span-5 max-w-[340px] lg:max-w-none mx-auto w-full relative group" data-aos="fade-right">
                <!-- Background ambient decorative blur -->
                <div class="absolute -inset-4 bg-gradient-to-tr from-[#FF6A00]/10 to-amber-500/10 rounded-[40px] blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
                
                <!-- Portrait Card Frame -->
                <div class="relative bg-white border border-[#ECECEC] rounded-[32px] p-3 shadow-lg hover:shadow-2xl hover:-translate-y-1.5 transition-all duration-500 ease-out overflow-hidden group">
                    <div class="rounded-[22px] overflow-hidden aspect-[4/5] bg-gray-50 relative">
                        <img src="{{ asset('images/about/founder.jpg') }}" 
                             class="w-full h-full object-cover filter grayscale-[20%] group-hover:grayscale-0 group-hover:scale-105 transition-all duration-700 ease-out" 
                             alt="Founder Portrait" loading="lazy">
                        
                        <!-- Floating Cameraman Badge -->
                        <div class="absolute top-4 left-4 bg-zinc-950/80 backdrop-blur-md border border-white/10 text-white text-[9px] font-black tracking-widest px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-lg select-none">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#FF6A00] animate-pulse"></span>
                            <span>FOUNDER & DIRECTOR</span>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Right Column: Info -->
            <div class="lg:col-span-7 space-y-6 relative" data-aos="fade-left">


                <div class="space-y-3">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#FF6A00]/8 text-[#FF6A00] text-[10px] font-bold uppercase tracking-wider border border-[#FF6A00]/15 w-max">
                        <i data-lucide="award" class="w-3.5 h-3.5"></i> The Founder
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-[44px] font-black tracking-tight text-[#111111] leading-[1.1] uppercase font-heading">
                        {{ App\Models\Setting::get('about_founder_quote', 'Creator Experience. Agency Thinking.') }}
                    </h2>
                </div>

                <div class="space-y-4">
                    <!-- Title block -->
                    <div class="pb-4 border-b border-gray-100 flex items-center justify-between">
                        <div>
                            <h4 class="text-lg font-bold text-[#111111] tracking-wide">
                                {{ App\Models\Setting::get('about_founder_name', 'Kuldeep Sharma') }}
                            </h4>
                            <p class="text-xs text-[#FF6A00] font-extrabold uppercase tracking-widest mt-0.5">
                                Founder & CEO
                            </p>
                        </div>
                        
                        <!-- Socials -->
                        <div class="flex items-center space-x-2">
                            <a href="{{ App\Models\Setting::get('instagram_url', '#') }}" target="_blank" 
                               class="w-9 h-9 rounded-full border border-gray-200 hover:border-zinc-900 flex items-center justify-center text-gray-500 hover:text-[#FF6A00] hover:bg-[#FF6A00]/5 transition-all duration-300">
                                <i data-lucide="instagram" class="w-4 h-4"></i>
                            </a>
                            <a href="{{ App\Models\Setting::get('linkedin_url', '#') }}" target="_blank" 
                               class="w-9 h-9 rounded-full border border-gray-200 hover:border-zinc-900 flex items-center justify-center text-gray-500 hover:text-[#FF6A00] hover:bg-[#FF6A00]/5 transition-all duration-300">
                                <i data-lucide="linkedin" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Bio -->
                    <p class="text-[14.5px] sm:text-base text-gray-500 leading-relaxed font-light">
                        {{ App\Models\Setting::get('about_founder_bio', 'Content creator, travel and culture filmmaker, social media marketer, and founder of KKSB Studios. His creator-led journey across Himachal Pradesh shaped an agency built on storytelling, strategy, video production, and brand growth. Today, he helps businesses turn local insights and audience understanding into campaigns that build visibility, trust, and meaningful impact') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Members Grid -->
    @if($team->isNotEmpty())
    <section id="team-section" class="py-12 lg:py-16 bg-[#FAFAFA] border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-[90px] space-y-16">
            <div class="text-center space-y-4 max-w-xl mx-auto">
                <span class="text-xs font-bold text-[#FF6A00] uppercase tracking-widest block">Creative Minds</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
                    <span class="text-[#111111]">Meet Our</span> <span class="text-gray-400">Team</span>
                </h2>
                <p class="text-sm text-gray-500">A collective of local designers, editors, copywriters and shoot directors.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($team as $member)
                    <div class="bg-white p-6 rounded-3xl border border-gray-150 shadow-sm text-center space-y-4 hover:border-[#FF6A00] transition duration-300" data-aos="fade-up">
                        <div class="w-24 h-24 mx-auto rounded-full overflow-hidden bg-gray-100 border border-gray-200">
                            @if($member->avatar)
                                <img src="{{ asset($member->avatar) }}" class="w-full h-full object-cover" alt="" loading="lazy">
                            @else
                                <div class="w-full h-full flex items-center justify-center font-bold text-gray-400 text-2xl uppercase">
                                    {{ substr($member->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 text-base">{{ $member->name }}</h4>
                            <p class="text-xs text-gray-400 font-semibold">{{ $member->bio }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Behind the Scenes Gallery -->
    @if($gallery->isNotEmpty())
    <section class="py-12 lg:py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-[90px] space-y-16">
            <div class="text-center space-y-4 max-w-xl mx-auto">
                <span class="text-xs font-bold text-[#FF6A00] uppercase tracking-widest block">Behind The Camera</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
                    <span class="text-[#111111]">Behind the</span> <span class="text-gray-400">Scenes</span>
                </h2>
                <p class="text-sm text-gray-500">Snapshots of our dynamic outdoor shoots, editing table sessions, and team brainstorm sessions.</p>
            </div>

            <style>
                @keyframes marquee {
                    0% { transform: translateX(0); }
                    100% { transform: translateX(-50%); }
                }
                .animate-marquee-track {
                    animation: marquee 40s linear infinite;
                }
                .animate-marquee-track:hover {
                    animation-play-state: paused;
                }
                .gallery-card {
                    width: 180px !important;
                    aspect-ratio: 3 / 2 !important;
                    flex-shrink: 0 !important;
                    transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
                }
                .gallery-card:hover {
                    transform: translateY(-8px) !important;
                    box-shadow: 0 20px 25px -5px rgba(255, 106, 0, 0.15), 0 10px 10px -5px rgba(255, 106, 0, 0.04) !important;
                    border-color: rgba(255, 106, 0, 0.3) !important;
                }
                @media (min-width: 640px) {
                    .gallery-card {
                        width: 280px !important;
                    }
                }
            </style>

            <div class="relative w-full overflow-hidden">
                <div class="flex w-max animate-marquee-track gap-6">
                    <!-- Original set -->
                    <div class="flex gap-6">
                        @foreach($gallery as $photo)
                            <div class="gallery-card bg-gray-100 rounded-[18px] sm:rounded-[24px] border border-gray-100 overflow-hidden shadow-sm group relative flex-shrink-0" data-aos="fade-up">
                                <img src="{{ asset($photo->image_path) }}" onerror="this.onerror=null; this.src='{{ asset('images/gallery/bts-1.jpg') }}';" class="w-full h-full object-cover filter grayscale-[15%] group-hover:grayscale-0 group-hover:scale-110 group-hover:rotate-2 transition-all duration-500 ease-out" alt="{{ $photo->title }}" loading="lazy">
                                @if($photo->title)
                                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 to-transparent p-4 sm:p-6 text-white opacity-0 group-hover:opacity-100 transition duration-300">
                                        <h4 class="font-bold text-xs sm:text-sm truncate">{{ $photo->title }}</h4>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <!-- Duplicated set for infinite rotation loop -->
                    <div class="flex gap-6" aria-hidden="true">
                        @foreach($gallery as $photo)
                            <div class="gallery-card bg-gray-100 rounded-[18px] sm:rounded-[24px] border border-gray-100 overflow-hidden shadow-sm group relative flex-shrink-0">
                                <img src="{{ asset($photo->image_path) }}" onerror="this.onerror=null; this.src='{{ asset('images/gallery/bts-1.jpg') }}';" class="w-full h-full object-cover filter grayscale-[15%] group-hover:grayscale-0 group-hover:scale-110 group-hover:rotate-2 transition-all duration-500 ease-out" alt="{{ $photo->title }}" loading="lazy">
                                @if($photo->title)
                                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 to-transparent p-4 sm:p-6 text-white opacity-0 group-hover:opacity-100 transition duration-300">
                                        <h4 class="font-bold text-xs sm:text-sm truncate">{{ $photo->title }}</h4>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

</x-frontend-layout>
