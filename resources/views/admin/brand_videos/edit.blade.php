<x-admin-layout>
    <x-slot name="title">Edit Brand Video</x-slot>

    <div class="max-w-xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-zinc-400">
            <a href="{{ route('admin.brand-videos.index') }}" class="hover:underline">Brand Videos</a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white font-semibold">Edit Brand Video</span>
        </div>

        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Edit Brand Video</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Update video details, category tags, or change platforms.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6 lg:p-8">
            <form method="POST" action="{{ route('admin.brand-videos.update', $brandVideo) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Platform -->
                <div class="space-y-2">
                    <label for="platform" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Video Platform</label>
                    <select name="platform" id="platform" required
                            class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="instagram" {{ old('platform', $brandVideo->platform) === 'instagram' ? 'selected' : '' }}>Instagram (Reel/Post)</option>
                        <option value="youtube" {{ old('platform', $brandVideo->platform) === 'youtube' ? 'selected' : '' }}>YouTube</option>
                    </select>
                </div>

                <!-- Category/Tag -->
                <div class="space-y-2">
                    <label for="category" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Category Tag</label>
                    <select name="category" id="category" required
                            class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="retail" {{ old('category', $brandVideo->category) === 'retail' ? 'selected' : '' }}>Retail</option>
                        <option value="food_beverage" {{ old('category', $brandVideo->category) === 'food_beverage' ? 'selected' : '' }}>Food & Beverage</option>
                        <option value="hospitality" {{ old('category', $brandVideo->category) === 'hospitality' ? 'selected' : '' }}>Hospitality</option>
                        <option value="healthcare" {{ old('category', $brandVideo->category) === 'healthcare' ? 'selected' : '' }}>Healthcare</option>
                        <option value="real_estate" {{ old('category', $brandVideo->category) === 'real_estate' ? 'selected' : '' }}>Real Estate</option>
                        <option value="products" {{ old('category', $brandVideo->category) === 'products' ? 'selected' : '' }}>Products</option>
                    </select>
                </div>

                <!-- Title -->
                <div class="space-y-2">
                    <label for="title" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Video Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $brandVideo->title) }}" placeholder="e.g. NOBLE SOLAR" required
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label for="description" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Short Subdescription (Subtitle)</label>
                    <input type="text" name="description" id="description" value="{{ old('description', $brandVideo->description) }}" placeholder="e.g. Solar & Renewable Energy" required
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <!-- Video URL -->
                <div class="space-y-2">
                    <label for="video_url" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Video URL</label>
                    <input type="url" name="video_url" id="video_url" value="{{ old('video_url', $brandVideo->video_url) }}" placeholder="e.g. https://www.instagram.com/reel/... or https://youtu.be/..." required
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    <p class="text-[11px] text-gray-400 dark:text-zinc-555">Provide the direct public URL of the Instagram Reel or YouTube video.</p>
                </div>

                <!-- Form Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-zinc-800">
                    <a href="{{ route('admin.brand-videos.index') }}" class="px-4 py-2.5 border border-gray-300 dark:border-zinc-700 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl text-sm font-medium transition text-gray-700 dark:text-zinc-300">
                        Cancel
                    </a>
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm px-6 py-2.5 rounded-xl transition shadow-sm">
                        Update Video
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
