<x-admin-layout>
    <x-slot name="title">Join Us Applications</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Join Us Applications</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Review Influencer Network partners and Career / Internship applications.</p>
            </div>
        </div>

        <!-- Applications List Table -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-700 dark:text-zinc-300">
                    <thead class="text-xs font-bold text-gray-500 uppercase bg-gray-50 dark:bg-zinc-800/50">
                        <tr>
                            <th class="px-6 py-4">Applicant Name</th>
                            <th class="px-6 py-4">Type</th>
                            <th class="px-6 py-4">Contact Details</th>
                            <th class="px-6 py-4">Specialty / Role</th>
                            <th class="px-6 py-4">Social or Portfolio Link</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-zinc-800">
                        @forelse($applications as $app)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-zinc-850/30 {{ $app->status === 'pending' ? 'font-semibold' : '' }}">
                                <td class="px-6 py-4 text-gray-900 dark:text-white flex items-center space-x-2">
                                    <span>{{ $app->name }}</span>
                                    @if($app->status === 'pending')
                                        <span class="w-1.5 h-1.5 bg-amber-500 rounded-full"></span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    @if($app->type === 'influencer')
                                        <span class="text-[10px] bg-purple-50 dark:bg-purple-950/20 text-purple-600 dark:text-purple-400 px-2 py-0.5 rounded border border-purple-100 dark:border-purple-900/30 uppercase font-bold tracking-wider">Influencer</span>
                                    @else
                                        <span class="text-[10px] bg-blue-50 dark:bg-blue-950/20 text-blue-600 dark:text-blue-400 px-2 py-0.5 rounded border border-blue-100 dark:border-blue-900/30 uppercase font-bold tracking-wider">Career</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-xs">
                                    <div>{{ $app->email }}</div>
                                    <div class="text-gray-400">{{ $app->phone ?? '-' }}</div>
                                </td>
                                <td class="px-6 py-4 text-zinc-800 dark:text-zinc-300">
                                    @if($app->type === 'career')
                                        <span class="bg-zinc-100 dark:bg-zinc-850 px-2 py-0.5 rounded text-xs">
                                            {{ $app->position ?? '-' }}
                                        </span>
                                    @else
                                        <span class="text-gray-400 italic text-xs">Content Creator</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-xs">
                                    @if($app->type === 'influencer' && $app->social_link)
                                        <a href="{{ $app->social_link }}" target="_blank" class="text-amber-600 hover:underline flex items-center space-x-1">
                                            <i data-lucide="instagram" class="w-3.5 h-3.5"></i>
                                            <span class="truncate max-w-[180px]">{{ $app->social_link }}</span>
                                        </a>
                                    @elseif($app->type === 'career' && $app->resume_link)
                                        <a href="{{ $app->resume_link }}" target="_blank" class="text-blue-600 hover:underline flex items-center space-x-1">
                                            <i data-lucide="file-text" class="w-3.5 h-3.5"></i>
                                            <span class="truncate max-w-[180px]">{{ $app->resume_link }}</span>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($app->status === 'pending')
                                        <span class="text-[10px] bg-amber-50 dark:bg-amber-950/20 text-amber-600 dark:text-amber-400 px-2 py-0.5 rounded-full border border-amber-100 dark:border-amber-900/30 uppercase tracking-wider">Pending</span>
                                    @elseif($app->status === 'reviewed')
                                        <span class="text-[10px] bg-emerald-50 dark:bg-emerald-950/20 text-emerald-600 dark:text-emerald-400 px-2 py-0.5 rounded-full border border-emerald-100 dark:border-emerald-900/30 uppercase tracking-wider">Reviewed</span>
                                    @else
                                        <span class="text-[10px] bg-zinc-100 dark:bg-zinc-800 text-zinc-500 px-2 py-0.5 rounded-full border border-zinc-200 dark:border-zinc-700 uppercase tracking-wider">Archived</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end space-x-3">
                                        <a href="{{ route('admin.join-applications.show', $app) }}" class="p-1 text-gray-500 hover:text-[#111111] dark:hover:text-white transition" title="View Application">
                                            <i data-lucide="eye" class="w-4 h-4"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.join-applications.destroy', $app) }}" onsubmit="return confirm('Are you sure you want to delete this application?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1 text-gray-500 hover:text-rose-600 transition" title="Delete">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-500 dark:text-zinc-550">
                                    <i data-lucide="user-plus" class="w-12 h-12 mx-auto text-gray-300 dark:text-zinc-750 mb-3"></i>
                                    <p class="font-medium text-base">No join applications found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($applications->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 dark:border-zinc-800">
                    {{ $applications->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
