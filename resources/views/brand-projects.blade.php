<x-frontend-layout>
    @php
        if (!function_exists('getYoutubeEmbedUrl')) {
            function getYoutubeEmbedUrl($url) {
                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                $id = $match[1] ?? null;
                return $id ? "https://www.youtube.com/embed/{$id}" : null;
            }
        }
    @endphp

    <!-- Hero Header -->
    <section class="bg-[#FAFAFA] pt-12 pb-16 lg:pt-16 lg:pb-20 border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <span class="text-xs font-bold text-[#FF6A00] uppercase tracking-[0.2em] block mb-2">Campaigns & Reels</span>
            <h1 class="text-4xl sm:text-6xl font-black tracking-tight leading-[1.1] text-zinc-900 uppercase">
                Brand Campaigns.<br>
                <span class="text-gray-400">Social Media & Reels.</span>
            </h1>
            
            <div class="w-16 h-1 bg-[#FF6A00] mx-auto my-6 rounded-full"></div>
            
            <p class="text-sm sm:text-base text-[#666666] leading-relaxed max-w-2xl mx-auto font-light">
                Explore our performance-driven brand films, promotional videos, and creative campaigns built to engage audiences and drive results.
            </p>
        </div>
    </section>

    <!-- Videos Grid Section -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                @forelse($videos as $video)
                    @php $embed = getYoutubeEmbedUrl($video->video_url); @endphp
                    <!-- YouTube Video Card -->
                    <div class="bg-white border border-gray-150 rounded-3xl overflow-hidden shadow-sm flex flex-col group transition duration-300 hover:shadow-lg">
                        <div class="aspect-video w-full bg-zinc-900 relative">
                            @if($embed)
                                <iframe class="w-full h-full" src="{{ $embed }}" title="{{ $video->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            @else
                                <div class="w-full h-full flex items-center justify-center text-white/50 text-xs">Invalid Video Link</div>
                            @endif
                        </div>
                        <div class="p-6 flex items-center justify-between border-t border-gray-100">
                            <h3 class="font-extrabold text-sm text-zinc-900 uppercase tracking-wide truncate pr-4">
                                {{ $video->title ?? 'YouTube Showcase' }}
                            </h3>
                            <span class="inline-flex items-center space-x-1.5 text-[10px] font-bold text-rose-600 bg-rose-50 px-2.5 py-1 rounded-full uppercase tracking-wider">
                                <i data-lucide="video" class="w-3.5 h-3.5"></i>
                                <span>YouTube</span>
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center text-gray-500">
                        <i data-lucide="video-off" class="w-12 h-12 mx-auto text-gray-300 mb-3"></i>
                        <p class="font-medium text-base">No brand campaign videos added yet.</p>
                    </div>
                @endforelse
            </div>

            <!-- Back to Portfolio CTA -->
            <div class="mt-16 text-center">
                <a href="/portfolio" class="inline-flex items-center space-x-2 border border-gray-300 hover:border-zinc-450 text-zinc-900 bg-white font-bold h-[50px] px-8 rounded-xl text-xs uppercase tracking-wider transition-all hover:-translate-y-0.5 shadow-sm">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    <span>Back to Portfolio</span>
                </a>
            </div>
        </div>
    </section>

</x-frontend-layout>
