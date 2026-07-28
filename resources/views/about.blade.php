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
                    <img src="{{ asset('images/about/crew.png') }}" class="w-full h-auto object-cover" alt="KKSB Crew Production Shoot">
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
                        <img src="{{ asset('images/about/then.jpg') }}" class="w-full h-auto transition-transform duration-500 group-hover:scale-105" alt="Then - A Creator with a Camera">
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
                        <img src="{{ asset('images/about/now.jpg') }}" class="w-full h-auto transition-transform duration-500 group-hover:scale-105" alt="Now - Creative Studio">
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
    </section>    <!-- Founders Quote/Details -->
    <section class="py-12 lg:py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-[90px]">
            <div class="relative bg-zinc-950 text-white rounded-[36px] overflow-hidden shadow-2xl p-8 sm:p-12 lg:p-16 border border-zinc-800" data-aos="fade-up">
                <!-- Decorative Backdrop Glow -->
                <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-gradient-to-bl from-[#FF6A00]/20 via-[#FF6A00]/5 to-transparent rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-gradient-to-tr from-amber-500/10 to-transparent rounded-full blur-2xl pointer-events-none"></div>
                
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center relative z-10">
                    <!-- Left Portrait (5 cols) -->
                    <div class="lg:col-span-5 max-w-[320px] lg:max-w-none mx-auto w-full group">
                        <div class="relative bg-zinc-900 border border-zinc-800 rounded-[24px] p-2 shadow-2xl">
                            <div class="rounded-[18px] overflow-hidden aspect-[4/5] bg-zinc-950 relative">
                                <img src="{{ asset('images/about/founder.jpg') }}" 
                                     class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" 
                                     alt="Founder Portrait">
                                <!-- Floating Lens Badge -->
                                <div class="absolute top-4 left-4 bg-zinc-950/90 backdrop-blur-md border border-white/10 text-white text-[9px] font-bold tracking-widest px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-lg select-none">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#FF6A00] animate-pulse"></span>
                                    <span>FOUNDER & DIRECTOR</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Content (7 cols) -->
                    <div class="lg:col-span-7 space-y-6">
                        <div class="space-y-3">
                            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#FF6A00]/20 text-[#FF6A00] text-[10px] font-black uppercase tracking-wider border border-[#FF6A00]/30 w-max">
                                <i data-lucide="award" class="w-3.5 h-3.5"></i> MEET THE FOUNDER
                            </span>
                            <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-black tracking-tight leading-tight uppercase font-heading text-white">
                                {{ App\Models\Setting::get('about_founder_quote', 'Creator Experience. Agency Thinking.') }}
                            </h2>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="pb-4 border-b border-zinc-800">
                                <h4 class="text-xl font-bold text-white tracking-wide">
                                    {{ App\Models\Setting::get('about_founder_name', 'Kuldeep Sharma') }}
                                </h4>
                                <p class="text-xs text-[#FF6A00] font-extrabold uppercase tracking-widest mt-0.5">
                                    FOUNDER & CREATIVE DIRECTOR
                                </p>
                            </div>
                            
                            <p class="text-[14.5px] sm:text-[15.5px] text-zinc-400 leading-relaxed font-light">
                                {{ App\Models\Setting::get('about_founder_bio', 'Content creator, filmmaker and marketing professional with years of experience working with brands, businesses and government agencies across Himachal and beyond. KKSB Studios is the result of that journey, learnings and the belief that good content can truly build brands.') }}
                            </p>
                        </div>
                    </div>
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

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto justify-center">
                @foreach($team as $member)
                    <div class="bg-white p-6 rounded-3xl border border-gray-150 shadow-sm text-center space-y-4 hover:border-[#FF6A00] transition duration-300" data-aos="fade-up">
                        <div class="w-24 h-24 mx-auto rounded-full overflow-hidden bg-gray-100 border border-gray-200">
                            @if($member->avatar)
                                <img src="{{ asset($member->avatar) }}" class="w-full h-full object-cover" alt="">
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
    <section class="py-12 lg:py-16 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-[90px] space-y-10" x-data="{
            scrollLeft() { this.$refs.slider.scrollBy({ left: -320, behavior: 'smooth' }) },
            scrollRight() { this.$refs.slider.scrollBy({ left: 320, behavior: 'smooth' }) }
        }">
            <!-- Header with navigation arrows -->
            <div class="flex items-end justify-between">
                <div class="space-y-2">
                    <span class="text-xs font-bold text-[#FF6A00] uppercase tracking-widest block">Behind The Camera</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
                        <span class="text-[#111111]">Behind the</span> <span class="text-gray-400">Scenes</span>
                    </h2>
                </div>
                
                <!-- Arrow controls -->
                <div class="flex items-center space-x-2.5">
                    <button @click="scrollLeft()" 
                            class="w-11 h-11 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-zinc-950 hover:text-white hover:border-transparent transition-all duration-300 shadow-sm">
                        <i data-lucide="chevron-left" class="w-5 h-5"></i>
                    </button>
                    <button @click="scrollRight()" 
                            class="w-11 h-11 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:bg-zinc-950 hover:text-white hover:border-transparent transition-all duration-300 shadow-sm">
                        <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>

            <!-- Horizontal sliding container -->
            <div x-ref="slider" class="flex overflow-x-auto space-x-6 pb-6 scrollbar-none snap-x snap-mandatory">
                @foreach($gallery as $photo)
                    <div class="flex-shrink-0 w-[280px] sm:w-[320px] aspect-[4/5] bg-gray-50 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group relative snap-start border border-gray-100">
                        <img src="{{ asset($photo->image_path) }}" class="w-full h-full object-cover group-hover:scale-103 transition duration-500" alt="{{ $photo->title }}">
                        @if($photo->title)
                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-6 text-white opacity-0 group-hover:opacity-100 transition duration-300">
                                <h4 class="font-bold text-sm truncate">{{ $photo->title }}</h4>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

</x-frontend-layout>
