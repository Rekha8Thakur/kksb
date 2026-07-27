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
            <form method="POST" action="{{ route('admin.brand-videos.update', $brandVideo) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Platform -->
                <div class="space-y-2">
                    <label for="platform" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Video Platform</label>
                    <select name="platform" id="platform"
                            class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="" {{ old('platform', $brandVideo->platform) === '' ? 'selected' : '' }}>Select Platform</option>
                        <option value="instagram" {{ old('platform', $brandVideo->platform) === 'instagram' ? 'selected' : '' }}>Instagram (Reel/Post)</option>
                        <option value="youtube" {{ old('platform', $brandVideo->platform) === 'youtube' ? 'selected' : '' }}>YouTube</option>
                    </select>
                </div>

                <!-- Title -->
                <div class="space-y-2">
                    <label for="title" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Video Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $brandVideo->title) }}" placeholder="e.g. NOBLE SOLAR"
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label for="description" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Short Subdescription (Subtitle)</label>
                    <input type="text" name="description" id="description" value="{{ old('description', $brandVideo->description) }}" placeholder="e.g. Solar & Renewable Energy"
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <!-- Video URL -->
                <div class="space-y-2">
                    <label for="video_url" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Video URL</label>
                    <input type="url" name="video_url" id="video_url" value="{{ old('video_url', $brandVideo->video_url) }}" placeholder="e.g. https://www.instagram.com/reel/... or https://youtu.be/..."
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    <p class="text-[11px] text-gray-400 dark:text-zinc-555">Provide the direct public URL of the Instagram Reel or YouTube video.</p>
                </div>

                <!-- Video Thumbnail -->
                <div class="space-y-2">
                    <label for="thumbnail" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Video Thumbnail / Cover Image</label>
                    
                    @if($brandVideo->thumbnail_path)
                        <div class="flex items-center space-x-4 p-3 bg-gray-50 dark:bg-zinc-800/50 rounded-xl border border-gray-200 dark:border-zinc-800 max-w-sm">
                            <img src="{{ asset($brandVideo->thumbnail_path) }}" class="w-16 h-20 object-cover rounded-lg shadow-sm" alt="Thumbnail Preview">
                            <div>
                                <span class="block text-xs font-semibold text-gray-700 dark:text-zinc-300">Current Thumbnail</span>
                                <span class="block text-[10px] text-gray-400 dark:text-zinc-555">Will be replaced if a new file is uploaded</span>
                            </div>
                        </div>
                    @endif

                    <input type="file" name="thumbnail" id="thumbnail" accept="image/*"
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500 file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                    <p class="text-[11px] text-gray-400 dark:text-zinc-500">Optional. Upload a custom vertical image (ideal ratio 9:16) to replace the current thumbnail. If empty, YouTube thumbnails will load dynamically, and Instagram videos will show a stylized placeholder.</p>
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
