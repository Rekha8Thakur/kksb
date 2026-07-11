<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', App\Models\Setting::get('site_title', 'KKSB Studios | Creative & Digital Solutions'))</title>
    
    <meta name="description" content="@yield('meta_description', App\Models\Setting::get('site_meta_description', 'Himachal\'s premier digital creative agency.'))">
    <meta name="keywords" content="@yield('meta_keywords', App\Models\Setting::get('site_meta_keywords', 'creative agency, video diary, digital solutions'))">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', App\Models\Setting::get('site_title', 'KKSB Studios'))">
    <meta property="og:description" content="@yield('meta_description', App\Models\Setting::get('site_meta_description', 'Creative agency in Himachal.'))">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', App\Models\Setting::get('site_title', 'KKSB Studios'))">
    <meta property="twitter:description" content="@yield('meta_description', App\Models\Setting::get('site_meta_description', 'Creative agency in Himachal.'))">
    <meta property="twitter:image" content="{{ asset('images/logo.png') }}">

    <!-- Brand Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <!-- Fonts declaration (Preconnect / Google fonts) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Anime.js for micro-interactions -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <!-- Lucide Icons library -->
    <script defer src="https://unpkg.com/lucide@latest"></script>

    <!-- Vite Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Extra page header insertion points -->
    @yield('head')

    <!-- Preloader and global animations style overrides -->
    <style>
        [x-cloak] { display: none !important; }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="{{ request()->routeIs('home') ? 'bg-zinc-950' : 'bg-white' }} antialiased {{ request()->routeIs('home') ? 'selection:bg-emerald-500' : 'selection:bg-zinc-800' }} selection:text-white" x-data="{ mobileMenuOpen: false }">

    <!-- Success / Error Toast notifications -->
    <div x-data="{ 
            show: false, 
            message: '', 
            type: 'success',
            init() {
                @if(session('success'))
                    this.message = '{{ session('success') }}';
                    this.type = 'success';
                    this.show = true;
                    setTimeout(() => this.show = false, 5000);
                @endif
                @if(session('error'))
                    this.message = '{{ session('error') }}';
                    this.type = 'error';
                    this.show = true;
                    setTimeout(() => this.show = false, 5000);
                @endif
            }
         }" 
         x-show="show" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-2 sm:translate-y-0 sm:translate-x-2"
         x-transition:enter-end="opacity-100 translate-y-0 sm:translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         class="fixed bottom-5 right-5 z-50 flex items-center space-x-3 bg-white border border-gray-100 px-5 py-4 rounded-2xl shadow-xl max-w-sm" 
         style="display: none;">
        <span :class="type === 'success' ? '{{ request()->routeIs('home') ? 'text-emerald-500' : 'text-zinc-800' }}' : 'text-rose-500'" class="flex-shrink-0">
            <template x-if="type === 'success'">
                <i data-lucide="check-circle-2" class="w-5 h-5"></i>
            </template>
            <template x-if="type === 'error'">
                <i data-lucide="alert-circle" class="w-5 h-5"></i>
            </template>
        </span>
        <div class="flex-grow">
            <p class="text-sm font-semibold text-[#111111]" x-text="message"></p>
        </div>
        <button @click="show = false" class="text-gray-400 hover:text-gray-600">
            <i data-lucide="x" class="w-4 h-4"></i>
        </button>
    </div>

    <!-- Navigation Header -->
    <header class="{{ request()->routeIs('home') ? 'absolute top-0 left-0 right-0 z-50 bg-transparent border-b border-transparent opacity-0' : 'sticky top-0 z-40 bg-white/90 border-b border-gray-100 backdrop-blur-md' }} transition-all duration-300 header-animate !overflow-visible">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('images/logo.png') }}" class="h-14 md:h-16 w-auto object-contain py-0.5 {{ request()->routeIs('home') ? 'filter invert' : '' }}" alt="KKSB Studios">
            </a>

            <!-- Desktop Links -->
            <nav class="hidden md:flex items-center space-x-8 text-sm font-semibold">
                <a href="/" class="{{ request()->routeIs('home') ? 'text-white hover:text-emerald-400' : 'text-[#111111] hover:text-zinc-500' }} transition">Home</a>
                <a href="/about" class="{{ request()->routeIs('home') ? 'text-white/70 hover:text-emerald-400' : 'text-gray-600 hover:text-zinc-900' }} transition">About Us</a>
                <a href="/portfolio" class="{{ request()->routeIs('home') ? 'text-white/70 hover:text-emerald-400' : 'text-gray-600 hover:text-zinc-900' }} transition">Work</a>
                <a href="/blog" class="{{ request()->routeIs('home') ? 'text-white/70 hover:text-emerald-400' : 'text-gray-600 hover:text-zinc-900' }} transition">Blog</a>
                <a href="/careers" class="{{ request()->routeIs('home') ? 'text-white/70 hover:text-emerald-400' : 'text-gray-600 hover:text-zinc-900' }} transition">Careers</a>

                <!-- Mega Menu Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @mouseenter="open = true" @click.away="open = false" 
                            class="{{ request()->routeIs('home') ? 'text-white/70 hover:text-emerald-400' : 'text-gray-600 hover:text-zinc-900' }} transition flex items-center space-x-1 focus:outline-none">
                        <span>Services</span>
                        <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''"></i>
                    </button>
                    <!-- Dropdown box -->
                    <div x-show="open" @mouseleave="open = false" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="!absolute left-0 top-full mt-3 w-64 {{ request()->routeIs('home') ? 'liquid-glass border border-white/10' : 'bg-white border border-gray-100' }} rounded-2xl shadow-xl py-3 z-50 grid grid-cols-1"
                         style="display: none;">
                        @foreach(App\Models\Service::where('is_active', true)->orderBy('order')->get() as $navService)
                            <a href="/services/{{ $navService->slug }}" class="px-4 py-2.5 {{ request()->routeIs('home') ? 'hover:bg-white/5' : 'hover:bg-[#F8F8F8]' }} flex items-center space-x-3 group transition">
                                <span class="{{ request()->routeIs('home') ? 'text-white/60 group-hover:text-emerald-400' : 'text-gray-400 group-hover:text-zinc-900' }}"><i data-lucide="{{ $navService->icon ?? 'chevron-right' }}" class="w-4 h-4"></i></span>
                                <span class="text-xs font-bold {{ request()->routeIs('home') ? 'text-white/90 group-hover:text-white' : 'text-gray-800 group-hover:text-[#111111]' }}">{{ $navService->title }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="/contact" class="{{ request()->routeIs('home') ? 'text-white/70 hover:text-emerald-400' : 'text-gray-600 hover:text-zinc-900' }} transition">Contact</a>
            </nav>

            <!-- CTA Let's talk -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="/contact" class="inline-flex items-center space-x-2 {{ request()->routeIs('home') ? 'bg-white hover:bg-zinc-200 text-black' : 'bg-[#111111] hover:bg-zinc-800 text-white' }} text-xs font-bold px-5 py-3 rounded-full transition shadow-sm">
                    <span>Let's Talk</span>
                    <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
                </a>
            </div>

            <!-- Hamburger Button for Mobile -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" 
                    class="md:hidden w-10 h-10 rounded-full flex items-center justify-center transition focus:outline-none {{ request()->routeIs('home') ? 'bg-white/10 text-white hover:bg-white/20' : 'bg-gray-100 text-[#111111] hover:bg-gray-200' }}">
                <i data-lucide="menu" class="w-5 h-5" x-show="!mobileMenuOpen"></i>
                <i data-lucide="x" class="w-5 h-5" x-show="mobileMenuOpen" style="display: none;"></i>
            </button>
        </div>

        <!-- Mobile Nav Menu -->
        <div x-show="mobileMenuOpen" x-transition class="md:hidden {{ request()->routeIs('home') ? 'bg-zinc-950/95 border-t border-white/10' : 'bg-white border-t border-gray-100' }}" style="display: none;">
            <nav class="flex flex-col p-6 space-y-4 text-base font-semibold">
                <a href="/" @click="mobileMenuOpen = false" class="{{ request()->routeIs('home') ? 'text-white hover:text-emerald-400' : 'text-gray-800 hover:text-zinc-900' }}">Home</a>
                <a href="/about" @click="mobileMenuOpen = false" class="{{ request()->routeIs('home') ? 'text-white/90 hover:text-emerald-400' : 'text-gray-800 hover:text-zinc-900' }}">About Us</a>
                <a href="/portfolio" @click="mobileMenuOpen = false" class="{{ request()->routeIs('home') ? 'text-white/90 hover:text-emerald-400' : 'text-gray-800 hover:text-zinc-900' }}">Work</a>
                <a href="/blog" @click="mobileMenuOpen = false" class="{{ request()->routeIs('home') ? 'text-white/90 hover:text-emerald-400' : 'text-gray-800 hover:text-zinc-900' }}">Blog</a>
                <a href="/careers" @click="mobileMenuOpen = false" class="{{ request()->routeIs('home') ? 'text-white/90 hover:text-emerald-400' : 'text-gray-800 hover:text-zinc-900' }}">Careers</a>
                <div class="space-y-2">
                    <span class="text-xs {{ request()->routeIs('home') ? 'text-white/50' : 'text-gray-400' }} font-bold uppercase tracking-wider">Services</span>
                    <div class="grid grid-cols-1 pl-4 gap-2 border-l {{ request()->routeIs('home') ? 'border-white/10' : 'border-gray-100' }}">
                        @foreach(App\Models\Service::where('is_active', true)->orderBy('order')->get() as $navService)
                            <a href="/services/{{ $navService->slug }}" @click="mobileMenuOpen = false" class="text-sm {{ request()->routeIs('home') ? 'text-white/70 hover:text-emerald-400' : 'text-gray-600 hover:text-zinc-900' }} py-1 flex items-center space-x-2">
                                <span>{{ $navService->title }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                <a href="/contact" @click="mobileMenuOpen = false" class="{{ request()->routeIs('home') ? 'text-white/90 hover:text-emerald-400' : 'text-gray-800 hover:text-zinc-900' }}">Contact</a>
                <a href="/contact" @click="mobileMenuOpen = false" class="inline-flex items-center justify-center space-x-2 {{ request()->routeIs('home') ? 'bg-white hover:bg-zinc-200 text-black' : 'bg-[#111111] hover:bg-zinc-800 text-white' }} text-xs font-bold py-3 rounded-full transition w-full">
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
    <footer class="{{ request()->routeIs('home') ? 'bg-zinc-950 border-t border-white/10 text-white' : 'bg-[#F8F8F8] border-t border-gray-200/50 text-[#111111]' }} pt-16 pb-12">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
            <!-- Col 1: About Brand -->
            <div class="space-y-4">
                <a href="/" class="inline-block">
                    <img src="{{ asset('images/logo.png') }}" class="h-14 md:h-16 w-auto object-contain -ml-2 {{ request()->routeIs('home') ? 'filter invert' : '' }}" alt="KKSB Studios">
                </a>
                <p class="text-xs {{ request()->routeIs('home') ? 'text-white/70' : 'text-gray-500' }} leading-relaxed max-w-xs font-barlow">
                    {{ App\Models\Setting::get('site_name', 'KKSB Studios') }} is Himachal's premier digital creative agency, delivering video diaries, social retainers, SEO strategy, and custom web designs that elevate local and regional brands.
                </p>
                <div class="flex space-x-4 pt-2 {{ request()->routeIs('home') ? 'text-white/80' : 'text-[#111111]' }}">
                    <a href="{{ App\Models\Setting::get('social_instagram', 'https://instagram.com/kksbstudios') }}" target="_blank" class="{{ request()->routeIs('home') ? 'hover:text-emerald-400' : 'hover:text-zinc-900' }} transition"><i data-lucide="instagram" class="w-5 h-5"></i></a>
                    <a href="{{ App\Models\Setting::get('social_youtube', '#') }}" target="_blank" class="{{ request()->routeIs('home') ? 'hover:text-emerald-400' : 'hover:text-zinc-900' }} transition"><i data-lucide="youtube" class="w-5 h-5"></i></a>
                    <a href="{{ App\Models\Setting::get('social_linkedin', '#') }}" target="_blank" class="{{ request()->routeIs('home') ? 'hover:text-emerald-400' : 'hover:text-zinc-900' }} transition"><i data-lucide="linkedin" class="w-5 h-5"></i></a>
                    <a href="{{ App\Models\Setting::get('social_facebook', '#') }}" target="_blank" class="{{ request()->routeIs('home') ? 'hover:text-emerald-400' : 'hover:text-zinc-900' }} transition"><i data-lucide="facebook" class="w-5 h-5"></i></a>
                </div>
            </div>

            <!-- Col 2: Services Quick Links -->
            <div class="space-y-4">
                <h4 class="font-bold uppercase tracking-wider text-xs {{ request()->routeIs('home') ? 'text-white' : 'text-[#111111]' }} font-barlow">Our Services</h4>
                <nav class="flex flex-col space-y-2 text-xs {{ request()->routeIs('home') ? 'text-white/70' : 'text-gray-500' }} font-medium font-barlow font-light">
                    @foreach(App\Models\Service::where('is_active', true)->orderBy('order')->take(5)->get() as $footService)
                        <a href="/services/{{ $footService->slug }}" class="{{ request()->routeIs('home') ? 'hover:text-emerald-400' : 'hover:text-zinc-900' }} transition">{{ $footService->title }}</a>
                    @endforeach
                </nav>
            </div>

            <!-- Col 3: Company Sitemap -->
            <div class="space-y-4">
                <h4 class="font-bold uppercase tracking-wider text-xs {{ request()->routeIs('home') ? 'text-white' : 'text-[#111111]' }} font-barlow">Sitemap</h4>
                <nav class="flex flex-col space-y-2 text-xs {{ request()->routeIs('home') ? 'text-white/70' : 'text-gray-500' }} font-medium font-barlow font-light">
                    <a href="/" class="{{ request()->routeIs('home') ? 'hover:text-emerald-400' : 'hover:text-zinc-900' }} transition">Home</a>
                    <a href="/about" class="{{ request()->routeIs('home') ? 'hover:text-emerald-400' : 'hover:text-zinc-900' }} transition">About Us</a>
                    <a href="/portfolio" class="{{ request()->routeIs('home') ? 'hover:text-emerald-400' : 'hover:text-zinc-900' }} transition">Featured Work</a>
                    <a href="/blog" class="{{ request()->routeIs('home') ? 'hover:text-emerald-400' : 'hover:text-zinc-900' }} transition">Blog Articles</a>
                    <a href="/careers" class="{{ request()->routeIs('home') ? 'hover:text-emerald-400' : 'hover:text-zinc-900' }} transition">Careers</a>
                    <a href="/contact" class="{{ request()->routeIs('home') ? 'hover:text-emerald-400' : 'hover:text-zinc-900' }} transition">Contact Us</a>
                </nav>
            </div>

            <!-- Col 4: Newsletter Subscriber Form -->
            <div class="space-y-4 font-barlow">
                <h4 class="font-bold uppercase tracking-wider text-xs {{ request()->routeIs('home') ? 'text-white' : 'text-[#111111]' }}">Subscribe to Newsletter</h4>
                <p class="text-xs {{ request()->routeIs('home') ? 'text-white/70' : 'text-gray-500' }} leading-relaxed font-light">Stay updated with marketing strategies and reels tips delivered straight to your inbox.</p>
                
                <form method="POST" action="/newsletter/subscribe" class="flex flex-col sm:flex-row gap-2">
                    @csrf
                    <input type="email" name="email" required placeholder="Enter your email" 
                           class="flex-grow {{ request()->routeIs('home') ? 'bg-white/5 border-white/10 text-white placeholder-white/30' : 'bg-white border-gray-300 text-[#111111]' }} border rounded-xl px-4 py-2.5 text-xs focus:ring-emerald-500 focus:border-emerald-500">
                    <button type="submit" class="{{ request()->routeIs('home') ? 'bg-white text-black hover:bg-zinc-200' : 'bg-[#111111] text-white hover:bg-zinc-800' }} text-xs font-semibold px-4 py-2.5 rounded-xl transition">
                        Join
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer Bottom Meta -->
        <div class="max-w-7xl mx-auto px-6 border-t {{ request()->routeIs('home') ? 'border-white/10' : 'border-gray-200/50' }} mt-12 pt-8 flex flex-col sm:flex-row items-center justify-between text-[11px] {{ request()->routeIs('home') ? 'text-white/40' : 'text-gray-400' }} font-semibold gap-4 font-barlow">
            <div>
                &copy; {{ date('Y') }} {{ App\Models\Setting::get('site_name', 'KKSB Studios').'.' }} All rights reserved.
            </div>
            <div class="flex space-x-6">
                <a href="/privacy-policy" class="{{ request()->routeIs('home') ? 'hover:text-white font-light' : 'hover:text-[#111111]' }} transition">Privacy Policy</a>
                <a href="/terms-conditions" class="{{ request()->routeIs('home') ? 'hover:text-white font-light' : 'hover:text-[#111111]' }} transition">Terms & Conditions</a>
                <a href="/cookie-policy" class="{{ request()->routeIs('home') ? 'hover:text-white font-light' : 'hover:text-[#111111]' }} transition">Cookie Policy</a>
                <a href="/sitemap.xml" target="_blank" class="{{ request()->routeIs('home') ? 'hover:text-white font-light' : 'hover:text-[#111111]' }} transition">Sitemap XML</a>
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
                class="bg-[#111111] hover:bg-zinc-800 text-white p-3 rounded-full shadow-lg transition focus:outline-none"
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
{{-- KKSB Studios Layout Updates --}}
