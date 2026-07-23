<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>

    <div class="space-y-6">
        <!-- Page Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Dashboard Overview</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Real-time statistics and incoming enquiries for KKSB Studios.</p>
            </div>
            <div class="text-sm bg-emerald-50 dark:bg-emerald-950/20 text-emerald-700 dark:text-emerald-400 font-semibold px-4 py-2 rounded-lg border border-emerald-200 dark:border-emerald-900/30 flex items-center space-x-1.5">
                <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-ping"></span>
                <span>System Active</span>
            </div>
        </div>

        <!-- Quick Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1: Contact Enquiries -->
            <div class="bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm flex items-center space-x-4">
                <div class="p-3 bg-zinc-100 dark:bg-zinc-800 rounded-xl text-zinc-800 dark:text-white">
                    <i data-lucide="mail" class="w-6 h-6"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['enquiries_total'] }}</div>
                    <div class="text-xs font-medium text-gray-500 dark:text-zinc-400">Total Enquiries</div>
                    @if($stats['enquiries_unread'] > 0)
                        <span class="inline-block mt-1 text-[10px] bg-rose-50 dark:bg-rose-950/30 text-rose-600 dark:text-rose-400 font-semibold px-2 py-0.5 rounded-full border border-rose-100 dark:border-rose-900/30">
                            {{ $stats['enquiries_unread'] }} Unread
                        </span>
                    @endif
                </div>
            </div>

            <!-- Card 2: Career Applications -->
            <div class="bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm flex items-center space-x-4">
                <div class="p-3 bg-zinc-100 dark:bg-zinc-800 rounded-xl text-zinc-800 dark:text-white">
                    <i data-lucide="contact" class="w-6 h-6"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['applications_total'] }}</div>
                    <div class="text-xs font-medium text-gray-500 dark:text-zinc-400">Job Applications</div>
                    @if($stats['applications_pending'] > 0)
                        <span class="inline-block mt-1 text-[10px] bg-amber-50 dark:bg-amber-950/30 text-amber-600 dark:text-amber-400 font-semibold px-2 py-0.5 rounded-full border border-amber-100 dark:border-amber-900/30">
                            {{ $stats['applications_pending'] }} Pending
                        </span>
                    @endif
                </div>
            </div>

            <!-- Card 3: Newsletter Subscribers -->
            <div class="bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm flex items-center space-x-4">
                <div class="p-3 bg-zinc-100 dark:bg-zinc-800 rounded-xl text-zinc-800 dark:text-white">
                    <i data-lucide="send" class="w-6 h-6"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['subscribers_count'] }}</div>
                    <div class="text-xs font-medium text-gray-500 dark:text-zinc-400">Newsletter Subscribers</div>
                    <span class="inline-block mt-1 text-[10px] bg-emerald-50 dark:bg-emerald-950/30 text-emerald-600 dark:text-emerald-400 font-semibold px-2 py-0.5 rounded-full border border-emerald-100 dark:border-emerald-900/30">Active</span>
                </div>
            </div>

            <!-- Card 4: Blogs & Content -->
            <div class="bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm flex items-center space-x-4">
                <div class="p-3 bg-zinc-100 dark:bg-zinc-800 rounded-xl text-zinc-800 dark:text-white">
                    <i data-lucide="file-text" class="w-6 h-6"></i>
                </div>
                <div>
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['blogs_count'] }}</div>
                    <div class="text-xs font-medium text-gray-500 dark:text-zinc-400">Blogs Published</div>
                    <div class="text-[10px] text-zinc-400 mt-1">{{ $stats['services_count'] }} Services / {{ $stats['projects_count'] }} Projects</div>
                </div>
            </div>
        </div>

        <!-- Quick Access Control Center -->
        <div class="space-y-6 bg-white/40 dark:bg-zinc-900/20 backdrop-blur-md p-6 rounded-3xl border border-gray-200/60 dark:border-zinc-800/40 shadow-inner">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-200/80 dark:border-zinc-800/60 pb-4">
                <div>
                    <h2 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white flex items-center space-x-2">
                        <i data-lucide="layout-grid" class="w-5 h-5 text-gray-400"></i>
                        <span>Quick Access Control Hub</span>
                    </h2>
                    <p class="text-xs text-gray-500 dark:text-zinc-400 mt-0.5">Quickly manage, update, and review all active modules of KKSB Studios.</p>
                </div>
            </div>

            <!-- CMS Content Modules Group -->
            <div class="space-y-3">
                <div class="flex items-center space-x-2 text-[10px] font-bold text-zinc-400 dark:text-zinc-500 uppercase tracking-widest px-1">
                    <i data-lucide="layers" class="w-3.5 h-3.5"></i>
                    <span>CMS Modules & Content</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <!-- Services Card -->
                    @can('manage services')
                    <a href="{{ route('admin.services.index') }}" class="group relative bg-white dark:bg-zinc-900 p-4.5 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-emerald-500/50 dark:hover:border-emerald-500/30 flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-emerald-500/5 dark:bg-emerald-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-3.5 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2 bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400 rounded-xl group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="briefcase" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-800">
                                    {{ $stats['services_count'] }}
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors duration-200 text-sm">Services</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-2 leading-relaxed">Manage service offerings and display orders.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-2.5 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-500 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Portfolio Projects Card -->
                    @can('manage portfolio')
                    <a href="{{ route('admin.projects.index') }}" class="group relative bg-white dark:bg-zinc-900 p-4.5 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-indigo-500/50 dark:hover:border-indigo-500/30 flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-indigo-500/5 dark:bg-indigo-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-3.5 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2 bg-indigo-50 dark:bg-indigo-950/40 text-indigo-600 dark:text-indigo-400 rounded-xl group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="folder-kanban" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-800">
                                    {{ $stats['projects_count'] }}
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors duration-200 text-sm">Portfolio (Projects)</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-2 leading-relaxed">Manage portfolio items and showcases.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-2.5 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-500 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Blogs Card -->
                    @can('manage blogs')
                    <a href="{{ route('admin.blogs.index') }}" class="group relative bg-white dark:bg-zinc-900 p-4.5 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-violet-500/50 dark:hover:border-violet-500/30 flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-violet-500/5 dark:bg-violet-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-3.5 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2 bg-violet-50 dark:bg-violet-950/40 text-violet-600 dark:text-violet-400 rounded-xl group-hover:bg-violet-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="file-text" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-800">
                                    {{ $stats['blogs_count'] }}
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-violet-600 dark:group-hover:text-violet-400 transition-colors duration-200 text-sm">Blogs</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-2 leading-relaxed">Publish news, writeups and articles.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-2.5 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-500 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Team & Authors Card -->
                    @can('manage blogs')
                    <a href="{{ route('admin.authors.index') }}" class="group relative bg-white dark:bg-zinc-900 p-4.5 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-fuchsia-500/50 dark:hover:border-fuchsia-500/30 flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-fuchsia-500/5 dark:bg-fuchsia-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-3.5 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2 bg-fuchsia-50 dark:bg-fuchsia-950/40 text-fuchsia-600 dark:text-fuchsia-400 rounded-xl group-hover:bg-fuchsia-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="users" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-800">
                                    {{ $stats['authors_count'] }}
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-fuchsia-600 dark:group-hover:text-fuchsia-400 transition-colors duration-200 text-sm">Team & Authors</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-2 leading-relaxed">Manage agency members and writers.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-2.5 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-500 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Testimonials Card -->
                    @can('manage testimonials')
                    <a href="{{ route('admin.testimonials.index') }}" class="group relative bg-white dark:bg-zinc-900 p-4.5 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-amber-500/50 dark:hover:border-amber-500/30 flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-amber-500/5 dark:bg-amber-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-3.5 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2 bg-amber-50 dark:bg-amber-950/40 text-amber-600 dark:text-amber-400 rounded-xl group-hover:bg-amber-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="message-square-quote" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-800">
                                    {{ $stats['testimonials_count'] }}
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400 transition-colors duration-200 text-sm">Testimonials</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-2 leading-relaxed">Review and curate client testimonials.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-2.5 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-500 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- FAQs Card -->
                    @can('manage faqs')
                    <a href="{{ route('admin.faqs.index') }}" class="group relative bg-white dark:bg-zinc-900 p-4.5 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-sky-500/50 dark:hover:border-sky-500/30 flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-sky-500/5 dark:bg-sky-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-3.5 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2 bg-sky-50 dark:bg-sky-950/40 text-sky-600 dark:text-sky-400 rounded-xl group-hover:bg-sky-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="help-circle" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-800">
                                    {{ $stats['faqs_count'] }}
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-sky-600 dark:group-hover:text-sky-400 transition-colors duration-200 text-sm">FAQs</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-2 leading-relaxed">Update dynamic FAQs sections.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-2.5 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-500 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Clients Showcase Card -->
                    @can('manage clients')
                    <a href="{{ route('admin.clients.index') }}" class="group relative bg-white dark:bg-zinc-900 p-4.5 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-rose-500/50 dark:hover:border-rose-500/30 flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-rose-500/5 dark:bg-rose-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-3.5 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2 bg-rose-50 dark:bg-rose-950/40 text-rose-600 dark:text-rose-400 rounded-xl group-hover:bg-rose-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="images" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-800">
                                    {{ $stats['clients_count'] }}
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors duration-200 text-sm">Clients Showcase</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-2 leading-relaxed">Curate partner/client list & sorting.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-2.5 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-500 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- BTS Gallery Card -->
                    @can('manage gallery')
                    <a href="{{ route('admin.gallery.index') }}" class="group relative bg-white dark:bg-zinc-900 p-4.5 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-teal-500/50 dark:hover:border-teal-500/30 flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-teal-500/5 dark:bg-teal-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-3.5 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2 bg-teal-50 dark:bg-teal-950/40 text-teal-600 dark:text-teal-400 rounded-xl group-hover:bg-teal-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="image" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-800">
                                    {{ $stats['gallery_count'] }}
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-teal-600 dark:group-hover:text-teal-400 transition-colors duration-200 text-sm">BTS Gallery</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-2 leading-relaxed">Update behind-the-scenes photography.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-2.5 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-500 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan
                </div>
            </div>

            <!-- Inbox & Leads Group -->
            <div class="space-y-3 pt-2">
                <div class="flex items-center space-x-2 text-[10px] font-bold text-zinc-400 dark:text-zinc-500 uppercase tracking-widest px-1">
                    <i data-lucide="inbox" class="w-3.5 h-3.5"></i>
                    <span>Inbox & Leads Management</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <!-- Careers & Jobs Card -->
                    @can('manage career jobs')
                    <a href="{{ route('admin.careers.index') }}" class="group relative bg-white dark:bg-zinc-900 p-4.5 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-rose-500/50 dark:hover:border-rose-500/30 flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-rose-500/5 dark:bg-rose-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-3.5 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2 bg-rose-50 dark:bg-rose-950/40 text-rose-600 dark:text-rose-400 rounded-xl group-hover:bg-rose-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="contact" class="w-5 h-5"></i>
                                </div>
                                <div class="flex items-center space-x-1">
                                    @if($stats['applications_pending'] > 0)
                                    <span class="text-[9px] font-extrabold bg-amber-500 text-white px-1.5 py-0.5 rounded-full animate-pulse">
                                        {{ $stats['applications_pending'] }} Pending
                                    </span>
                                    @endif
                                    <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-800">
                                        {{ $stats['applications_total'] }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-rose-600 dark:group-hover:text-rose-400 transition-colors duration-200 text-sm">Careers & Jobs</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-2 leading-relaxed">Manage career openings & applicants.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-2.5 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-500 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Contact Enquiries Card -->
                    @can('manage contact enquiries')
                    <a href="{{ route('admin.enquiries.index') }}" class="group relative bg-white dark:bg-zinc-900 p-4.5 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-orange-500/50 dark:hover:border-orange-500/30 flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-orange-500/5 dark:bg-orange-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-3.5 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2 bg-orange-50 dark:bg-orange-950/40 text-orange-600 dark:text-orange-400 rounded-xl group-hover:bg-orange-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="mail" class="w-5 h-5"></i>
                                </div>
                                <div class="flex items-center space-x-1">
                                    @if($stats['enquiries_unread'] > 0)
                                    <span class="text-[9px] font-extrabold bg-rose-500 text-white px-1.5 py-0.5 rounded-full animate-pulse">
                                        {{ $stats['enquiries_unread'] }} New
                                    </span>
                                    @endif
                                    <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-800">
                                        {{ $stats['enquiries_total'] }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-orange-600 dark:group-hover:text-orange-400 transition-colors duration-200 text-sm">Contact Enquiries</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-2 leading-relaxed">Respond to clients' inquiry emails.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-2.5 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-500 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Join Us Applications Card -->
                    @can('manage contact enquiries')
                    <a href="{{ route('admin.join-applications.index') }}" class="group relative bg-white dark:bg-zinc-900 p-4.5 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-purple-500/50 dark:hover:border-purple-500/30 flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-purple-500/5 dark:bg-purple-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-3.5 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2 bg-purple-50 dark:bg-purple-950/40 text-purple-600 dark:text-purple-400 rounded-xl group-hover:bg-purple-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="user-plus" class="w-5 h-5"></i>
                                </div>
                                <div class="flex items-center space-x-1">
                                    @if($stats['join_applications_pending'] > 0)
                                    <span class="text-[9px] font-extrabold bg-amber-500 text-white px-1.5 py-0.5 rounded-full animate-pulse">
                                        {{ $stats['join_applications_pending'] }} Pending
                                    </span>
                                    @endif
                                    <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-800">
                                        {{ $stats['join_applications_total'] }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors duration-200 text-sm">Join Us Applications</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-2 leading-relaxed">Review talent & influencer requests.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-2.5 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-500 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Newsletter Card -->
                    @can('manage newsletter')
                    <a href="{{ route('admin.newsletter.index') }}" class="group relative bg-white dark:bg-zinc-900 p-4.5 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-blue-500/50 dark:hover:border-blue-500/30 flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-blue-500/5 dark:bg-blue-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-3.5 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2 bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 rounded-xl group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="send" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-800">
                                    {{ $stats['subscribers_count'] }} Active
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200 text-sm">Newsletter</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-2 leading-relaxed">Manage subscribers and mailing list.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-2.5 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-500 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan
                </div>
            </div>

            <!-- System Settings Group -->
            <div class="space-y-3 pt-2">
                <div class="flex items-center space-x-2 text-[10px] font-bold text-zinc-400 dark:text-zinc-500 uppercase tracking-widest px-1">
                    <i data-lucide="sliders" class="w-3.5 h-3.5"></i>
                    <span>System Configuration</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <!-- CMS Settings Card -->
                    @can('manage settings')
                    <a href="{{ route('admin.settings.index') }}" class="group relative bg-white dark:bg-zinc-900 p-4.5 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-zinc-500/50 dark:hover:border-zinc-500/30 flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-zinc-500/5 dark:bg-zinc-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-3.5 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2 bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 rounded-xl group-hover:bg-zinc-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="settings" class="w-5 h-5"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-zinc-700 dark:group-hover:text-zinc-300 transition-colors duration-200 text-sm">CMS Settings</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-2 leading-relaxed">Update website details, SEO & socials.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-2.5 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-500 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan

                    <!-- Users & Roles Card -->
                    @can('manage users')
                    <a href="{{ route('admin.users.index') }}" class="group relative bg-white dark:bg-zinc-900 p-4.5 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-cyan-500/50 dark:hover:border-cyan-500/30 flex flex-col justify-between overflow-hidden">
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-cyan-500/5 dark:bg-cyan-500/10 rounded-full blur-xl group-hover:scale-150 transition-all duration-500"></div>
                        <div class="space-y-3.5 relative z-10">
                            <div class="flex items-center justify-between">
                                <div class="p-2 bg-cyan-50 dark:bg-cyan-950/40 text-cyan-600 dark:text-cyan-400 rounded-xl group-hover:bg-cyan-600 group-hover:text-white transition-colors duration-300">
                                    <i data-lucide="user-cog" class="w-5 h-5"></i>
                                </div>
                                <span class="text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 px-2 py-0.5 rounded-full border border-gray-100 dark:border-zinc-800">
                                    {{ $stats['users_total'] }} Users
                                </span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white group-hover:text-cyan-600 dark:group-hover:text-cyan-400 transition-colors duration-200 text-sm">Users & Roles</h3>
                                <p class="text-[11px] text-gray-500 dark:text-zinc-400 mt-1 line-clamp-2 leading-relaxed">Manage administration access & rules.</p>
                            </div>
                        </div>
                        <div class="mt-4 pt-2.5 border-t border-gray-100 dark:border-zinc-800/60 flex items-center justify-between text-[11px] text-gray-400 dark:text-zinc-500 relative z-10">
                            <span class="group-hover:text-gray-700 dark:group-hover:text-zinc-300 transition-colors font-medium">Open Panel</span>
                            <i data-lucide="arrow-right" class="w-3 h-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </a>
                    @endcan
                </div>
            </div>
        </div>

        <!-- Main Dashboard Details Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Recent Enquiries -->
            <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-zinc-800 flex items-center justify-between">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white flex items-center space-x-2">
                        <i data-lucide="mail" class="w-5 h-5 text-gray-500"></i>
                        <span>Recent Enquiries</span>
                    </h2>
                    <a href="{{ route('admin.enquiries.index') }}" class="text-xs text-emerald-600 dark:text-emerald-400 font-semibold hover:underline">View All</a>
                </div>
                <div class="divide-y divide-gray-100 dark:divide-zinc-850">
                    @forelse($recentEnquiries as $enquiry)
                        <div class="p-6 flex items-start justify-between space-x-4">
                            <div class="space-y-1">
                                <div class="flex items-center space-x-2">
                                    <span class="font-semibold text-sm text-gray-900 dark:text-white">{{ $enquiry->name }}</span>
                                    @if($enquiry->status === 'unread')
                                        <span class="w-2 h-2 bg-rose-500 rounded-full"></span>
                                    @endif
                                </div>
                                <p class="text-xs text-gray-500 dark:text-zinc-400">
                                    {{ $enquiry->email }} • {{ $enquiry->phone ?? 'No Phone' }}
                                </p>
                                <p class="text-sm text-gray-700 dark:text-zinc-300 line-clamp-2 mt-2">
                                    {{ $enquiry->message }}
                                </p>
                            </div>
                            <span class="text-[10px] text-gray-400 font-medium whitespace-nowrap">{{ $enquiry->created_at->diffForHumans() }}</span>
                        </div>
                    @empty
                        <div class="p-8 text-center text-gray-500 dark:text-zinc-500">
                            No inquiries found.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Job Applications -->
            <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-zinc-800 flex items-center justify-between">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white flex items-center space-x-2">
                        <i data-lucide="contact" class="w-5 h-5 text-gray-500"></i>
                        <span>Recent Job Applications</span>
                    </h2>
                    <a href="{{ route('admin.careers.index') }}" class="text-xs text-emerald-600 dark:text-emerald-400 font-semibold hover:underline">View All</a>
                </div>
                <div class="divide-y divide-gray-100 dark:divide-zinc-850">
                    @forelse($recentApplications as $application)
                        <div class="p-6 flex items-start justify-between space-x-4">
                            <div class="space-y-1">
                                <div class="flex items-center space-x-2">
                                    <span class="font-semibold text-sm text-gray-900 dark:text-white">{{ $application->name }}</span>
                                    <span class="text-xs bg-zinc-100 dark:bg-zinc-800 px-2 py-0.5 rounded text-gray-600 dark:text-zinc-400 font-medium">
                                        {{ $application->job->title }}
                                    </span>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-zinc-400">
                                    {{ $application->email }} • {{ $application->phone ?? 'No Phone' }}
                                </p>
                                <div class="mt-2 flex items-center space-x-3">
                                    <a href="{{ asset($application->resume_path) }}" target="_blank" class="text-xs text-emerald-600 dark:text-emerald-400 font-semibold flex items-center space-x-1 hover:underline">
                                        <i data-lucide="download" class="w-3.5 h-3.5"></i>
                                        <span>View Resume</span>
                                    </a>
                                </div>
                            </div>
                            <span class="text-[10px] text-gray-400 font-medium whitespace-nowrap">{{ $application->created_at->diffForHumans() }}</span>
                        </div>
                    @empty
                        <div class="p-8 text-center text-gray-500 dark:text-zinc-500">
                            No job applications found.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- Recent Activity Log Section -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6">
            <h2 class="text-lg font-bold text-gray-900 dark:text-white flex items-center space-x-2 mb-4">
                <i data-lucide="history" class="w-5 h-5 text-gray-500"></i>
                <span>Recent Admin Activity Logs</span>
            </h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-700 dark:text-zinc-300">
                    <thead class="text-xs font-bold text-gray-500 uppercase bg-gray-50 dark:bg-zinc-800/50">
                        <tr>
                            <th class="px-4 py-3">User</th>
                            <th class="px-4 py-3">Action</th>
                            <th class="px-4 py-3">Details</th>
                            <th class="px-4 py-3">IP Address</th>
                            <th class="px-4 py-3">Timestamp</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-zinc-800">
                        @forelse($recentLogs as $log)
                            <tr>
                                <td class="px-4 py-3.5 font-medium text-gray-900 dark:text-white">{{ $log->user->name ?? 'System' }}</td>
                                <td class="px-4 py-3.5 font-semibold text-emerald-600 dark:text-emerald-400">{{ $log->action }}</td>
                                <td class="px-4 py-3.5 text-xs text-gray-500 dark:text-zinc-400">{{ $log->description ?? '-' }}</td>
                                <td class="px-4 py-3.5 text-xs font-mono">{{ $log->ip_address }}</td>
                                <td class="px-4 py-3.5 text-xs text-gray-400">{{ $log->created_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-8 text-center text-gray-500 dark:text-zinc-500">No activity logged yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-admin-layout>
