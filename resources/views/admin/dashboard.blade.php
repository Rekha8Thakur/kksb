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
