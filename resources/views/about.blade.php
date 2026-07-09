<x-frontend-layout>
    
    <!-- Hero Section -->
    <section class="bg-[#F8F8F8] py-20 border-b border-gray-150">
        <div class="max-w-4xl mx-auto px-6 text-center space-y-6">
            <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest block">About KKSB Studios</span>
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-[#111111] leading-tight">
                {{ App\Models\Setting::get('about_hero_title', 'Built in Himachal. Creating Beyond Boundaries.') }}
            </h1>
            <p class="text-base sm:text-lg text-gray-500 leading-relaxed max-w-2xl mx-auto">
                {{ App\Models\Setting::get('about_hero_subtitle', 'KKSB Studios is a creative and marketing agency combining strategy, storytelling, content production and digital execution to help brands grow.') }}
            </p>
        </div>
    </section>

    <!-- Company Story Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            <div class="lg:col-span-6 space-y-6" data-aos="fade-right">
                <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest block">Our Background</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
                    {{ App\Models\Setting::get('about_story_title', 'It Started With Stories. It Grew Into a Studio.') }}
                </h2>
                <div class="text-sm text-gray-500 leading-relaxed space-y-4">
                    <p>
                        {{ App\Models\Setting::get('about_story_text', 'What began as a passion for storytelling and creating content around Himachal\'s culture, people and places, slowly turned into a purpose. We understood the power of content to connect, influence and grow businesses.') }}
                    </p>
                    <p>
                        From a creator to a team, from local stories to brand journeys, KKSB Studios is a full-service creative and marketing agency trusted by hundreds of brands. We bridge the gap between creative visual narratives and performance metrics.
                    </p>
                </div>
            </div>
            
            <!-- Side Image Overlay -->
            <div class="lg:col-span-6" data-aos="fade-left">
                <div class="aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl bg-gray-150">
                    <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=1200&auto=format&fit=crop" class="w-full h-full object-cover" alt="KKSB Studio setup">
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="py-24 bg-[#F8F8F8] border-y border-gray-200/50">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Mission -->
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 space-y-4" data-aos="fade-up">
                <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-[#2E7D32]">
                    <i data-lucide="target" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-bold tracking-tight text-[#111111]">Our Mission</h3>
                <p class="text-xs text-gray-500 leading-relaxed">
                    {{ App\Models\Setting::get('about_mission', 'To elevate regional brands onto the national stage through world-class storytelling and metrics-driven digital strategy.') }}
                </p>
            </div>
            
            <!-- Vision -->
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 space-y-4" data-aos="fade-up" data-aos-delay="100">
                <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-[#2E7D32]">
                    <i data-lucide="eye" class="w-6 h-6"></i>
                </div>
                <h3 class="text-xl font-bold tracking-tight text-[#111111]">Our Vision</h3>
                <p class="text-xs text-gray-500 leading-relaxed">
                    {{ App\Models\Setting::get('about_vision', 'To build one of the most trusted creative and marketing companies in India, powered by local talent and global vision.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Founders Quote/Details -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            <div class="lg:col-span-5" data-aos="fade-right">
                <div class="aspect-[4/5] rounded-3xl overflow-hidden shadow-2xl bg-zinc-900">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=600&auto=format&fit=crop" class="w-full h-full object-cover grayscale" alt="Founder Portrait">
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6" data-aos="fade-left">
                <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest block">The Founder</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-[#111111]">
                    {{ App\Models\Setting::get('about_founder_quote', 'Creator Experience. Agency Thinking.') }}
                </h2>
                <div class="space-y-4 text-sm text-gray-500 leading-relaxed">
                    <p class="font-bold text-gray-800 dark:text-zinc-350">
                        {{ App\Models\Setting::get('about_founder_name', 'Kuldeep Sharma') }} — {{ App\Models\Setting::get('about_founder_title', 'Founder & Creative Director') }}
                    </p>
                    <p>
                        {{ App\Models\Setting::get('about_founder_bio', 'Content creator, filmmaker and marketing professional with years of experience working with brands, businesses and government agencies across Himachal and beyond. KKSB Studios is the result of that journey, learnings and the belief that good content can truly build brands.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Members Grid -->
    @if($team->isNotEmpty())
    <section class="py-24 bg-[#F8F8F8]">
        <div class="max-w-7xl mx-auto px-6 space-y-16">
            <div class="text-center space-y-4 max-w-xl mx-auto">
                <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest block">Creative Minds</span>
                <h2 class="text-4xl font-extrabold tracking-tight text-[#111111]">Meet Our Team</h2>
                <p class="text-sm text-gray-500">A collective of local designers, editors, copywriters and shoot directors.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($team as $member)
                    <div class="bg-white p-6 rounded-3xl border border-gray-150 shadow-sm text-center space-y-4" data-aos="fade-up">
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
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 space-y-16">
            <div class="text-center space-y-4 max-w-xl mx-auto">
                <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest block">Behind The Camera</span>
                <h2 class="text-4xl font-extrabold tracking-tight text-[#111111]">Behind the Scenes</h2>
                <p class="text-sm text-gray-500">Snapshots of our dynamic outdoor shoots, editing table sessions, and team brainstorm sessions.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($gallery as $photo)
                    <div class="aspect-square bg-gray-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition group relative" data-aos="fade-up">
                        <img src="{{ asset($photo->image_path) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $photo->title }}">
                        @if($photo->title)
                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 to-transparent p-6 text-white opacity-0 group-hover:opacity-100 transition duration-300">
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
