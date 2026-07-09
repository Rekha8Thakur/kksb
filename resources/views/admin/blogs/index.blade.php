<x-admin-layout>
    <x-slot name="title">Manage Blogs</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Blog CMS</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Publish guides, stories and marketing articles to share with the KKSB Studios audience.</p>
            </div>
            <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center justify-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                <span>Write Post</span>
            </a>
        </div>

        <!-- Blogs List -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-700 dark:text-zinc-300">
                    <thead class="text-xs font-bold text-gray-500 uppercase bg-gray-50 dark:bg-zinc-800/50">
                        <tr>
                            <th class="px-6 py-4">Article Title</th>
                            <th class="px-6 py-4">Category</th>
                            <th class="px-6 py-4">Author</th>
                            <th class="px-6 py-4">Date Published</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-zinc-800">
                        @forelse($blogs as $blog)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-zinc-850/30">
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        @if($blog->featured_image)
                                            <img src="{{ asset($blog->featured_image) }}" class="w-10 h-7 rounded object-cover" alt="">
                                        @else
                                            <div class="w-10 h-7 rounded bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-400">
                                                <i data-lucide="image" class="w-3.5 h-3.5"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="font-semibold text-gray-900 dark:text-white">{{ $blog->title }}</div>
                                            <div class="text-[10px] text-gray-400 font-mono">{{ $blog->slug }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-xs bg-zinc-100 dark:bg-zinc-800 px-2 py-1 rounded text-gray-700 dark:text-zinc-300">
                                        {{ $blog->category->name ?? 'Uncategorized' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-500 dark:text-zinc-400 font-medium">{{ $blog->author->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-gray-500 dark:text-zinc-400 text-xs">
                                    {{ $blog->published_at ? $blog->published_at->format('M d, Y H:i') : '-' }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($blog->status === 'published')
                                        <span class="inline-flex px-2 py-0.5 text-[10px] font-bold rounded-full bg-emerald-50 dark:bg-emerald-950/30 text-emerald-700 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-900/30 uppercase">
                                            Published
                                        </span>
                                    @elseif($blog->status === 'scheduled')
                                        <span class="inline-flex px-2 py-0.5 text-[10px] font-bold rounded-full bg-amber-50 dark:bg-amber-950/30 text-amber-700 dark:text-amber-400 border border-amber-100 dark:border-amber-900/30 uppercase">
                                            Scheduled
                                        </span>
                                    @else
                                        <span class="inline-flex px-2 py-0.5 text-[10px] font-bold rounded-full bg-zinc-100 dark:bg-zinc-800 text-zinc-500 border border-zinc-200 dark:border-zinc-700 uppercase">
                                            Draft
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end space-x-3">
                                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="p-1 text-gray-500 hover:text-emerald-600 dark:text-zinc-400 dark:hover:text-emerald-400 transition" title="Edit Article">
                                            <i data-lucide="edit-3" class="w-4 h-4"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1 text-gray-500 hover:text-rose-600 dark:text-zinc-400 dark:hover:text-rose-400 transition" title="Delete Article">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-500 dark:text-zinc-500">
                                    <i data-lucide="file-text" class="w-12 h-12 mx-auto text-gray-300 dark:text-zinc-750 mb-3"></i>
                                    <p class="font-medium text-base">No blog posts found</p>
                                    <p class="text-xs text-gray-400 mt-1">Write your first article to share updates with the world.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($blogs->hasPages())
                <div class="px-6 py-4 border-t border-gray-155 dark:border-zinc-800">
                    {{ $blogs->links() }}
                </div>
            @endif
        </div>
    </div>
</x-admin-layout>
