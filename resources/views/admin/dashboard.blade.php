<x-admin-layout>
    <x-slot name="title">Dashboard Overview</x-slot>

    <div class="space-y-8">
        
        <!-- Greeting Hero Banner -->
        <div class="relative text-white rounded-3xl p-6 sm:p-8 overflow-hidden shadow-lg border border-zinc-800" style="background-color: #18181b;">
            <!-- Decorative abstract gradient circles -->
            <div class="absolute right-0 top-0 w-96 h-96 bg-gradient-to-br from-indigo-500/10 to-emerald-500/10 rounded-full blur-xl -translate-y-16 translate-x-16"></div>
            <div class="absolute left-1/3 bottom-0 w-80 h-80 bg-violet-500/5 rounded-full blur-xl"></div>

            <div class="relative z-10 space-y-4">
                <div class="inline-flex items-center space-x-2 bg-white/10 px-3.5 py-1 rounded-full text-[11px] font-bold text-zinc-300 tracking-wide uppercase border border-white/5">
                    <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                    <span>System Active & Operational</span>
                </div>
                <div class="space-y-1">
                    <h1 class="text-2xl sm:text-4xl font-extrabold tracking-tight text-white">
                        Hello, <span class="text-emerald-400 font-black">{{ auth()->user()->name }}</span>!
                    </h1>
                    <p class="text-sm text-zinc-400 font-medium max-w-xl leading-relaxed">Welcome back to your workspace. Here is a live performance snapshot for KKSB Studios.</p>
                </div>
                <div class="pt-2 flex flex-wrap gap-4 text-xs text-zinc-300">
                    <div class="flex items-center space-x-1.5 bg-white/5 px-2.5 py-1 rounded-lg border border-white/5">
                        <i data-lucide="calendar" class="w-3.5 h-3.5 text-zinc-400"></i>
                        <span>{{ now()->format('l, M j, Y') }}</span>
                    </div>
                    <div class="flex items-center space-x-1.5 bg-white/5 px-2.5 py-1 rounded-lg border border-white/5">
                        <i data-lucide="clock" class="w-3.5 h-3.5 text-zinc-400"></i>
                        <span>Local Time: {{ now()->format('h:i A') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1: Join Us Applications -->
            <div class="bg-white dark:bg-zinc-900 p-6 rounded-3xl border border-gray-200/80 dark:border-zinc-800/80 shadow-sm transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 border-l-4 border-l-indigo-500 flex items-center space-x-4">
                <div class="p-3 bg-indigo-50 dark:bg-indigo-950/40 text-indigo-600 dark:text-indigo-400 rounded-2xl">
                    <i data-lucide="user-plus" class="w-6 h-6"></i>
                </div>
                <div class="space-y-1">
                    <div class="text-2xl font-extrabold text-gray-900 dark:text-white tracking-tight">{{ $stats['join_applications_total'] }}</div>
                    <div class="text-xs font-semibold text-gray-500 dark:text-zinc-400 uppercase tracking-wider">Join Us Applications</div>
                    @if($stats['join_applications_pending'] > 0)
                        <span class="inline-flex items-center text-[10px] bg-amber-50 dark:bg-amber-950/20 text-amber-700 dark:text-amber-400 font-extrabold px-2 py-0.5 rounded-full border border-amber-200 dark:border-amber-900/30 animate-pulse">
                            {{ $stats['join_applications_pending'] }} Pending
                        </span>
                    @endif
                </div>
            </div>

            <!-- Card 2: Career Applications -->
            <div class="bg-white dark:bg-zinc-900 p-6 rounded-3xl border border-gray-200/80 dark:border-zinc-800/80 shadow-sm transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 border-l-4 border-l-rose-500 flex items-center space-x-4">
                <div class="p-3 bg-rose-50 dark:bg-rose-950/40 text-rose-600 dark:text-rose-400 rounded-2xl">
                    <i data-lucide="contact" class="w-6 h-6"></i>
                </div>
                <div class="space-y-1">
                    <div class="text-2xl font-extrabold text-gray-900 dark:text-white tracking-tight">{{ $stats['applications_total'] }}</div>
                    <div class="text-xs font-semibold text-gray-500 dark:text-zinc-400 uppercase tracking-wider">Job Applications</div>
                    @if($stats['applications_pending'] > 0)
                        <span class="inline-flex items-center text-[10px] bg-amber-50 dark:bg-amber-950/20 text-amber-700 dark:text-amber-400 font-extrabold px-2 py-0.5 rounded-full border border-amber-200 dark:border-amber-900/30 animate-pulse">
                            {{ $stats['applications_pending'] }} Pending
                        </span>
                    @endif
                </div>
            </div>

            <!-- Card 3: Blogs & Content -->
            <div class="bg-white dark:bg-zinc-900 p-6 rounded-3xl border border-gray-200/80 dark:border-zinc-800/80 shadow-sm transition-all duration-300 hover:shadow-md hover:-translate-y-0.5 border-l-4 border-l-violet-500 flex items-center space-x-4 sm:col-span-2 lg:col-span-1">
                <div class="p-3 bg-violet-50 dark:bg-violet-950/40 text-violet-600 dark:text-violet-400 rounded-2xl">
                    <i data-lucide="file-text" class="w-6 h-6"></i>
                </div>
                <div class="space-y-1">
                    <div class="text-2xl font-extrabold text-gray-900 dark:text-white tracking-tight">{{ $stats['blogs_count'] }}</div>
                    <div class="text-xs font-semibold text-gray-500 dark:text-zinc-400 uppercase tracking-wider">Blogs Published</div>
                    <div class="text-[10px] text-zinc-400 font-medium">{{ $stats['services_count'] }} Services / {{ $stats['projects_count'] }} Projects</div>
                </div>
            </div>
        </div>

        <!-- Quick Access Control Center -->
        <div class="space-y-8 bg-white dark:bg-zinc-900/60 p-6 sm:p-8 rounded-3xl border border-gray-200/85 dark:border-zinc-800/80 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-150 dark:border-zinc-800/60 pb-4">
                <div class="space-y-1">
                    <h2 class="text-lg font-extrabold tracking-tight text-gray-900 dark:text-white flex items-center space-x-2">
                        <i data-lucide="layout-grid" class="w-5 h-5 text-gray-400"></i>
                        <span>Quick Access Control Hub</span>
                    </h2>
                    <p class="text-xs text-gray-500 dark:text-zinc-400">Manage, sort, and edit the frontend modules of KKSB Studios instantly.</p>
                </div>
            </div>

            <!-- CMS Content Modules Group -->
            <div class="space-y-4">
                <div class="flex items-center space-x-2 text-[10px] font-bold text-zinc-455 dark:text-zinc-500 uppercase tracking-widest px-1">
                    <i data-lucide="layers" class="w-3.5 h-3.5"></i>
                    <span>CMS Modules & Content</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">
                    <!-- Services Card -->
                    @can('manage services')
                    <a href="{{ route('admin.services.index') }}" class="group relative bg-gray-50/40 dark:bg-zinc-950/20 hover:bg-white dark:hover:bg-zinc-900 p-5 rounded-2xl border border-gray-250/60 dark:border-zinc-800/60 hover:border-emerald-500/30 dark:hover:border-emerald-500/20 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-emerald-500/5 dark:bg-emerald-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-4 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2.5 bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400 rounded-xl group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="briefcase" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-850">
                                    {{ $stats['services_count'] }}
                                </span>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-extrabold text-gray-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors duration-200 text-sm">Services</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 leading-relaxed">Manage service offerings and display orders.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-550 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Portfolio Projects Card -->
                    @can('manage portfolio')
                    <a href="{{ route('admin.projects.index') }}" class="group relative bg-gray-50/40 dark:bg-zinc-950/20 hover:bg-white dark:hover:bg-zinc-900 p-5 rounded-2xl border border-gray-250/60 dark:border-zinc-800/60 hover:border-indigo-500/30 dark:hover:border-indigo-500/20 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-indigo-500/5 dark:bg-indigo-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-4 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2.5 bg-indigo-50 dark:bg-indigo-950/40 text-indigo-600 dark:text-indigo-400 rounded-xl group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="folder-kanban" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-850">
                                    {{ $stats['projects_count'] }}
                                </span>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-extrabold text-gray-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-200 text-sm">Portfolio (Projects)</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 leading-relaxed">Manage portfolio items and showcases.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-550 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Blogs Card -->
                    @can('manage blogs')
                    <a href="{{ route('admin.blogs.index') }}" class="group relative bg-gray-50/40 dark:bg-zinc-950/20 hover:bg-white dark:hover:bg-zinc-900 p-5 rounded-2xl border border-gray-250/60 dark:border-zinc-800/60 hover:border-violet-500/30 dark:hover:border-violet-500/20 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-violet-500/5 dark:bg-violet-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-4 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2.5 bg-violet-50 dark:bg-violet-950/40 text-violet-600 dark:text-violet-400 rounded-xl group-hover:bg-violet-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="file-text" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-850">
                                    {{ $stats['blogs_count'] }}
                                </span>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-extrabold text-gray-900 dark:text-white group-hover:text-violet-600 dark:group-hover:text-violet-400 transition-colors duration-200 text-sm">Blogs</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 leading-relaxed">Publish news, writeups and articles.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-555 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Team & Authors Card -->
                    @can('manage blogs')
                    <a href="{{ route('admin.authors.index') }}" class="group relative bg-gray-50/40 dark:bg-zinc-950/20 hover:bg-white dark:hover:bg-zinc-900 p-5 rounded-2xl border border-gray-250/60 dark:border-zinc-800/60 hover:border-fuchsia-500/30 dark:hover:border-fuchsia-500/20 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-fuchsia-500/5 dark:bg-fuchsia-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-4 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2.5 bg-fuchsia-50 dark:bg-fuchsia-950/40 text-fuchsia-600 dark:text-fuchsia-400 rounded-xl group-hover:bg-fuchsia-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="users" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-850">
                                    {{ $stats['authors_count'] }}
                                </span>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-extrabold text-gray-900 dark:text-white group-hover:text-fuchsia-600 dark:group-hover:text-fuchsia-400 transition-colors duration-200 text-sm">Team & Authors</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 leading-relaxed">Manage agency members and writers.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-550 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- FAQs Card -->
                    @can('manage faqs')
                    <a href="{{ route('admin.faqs.index') }}" class="group relative bg-gray-50/40 dark:bg-zinc-950/20 hover:bg-white dark:hover:bg-zinc-900 p-5 rounded-2xl border border-gray-250/60 dark:border-zinc-800/60 hover:border-sky-500/30 dark:hover:border-sky-500/20 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-sky-500/5 dark:bg-sky-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-4 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2.5 bg-sky-50 dark:bg-sky-950/40 text-sky-600 dark:text-sky-400 rounded-xl group-hover:bg-sky-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="help-circle" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-850">
                                    {{ $stats['faqs_count'] }}
                                </span>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-extrabold text-gray-900 dark:text-white group-hover:text-sky-600 dark:group-hover:text-sky-400 transition-colors duration-200 text-sm">FAQs</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 leading-relaxed">Update dynamic FAQs sections.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-550 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Clients Showcase Card -->
                    @can('manage clients')
                    <a href="{{ route('admin.clients.index') }}" class="group relative bg-gray-50/40 dark:bg-zinc-950/20 hover:bg-white dark:hover:bg-zinc-900 p-5 rounded-2xl border border-gray-250/60 dark:border-zinc-800/60 hover:border-rose-500/30 dark:hover:border-rose-500/20 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-rose-500/5 dark:bg-rose-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-4 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2.5 bg-rose-50 dark:bg-rose-950/40 text-rose-600 dark:text-rose-400 rounded-xl group-hover:bg-rose-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="images" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-850">
                                    {{ $stats['clients_count'] }}
                                </span>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-extrabold text-gray-900 dark:text-white group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors duration-200 text-sm">Clients Showcase</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 leading-relaxed">Curate partner/client list & sorting.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-550 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- BTS Gallery Card -->
                    @can('manage gallery')
                    <a href="{{ route('admin.gallery.index') }}" class="group relative bg-gray-50/40 dark:bg-zinc-955/20 hover:bg-white dark:hover:bg-zinc-900 p-5 rounded-2xl border border-gray-250/60 dark:border-zinc-800/60 hover:border-teal-500/30 dark:hover:border-teal-500/20 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-teal-500/5 dark:bg-teal-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-4 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2.5 bg-teal-50 dark:bg-teal-950/40 text-teal-600 dark:text-teal-400 rounded-xl group-hover:bg-teal-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="image" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-850">
                                    {{ $stats['gallery_count'] }}
                                </span>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-extrabold text-gray-900 dark:text-white group-hover:text-teal-600 dark:group-hover:text-teal-400 transition-colors duration-200 text-sm">BTS Gallery</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 leading-relaxed">Update behind-the-scenes photography.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-550 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan
                </div>
            </div>

            <!-- Inbox & Leads Group -->
            <div class="space-y-4 pt-2">
                <div class="flex items-center space-x-2 text-[10px] font-bold text-zinc-455 dark:text-zinc-500 uppercase tracking-widest px-1">
                    <i data-lucide="inbox" class="w-3.5 h-3.5"></i>
                    <span>Inbox & Leads Management</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">
                    <!-- Careers & Jobs Card -->
                    @can('manage career jobs')
                    <a href="{{ route('admin.careers.index') }}" class="group relative bg-gray-50/40 dark:bg-zinc-950/20 hover:bg-white dark:hover:bg-zinc-900 p-5 rounded-2xl border border-gray-250/60 dark:border-zinc-800/60 hover:border-rose-500/30 dark:hover:border-rose-500/20 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-rose-500/5 dark:bg-rose-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-4 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2.5 bg-rose-50 dark:bg-rose-955/40 text-rose-600 dark:text-rose-400 rounded-xl group-hover:bg-rose-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="contact" class="w-5 h-5"></i>
                                </div>
                                <div class="flex items-center space-x-1">
                                    @if($stats['applications_pending'] > 0)
                                    <span class="text-[9px] font-extrabold bg-amber-50 dark:bg-amber-950/20 text-amber-700 dark:text-amber-400 px-1.5 py-0.5 rounded-full border border-amber-200 dark:border-amber-900/30 animate-pulse">
                                        {{ $stats['applications_pending'] }} Pending
                                    </span>
                                    @endif
                                    <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-850">
                                        {{ $stats['applications_total'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-extrabold text-gray-900 dark:text-white group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors duration-200 text-sm">Careers & Jobs</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 leading-relaxed">Manage career openings & applicants.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-550 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Contact Enquiries Card -->
                    @can('manage contact enquiries')
                    <a href="{{ route('admin.enquiries.index') }}" class="group relative bg-gray-50/40 dark:bg-zinc-950/20 hover:bg-white dark:hover:bg-zinc-900 p-5 rounded-2xl border border-gray-255/60 dark:border-zinc-800/60 hover:border-orange-500/30 dark:hover:border-orange-500/20 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-orange-500/5 dark:bg-orange-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-4 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2.5 bg-orange-50 dark:bg-orange-950/40 text-orange-600 dark:text-orange-400 rounded-xl group-hover:bg-orange-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="mail" class="w-5 h-5"></i>
                                </div>
                                <div class="flex items-center space-x-1">
                                    @if($stats['enquiries_unread'] > 0)
                                    <span class="text-[9px] font-extrabold bg-rose-500 text-white px-1.5 py-0.5 rounded-full animate-pulse">
                                        {{ $stats['enquiries_unread'] }} New
                                    </span>
                                    @endif
                                    <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-850">
                                        {{ $stats['enquiries_total'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-extrabold text-gray-900 dark:text-white group-hover:text-orange-600 dark:group-hover:text-orange-400 transition-colors duration-200 text-sm">Contact Enquiries</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 leading-relaxed">Respond to clients' inquiry emails.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-550 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Join Us Applications Card -->
                    @can('manage contact enquiries')
                    <a href="{{ route('admin.join-applications.index') }}" class="group relative bg-gray-50/40 dark:bg-zinc-950/20 hover:bg-white dark:hover:bg-zinc-900 p-5 rounded-2xl border border-gray-250/60 dark:border-zinc-800/60 hover:border-purple-500/30 dark:hover:border-purple-500/20 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-purple-500/5 dark:bg-purple-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-4 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2.5 bg-purple-50 dark:bg-purple-950/40 text-purple-600 dark:text-purple-400 rounded-xl group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="user-plus" class="w-5 h-5"></i>
                                </div>
                                <div class="flex items-center space-x-1">
                                    @if($stats['join_applications_pending'] > 0)
                                    <span class="text-[9px] font-extrabold bg-amber-50 dark:bg-amber-950/20 text-amber-700 dark:text-amber-400 px-1.5 py-0.5 rounded-full border border-amber-200 dark:border-amber-900/30 animate-pulse">
                                        {{ $stats['join_applications_pending'] }} Pending
                                    </span>
                                    @endif
                                    <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-850">
                                        {{ $stats['join_applications_total'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-extrabold text-gray-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors duration-200 text-sm">Join Us Applications</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 leading-relaxed">Review talent & influencer requests.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-550 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan
                </div>
            </div>

            <!-- System Settings Group -->
            <div class="space-y-4 pt-2">
                <div class="flex items-center space-x-2 text-[10px] font-bold text-zinc-455 dark:text-zinc-500 uppercase tracking-widest px-1">
                    <i data-lucide="sliders" class="w-3.5 h-3.5"></i>
                    <span>System Configuration</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">
                    <!-- CMS Settings Card -->
                    @can('manage settings')
                    <a href="{{ route('admin.settings.index') }}" class="group relative bg-gray-50/40 dark:bg-zinc-955/20 hover:bg-white dark:hover:bg-zinc-900 p-5 rounded-2xl border border-gray-250/60 dark:border-zinc-800/60 hover:border-zinc-500/30 dark:hover:border-zinc-500/20 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-zinc-500/5 dark:bg-zinc-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-4 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2.5 bg-zinc-100 dark:bg-zinc-800 text-zinc-650 dark:text-zinc-450 rounded-xl group-hover:bg-zinc-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="settings" class="w-5 h-5"></i>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-extrabold text-gray-900 dark:text-white group-hover:text-zinc-700 dark:group-hover:text-zinc-300 transition-colors duration-200 text-sm">CMS Settings</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 leading-relaxed">Update website details, SEO & socials.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-550 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Users & Roles Card -->
                    @can('manage users')
                    <a href="{{ route('admin.users.index') }}" class="group relative bg-gray-50/40 dark:bg-zinc-950/20 hover:bg-white dark:hover:bg-zinc-900 p-5 rounded-2xl border border-gray-250/60 dark:border-zinc-800/60 hover:border-cyan-500/30 dark:hover:border-cyan-500/20 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-cyan-500/5 dark:bg-cyan-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-4 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2.5 bg-cyan-50 dark:bg-cyan-950/40 text-cyan-600 dark:text-cyan-400 rounded-xl group-hover:bg-cyan-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="user-cog" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-850">
                                    {{ $stats['users_total'] }} Users
                                </span>
                            </div>
                            <div class="space-y-1">
                                <h3 class="font-extrabold text-gray-950 dark:text-white group-hover:text-cyan-600 dark:group-hover:text-cyan-400 transition-colors duration-200 text-sm">Users & Roles</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 leading-relaxed">Manage administration access & rules.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-550 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan
                </div>
            </div>
        </div>

        <!-- Main Dashboard Details Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Recent Enquiries -->
            <div class="bg-white dark:bg-zinc-900 rounded-3xl border border-gray-200/80 dark:border-zinc-800/80 shadow-sm overflow-hidden flex flex-col justify-between">
                <div>
                    <div class="p-6 border-b border-gray-150 dark:border-zinc-800/60 flex items-center justify-between bg-zinc-50/50 dark:bg-zinc-950/20">
                        <h2 class="text-sm font-extrabold text-gray-900 dark:text-white flex items-center space-x-2">
                            <i data-lucide="mail" class="w-4 h-4 text-gray-400"></i>
                            <span>Recent Enquiries</span>
                        </h2>
                        <a href="{{ route('admin.enquiries.index') }}" class="text-xs text-emerald-600 dark:text-emerald-400 font-bold hover:underline bg-white dark:bg-zinc-900 border border-gray-150 dark:border-zinc-850 px-3 py-1 rounded-full shadow-sm hover:shadow transition">View All</a>
                    </div>
                    <div class="p-6 space-y-4 divide-y-0">
                        @forelse($recentEnquiries as $enquiry)
                            <div class="p-4 bg-gray-50/30 dark:bg-zinc-950/20 hover:bg-gray-50/80 dark:hover:bg-zinc-900/50 border border-gray-150 dark:border-zinc-850 rounded-2xl transition duration-200 flex items-start justify-between space-x-4">
                                <div class="space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <span class="font-bold text-sm text-gray-900 dark:text-white">{{ $enquiry->name }}</span>
                                        @if($enquiry->status === 'unread')
                                            <span class="inline-block w-2 h-2 bg-rose-500 rounded-full animate-ping"></span>
                                        @endif
                                    </div>
                                    <p class="text-[11px] text-gray-550 dark:text-zinc-450 font-medium">
                                        {{ $enquiry->email }} • {{ $enquiry->phone ?? 'No Phone' }}
                                    </p>
                                    <p class="text-xs text-gray-650 dark:text-zinc-355 leading-relaxed line-clamp-2 pt-1 border-t border-gray-100 dark:border-zinc-850/50 mt-1">
                                        {{ $enquiry->message }}
                                    </p>
                                </div>
                                <span class="text-[10px] text-gray-400 dark:text-zinc-550 font-bold whitespace-nowrap bg-white dark:bg-zinc-900 px-2 py-0.5 rounded border border-gray-100 dark:border-zinc-800">{{ $enquiry->created_at->diffForHumans() }}</span>
                            </div>
                        @empty
                            <div class="py-12 text-center text-gray-500 dark:text-zinc-500">
                                <i data-lucide="mail-check" class="w-10 h-10 mx-auto text-gray-300 mb-2"></i>
                                <p class="text-xs font-semibold">All caught up! No recent inquiries.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Recent Job Applications -->
            <div class="bg-white dark:bg-zinc-900 rounded-3xl border border-gray-200/80 dark:border-zinc-800/80 shadow-sm overflow-hidden flex flex-col justify-between">
                <div>
                    <div class="p-6 border-b border-gray-150 dark:border-zinc-800/60 flex items-center justify-between bg-zinc-50/50 dark:bg-zinc-950/20">
                        <h2 class="text-sm font-extrabold text-gray-900 dark:text-white flex items-center space-x-2">
                            <i data-lucide="contact" class="w-4 h-4 text-gray-400"></i>
                            <span>Recent Job Applications</span>
                        </h2>
                        <a href="{{ route('admin.careers.index') }}" class="text-xs text-emerald-600 dark:text-emerald-400 font-bold hover:underline bg-white dark:bg-zinc-900 border border-gray-150 dark:border-zinc-850 px-3 py-1 rounded-full shadow-sm hover:shadow transition">View All</a>
                    </div>
                    <div class="p-6 space-y-4 divide-y-0">
                        @forelse($recentApplications as $application)
                            <div class="p-4 bg-gray-50/30 dark:bg-zinc-950/20 hover:bg-gray-50/80 dark:hover:bg-zinc-900/50 border border-gray-150 dark:border-zinc-850 rounded-2xl transition duration-200 flex items-start justify-between space-x-4">
                                <div class="space-y-2 w-full">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="font-bold text-sm text-gray-900 dark:text-white">{{ $application->name }}</span>
                                        <span class="text-[10px] bg-zinc-100 dark:bg-zinc-800 border border-gray-200/60 dark:border-zinc-800 px-2 py-0.5 rounded text-gray-650 dark:text-zinc-400 font-bold">
                                            {{ $application->job->title }}
                                        </span>
                                    </div>
                                    <p class="text-[11px] text-gray-550 dark:text-zinc-450 font-medium">
                                        {{ $application->email }} • {{ $application->phone ?? 'No Phone' }}
                                    </p>
                                    <div class="pt-2 border-t border-gray-100 dark:border-zinc-850/50 flex items-center justify-between">
                                        <a href="{{ asset($application->resume_path) }}" target="_blank" class="text-xs text-indigo-650 dark:text-indigo-400 font-bold flex items-center space-x-1 hover:underline">
                                            <i data-lucide="download" class="w-3.5 h-3.5"></i>
                                            <span>View Resume</span>
                                        </a>
                                        <span class="text-[10px] text-gray-400 dark:text-zinc-550 font-bold bg-white dark:bg-zinc-900 px-2 py-0.5 rounded border border-gray-100 dark:border-zinc-800">{{ $application->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="py-12 text-center text-gray-500 dark:text-zinc-500">
                                <i data-lucide="file-check-2" class="w-10 h-10 mx-auto text-gray-300 mb-2"></i>
                                <p class="text-xs font-semibold">No recent job applications found.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>

        <!-- Recent Activity Log Section -->
        <div class="bg-white dark:bg-zinc-900 rounded-3xl border border-gray-200/80 dark:border-zinc-800/80 shadow-sm p-6 space-y-4">
            <h2 class="text-md font-extrabold text-gray-900 dark:text-white flex items-center space-x-2">
                <i data-lucide="history" class="w-4.5 h-4.5 text-gray-500"></i>
                <span>Recent Admin Activity Logs</span>
            </h2>
            <div class="overflow-x-auto rounded-2xl border border-gray-150 dark:border-zinc-850">
                <table class="w-full text-left text-sm text-gray-750 dark:text-zinc-300">
                    <thead class="text-xs font-extrabold text-gray-500 dark:text-zinc-450 uppercase bg-gray-50 dark:bg-zinc-900 border-b border-gray-150 dark:border-zinc-850">
                        <tr>
                            <th class="px-5 py-4">User</th>
                            <th class="px-5 py-4">Action</th>
                            <th class="px-5 py-4">Details</th>
                            <th class="px-5 py-4">IP Address</th>
                            <th class="px-5 py-4">Timestamp</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-150 dark:divide-zinc-850">
                        @forelse($recentLogs as $log)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-zinc-850/10 transition-colors">
                                <td class="px-5 py-4 font-bold text-sm text-gray-900 dark:text-white">{{ $log->user->name ?? 'System' }}</td>
                                <td class="px-5 py-4">
                                    @if(str_contains(strtolower($log->action), 'create') || str_contains(strtolower($log->action), 'add') || str_contains(strtolower($log->action), 'store'))
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-emerald-50 dark:bg-emerald-950/30 text-emerald-600 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-900/20 shadow-sm">
                                            {{ $log->action }}
                                        </span>
                                    @elseif(str_contains(strtolower($log->action), 'delete') || str_contains(strtolower($log->action), 'remove') || str_contains(strtolower($log->action), 'destroy'))
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-rose-50 dark:bg-rose-950/30 text-rose-600 dark:text-rose-400 border border-rose-100 dark:border-rose-900/20 shadow-sm">
                                            {{ $log->action }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-extrabold uppercase tracking-wide bg-indigo-50 dark:bg-indigo-950/30 text-indigo-600 dark:text-indigo-400 border border-indigo-100 dark:border-indigo-900/20 shadow-sm">
                                            {{ $log->action }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-xs text-gray-500 dark:text-zinc-400 max-w-xs truncate">{{ $log->description ?? '-' }}</td>
                                <td class="px-5 py-4 text-xs font-mono text-gray-400 dark:text-zinc-500">{{ $log->ip_address }}</td>
                                <td class="px-5 py-4 text-xs text-gray-400 dark:text-zinc-500 font-medium">{{ $log->created_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-8 text-center text-gray-500 dark:text-zinc-500">
                                    <i data-lucide="shield-alert" class="w-8 h-8 mx-auto text-gray-300 mb-2"></i>
                                    <p class="text-xs font-semibold">No activity logs recorded yet.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-admin-layout>
