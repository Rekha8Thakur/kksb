<x-admin-layout>
    <x-slot name="title">Edit Original Video</x-slot>

    <div class="max-w-xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-zinc-400">
            <a href="{{ route('admin.original-videos.index') }}" class="hover:underline">Original Videos</a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white font-semibold">Edit Original Video</span>
        </div>

        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Edit Original Video</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Update video details, description, or change thumbnails.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6 lg:p-8">
            <form method="POST" action="{{ route('admin.original-videos.update', $originalVideo) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Platform -->
                <div class="space-y-2">
                    <label for="platform" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Video Platform</label>
                    <select name="platform" id="platform" required
                            class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="youtube" {{ old('platform', $originalVideo->platform) === 'youtube' ? 'selected' : '' }}>YouTube</option>
                        <option value="instagram" {{ old('platform', $originalVideo->platform) === 'instagram' ? 'selected' : '' }}>Instagram (Reel/Post)</option>
                    </select>
                </div>

                <!-- Title -->
                <div class="space-y-2">
                    <label for="title" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Video Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $originalVideo->title) }}" placeholder="e.g. Villages of Himachal" required
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label for="description" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Description</label>
                    <textarea name="description" id="description" rows="3" placeholder="A journey through the hidden gems and untold stories..." required
                              class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ old('description', $originalVideo->description) }}</textarea>
                </div>

                <!-- Video URL -->
                <div class="space-y-2">
                    <label for="video_url" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Video URL</label>
                    <input type="url" name="video_url" id="video_url" value="{{ old('video_url', $originalVideo->video_url) }}" placeholder="e.g. https://www.instagram.com/reel/... or https://youtu.be/..." required
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <!-- Custom Thumbnail -->
                <div class="space-y-2">
                    <label for="thumbnail" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Replace Card Cover Thumbnail (Optional)</label>
                    @if($originalVideo->thumbnail_path)
                        <div class="mb-3">
                            <span class="block text-xs font-semibold text-gray-500 mb-1">Current Thumbnail:</span>
                            <img src="{{ asset($originalVideo->thumbnail_path) }}" class="w-32 h-20 object-cover rounded-lg border border-gray-200 dark:border-zinc-800 shadow-sm" alt="Current Thumbnail" loading="lazy">
                        </div>
                    @endif
                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    <p class="text-[11px] text-gray-400 dark:text-zinc-550 font-light">Upload a new image to replace the current thumbnail banner.</p>
                </div>

                <!-- Form Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-zinc-800">
                    <a href="{{ route('admin.original-videos.index') }}" class="px-4 py-2.5 border border-gray-300 dark:border-zinc-700 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl text-sm font-medium transition text-gray-700 dark:text-zinc-300">
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
