<x-frontend-layout>
    
    <!-- Hero Section -->
    <section class="bg-[#F8F8F8] py-20 border-b border-gray-150">
        <div class="max-w-4xl mx-auto px-6 text-center space-y-6">
            <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest block">{{ $project->category->name }}</span>
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-[#111111] leading-tight">
                {{ $project->title }}
            </h1>
            <div class="flex items-center justify-center space-x-6 text-xs font-semibold text-gray-500 pt-2">
                <div>Client: <span class="text-gray-800">{{ $project->client }}</span></div>
                @if($project->project_date)
                    <div>Date: <span class="text-gray-800">{{ $project->project_date->format('M Y') }}</span></div>
                @endif
            </div>
        </div>
    </section>

    <!-- Case Study Content Grid -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 space-y-16">
            
            <!-- Video or Main Image Banner -->
            @if($project->video_url)
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-xl bg-black">
                    <iframe class="w-full h-full" src="{{ $project->video_url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            @elseif($project->main_image)
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-md bg-gray-150">
                    <img src="{{ asset($project->main_image) }}" class="w-full h-full object-cover" alt="{{ $project->title }}">
                </div>
            @endif

            <!-- Challenge, Solution, Results Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 border-b border-gray-100 pb-16">
                <!-- Challenge -->
                <div class="space-y-4">
                    <div class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest">01 / The Challenge</div>
                    <h3 class="text-xl font-bold tracking-tight text-gray-900">What they faced</h3>
                    <p class="text-sm text-gray-500 leading-relaxed whitespace-pre-line">{{ $project->challenge }}</p>
                </div>
                
                <!-- Solution -->
                <div class="space-y-4">
                    <div class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest">02 / Our Solution</div>
                    <h3 class="text-xl font-bold tracking-tight text-gray-900">What we executed</h3>
                    <p class="text-sm text-gray-500 leading-relaxed whitespace-pre-line">{{ $project->solution }}</p>
                </div>

                <!-- Results -->
                <div class="space-y-4">
                    <div class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest">03 / The Results</div>
                    <h3 class="text-xl font-bold tracking-tight text-gray-900">What was achieved</h3>
                    <p class="text-sm text-gray-700 font-semibold leading-relaxed whitespace-pre-line bg-[#F8F8F8] p-6 rounded-3xl border border-gray-150">{{ $project->results }}</p>
                </div>
            </div>

            <!-- Tech / Strategy Tags -->
            @if(!empty($project->technologies_used))
                <div class="space-y-4 text-center">
                    <h4 class="font-bold text-[#111111] uppercase tracking-wider text-xs">Strategy & Tools Implemented</h4>
                    <div class="flex flex-wrap items-center justify-center gap-3">
                        @foreach($project->technologies_used as $tech)
                            <span class="bg-[#F8F8F8] border border-gray-200 text-gray-800 text-xs font-bold px-4 py-2 rounded-full">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Multiple Gallery Images Grid -->
            @if(!empty($project->gallery_images))
                <div class="space-y-8 pt-12">
                    <h4 class="font-bold text-center text-[#111111] uppercase tracking-wider text-xs">Project Gallery Gallery</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($project->gallery_images as $galImage)
                            <div class="aspect-video bg-gray-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition group">
                                <img src="{{ asset($galImage) }}" class="w-full h-full object-cover group-hover:scale-102 transition duration-300" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>

</x-frontend-layout>
