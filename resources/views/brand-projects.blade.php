<x-frontend-layout>
    @php
        if (!function_exists('getInstagramEmbedUrl')) {
            function getInstagramEmbedUrl($url) {
                preg_match('%(?:instagram\.com/(?:p|reel|tv)/)([^/?#&]+)%i', $url, $match);
                $shortcode = $match[1] ?? null;
                return $shortcode ? "https://www.instagram.com/reel/{$shortcode}/embed" : null;
            }
        }
    @endphp

    <div x-data="{ activeEmbed: null }" class="bg-[#FAF9F6] min-h-screen">
        
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
        <section class="py-12">
            <div class="max-w-7xl mx-auto px-6 space-y-12">
                
                <!-- Grid layout of mobile mockups -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                    @forelse($videos as $video)
                        @php $embed = getInstagramEmbedUrl($video->video_url); @endphp
                        
                        <!-- Mobile Phone Container -->
                        <div class="flex flex-col items-center space-y-5 group">
                            
                            <!-- iPhone Frame Mockup -->
                            <div class="w-full max-w-[270px] aspect-[9/18.5] bg-zinc-950 rounded-[42px] p-1.5 border-[8px] border-zinc-900 shadow-xl overflow-hidden relative group-hover:shadow-2xl transition duration-300">
                                <!-- Speaker Notch -->
                                <div class="absolute top-0 inset-x-0 h-4 bg-zinc-900 rounded-b-xl w-32 mx-auto z-20 flex items-center justify-center">
                                    <div class="w-12 h-1 bg-zinc-800 rounded-full"></div>
                                </div>

                                <!-- Screen Screen Embed -->
                                <div class="w-full h-full rounded-[32px] overflow-hidden bg-black relative">
                                    @if($embed)
                                        <!-- Clean screen background crop hack to hide Instagram follow headers and action footers -->
                                        <div class="absolute inset-0 overflow-hidden rounded-[32px]">
                                            <iframe class="absolute w-full h-[145%] -top-[20%] left-0 border-0" 
                                                    src="{{ $embed }}" 
                                                    frameborder="0" 
                                                    scrolling="no" 
                                                    allowtransparency="true"></iframe>
                                        </div>
                                        <!-- Play overlay mask for lightbox popup -->
                                        <div @click="activeEmbed = '{{ $embed }}'" class="absolute inset-0 bg-transparent cursor-pointer z-10 flex items-center justify-center group/play">
                                            <div class="w-14 h-14 rounded-full bg-black/40 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white scale-90 group-hover/play:scale-100 opacity-0 group-hover:opacity-100 transition duration-300">
                                                <i data-lucide="play" class="w-6 h-6 fill-current text-[#FF6A00] translate-x-0.5"></i>
                                            </div>
                                        </div>
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-zinc-550 text-xs">No Video Link</div>
                                    @endif
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
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/85 backdrop-blur-sm"
             style="display: none;">
            
            <div @click.away="activeEmbed = null" class="relative max-w-sm w-full aspect-[9/16] bg-zinc-950 rounded-3xl overflow-hidden shadow-2xl border border-white/10 p-1">
                <!-- Close Button -->
                <button @click="activeEmbed = null" class="absolute top-4 right-4 z-20 text-white bg-black/40 hover:bg-black/60 p-2.5 rounded-full transition border border-white/10">
                    <i data-lucide="x" class="w-4.5 h-4.5"></i>
                </button>

                <!-- Iframe player -->
                <template x-if="activeEmbed">
                    <iframe class="w-full h-full rounded-2xl" :src="activeEmbed" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
                </template>
            </div>
        </div>

    </div>
</x-frontend-layout>
