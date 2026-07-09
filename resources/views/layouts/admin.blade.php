<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('admin-dark') === 'true', sidebarOpen: false }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'KKSB Admin' }} - CMS Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind & Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- CKEditor CDN for CMS rich-text editing -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-zinc-950 dark:text-zinc-100 transition-colors duration-200 antialiased">
    <!-- Toast Notifications -->
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
         class="fixed top-5 right-5 z-50 max-w-sm w-full bg-white dark:bg-zinc-900 border-l-4 rounded-lg shadow-xl p-4 flex items-start space-x-3"
         :class="{ 'border-emerald-500': type === 'success', 'border-rose-500': type === 'error' }"
         style="display: none;">
        <div class="flex-shrink-0">
            <template x-if="type === 'success'">
                <span class="text-emerald-500"><i data-lucide="check-circle" class="w-6 h-6"></i></span>
            </template>
            <template x-if="type === 'error'">
                <span class="text-rose-500"><i data-lucide="alert-triangle" class="w-6 h-6"></i></span>
            </template>
        </div>
        <div class="flex-grow">
            <p class="text-sm font-semibold text-gray-800 dark:text-zinc-200" x-text="message"></p>
        </div>
        <button @click="show = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-zinc-300">
            <i data-lucide="x" class="w-4 h-4"></i>
        </button>
    </div>

    <!-- Main Wrapper -->
    <div class="min-h-screen flex">
        
        <!-- Sidebar Navigation -->
        <aside class="fixed inset-y-0 left-0 z-40 w-64 bg-zinc-900 text-zinc-300 border-r border-zinc-800 flex flex-col justify-between transform transition-transform duration-300 lg:translate-x-0 lg:static lg:flex-shrink-0"
               :class="sidebarOpen ? 'translate-x-0' : '-translate-x-0'">
            <div>
                <!-- Sidebar Header -->
                <div class="h-16 flex items-center justify-between px-6 border-b border-zinc-800">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                        <span class="text-xl font-bold tracking-tight text-white flex items-center">
                            KKSB<span class="text-emerald-500 ml-1">STUDIOS</span>
                        </span>
                        <span class="bg-zinc-800 text-[10px] text-zinc-400 font-semibold px-2 py-0.5 rounded">CMS</span>
                    </a>
                    <button @click="sidebarOpen = false" class="lg:hidden text-zinc-400 hover:text-white">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>
                </div>

                <!-- Navigation List -->
                <nav class="p-4 space-y-1 overflow-y-auto max-h-[calc(100vh-10rem)]">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-zinc-800 text-white' : 'hover:bg-zinc-800/50 hover:text-zinc-100' }}">
                        <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                        <span>Dashboard</span>
                    </a>

                    <div class="text-[10px] font-bold text-zinc-500 uppercase tracking-wider px-3 pt-4 pb-1">CMS MODULES</div>

                    @can('manage services')
                    <a href="{{ route('admin.services.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.services.*') ? 'bg-zinc-800 text-white' : 'hover:bg-zinc-800/50 hover:text-zinc-100' }}">
                        <i data-lucide="briefcase" class="w-4 h-4"></i>
                        <span>Services</span>
                    </a>
                    @endcan

                    @can('manage portfolio')
                    <a href="{{ route('admin.projects.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.projects.*') ? 'bg-zinc-800 text-white' : 'hover:bg-zinc-800/50 hover:text-zinc-100' }}">
                        <i data-lucide="folder-kanban" class="w-4 h-4"></i>
                        <span>Portfolio (Projects)</span>
                    </a>
                    @endcan

                    @can('manage blogs')
                    <a href="{{ route('admin.blogs.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.blogs.*') ? 'bg-zinc-800 text-white' : 'hover:bg-zinc-800/50 hover:text-zinc-100' }}">
                        <i data-lucide="file-text" class="w-4 h-4"></i>
                        <span>Blogs</span>
                    </a>
                    <a href="{{ route('admin.authors.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.authors.*') ? 'bg-zinc-800 text-white' : 'hover:bg-zinc-800/50 hover:text-zinc-100' }}">
                        <i data-lucide="users" class="w-4 h-4"></i>
                        <span>Authors</span>
                    </a>
                    @endcan

                    @can('manage testimonials')
                    <a href="{{ route('admin.testimonials.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.testimonials.*') ? 'bg-zinc-800 text-white' : 'hover:bg-zinc-800/50 hover:text-zinc-100' }}">
                        <i data-lucide="message-square-quote" class="w-4 h-4"></i>
                        <span>Testimonials</span>
                    </a>
                    @endcan

                    @can('manage faqs')
                    <a href="{{ route('admin.faqs.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.faqs.*') ? 'bg-zinc-800 text-white' : 'hover:bg-zinc-800/50 hover:text-zinc-100' }}">
                        <i data-lucide="help-circle" class="w-4 h-4"></i>
                        <span>FAQs</span>
                    </a>
                    @endcan

                    @can('manage clients')
                    <a href="{{ route('admin.clients.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.clients.*') ? 'bg-zinc-800 text-white' : 'hover:bg-zinc-800/50 hover:text-zinc-100' }}">
                        <i data-lucide="images" class="w-4 h-4"></i>
                        <span>Clients Showcase</span>
                    </a>
                    @endcan

                    @can('manage gallery')
                    <a href="{{ route('admin.gallery.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.gallery.*') ? 'bg-zinc-800 text-white' : 'hover:bg-zinc-800/50 hover:text-zinc-100' }}">
                        <i data-lucide="image" class="w-4 h-4"></i>
                        <span>BTS Gallery</span>
                    </a>
                    @endcan

                    <div class="text-[10px] font-bold text-zinc-500 uppercase tracking-wider px-3 pt-4 pb-1">INBOX & LEADS</div>

                    @can('manage career jobs')
                    <a href="{{ route('admin.careers.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.careers.*') ? 'bg-zinc-800 text-white' : 'hover:bg-zinc-800/50 hover:text-zinc-100' }}">
                        <i data-lucide="contact" class="w-4 h-4"></i>
                        <span>Careers & Jobs</span>
                    </a>
                    @endcan

                    @can('manage contact enquiries')
                    <a href="{{ route('admin.enquiries.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.enquiries.*') ? 'bg-zinc-800 text-white' : 'hover:bg-zinc-800/50 hover:text-zinc-100' }}">
                        <i data-lucide="mail" class="w-4 h-4"></i>
                        <span>Contact Enquiries</span>
                    </a>
                    @endcan

                    @can('manage newsletter')
                    <a href="{{ route('admin.newsletter.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.newsletter.*') ? 'bg-zinc-800 text-white' : 'hover:bg-zinc-800/50 hover:text-zinc-100' }}">
                        <i data-lucide="send" class="w-4 h-4"></i>
                        <span>Newsletter</span>
                    </a>
                    @endcan

                    <div class="text-[10px] font-bold text-zinc-500 uppercase tracking-wider px-3 pt-4 pb-1">SYSTEM</div>

                    @can('manage settings')
                    <a href="{{ route('admin.settings.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.settings.*') ? 'bg-zinc-800 text-white' : 'hover:bg-zinc-800/50 hover:text-zinc-100' }}">
                        <i data-lucide="settings" class="w-4 h-4"></i>
                        <span>CMS Settings</span>
                    </a>
                    @endcan

                    @can('manage users')
                    <a href="{{ route('admin.users.index') }}" class="flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-zinc-800 text-white' : 'hover:bg-zinc-800/50 hover:text-zinc-100' }}">
                        <i data-lucide="user-cog" class="w-4 h-4"></i>
                        <span>Users & Roles</span>
                    </a>
                    @endcan
                </nav>
            </div>

            <!-- Sidebar Footer / Logout -->
            <div class="p-4 border-t border-zinc-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 px-3 py-2.5 rounded-lg text-sm font-medium hover:bg-rose-950/30 hover:text-rose-400 text-zinc-400 transition-colors">
                        <i data-lucide="log-out" class="w-4 h-4"></i>
                        <span>Log Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Sidebar Backdrop for Mobile -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-black/50 lg:hidden" style="display: none;"></div>

        <!-- Main Content Area -->
        <div class="flex-grow flex flex-col min-w-0">
            <!-- Top Header -->
            <header class="h-16 bg-white dark:bg-zinc-900 border-b border-gray-200 dark:border-zinc-800 flex items-center justify-between px-6 z-20">
                <div class="flex items-center space-x-4">
                    <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-500 hover:text-gray-800 dark:text-zinc-400 dark:hover:text-white">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                    <div class="hidden sm:block text-sm font-medium text-gray-500 dark:text-zinc-400">
                        Welcome, <span class="text-gray-900 dark:text-white font-semibold">{{ auth()->user()->name }}</span>
                    </div>
                </div>

                <!-- Header Actions -->
                <div class="flex items-center space-x-4">
                    <!-- Live Site Link -->
                    <a href="/" target="_blank" class="flex items-center space-x-1.5 text-xs text-gray-500 hover:text-gray-800 dark:text-zinc-400 dark:hover:text-white border border-gray-300 dark:border-zinc-700 px-3 py-1.5 rounded-full transition">
                        <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                        <span>View Website</span>
                    </a>

                    <!-- Dark Mode Toggle -->
                    <button @click="darkMode = !darkMode; localStorage.setItem('admin-dark', darkMode)" 
                            class="p-2 text-gray-500 hover:text-gray-800 dark:text-zinc-400 dark:hover:text-white rounded-full hover:bg-gray-100 dark:hover:bg-zinc-800 transition">
                        <template x-if="!darkMode">
                            <i data-lucide="moon" class="w-5 h-5"></i>
                        </template>
                        <template x-if="darkMode">
                            <i data-lucide="sun" class="w-5 h-5"></i>
                        </template>
                    </button>

                    <!-- User Circle -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                            <div class="w-8 h-8 rounded-full bg-zinc-900 text-white flex items-center justify-center font-bold text-sm border border-gray-200 dark:border-zinc-700">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        </button>
                        <div x-show="open" @click.away="open = false" 
                             class="absolute right-0 mt-2 w-48 bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 rounded-lg shadow-xl py-1 text-sm text-gray-700 dark:text-zinc-300"
                             style="display: none;">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-800">Edit Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left block px-4 py-2 hover:bg-rose-50 dark:hover:bg-rose-950/20 text-rose-600">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Page Content -->
            <main class="flex-grow p-6 lg:p-8">
                {{ $slot }}
            </main>
        </div>

    </div>

    <!-- Initialize Lucide Icons -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
        });
    </script>
</body>
</html>
