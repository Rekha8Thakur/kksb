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
                preg_match('/(?:instagram\.com\/(?:p|reel|tv)\/)([^/?#&]+)/i', $url, $match);
                $shortcode = $match[1] ?? null;
                return $shortcode ? "https://www.instagram.com/reel/{$shortcode}/embed" : null;
            }
        }
    @endphp

    <div x-data="{ activeEmbed: null }" class="bg-[#FAF9F6] min-h-screen">
        
        <!-- Premium Split Hero Banner -->
        <header class="relative bg-white border-b border-gray-100 overflow-hidden">
            <div class="max-w-[1440px] mx-auto flex flex-col md:flex-row items-stretch">
                <!-- Text Content Side -->
                <div class="flex-1 px-6 py-16 sm:px-12 lg:px-20 flex flex-col justify-center space-y-6 relative z-10">
                    <span class="text-xs font-bold text-[#FF6A00] uppercase tracking-[0.2em] block">Original Productions</span>
                    <h1 class="text-4xl lg:text-6xl font-black tracking-tight text-zinc-900 leading-[1.05] uppercase font-heading">
                        Original<br>Productions
                    </h1>
                    <div class="w-16 h-1 bg-[#FF6A00] rounded-full"></div>
                    <p class="text-sm sm:text-base text-[#666666] leading-relaxed max-w-md font-light">
                        Documentaries, travel films and stories created by KKSB Studios.
                    </p>
                </div>
                <!-- Image Cover Side -->
                <div class="flex-1 min-h-[300px] md:min-h-auto relative bg-zinc-900 overflow-hidden">
                    <img src="{{ asset('images/portfolio/original_productions.jpg') }}" class="absolute inset-0 w-full h-full object-cover opacity-90 object-center" alt="Original Productions Cover">
                    <!-- Split fade effect -->
                    <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-white to-transparent hidden md:block"></div>
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
                                <div @click="activeEmbed = '{{ $embed }}'" class="aspect-video w-full overflow-hidden bg-zinc-950 relative cursor-pointer">
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
                                <button @click="activeEmbed = '{{ $embed }}'" class="inline-flex items-center space-x-1.5 text-xs font-bold text-[#FF6A00] hover:text-[#E55F00] transition uppercase tracking-wider">
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
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/85 backdrop-blur-sm"
             style="display: none;">
            
            <div @click.away="activeEmbed = null" class="relative max-w-4xl w-full aspect-video bg-zinc-950 rounded-2xl overflow-hidden shadow-2xl border border-white/10">
                <!-- Close Button -->
                <button @click="activeEmbed = null" class="absolute top-4 right-4 z-10 text-white bg-black/40 hover:bg-black/60 p-2.5 rounded-full transition border border-white/10">
                    <i data-lucide="x" class="w-4.5 h-4.5"></i>
                </button>

                <!-- Iframe player -->
                <template x-if="activeEmbed">
                    <iframe class="w-full h-full" :src="activeEmbed" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </template>
            </div>
        </div>

    </div>
</x-frontend-layout>
