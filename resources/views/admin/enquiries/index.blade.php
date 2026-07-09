<x-admin-layout>
    <x-slot name="title">Manage Enquiries</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Contact Enquiries</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Review business inquiries, project scopes, budget outlines, and messages.</p>
            </div>
            @if($enquiries->isNotEmpty())
                <a href="{{ route('admin.enquiries.export') }}" class="inline-flex items-center justify-center space-x-2 bg-zinc-900 hover:bg-zinc-800 text-white dark:bg-white dark:hover:bg-zinc-150 dark:text-zinc-900 text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
                    <i data-lucide="download" class="w-4 h-4"></i>
                    <span>Export CSV</span>
                </a>
            @endif
        </div>

        <!-- Enquiries List Table -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-700 dark:text-zinc-300">
                    <thead class="text-xs font-bold text-gray-500 uppercase bg-gray-50 dark:bg-zinc-800/50">
                        <tr>
                            <th class="px-6 py-4">Sender Name</th>
                            <th class="px-6 py-4">Contact Detail</th>
                            <th class="px-6 py-4">Company</th>
                            <th class="px-6 py-4">Service Interest</th>
                            <th class="px-6 py-4">Budget Range</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-zinc-800">
                        @forelse($enquiries as $enquiry)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-zinc-850/30 {{ $enquiry->status === 'unread' ? 'font-semibold' : '' }}">
                                <td class="px-6 py-4 text-gray-900 dark:text-white flex items-center space-x-2">
                                    <span>{{ $enquiry->name }}</span>
                                    @if($enquiry->status === 'unread')
                                        <span class="w-1.5 h-1.5 bg-rose-500 rounded-full"></span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-xs">
                                    <div>{{ $enquiry->email }}</div>
                                    <div class="text-gray-400">{{ $enquiry->phone ?? '-' }}</div>
                                </td>
                                <td class="px-6 py-4 text-gray-500 dark:text-zinc-400">{{ $enquiry->company ?? '-' }}</td>
                                <td class="px-6 py-4 text-zinc-800 dark:text-zinc-300">
                                    @if($enquiry->service_interest)
                                        <span class="bg-zinc-100 dark:bg-zinc-850 px-2 py-0.5 rounded text-xs">
                                            {{ $enquiry->service_interest }}
                                        </span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-gray-500 dark:text-zinc-400">{{ $enquiry->budget ?? '-' }}</td>
                                <td class="px-6 py-4 text-center">
                                    @if($enquiry->status === 'unread')
                                        <span class="text-[10px] bg-rose-50 dark:bg-rose-950/20 text-rose-600 dark:text-rose-400 px-2 py-0.5 rounded-full border border-rose-100 dark:border-rose-900/30 uppercase tracking-wider">Unread</span>
                                    @elseif($enquiry->status === 'replied')
                                        <span class="text-[10px] bg-emerald-50 dark:bg-emerald-950/20 text-emerald-600 dark:text-emerald-400 px-2 py-0.5 rounded-full border border-emerald-100 dark:border-emerald-900/30 uppercase tracking-wider">Replied</span>
                                    @else
                                        <span class="text-[10px] bg-zinc-100 dark:bg-zinc-800 text-zinc-500 px-2 py-0.5 rounded-full border border-zinc-200 dark:border-zinc-700 uppercase tracking-wider">Archived</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end space-x-3">
                                        <a href="{{ route('admin.enquiries.show', $enquiry) }}" class="p-1 text-gray-500 hover:text-emerald-600 transition" title="Read Message">
                                            <i data-lucide="eye" class="w-4 h-4"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.enquiries.destroy', $enquiry) }}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1 text-gray-500 hover:text-rose-600 transition">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-500 dark:text-zinc-550">
                                    <i data-lucide="mail" class="w-12 h-12 mx-auto text-gray-300 dark:text-zinc-750 mb-3"></i>
                                    <p class="font-medium text-base">No enquiries found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($enquiries->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 dark:border-zinc-800">
                    {{ $enquiries->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
