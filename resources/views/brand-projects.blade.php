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

        $categories = [
            'retail' => [
                'label' => 'Retail', 
                'text' => 'text-amber-500 dark:text-amber-400', 
                'bg' => 'bg-amber-500/10', 
                'border' => 'border-amber-500/20'
            ],
            'food_beverage' => [
                'label' => 'Food & Beverage', 
                'text' => 'text-rose-500 dark:text-rose-450', 
                'bg' => 'bg-rose-500/10', 
                'border' => 'border-rose-500/20'
            ],
            'hospitality' => [
                'label' => 'Hospitality', 
                'text' => 'text-emerald-500 dark:text-emerald-400', 
                'bg' => 'bg-emerald-500/10', 
                'border' => 'border-emerald-500/20'
            ],
            'healthcare' => [
                'label' => 'Healthcare', 
                'text' => 'text-blue-500 dark:text-blue-400', 
                'bg' => 'bg-blue-500/10', 
                'border' => 'border-blue-500/20'
            ],
            'real_estate' => [
                'label' => 'Real Estate', 
                'text' => 'text-indigo-500 dark:text-indigo-400', 
                'bg' => 'bg-indigo-500/10', 
                'border' => 'border-indigo-500/20'
            ],
            'products' => [
                'label' => 'Products', 
                'text' => 'text-purple-500 dark:text-purple-400', 
                'bg' => 'bg-purple-500/10', 
                'border' => 'border-purple-500/20'
            ],
        ];
    @endphp

    <div x-data="{ activeEmbed: null, activePlatform: null }" class="bg-[#FAF9F6] min-h-screen">
        
        <!-- Hero Header -->
        <header class="relative bg-white border-b border-gray-100 overflow-hidden">
            <div class="max-w-[1440px] mx-auto flex flex-col md:flex-row items-stretch">
                <!-- Text Content Side -->
                <div class="flex-1 px-6 py-16 sm:px-12 lg:px-20 flex flex-col justify-center space-y-6 relative z-10">
                    <span class="text-xs font-bold text-[#FF6A00] uppercase tracking-[0.2em] block">Brand campaigns</span>
                    <h1 class="text-4xl lg:text-6xl font-black tracking-tight text-zinc-900 leading-[1.05] uppercase font-heading">
                        Brand<br>Campaigns
                    </h1>
                    <div class="w-16 h-1 bg-[#FF6A00] rounded-full"></div>
                    <p class="text-sm sm:text-base text-[#666666] leading-relaxed max-w-md font-light">
                        Creative advertisement videos made for businesses and brands.
                    </p>
                </div>
                <!-- Image Cover Side -->
                <div class="flex-1 min-h-[300px] md:min-h-auto relative bg-zinc-900 overflow-hidden">
                    <img src="{{ asset('images/portfolio/brand_campaigns.jpg') }}" class="absolute inset-0 w-full h-full object-cover opacity-90 object-center" alt="Brand Campaigns Cover">
                    <!-- Split fade effect -->
                    <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-white to-transparent hidden md:block"></div>
                </div>
            </div>
        </header>

        <!-- Filter & Grid Section -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-6 space-y-12">
                
                <!-- Grid layout of mobile mockups -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                    @forelse($videos as $video)
                        @php
                            $embed = $video->platform === 'youtube' ? getYoutubeEmbedUrl($video->video_url) : getInstagramEmbedUrl($video->video_url);
                            
                            // Determine thumbnail
                            $thumbnail = null;
                            if ($video->thumbnail_path) {
                                $thumbnail = asset($video->thumbnail_path);
                            } elseif ($video->platform === 'youtube') {
                                $thumbnail = getYoutubeThumbnail($video->video_url);
                            }
                            
                            $catInfo = $categories[$video->category] ?? [
                                'label' => ucfirst(str_replace('_', ' ', $video->category ?? 'Campaign')),
                                'text' => 'text-[#FF6A00]',
                                'bg' => 'bg-[#FF6A00]/10',
                                'border' => 'border-[#FF6A00]/20'
                            ];
                        @endphp
                        
                        <!-- Mobile Phone Container -->
                        <div class="flex flex-col items-center space-y-4 group">
                            
                            <!-- iPhone Frame Mockup Container -->
                            <div class="w-full max-w-[250px] aspect-[9/18.2] bg-zinc-950 rounded-[44px] p-[6px] border-[6px] border-zinc-850 shadow-[0_15px_35px_rgba(0,0,0,0.18)] overflow-hidden relative hover:shadow-[0_25px_50px_rgba(255,106,0,0.12)] hover:border-zinc-800 transition duration-500 ease-out transform hover:-translate-y-2">
                                
                                <!-- Transparent Click Trigger Overlay spanning the whole card (prevents iframe click interception) -->
                                <div @click="activeEmbed = '{{ $embed }}'; activePlatform = '{{ $video->platform }}'"
                                     class="absolute inset-0 z-30 cursor-pointer"></div>
                                
                                <!-- Dynamic Island / Notch -->
                                <div class="absolute top-2.5 left-1/2 -translate-x-1/2 h-4 bg-zinc-950 rounded-full w-24 z-30 flex items-center justify-center border border-zinc-900">
                                    <div class="w-2 h-2 rounded-full bg-zinc-900 mr-2"></div>
                                    <div class="w-8 h-1 bg-zinc-900 rounded-full"></div>
                                </div>
                                
                                <!-- Inner Screen Wrapper -->
                                <div class="w-full h-full rounded-[38px] overflow-hidden bg-zinc-950 relative">
                                    
                                    <!-- Image Display -->
                                    <div class="w-full h-full relative overflow-hidden bg-zinc-900">
                                        @if($thumbnail)
                                            <img src="{{ $thumbnail }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700 ease-out" alt="{{ $video->title }}">
                                        @elseif($video->platform === 'youtube' && $embed)
                                            <img src="{{ getYoutubeThumbnail($video->video_url) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700 ease-out" alt="{{ $video->title }}">
                                        @elseif($video->platform === 'instagram' && $embed)
                                            <!-- Double layer: show a background loader while loading the iframe -->
                                            <div class="absolute inset-0 bg-zinc-950 flex items-center justify-center">
                                                <div class="w-6 h-6 border-2 border-zinc-700 border-t-[#FF6A00] rounded-full animate-spin"></div>
                                            </div>
                                            <!-- Clean crop zoom hack to show ONLY the video/thumbnail inside the mockup frame -->
                                            <div class="absolute inset-0 overflow-hidden pointer-events-none z-0 rounded-[32px]">
                                                <iframe class="absolute w-[125%] h-[145%] -left-[12.5%] -top-[18%] border-0 opacity-80 group-hover:opacity-100 transition duration-500" 
                                                        src="{{ $embed }}" 
                                                        frameborder="0" 
                                                        scrolling="no" 
                                                        allowtransparency="true"></iframe>
                                            </div>
                                        @else
                                            <!-- Custom Dark Premium Placeholder Gradient -->
                                            <div class="w-full h-full bg-gradient-to-br from-zinc-900 via-zinc-950 to-zinc-900 flex flex-col justify-between p-6 relative overflow-hidden group-hover:scale-105 transition duration-700 ease-out">
                                                <!-- Ambient light blur background -->
                                                <div class="absolute -top-16 -left-16 w-32 h-32 bg-[#FF6A00]/10 rounded-full blur-2xl"></div>
                                                <div class="absolute -bottom-16 -right-16 w-32 h-32 bg-[#FF6A00]/5 rounded-full blur-2xl"></div>
                                                
                                                <!-- Top Header -->
                                                <div class="flex items-center justify-between relative z-10">
                                                    <span class="text-[8px] font-bold text-zinc-500 uppercase tracking-widest">KKSB STUDIOS</span>
                                                    <i data-lucide="video" class="w-4 h-4 text-zinc-500"></i>
                                                </div>
                                                
                                                <!-- Center Icon placeholder -->
                                                <div class="flex flex-col items-center justify-center space-y-2 relative z-10 py-12">
                                                    <div class="w-12 h-12 rounded-full bg-zinc-900/80 border border-zinc-800 flex items-center justify-center text-zinc-400 group-hover:text-[#FF6A00] transition duration-300">
                                                        <i data-lucide="video" class="w-5 h-5"></i>
                                                    </div>
                                                    <span class="text-[9px] text-zinc-500 uppercase tracking-wider">Social Campaign</span>
                                                </div>
                                                
                                                <!-- Bottom Info -->
                                                <div class="space-y-1 text-left relative z-10">
                                                    <span class="inline-block text-[9px] font-bold px-2 py-0.5 rounded {{ $catInfo['bg'] }} {{ $catInfo['text'] }} border {{ $catInfo['border'] }}">
                                                        {{ $catInfo['label'] }}
                                                    </span>
                                                    <h3 class="text-xs font-bold text-zinc-300 truncate tracking-wide mt-1">{{ $video->title }}</h3>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!-- Sleek sweep reflection sheen effect -->
                                    <div class="absolute inset-0 z-20 pointer-events-none bg-gradient-to-tr from-white/0 via-white/5 to-white/0 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-out"></div>
                                    
                                    <!-- Glassmorphic Info Panel & Play Overlay (always present over image) -->
                                    <!-- Play Hover overlay -->
                                    <div class="absolute inset-0 bg-black/15 group-hover:bg-black/35 z-10 transition duration-500 flex items-center justify-center">
                                        <div class="w-14 h-14 rounded-full bg-zinc-950/80 backdrop-blur-md border border-white/20 flex items-center justify-center text-white scale-90 group-hover:scale-105 group-hover:bg-[#FF6A00] group-hover:border-transparent group-hover:shadow-[0_0_20px_rgba(255,106,0,0.4)] transition-all duration-500">
                                            <i data-lucide="play" class="w-5 h-5 fill-current text-white group-hover:text-white translate-x-0.5"></i>
                                        </div>
                                    </div>
                                    
                                    <!-- Content Overlay at the bottom -->
                                    <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-zinc-950 via-zinc-950/85 to-transparent p-5 pt-14 z-20">
                                        <div class="space-y-2 text-left">
                                            <!-- Category Pill -->
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[9px] font-bold tracking-wider uppercase {{ $catInfo['bg'] }} {{ $catInfo['text'] }} border {{ $catInfo['border'] }}">
                                                {{ $catInfo['label'] }}
                                            </span>
                                            
                                            <!-- Title & Subtitle -->
                                            <div class="space-y-0.5">
                                                <h3 class="text-sm font-extrabold text-white tracking-wide uppercase line-clamp-1">
                                                    {{ $video->title ?? 'Untitled Campaign' }}
                                                </h3>
                                                <p class="text-[10px] text-zinc-400 font-light leading-snug line-clamp-2">
                                                    {{ $video->description }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-16 text-center text-gray-500">
                            <i data-lucide="video-off" class="w-12 h-12 mx-auto text-gray-300 mb-3"></i>
                            <p class="font-medium text-base">No brand campaign videos added yet.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Footer CTA Block under Grid -->
                <div class="pt-12 border-t border-gray-200/60 flex flex-col sm:flex-row items-center justify-between gap-6">
                    <div class="flex items-center space-x-3 text-xs font-semibold text-zinc-700">
                        <div class="p-2 bg-zinc-900 text-[#FF6A00] rounded-xl">
                            <i data-lucide="clapperboard" class="w-4 h-4"></i>
                        </div>
                        <span>From concept to screen, we create impact.</span>
                    </div>
                    <a href="/services" class="inline-flex items-center space-x-2 bg-zinc-900 hover:bg-zinc-800 text-white font-bold h-[48px] px-6 rounded-xl text-xs uppercase tracking-wider transition shadow-sm">
                        <span>See Our Process</span>
                        <span class="text-[#FF6A00]">&rarr;</span>
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
            
            <div @click.away="activeEmbed = null; activePlatform = null" 
                 :class="activePlatform === 'youtube' ? 'max-w-4xl aspect-video rounded-2xl' : 'max-w-sm aspect-[9/16.5] rounded-3xl'"
                 class="relative w-full bg-zinc-950 overflow-hidden shadow-2xl border border-white/10 p-1 transition-all duration-300">
                 
                <!-- Close Button -->
                <button @click="activeEmbed = null; activePlatform = null" class="absolute top-4 right-4 z-20 text-white bg-black/40 hover:bg-black/60 p-2.5 rounded-full transition border border-white/10">
                    <i data-lucide="x" class="w-4.5 h-4.5"></i>
                </button>

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
