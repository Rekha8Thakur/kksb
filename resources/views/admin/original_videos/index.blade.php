<x-admin-layout>
    <x-slot name="title">Manage Original Videos</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Original Production Videos</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Add, edit, or delete video links and custom card thumbnails shown on the Original Productions page.</p>
            </div>
            <a href="{{ route('admin.original-videos.create') }}" class="inline-flex items-center justify-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                <span>Add Original Video</span>
            </a>
        </div>

        <!-- Table List -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm overflow-hidden">
            <form action="{{ route('admin.original-videos.reorder') }}" method="POST">
                @csrf
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-700 dark:text-zinc-300">
                        <thead class="text-xs font-bold text-gray-500 uppercase bg-gray-50 dark:bg-zinc-800/50">
                            <tr>
                                <th class="px-6 py-4 w-12 text-center">Sort</th>
                                <th class="px-6 py-4 w-24">Thumbnail</th>
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
                                        @if($video->thumbnail_path)
                                            <img src="{{ asset($video->thumbnail_path) }}" class="w-16 h-10 object-cover rounded-lg border border-gray-200 dark:border-zinc-800 shadow-sm" alt="Thumbnail" loading="lazy">
                                        @else
                                            <div class="w-16 h-10 bg-gray-100 dark:bg-zinc-800 rounded-lg flex items-center justify-center text-zinc-400 text-[10px] font-semibold border border-gray-200 dark:border-zinc-800 shadow-sm">
                                                Auto
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                        {{ $video->title ?? 'Untitled Original Video' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($video->platform === 'youtube')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-50 dark:bg-rose-955/30 text-rose-700 dark:text-rose-400 border border-rose-150/40">
                                                YouTube
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-50 dark:bg-purple-955/30 text-purple-700 dark:text-purple-400 border border-purple-150/40">
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
                                            <a href="{{ route('admin.original-videos.edit', $video) }}" class="p-1 text-gray-500 hover:text-emerald-600 dark:text-zinc-400 dark:hover:text-emerald-400 transition">
                                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                                            </a>
                                            <button type="button" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this original video?')) { const f = document.getElementById('global-delete-form'); f.action = '{{ route('admin.original-videos.destroy', $video) }}'; f.submit(); }" class="p-1 text-gray-500 hover:text-rose-600 transition">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500 dark:text-zinc-550">
                                        <i data-lucide="video" class="w-12 h-12 mx-auto text-gray-300 dark:text-zinc-700 mb-3"></i>
                                        <p class="font-medium text-base">No original productions videos registered yet</p>
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

    <!-- Hidden global form for delete actions to prevent nested forms -->
    <form id="global-delete-form" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-admin-layout>
