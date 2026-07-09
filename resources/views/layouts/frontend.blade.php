<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO Optimization -->
    <title>{{ $seo_title ?? App\Models\Setting::get('site_name', 'KKSB Studios') }} | {{ App\Models\Setting::get('site_tagline', 'Creative Digital Agency') }}</title>
    <meta name="description" content="{{ $seo_description ?? 'KKSB Studios is a premium creative agency based in Himachal Pradesh specializing in video production, social media management, brand strategy, and web design.' }}">
    <meta name="keywords" content="{{ $seo_keywords ?? 'creative agency, video production, social media management, himachal, solan, web design' }}">
    <link rel="canonical" href="{{ request()->url() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="{{ $seo_title ?? App\Models\Setting::get('site_name', 'KKSB Studios') }}">
    <meta property="og:description" content="{{ $seo_description ?? 'KKSB Studios is a premium creative agency based in Himachal Pradesh.' }}">
    <meta property="og:image" content="{{ asset($seo_image ?? 'images/hero-bg.webp') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ request()->url() }}">
    <meta property="twitter:title" content="{{ $seo_title ?? App\Models\Setting::get('site_name', 'KKSB Studios') }}">
    <meta property="twitter:description" content="{{ $seo_description ?? 'KKSB Studios is a premium creative agency based in Himachal Pradesh.' }}">
    <meta property="twitter:image" content="{{ asset($seo_image ?? 'images/hero-bg.webp') }}">

    <!-- JSON-LD Schema Markup -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "ProfessionalService",
        "name": "{{ App\Models\Setting::get('site_name', 'KKSB Studios') }}",
        "image": "{{ asset('images/hero-bg.webp') }}",
        "@@id": "{{ url('/') }}",
        "url": "{{ url('/') }}",
        "telephone": "{{ App\Models\Setting::get('contact_phone', '+91 78761 46013') }}",
        "address": {
            "@@type": "PostalAddress",
            "streetAddress": "Solan",
            "addressLocality": "Solan",
            "addressRegion": "Himachal Pradesh",
            "postalCode": "173212",
            "addressCountry": "IN"
        },
        "openingHoursSpecification": {
            "@@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday"
            ],
            "opens": "10:00",
            "closes": "19:00"
        },
        "sameAs": [
            "{{ App\Models\Setting::get('social_instagram', 'https://instagram.com/kksbstudios') }}",
            "{{ App\Models\Setting::get('social_linkedin', 'https://linkedin.com') }}"
        ]
    }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind & Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Anime.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #111111;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
            color: #111111;
        }
    </style>
