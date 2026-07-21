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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind & Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Anime.js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            color: #111111;
        }
        h1, h2, h3, h4, h5, h6, .font-heading {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #111111;
        }
    </style>
</head>
<body class="bg-white antialiased selection:bg-[#FF6A00] selection:text-white" x-data="{ mobileMenuOpen: false }">

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
         class="fixed top-5 right-5 z-50 max-w-sm w-full bg-white border-l-4 border-[#FF6A00] rounded-lg shadow-xl p-4 flex items-start space-x-3"
         :class="{ 'border-[#FF6A00]': type === 'success', 'border-rose-600': type === 'error' }"
         style="display: none;">
        <div class="flex-shrink-0">
            <template x-if="type === 'success'">
                <span class="text-[#FF6A00]"><i data-lucide="check-circle" class="w-6 h-6"></i></span>
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
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-[#ECECEC] transition-all duration-300">
        <div class="max-w-[1440px] mx-auto px-5 lg:px-[90px] h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="/" class="flex items-center space-x-2 group">
                <img src="{{ asset('images/logo.png') }}?v={{ filemtime(public_path('images/logo.png')) }}" class="h-12 sm:h-14 md:h-16 lg:h-[72px] w-auto object-contain py-1 transition-transform duration-300 group-hover:scale-105" alt="KKSB Studios Logo">
            </a>

            <!-- Desktop Links -->
            <nav class="hidden md:flex items-center space-x-8 text-[14px] font-semibold tracking-wide">
                <a href="/" class="{{ request()->is('/') ? 'text-[#111111] border-b-2 border-[#FF6A00] pb-1' : 'text-[#666666] hover:text-[#111111] pb-1' }} transition">Home</a>
                <a href="/about" class="{{ request()->is('about') ? 'text-[#111111] border-b-2 border-[#FF6A00] pb-1' : 'text-[#666666] hover:text-[#111111] pb-1' }} transition">About</a>
                
                <a href="/services" class="{{ request()->is('services*') ? 'text-[#111111] border-b-2 border-[#FF6A00] pb-1' : 'text-[#666666] hover:text-[#111111] pb-1' }} transition">Services</a>

                <a href="/portfolio" class="{{ request()->is('portfolio*') ? 'text-[#111111] border-b-2 border-[#FF6A00] pb-1' : 'text-[#666666] hover:text-[#111111] pb-1' }} transition">Work</a>
                <a href="/blog" class="{{ request()->is('blog*') ? 'text-[#111111] border-b-2 border-[#FF6A00] pb-1' : 'text-[#666666] hover:text-[#111111] pb-1' }} transition">Blog</a>
                <a href="/contact" class="{{ request()->is('contact') ? 'text-[#111111] border-b-2 border-[#FF6A00] pb-1' : 'text-[#666666] hover:text-[#111111] pb-1' }} transition">Contact</a>
            </nav>

            <!-- CTA Let's talk -->
            <div class="hidden md:flex items-center">
                <a href="/contact" class="inline-flex items-center space-x-2 bg-[#FF6A00] hover:bg-[#E55F00] text-white text-[13px] font-semibold px-6 py-3 rounded-full transition shadow-md shadow-[#FF6A00]/20">
                    <span>Let's Talk</span>
                    <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                </a>
            </div>

            <!-- Hamburger Button for Mobile -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-[#111111] p-2 focus:outline-none rounded-lg">
                <template x-if="!mobileMenuOpen">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </template>
                <template x-if="mobileMenuOpen">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </template>
            </button>
        </div>

        <!-- Mobile Nav Menu -->
        <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-white border-t border-[#ECECEC]" style="display: none;">
            <nav class="flex flex-col p-5 space-y-4 text-base font-semibold">
                <a href="/" @click="mobileMenuOpen = false" class="text-gray-800 hover:text-[#FF6A00]">Home</a>
                <a href="/about" @click="mobileMenuOpen = false" class="text-gray-800 hover:text-[#FF6A00]">About Us</a>
                <a href="/services" @click="mobileMenuOpen = false" class="{{ request()->is('services*') ? 'text-[#FF6A00]' : 'text-gray-800 hover:text-[#FF6A00]' }}">Services</a>
                <a href="/portfolio" @click="mobileMenuOpen = false" class="text-gray-800 hover:text-[#FF6A00]">Work</a>
                <a href="/blog" @click="mobileMenuOpen = false" class="text-gray-800 hover:text-[#FF6A00]">Blog</a>
                <a href="/contact" @click="mobileMenuOpen = false" class="text-gray-800 hover:text-[#FF6A00]">Contact</a>
                <a href="/contact" @click="mobileMenuOpen = false" class="inline-flex items-center justify-center space-x-2 bg-[#FF6A00] hover:bg-[#E55F00] text-white text-sm font-bold h-[52px] rounded-[12px] px-5 transition w-full shadow-md">
                    <span>Let's Talk</span>
                    <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Views Insertion Slot -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer Section (Dark Style Guide) -->
    <footer class="bg-[#111111] text-white pt-20 pb-12 relative overflow-hidden">
        <!-- Background Large Brand Watermark -->
        <div class="absolute right-6 bottom-4 pointer-events-none select-none opacity-5 font-extrabold text-[180px] leading-none text-white flex items-baseline">
            <span>K</span><span class="text-[#FF6A00]">.</span>
        </div>

        <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px] grid grid-cols-1 md:grid-cols-12 gap-12 lg:gap-16 relative z-10">
            <!-- Col 1: About Brand -->
            <div class="md:col-span-5 space-y-6">
                <a href="/" class="inline-block group">
                    <img src="{{ asset('images/logo.png') }}?v={{ filemtime(public_path('images/logo.png')) }}" class="h-12 md:h-16 lg:h-20 w-auto object-contain -ml-2 transition-transform duration-300 group-hover:scale-105 filter invert brightness-200" alt="KKSB Studios Logo">
                </a>
                <p class="text-[15px] text-gray-400 leading-relaxed max-w-sm font-light">
                    A creative marketing agency focused on building brands that grow and inspire in the digital world.
                </p>
                <div class="flex space-x-4 pt-2 text-gray-400">
                    <a href="{{ App\Models\Setting::get('social_instagram', 'https://instagram.com/kksbstudios') }}" target="_blank" class="hover:text-[#FF6A00] transition"><i data-lucide="instagram" class="w-5 h-5"></i></a>
                    <a href="{{ App\Models\Setting::get('social_youtube', '#') }}" target="_blank" class="hover:text-[#FF6A00] transition"><i data-lucide="youtube" class="w-5 h-5"></i></a>
                    <a href="{{ App\Models\Setting::get('social_facebook', '#') }}" target="_blank" class="hover:text-[#FF6A00] transition"><i data-lucide="facebook" class="w-5 h-5"></i></a>
                    <a href="{{ App\Models\Setting::get('social_linkedin', '#') }}" target="_blank" class="hover:text-[#FF6A00] transition"><i data-lucide="linkedin" class="w-5 h-5"></i></a>
                </div>
            </div>

            <!-- Col 2: Quick Links -->
            <div class="md:col-span-2 space-y-4">
                <h4 class="font-semibold text-[#FF6A00] uppercase tracking-wider text-[11px]">Quick Links</h4>
                <nav class="flex flex-col space-y-2 text-[14px] text-gray-400">
                    <a href="/" class="hover:text-white transition">About Us</a>
                    <a href="/services" class="hover:text-white transition">Services</a>
                    <a href="/portfolio" class="hover:text-white transition">Our Work</a>
                    <a href="/blog" class="hover:text-white transition">Blog</a>
                    <a href="/contact" class="hover:text-white transition">Contact</a>
                </nav>
            </div>

            <!-- Col 3: Services -->
            <div class="md:col-span-2 space-y-4">
                <h4 class="font-semibold text-[#FF6A00] uppercase tracking-wider text-[11px]">Services</h4>
                <nav class="flex flex-col space-y-2 text-[14px] text-gray-400">
                    <a href="/services/brand-strategy" class="hover:text-white transition">Brand Strategy</a>
                    <a href="/services/reels-and-short-form-content" class="hover:text-white transition">Content Creation</a>
                    <a href="/services/digital-campaigns" class="hover:text-white transition">Performance Marketing</a>
                    <a href="/services/social-media-management" class="hover:text-white transition">Social Media</a>
                    <a href="/services/web-design-development" class="hover:text-white transition">Web Design</a>
                </nav>
            </div>

            <!-- Col 4: Contact Info -->
            <div class="md:col-span-3 space-y-4">
                <h4 class="font-semibold text-[#FF6A00] uppercase tracking-wider text-[11px]">Let's Connect</h4>
                <div class="flex flex-col space-y-3 text-[14px] text-gray-400">
                    <p class="flex items-center space-x-2">
                        <span class="text-[#FF6A00]"><i data-lucide="mail" class="w-4 h-4"></i></span>
                        <a href="mailto:hello@kksbstudios.com" class="hover:text-white transition">hello@kksbstudios.com</a>
                    </p>
                    <p class="flex items-center space-x-2">
                        <span class="text-[#FF6A00]"><i data-lucide="phone" class="w-4 h-4"></i></span>
                        <a href="tel:+917876148313" class="hover:text-white transition">+91 78761 48313</a>
                    </p>
                    <p class="flex items-center space-x-2">
                        <span class="text-[#FF6A00]"><i data-lucide="map-pin" class="w-4 h-4"></i></span>
                        <span>Solan, Himachal Pradesh</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Meta -->
        <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px] border-t border-gray-800/80 mt-16 pt-8 flex flex-col sm:flex-row items-center justify-between text-[13px] text-gray-500 gap-4 relative z-10">
            <div>
                &copy; {{ date('Y') }} KKSB Studios. All Rights Reserved.
            </div>
            <div class="flex space-x-6">
                <a href="/privacy-policy" class="hover:text-gray-300 transition">Privacy Policy</a>
                <a href="/terms-conditions" class="hover:text-gray-300 transition">Terms & Conditions</a>
                <a href="/cookie-policy" class="hover:text-gray-300 transition">Cookie Policy</a>
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
                class="bg-[#FF6A00] hover:bg-[#E55F00] text-white p-3.5 rounded-full shadow-xl transition focus:outline-none"
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

    <!-- Initialize Lucide Icons -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>
</html>
