<x-admin-layout>
    <x-slot name="title">Manage Brand Videos</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Brand Campaign Videos</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Add, edit, or delete YouTube or Instagram video links displayed on the Brand Projects page.</p>
            </div>
            <a href="{{ route('admin.brand-videos.create') }}" class="inline-flex items-center justify-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                <span>Add Video Link</span>
            </a>
        </div>

        <!-- Table List -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm overflow-hidden">
            <form action="{{ route('admin.brand-videos.reorder') }}" method="POST">
                @csrf
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-700 dark:text-zinc-300">
                        <thead class="text-xs font-bold text-gray-500 uppercase bg-gray-50 dark:bg-zinc-800/50">
                            <tr>
                                <th class="px-6 py-4 w-12 text-center">Sort</th>
                                <th class="px-6 py-4">Title</th>
                                <th class="px-6 py-4">Platform</th>
                                <th class="px-6 py-4">Video Link</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-zinc-800">
                            @forelse($videos as $video)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-zinc-850/30">
                                    <td class="px-6 py-4 text-center">
                                        <input type="hidden" name="orders[]" value="{{ $video->id }}">
                                        <div class="text-gray-400 cursor-row-resize hover:text-gray-600 dark:hover:text-zinc-300">
                                            <i data-lucide="grip-vertical" class="w-4 h-4 mx-auto"></i>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            @if($video->thumbnail_path)
                                                <img src="{{ asset($video->thumbnail_path) }}" class="w-10 h-14 object-cover rounded-lg shadow-sm border border-gray-200/30" alt="{{ $video->title }}">
                                            @else
                                                <div class="w-10 h-14 bg-gray-100 dark:bg-zinc-805 rounded-lg flex items-center justify-center border border-gray-200/30">
                                                    <i data-lucide="image" class="w-4 h-4 text-gray-400"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <span class="block font-semibold text-gray-900 dark:text-white">{{ $video->title ?? 'Untitled Brand Video' }}</span>
                                                <span class="block text-xs text-gray-400 dark:text-zinc-500 font-light max-w-xs truncate mt-0.5">{{ $video->description }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($video->platform === 'youtube')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-50 dark:bg-rose-950/30 text-rose-700 dark:text-rose-450 border border-rose-150/40">
                                                YouTube
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-50 dark:bg-purple-950/30 text-purple-700 dark:text-purple-450 border border-purple-150/40">
                                                Instagram
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 max-w-xs truncate">
                                        <a href="{{ $video->video_url }}" target="_blank" class="text-sky-600 hover:underline inline-flex items-center space-x-1">
                                            <span>{{ $video->video_url }}</span>
                                            <i data-lucide="external-link" class="w-3 h-3"></i>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('admin.brand-videos.edit', $video) }}" class="p-1 text-gray-500 hover:text-emerald-600 dark:text-zinc-400 dark:hover:text-emerald-400 transition">
                                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                                            </a>
                                            <form method="POST" action="{{ route('admin.brand-videos.destroy', $video) }}" onsubmit="return confirm('Are you sure you want to delete this video link?');">
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
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500 dark:text-zinc-550">
                                        <i data-lucide="video" class="w-12 h-12 mx-auto text-gray-300 dark:text-zinc-700 mb-3"></i>
                                        <p class="font-medium text-base">No brand videos registered yet</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($videos->isNotEmpty())
                    <div class="px-6 py-4 bg-gray-50 dark:bg-zinc-800/20 border-t border-gray-100 dark:border-zinc-850 flex items-center justify-between">
                        <p class="text-xs text-gray-500 dark:text-zinc-400">Drag/arrange layout index order, then click Save Sort Order.</p>
                        <button type="submit" class="bg-zinc-900 hover:bg-zinc-850 text-white dark:bg-white dark:hover:bg-zinc-100 dark:text-zinc-900 text-xs font-semibold px-4 py-2 rounded-lg transition shadow-sm">
                            Save Sort Order
                        </button>
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-admin-layout>
