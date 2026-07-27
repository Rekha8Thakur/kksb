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



        $horizontalVideos = $videos->filter(fn($v) => $v->platform === 'youtube');
        $verticalVideos = $videos->filter(fn($v) => $v->platform === 'instagram');
    @endphp

    <div x-data="{ activeEmbed: null, activePlatform: null }" class="bg-[#FAF9F6] min-h-screen">
        
        <!-- Premium Full-Width Landscape Hero Banner -->
        <header class="relative bg-zinc-950 overflow-hidden h-[260px] sm:h-[300px] lg:h-[340px] flex items-center">
            <!-- Full Landscape Background Image -->
            <img src="{{ asset('images/portfolio/brand_campaigns.jpg') }}" class="absolute inset-0 w-full h-full object-cover object-center opacity-95" alt="Brand Campaigns Cover">
            
            <!-- Dark Gradient Overlay for perfect readability -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/30 to-transparent z-10"></div>
            
            <!-- Content Container -->
            <div class="max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-20 w-full relative z-20 text-white">
                <div class="max-w-xl space-y-4">
                    <span class="text-xs font-bold text-white uppercase tracking-[0.2em] block">Brand Campaigns</span>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight text-white leading-[1.05] uppercase font-heading">
                        Brand<br>Campaigns
                    </h1>
                    <div class="w-16 h-1 bg-[#FF6A00] rounded-full"></div>
                    <p class="text-xs sm:text-sm text-white leading-relaxed max-w-md font-light">
                        Creative advertisement videos made for businesses and brands.
                    </p>
                </div>
            </div>
        </header>

        <!-- Filter & Grid Section -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-6 space-y-16">

                <!-- Brand Video Campaigns Section (Vertical Mockups) -->
                @if($verticalVideos->isNotEmpty())
                    <div class="space-y-6">
                        <div class="flex items-center justify-between border-b border-gray-200/60 pb-4">
                            <h2 class="text-xl sm:text-2xl font-black text-zinc-900 uppercase tracking-wide">Brand Video Campaigns</h2>
                            <span class="text-xs text-gray-500 font-light uppercase tracking-wider">Instagram Reels</span>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-8">
                            @foreach($verticalVideos as $video)
                                @php
                                    $embed = getInstagramEmbedUrl($video->video_url);
                                    
                                    // Determine thumbnail
                                    $thumbnail = null;
                                    if ($video->thumbnail_path) {
                                        $thumbnail = asset($video->thumbnail_path);
                                    } else {
                                        // Auto-map to content-specific vertical campaign thumbnails
                                        $lowerTitle = strtolower($video->title);
                                        if (str_contains($lowerTitle, 'noble') || str_contains($lowerTitle, 'solar')) {
                                            $thumbnail = asset('images/portfolio/noble_solar_thumb.png');
                                        } elseif (str_contains($lowerTitle, 'mayur')) {
                                            $thumbnail = asset('images/portfolio/mayur_hotel_thumb.png');
                                        } elseif (str_contains($lowerTitle, 'liqo')) {
                                            $thumbnail = asset('images/portfolio/liqo_sale_thumb.png');
                                        } elseif (str_contains($lowerTitle, 'maini')) {
                                            $thumbnail = asset('images/portfolio/maini_electronics_thumb.png');
                                        } elseif (str_contains($lowerTitle, 'pupstyle')) {
                                            $thumbnail = asset('images/portfolio/pupstyle_care_thumb.png');
                                        } else {
                                            $thumbnail = asset('images/portfolio/brand_campaigns.jpg');
                                        }
                                    }
                                @endphp
                                
                                <!-- Mobile Phone Container -->
                                <div class="flex flex-col items-center space-y-4 group">
                                    
                                    <!-- iPhone Frame Mockup Container -->
                                    <div class="w-full max-w-[250px] bg-zinc-950 rounded-[24px] sm:rounded-[44px] p-[3px] sm:p-[6px] border-[3px] sm:border-[6px] border-zinc-850 shadow-[0_10px_25px_rgba(0,0,0,0.18)] overflow-hidden relative hover:shadow-[0_25px_50px_rgba(255,106,0,0.12)] hover:border-zinc-800 transition duration-500 ease-out transform hover:-translate-y-2"
                                         style="aspect-ratio: 9/16;">
                                        
                                        <!-- Transparent Click Trigger Overlay spanning the whole card (prevents iframe click interception) -->
                                        <div @click="activeEmbed = '{{ $embed }}'; activePlatform = '{{ $video->platform }}'"
                                             class="absolute inset-0 z-30 cursor-pointer"></div>
                                        
                                        <!-- Dynamic Island / Notch -->
                                        <div class="absolute top-1.5 sm:top-2.5 left-1/2 -translate-x-1/2 h-2 sm:h-4 bg-zinc-950 rounded-full w-12 sm:w-24 z-30 flex items-center justify-center border border-zinc-900">
                                            <div class="w-1 h-1 sm:w-2 sm:h-2 rounded-full bg-zinc-900 mr-1 sm:mr-2"></div>
                                            <div class="w-4 h-0.5 sm:w-8 sm:h-1 bg-zinc-900 rounded-full"></div>
                                        </div>
                                        
                                        <!-- Inner Screen Wrapper -->
                                        <div class="w-full h-full rounded-[20px] sm:rounded-[38px] overflow-hidden bg-zinc-950 relative">
                                            
                                             <!-- Image Display -->
                                            <div class="w-full h-full relative overflow-hidden bg-zinc-900">
                                                @if($embed)
                                                    <!-- Double layer: show a background loader while loading the iframe -->
                                                    <div class="absolute inset-0 bg-zinc-950 flex items-center justify-center">
                                                        <div class="w-4 h-4 sm:w-6 sm:h-6 border-2 border-zinc-700 border-t-[#FF6A00] rounded-full animate-spin"></div>
                                                    </div>
                                                    <!-- Show the actual Instagram embed first screen directly inside the mockup frame -->
                                                    <div class="absolute inset-0 z-0 rounded-[16px] sm:rounded-[32px] overflow-hidden">
                                                        <iframe class="absolute inset-x-0 w-full border-0 opacity-90 group-hover:opacity-100 transition duration-500" 
                                                                style="top: -54px; height: calc(100% + 54px);"
                                                                src="{{ $embed }}" 
                                                                frameborder="0" 
                                                                scrolling="no" 
                                                                allowtransparency="true"></iframe>
                                                    </div>
                                                @elseif($thumbnail)
                                                    <!-- Custom Dark Premium Placeholder Gradient -->
                                                    <div class="w-full h-full bg-gradient-to-br from-zinc-900 via-zinc-950 to-zinc-900 flex flex-col justify-between p-3 sm:p-6 relative overflow-hidden group-hover:scale-105 transition duration-700 ease-out">
                                                        <!-- Ambient light blur background -->
                                                        <div class="absolute -top-16 -left-16 w-32 h-32 bg-[#FF6A00]/10 rounded-full blur-2xl"></div>
                                                        <div class="absolute -bottom-16 -right-16 w-32 h-32 bg-[#FF6A00]/5 rounded-full blur-2xl"></div>
                                                        
                                                        <!-- Top Header -->
                                                        <div class="flex items-center justify-between relative z-10">
                                                            <span class="text-[6px] sm:text-[8px] font-bold text-zinc-500 uppercase tracking-widest">KKSB STUDIOS</span>
                                                            <i data-lucide="video" class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-zinc-500"></i>
                                                        </div>
                                                        
                                                        <!-- Center Icon placeholder -->
                                                        <div class="flex flex-col items-center justify-center space-y-1 sm:space-y-2 relative z-10 py-6 sm:py-12">
                                                            <div class="w-8 h-8 sm:w-12 sm:h-12 rounded-full bg-zinc-900/80 border border-zinc-800 flex items-center justify-center text-zinc-400 group-hover:text-[#FF6A00] transition duration-300">
                                                                <i data-lucide="video" class="w-3.5 h-3.5 sm:w-5 sm:h-5"></i>
                                                            </div>
                                                            <span class="text-[7px] sm:text-[9px] text-zinc-500 uppercase tracking-wider">Social Campaign</span>
                                                        </div>
                                                        
                                                        <!-- Bottom Info -->
                                                        <div class="space-y-1 text-left relative z-10">
                                                            <h3 class="text-[10px] sm:text-xs font-bold text-zinc-300 truncate tracking-wide mt-1">{{ $video->title }}</h3>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            
                                            <!-- Sleek sweep reflection sheen effect -->
                                            <div class="absolute inset-0 z-20 pointer-events-none bg-gradient-to-tr from-white/0 via-white/5 to-white/0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-out"></div>
                                            
                                            <!-- Hover Overlay for subtle interaction feedback -->
                                            <div class="absolute inset-0 bg-black/10 group-hover:bg-black/25 z-10 transition duration-500"></div>
                                            
                                            <!-- Content Overlay at the bottom -->
                                            <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-zinc-950 via-zinc-950/85 to-transparent p-3 pt-8 sm:p-5 sm:pt-14 z-20">
                                                <div class="space-y-1 sm:space-y-2 text-left">
                                                    <!-- Title & Subtitle -->
                                                    <div class="space-y-0.5">
                                                        <h3 class="text-[10px] sm:text-sm font-extrabold text-white tracking-wide uppercase line-clamp-1 leading-tight">
                                                            {{ $video->title ?? 'Untitled Campaign' }}
                                                        </h3>
                                                        <p class="text-[8px] sm:text-[10px] text-zinc-400 font-light leading-snug line-clamp-2">
                                                            {{ $video->description }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($verticalVideos->isEmpty())
                    <div class="py-16 text-center text-gray-500">
                        <i data-lucide="video-off" class="w-12 h-12 mx-auto text-gray-300 mb-3"></i>
                        <p class="font-medium text-base">No brand campaign videos added yet.</p>
                    </div>
                @endif

                <!-- Footer CTA Block under Grid -->
                <div class="pt-12 border-t border-gray-200/60 flex flex-col sm:flex-row items-center justify-between gap-6">
                    <div class="flex items-center space-x-3 text-xs font-semibold text-zinc-700">
                        <div class="p-2 bg-zinc-900 text-[#FF6A00] rounded-xl">
                            <i data-lucide="clapperboard" class="w-4 h-4"></i>
                        </div>
                        <span>From concept to screen, we create impact.</span>
                    </div>
                    <a href="/services" class="inline-flex items-center space-x-2 bg-[#111111] hover:bg-zinc-800 text-white font-bold h-[48px] px-6 rounded-xl text-xs uppercase tracking-wider transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-md group">
                        <span>See Our Process</span>
                        <span class="group-hover:translate-x-1 transition-transform duration-200">&rarr;</span>
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