</head>
<body class="bg-white antialiased selection:bg-emerald-500 selection:text-white" x-data="{ mobileMenuOpen: false }">

    <!-- Success / Error Toast notifications -->
    <div x-data="{ 
            show: false, 
            message: '', 
            type: 'success',
            init() {
                @if(session('success'))
                    this.showToast('{{ session('success') }}', 'success');
                @endif
                @if(session('error') || $errors->any())
                    this.showToast('{{ session('error') ?? $errors->first() }}', 'error');
                @endif
            },
            showToast(msg, type) {
                this.message = msg;
                this.type = type;
                this.show = true;
                setTimeout(() => this.show = false, 4000);
            }
         }"
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-2 sm:translate-y-0 sm:translate-x-2"
         x-transition:enter-end="opacity-100 translate-y-0 sm:translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed top-5 right-5 z-50 max-w-sm w-full bg-white border-l-4 border-emerald-600 rounded-lg shadow-xl p-4 flex items-start space-x-3"
         :class="{ 'border-emerald-600': type === 'success', 'border-rose-600': type === 'error' }"
         style="display: none;">
        <div class="flex-shrink-0">
            <template x-if="type === 'success'">
                <span class="text-emerald-600"><i data-lucide="check-circle" class="w-6 h-6"></i></span>
            </template>
            <template x-if="type === 'error'">
                <span class="text-rose-600"><i data-lucide="alert-triangle" class="w-6 h-6"></i></span>
            </template>
        </div>
        <div class="flex-grow">
            <p class="text-sm font-semibold text-[#111111]" x-text="message"></p>
        </div>
        <button @click="show = false" class="text-gray-400 hover:text-gray-600">
            <i data-lucide="x" class="w-4 h-4"></i>
        </button>
    </div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('images/logo.png') }}" class="h-14 md:h-16 w-auto object-contain py-0.5" alt="KKSB Studios">
            </a>

            <!-- Desktop Links -->
            <nav class="hidden md:flex items-center space-x-8 text-sm font-semibold">
                <a href="/" class="text-[#111111] hover:text-[#2E7D32] transition">Home</a>
                <a href="/about" class="text-gray-600 hover:text-[#2E7D32] transition">About Us</a>
                
                <!-- Mega Menu Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @mouseenter="open = true" @click.away="open = false" 
                            class="text-gray-600 hover:text-[#2E7D32] transition flex items-center space-x-1 focus:outline-none">
                        <span>Services</span>
                        <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <!-- Dropdown box -->
                    <div x-show="open" @mouseleave="open = false" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="absolute left-0 mt-3 w-64 bg-white border border-gray-100 rounded-2xl shadow-xl py-3 z-50 grid grid-cols-1"
                         style="display: none;">
                        @foreach(App\Models\Service::where('is_active', true)->orderBy('order')->get() as $navService)
                            <a href="/services/{{ $navService->slug }}" class="px-4 py-2.5 hover:bg-[#F8F8F8] flex items-center space-x-3 group transition">
                                <span class="text-gray-400 group-hover:text-[#2E7D32]"><i data-lucide="{{ $navService->icon ?? 'chevron-right' }}" class="w-4 h-4"></i></span>
                                <span class="text-xs font-bold text-gray-800 group-hover:text-[#111111]">{{ $navService->title }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="/portfolio" class="text-gray-600 hover:text-[#2E7D32] transition">Work</a>
                <a href="/blog" class="text-gray-600 hover:text-[#2E7D32] transition">Blog</a>
                <a href="/careers" class="text-gray-600 hover:text-[#2E7D32] transition">Careers</a>
                <a href="/contact" class="text-gray-600 hover:text-[#2E7D32] transition">Contact</a>
            </nav>

            <!-- CTA Let's talk -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="/contact" class="inline-flex items-center space-x-2 bg-[#111111] hover:bg-[#2E7D32] text-white text-xs font-bold px-5 py-3 rounded-full transition shadow-sm">
                    <span>Let's Talk</span>
                    <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <!-- Hamburger Button for Mobile -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-[#111111] hover:text-[#2E7D32] focus:outline-none flex items-center justify-center">
                <i data-lucide="menu" class="w-6 h-6" x-show="!mobileMenuOpen"></i>
                <i data-lucide="x" class="w-6 h-6" x-show="mobileMenuOpen" style="display: none;"></i>
            </button>
        </div>

        <!-- Mobile Nav Menu -->
        <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-white border-t border-gray-100" style="display: none;">
            <nav class="flex flex-col p-6 space-y-4 text-base font-semibold">
                <a href="/" @click="mobileMenuOpen = false" class="text-gray-800 hover:text-[#2E7D32]">Home</a>
                <a href="/about" @click="mobileMenuOpen = false" class="text-gray-800 hover:text-[#2E7D32]">About Us</a>
                <div class="space-y-2">
                    <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">Services</span>
                    <div class="grid grid-cols-1 pl-4 gap-2 border-l border-gray-100">
                        @foreach(App\Models\Service::where('is_active', true)->orderBy('order')->get() as $navService)
                            <a href="/services/{{ $navService->slug }}" @click="mobileMenuOpen = false" class="text-sm text-gray-600 hover:text-[#2E7D32] py-1 flex items-center space-x-2">
                                <span>{{ $navService->title }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                <a href="/portfolio" @click="mobileMenuOpen = false" class="text-gray-800 hover:text-[#2E7D32]">Work</a>
                <a href="/blog" @click="mobileMenuOpen = false" class="text-gray-800 hover:text-[#2E7D32]">Blog</a>
                <a href="/careers" @click="mobileMenuOpen = false" class="text-gray-800 hover:text-[#2E7D32]">Careers</a>
                <a href="/contact" @click="mobileMenuOpen = false" class="text-gray-800 hover:text-[#2E7D32]">Contact</a>
                <a href="/contact" @click="mobileMenuOpen = false" class="inline-flex items-center justify-center space-x-2 bg-[#111111] hover:bg-[#2E7D32] text-white text-xs font-bold py-3 rounded-full transition w-full">
                    <span>Let's Talk</span>
                    <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Views Insertion Slot -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer Section -->
    <footer class="bg-[#F8F8F8] border-t border-gray-200/50 pt-16 pb-12">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
            <!-- Col 1: About Brand -->
            <div class="space-y-4">
                <a href="/" class="inline-block">
                    <img src="{{ asset('images/logo.png') }}" class="h-14 md:h-16 w-auto object-contain -ml-2" alt="KKSB Studios">
                </a>
                <p class="text-xs text-gray-500 leading-relaxed max-w-xs">
                    {{ App\Models\Setting::get('site_name', 'KKSB Studios') }} is Himachal\'s premier digital creative agency, delivering video diaries, social retainers, SEO strategy, and custom web designs that elevate local and regional brands.
                </p>
                <div class="flex space-x-4 pt-2 text-[#111111]">
                    <a href="{{ App\Models\Setting::get('social_instagram', 'https://instagram.com/kksbstudios') }}" target="_blank" class="hover:text-[#2E7D32] transition"><i data-lucide="instagram" class="w-5 h-5"></i></a>
                    <a href="{{ App\Models\Setting::get('social_youtube', '#') }}" target="_blank" class="hover:text-[#2E7D32] transition"><i data-lucide="youtube" class="w-5 h-5"></i></a>
                    <a href="{{ App\Models\Setting::get('social_linkedin', '#') }}" target="_blank" class="hover:text-[#2E7D32] transition"><i data-lucide="linkedin" class="w-5 h-5"></i></a>
                    <a href="{{ App\Models\Setting::get('social_facebook', '#') }}" target="_blank" class="hover:text-[#2E7D32] transition"><i data-lucide="facebook" class="w-5 h-5"></i></a>
                </div>
            </div>

            <!-- Col 2: Services Quick Links -->
            <div class="space-y-4">
                <h4 class="font-bold text-[#111111] uppercase tracking-wider text-xs">Our Services</h4>
                <nav class="flex flex-col space-y-2 text-xs text-gray-500 font-medium">
                    @foreach(App\Models\Service::where('is_active', true)->orderBy('order')->take(5)->get() as $footService)
                        <a href="/services/{{ $footService->slug }}" class="hover:text-[#2E7D32] transition">{{ $footService->title }}</a>
                    @endforeach
                </nav>
            </div>

            <!-- Col 3: Company Sitemap -->
            <div class="space-y-4">
                <h4 class="font-bold text-[#111111] uppercase tracking-wider text-xs">Sitemap</h4>
                <nav class="flex flex-col space-y-2 text-xs text-gray-500 font-medium">
                    <a href="/" class="hover:text-[#2E7D32] transition">Home</a>
                    <a href="/about" class="hover:text-[#2E7D32] transition">About Us</a>
                    <a href="/portfolio" class="hover:text-[#2E7D32] transition">Featured Work</a>
                    <a href="/blog" class="hover:text-[#2E7D32] transition">Blog Articles</a>
                    <a href="/careers" class="hover:text-[#2E7D32] transition">Careers</a>
                    <a href="/contact" class="hover:text-[#2E7D32] transition">Contact Us</a>
                </nav>
            </div>

            <!-- Col 4: Newsletter Subscriber Form -->
            <div class="space-y-4">
                <h4 class="font-bold text-[#111111] uppercase tracking-wider text-xs">Subscribe to Newsletter</h4>
                <p class="text-xs text-gray-500 leading-relaxed">Stay updated with marketing strategies and reels tips delivered straight to your inbox.</p>
                
                <form method="POST" action="/newsletter/subscribe" class="flex flex-col sm:flex-row gap-2">
                    @csrf
                    <input type="email" name="email" required placeholder="Enter your email" 
                           class="flex-grow bg-white border border-gray-300 rounded-xl px-4 py-2.5 text-xs text-[#111111] focus:ring-emerald-500 focus:border-emerald-500">
                    <button type="submit" class="bg-[#111111] hover:bg-[#2E7D32] text-white text-xs font-semibold px-4 py-2.5 rounded-xl transition">
                        Join
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer Bottom Meta -->
        <div class="max-w-7xl mx-auto px-6 border-t border-gray-200/50 mt-12 pt-8 flex flex-col sm:flex-row items-center justify-between text-[11px] text-gray-400 font-semibold gap-4">
            <div>
                &copy; {{ date('Y') }} {{ App\Models\Setting::get('site_name', 'KKSB Studios') }}. All rights reserved.
            </div>
            <div class="flex space-x-6">
                <a href="/privacy-policy" class="hover:text-[#111111] transition">Privacy Policy</a>
                <a href="/terms-conditions" class="hover:text-[#111111] transition">Terms & Conditions</a>
                <a href="/cookie-policy" class="hover:text-[#111111] transition">Cookie Policy</a>
                <a href="/sitemap.xml" target="_blank" class="hover:text-[#111111] transition">Sitemap XML</a>
            </div>
        </div>
    </footer>

    <!-- Back to top button -->
    <div x-data="{ show: false }" @scroll.window="show = (window.pageYOffset > 500)" class="fixed bottom-6 right-6 z-50">
        <button x-show="show" @click="window.scrollTo({ top: 0, behavior: 'smooth' })" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-10 scale-90"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-200"
                class="bg-[#111111] hover:bg-[#2E7D32] text-white p-3 rounded-full shadow-lg transition focus:outline-none"
                style="display: none;">
            <i data-lucide="arrow-up" class="w-5 h-5"></i>
        </button>
    </div>

    <!-- Initialize Lucide Icons -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>
</html>
