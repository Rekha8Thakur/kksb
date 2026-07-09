<x-admin-layout>
    <x-slot name="title">Manage Newsletter Subscribers</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Newsletter Subscriptions</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">View current newsletter subscriptions and export addresses.</p>
            </div>
            @if($subscribers->isNotEmpty())
                <a href="{{ route('admin.newsletter.export') }}" class="inline-flex items-center justify-center space-x-2 bg-zinc-900 hover:bg-zinc-800 text-white dark:bg-white dark:hover:bg-zinc-150 dark:text-zinc-900 text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
                    <i data-lucide="download" class="w-4 h-4"></i>
                    <span>Export CSV</span>
                </a>
            @endif
        </div>

        <!-- Table List -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm overflow-hidden max-w-2xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-700 dark:text-zinc-300">
                    <thead class="text-xs font-bold text-gray-500 uppercase bg-gray-50 dark:bg-zinc-800/50">
                        <tr>
                            <th class="px-6 py-4">Subscriber Email Address</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Date Subscribed</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-zinc-800">
                        @forelse($subscribers as $subscriber)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-zinc-850/30">
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $subscriber->email }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex px-2 py-0.5 text-[10px] font-bold rounded-full {{ $subscriber->status === 'active' ? 'bg-emerald-50 dark:bg-emerald-950/20 text-emerald-700 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-900/30' : 'bg-zinc-100 dark:bg-zinc-800 text-zinc-500' }}">
                                        {{ $subscriber->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-500 dark:text-zinc-400 text-xs">
                                    {{ $subscriber->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form method="POST" action="{{ route('admin.newsletter.destroy', $subscriber) }}" onsubmit="return confirm('Remove subscription for {{ $subscriber->email }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1 text-gray-500 hover:text-rose-600 transition" title="Remove Subscriber">
                                            <i data-lucide="user-x" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-gray-500 dark:text-zinc-550">
                                    <i data-lucide="send" class="w-12 h-12 mx-auto text-gray-300 dark:text-zinc-750 mb-3"></i>
                                    <p class="font-medium text-base">No subscribers found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($subscribers->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 dark:border-zinc-800">
                    {{ $subscribers->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
