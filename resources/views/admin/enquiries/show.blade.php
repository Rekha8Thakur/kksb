<x-admin-layout>
    <x-slot name="title">Read Enquiry</x-slot>

    <div class="max-w-2xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-zinc-400">
            <a href="{{ route('admin.enquiries.index') }}" class="hover:underline">Enquiries</a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white font-semibold">Message Detail</span>
        </div>

        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Message details</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Received on: {{ $enquiry->created_at->format('M d, Y H:i:s') }}</p>
        </div>

        <!-- Details Card -->
        <div class="bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 rounded-2xl shadow-sm p-6 lg:p-8 space-y-6">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Sender Info -->
                <div class="space-y-1">
                    <div class="text-xs text-gray-400 font-semibold uppercase tracking-wider">From</div>
                    <div class="font-bold text-gray-900 dark:text-white text-base">{{ $enquiry->name }}</div>
                    <div class="text-sm text-gray-600 dark:text-zinc-350">{{ $enquiry->email }}</div>
                    <div class="text-sm text-gray-600 dark:text-zinc-350">{{ $enquiry->phone ?? 'No phone provided' }}</div>
                </div>

                <!-- Project Context -->
                <div class="space-y-1">
                    <div class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Project Context</div>
                    @if($enquiry->company)
                        <div class="text-sm text-gray-700 dark:text-zinc-300">Company: <span class="font-semibold">{{ $enquiry->company }}</span></div>
                    @endif
                    @if($enquiry->service_interest)
                        <div class="text-sm text-gray-700 dark:text-zinc-300">Interest: <span class="font-semibold">{{ $enquiry->service_interest }}</span></div>
                    @endif
                    @if($enquiry->budget)
                        <div class="text-sm text-gray-700 dark:text-zinc-300">Budget Range: <span class="font-semibold text-emerald-600 dark:text-emerald-400">{{ $enquiry->budget }}</span></div>
                    @endif
                </div>
            </div>

            <!-- Message Content -->
            <div class="border-t border-gray-100 dark:border-zinc-850 pt-6 space-y-2">
                <div class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Message Text</div>
                <div class="bg-gray-50 dark:bg-zinc-850 p-4 rounded-xl text-gray-800 dark:text-zinc-200 text-sm whitespace-pre-line leading-relaxed">
                    {{ $enquiry->message }}
                </div>
            </div>

            <!-- Actions row -->
            <div class="border-t border-gray-100 dark:border-zinc-850 pt-6 flex items-center justify-between">
                <!-- Change status -->
                <form action="{{ route('admin.enquiries.status', $enquiry) }}" method="POST" class="flex items-center space-x-2">
                    @csrf
                    <label for="status" class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Mark as</label>
                    <select name="status" onchange="this.form.submit()" 
                            class="text-xs bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-lg px-2.5 py-1.5 focus:ring-emerald-500">
                        <option value="unread" {{ $enquiry->status === 'unread' ? 'selected' : '' }}>Unread</option>
                        <option value="replied" {{ $enquiry->status === 'replied' ? 'selected' : '' }}>Replied</option>
                        <option value="archived" {{ $enquiry->status === 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </form>

                <div class="flex space-x-2">
                    <a href="mailto:{{ $enquiry->email }}?subject=Reply to inquiry from {{ urlencode(config('app.name')) }}" class="inline-flex items-center space-x-1 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold px-4 py-2 rounded-lg transition shadow-sm">
                        <i data-lucide="reply" class="w-3.5 h-3.5"></i>
                        <span>Reply Email</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
