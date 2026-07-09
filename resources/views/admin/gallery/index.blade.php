<x-admin-layout>
    <x-slot name="title">Behind The Scenes Gallery</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Behind the Scenes</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Manage photos that are displayed in the behind-the-scenes gallery section on the about page.</p>
            </div>
            <a href="{{ route('admin.gallery.create') }}" class="inline-flex items-center justify-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                <span>Add Photo</span>
            </a>
        </div>

        <!-- Grid of Photos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($images as $image)
                <div class="bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 rounded-2xl shadow-sm overflow-hidden flex flex-col justify-between">
                    <div class="aspect-video w-full bg-gray-100 dark:bg-zinc-850 relative group">
                        <img src="{{ asset($image->image_path) }}" class="w-full h-full object-cover" alt="">
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition duration-200 flex items-center justify-center space-x-3">
                            <a href="{{ route('admin.gallery.edit', $image) }}" class="p-2 bg-white rounded-full text-zinc-950 hover:bg-zinc-100 transition shadow">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.gallery.destroy', $image) }}" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-rose-600 rounded-full text-white hover:bg-rose-700 transition shadow">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="p-4">
                        <h4 class="font-bold text-sm text-gray-900 dark:text-white truncate">{{ $image->title ?? 'Untitled Photo' }}</h4>
                        <span class="text-[10px] bg-zinc-100 dark:bg-zinc-800 text-gray-500 dark:text-zinc-400 px-2 py-0.5 rounded mt-1 inline-block capitalize">
                            {{ str_replace('_', ' ', $image->type) }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 rounded-2xl p-12 text-center text-gray-500 dark:text-zinc-550">
                    <i data-lucide="image" class="w-12 h-12 mx-auto text-gray-300 dark:text-zinc-700 mb-3"></i>
                    <p class="font-medium text-base">No gallery images found</p>
                    <p class="text-xs text-gray-400 mt-1 font-medium">Add BTS photos to display them on the about page gallery.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-admin-layout>
