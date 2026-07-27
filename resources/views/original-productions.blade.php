<x-frontend-layout>
    @php
        if (!function_exists('getYoutubeEmbedUrl')) {
            function getYoutubeEmbedUrl($url) {
                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                $id = $match[1] ?? null;
                return $id ? "https://www.youtube.com/embed/{$id}?autoplay=1" : null;
            }
        }

        if (!function_exists('getYoutubeThumbnail')) {
            function getYoutubeThumbnail($url) {
                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                $id = $match[1] ?? null;
                return $id ? "https://img.youtube.com/vi/{$id}/hqdefault.jpg" : null;
            }
        }

        if (!function_exists('getInstagramEmbedUrl')) {
            function getInstagramEmbedUrl($url) {
                preg_match('%(?:instagram\.com/(?:p|reel|tv)/)([^/?#&]+)%i', $url, $match);
                $shortcode = $match[1] ?? null;
                return $shortcode ? "https://www.instagram.com/reel/{$shortcode}/embed" : null;
            }
        }
    @endphp

    <div x-data="{ activeEmbed: null, activePlatform: null }" class="bg-[#FAF9F6] min-h-screen">
        
        <!-- Premium Full-Width Landscape Hero Banner -->
        <header class="relative bg-zinc-950 overflow-hidden h-[260px] sm:h-[300px] lg:h-[340px] flex items-center">
            <!-- Full Landscape Background Image -->
            <img src="{{ asset('images/portfolio/original_productions.jpg') }}" class="absolute inset-0 w-full h-full object-cover opacity-85" style="object-position: center 35%;" alt="Original Productions Cover">
            
            <!-- Dark Gradient Overlay for perfect readability -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-transparent z-10"></div>
            
            <!-- Content Container -->
            <div class="max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-20 w-full relative z-20 text-white">
                <div class="max-w-xl space-y-4">
                    <span class="text-xs font-bold text-white uppercase tracking-[0.2em] block">Original Productions</span>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight text-white leading-[1.05] uppercase font-heading">
                        Original<br>Productions
                    </h1>
                    <div class="w-16 h-1 bg-[#FF6A00] rounded-full"></div>
                    <p class="text-xs sm:text-sm text-gray-300 leading-relaxed max-w-md font-light">
                        Documentaries, travel films and stories created by KKSB Studios.
                    </p>
                </div>
            </div>
        </header>

        <!-- Grid Section -->
        <section class="py-16">
            <div class="max-w-6xl mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($videos as $video)
                        @php
                            $embed = $video->platform === 'youtube' ? getYoutubeEmbedUrl($video->video_url) : getInstagramEmbedUrl($video->video_url);
                            $thumbnail = $video->thumbnail_path ? asset($video->thumbnail_path) : ($video->platform === 'youtube' ? getYoutubeThumbnail($video->video_url) : asset('images/portfolio/original_productions.jpg'));
                        @endphp
                        
                        <!-- Video Card Item -->
                        <div class="bg-white border border-gray-150 rounded-3xl overflow-hidden shadow-sm flex flex-col justify-between group transition duration-300 hover:shadow-lg">
                            <div class="space-y-4">
                                <!-- Image & Play trigger container -->
                                <div @click="activeEmbed = '{{ $embed }}'; activePlatform = '{{ $video->platform }}'" class="aspect-video w-full overflow-hidden bg-zinc-950 relative cursor-pointer">
                                    <img src="{{ $thumbnail }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $video->title }}">
                                    <!-- Dynamic Play Overlay matching mockup -->
                                    <div class="absolute bottom-4 left-4 w-9 h-9 rounded-full bg-black/60 backdrop-blur-sm border border-white/20 flex items-center justify-center text-[#FF6A00] transition duration-300 group-hover:scale-110">
                                        <svg class="w-3.5 h-3.5 fill-current translate-x-0.5" viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="px-6 space-y-2">
                                    <h3 class="text-base font-extrabold text-zinc-900 uppercase tracking-wide leading-snug">
                                        {{ $video->title ?? 'Untitled Project' }}
                                    </h3>
                                    <p class="text-xs text-[#666666] leading-relaxed font-light">
                                        {{ $video->description }}
                                    </p>
                                </div>
                            </div>
                            <!-- Card CTA footer -->
                            <div class="p-6 pt-4 flex items-center justify-between border-t border-gray-100 mt-4">
                                <span class="text-[9px] font-bold text-zinc-400 uppercase tracking-widest">
                                    {{ $video->platform === 'youtube' ? 'YouTube Film' : 'Insta Reel' }}
                                </span>
                                <button @click="activeEmbed = '{{ $embed }}'; activePlatform = '{{ $video->platform }}'" class="inline-flex items-center space-x-1.5 text-xs font-bold text-[#FF6A00] hover:text-[#E55F00] transition uppercase tracking-wider">
                                    <span>Watch Project</span>
                                    <span>&rarr;</span>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-16 text-center text-gray-500">
                            <i data-lucide="video-off" class="w-12 h-12 mx-auto text-gray-300 mb-3"></i>
                            <p class="font-medium text-base">No original productions registered yet.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Back to Portfolio -->
                <div class="mt-16 text-center">
                    <a href="/portfolio" class="inline-flex items-center space-x-2 border border-gray-300 hover:border-zinc-450 text-zinc-900 bg-white font-bold h-[50px] px-8 rounded-xl text-xs uppercase tracking-wider transition hover:-translate-y-0.5 shadow-sm">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        <span>Back to Portfolio</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Video Lightbox Popup Modal -->
        <div x-show="activeEmbed !== null" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/90 backdrop-blur-sm"
             style="display: none;"
             @keydown.escape.window="activeEmbed = null; activePlatform = null">
            
            <!-- Floating Close Button on Viewport Corner (prevents overlapping video header/controls) -->
            <button @click="activeEmbed = null; activePlatform = null" class="fixed top-6 right-6 z-50 text-white bg-black/50 hover:bg-black/80 p-3 rounded-full transition border border-white/10 shadow-lg">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
            
            <div @click.away="activeEmbed = null; activePlatform = null" 
                 :class="activePlatform === 'youtube' ? 'rounded-2xl' : 'rounded-3xl'"
                 :style="activePlatform === 'youtube' ? 'max-width: min(896px, 90vw); max-height: 82vh; aspect-ratio: 16/9;' : 'width: min(450px, 90vw, calc(82vh * 9 / 16)); max-height: 82vh; aspect-ratio: 9/16;'"
                 class="relative w-full bg-zinc-950 overflow-hidden shadow-2xl border border-white/10 p-1 transition-all duration-300">
                 
                <!-- Iframe player -->
                <template x-if="activeEmbed">
                    <iframe class="w-full h-full" 
                            :class="activePlatform === 'youtube' ? 'rounded-xl' : 'rounded-2xl'"
                            :src="activeEmbed" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen 
                            allowtransparency="true" 
                            scrolling="no"></iframe>
                </template>
            </div>
        </div>

    </div>
</x-frontend-layout>
