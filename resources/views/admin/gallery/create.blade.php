<x-admin-layout>
    <x-slot name="title">Add BTS Gallery Photo</x-slot>

    <div class="max-w-xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-zinc-400">
            <a href="{{ route('admin.gallery.index') }}" class="hover:underline">BTS Gallery</a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white font-semibold">New Photo</span>
        </div>

        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Add BTS Photo</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Add a behind the scenes image for the gallery slider.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6 lg:p-8">
            <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Title -->
                <div class="space-y-2">
                    <label for="title" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Photo Title / Caption (optional)</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="e.g. Shooting at Solan Ridge"
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <!-- Type -->
                <div class="space-y-2">
                    <label for="type" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Gallery Section Category</label>
                    <select name="type" id="type" required
                            class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="behind_the_scenes" selected>Behind The Scenes (About Page)</option>
                        <option value="portfolio_detail">Portfolio Details Slider</option>
                    </select>
                </div>

                <!-- Image -->
                <div class="space-y-2">
                    <label for="image" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Upload Photo</label>
                    <input type="file" name="image" id="image" accept="image/*" required
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm text-gray-500 dark:text-zinc-400 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white dark:file:bg-zinc-700">
                </div>

                <!-- Form Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-zinc-800">
                    <a href="{{ route('admin.gallery.index') }}" class="px-4 py-2.5 border border-gray-300 dark:border-zinc-700 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl text-sm font-medium transition text-gray-700 dark:text-zinc-300">
                        Cancel
                    </a>
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm px-6 py-2.5 rounded-xl transition shadow-sm">
                        Upload Photo
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
