<x-admin-layout>
    <x-slot name="title">Add New Service</x-slot>

    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-zinc-400">
            <a href="{{ route('admin.services.index') }}" class="hover:underline">Services</a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white font-semibold">New Service</span>
        </div>

        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Create Service</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Create a dynamic agency service page module.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6 lg:p-8">
            <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div class="space-y-2">
                        <label for="title" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Service Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="e.g., Video Production" required
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <!-- Icon -->
                    <div class="space-y-2">
                        <label for="icon" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Lucide Icon Identifier</label>
                        <input type="text" name="icon" id="icon" value="{{ old('icon') }}" placeholder="e.g., Video, Instagram, Zap, Globe" required
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        <p class="text-[10px] text-gray-400">Case-sensitive Lucide icon class (e.g. <i>Instagram</i>, <i>Video</i>, <i>Zap</i>, <i>Globe</i>, <i>Compass</i>, <i>Users</i>).</p>
                    </div>
                </div>

                <!-- Short Description -->
                <div class="space-y-2">
                    <label for="short_description" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Short Summary Card Text</label>
                    <textarea name="short_description" id="short_description" rows="2" placeholder="Brief summary shown on homepage cards..." required
                              class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ old('short_description') }}</textarea>
                </div>

                <!-- Long Description -->
                <div class="space-y-2">
                    <label for="long_description" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Full Detailed Page Content</label>
                    <div class="dark:text-zinc-950">
                        <textarea name="long_description" id="long_description" class="editor">{{ old('long_description') }}</textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Benefits list -->
                    <div class="space-y-2">
                        <label for="benefits_raw" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Benefits List (One per line)</label>
                        <textarea name="benefits_raw" id="benefits_raw" rows="4" placeholder="e.g.&#10;Cinematic 4K Grade&#10;Viral Video Strategy&#10;Professional Sound Editing"
                                  class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm font-mono focus:ring-emerald-500 focus:border-emerald-500">{{ old('benefits_raw') }}</textarea>
                    </div>

                    <!-- Features list -->
                    <div class="space-y-2">
                        <label for="features_raw" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Features Details (One per line)</label>
                        <textarea name="features_raw" id="features_raw" rows="4" placeholder="e.g.&#10;Script & Concept Drafting&#10;2 Shoot Days&#10;Professional Color Correction"
                                  class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm font-mono focus:ring-emerald-500 focus:border-emerald-500">{{ old('features_raw') }}</textarea>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                    <!-- Image -->
                    <div class="space-y-2">
                        <label for="image" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Featured Image Banner</label>
                        <input type="file" name="image" id="image" accept="image/*"
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm text-gray-500 dark:text-zinc-400 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white dark:file:bg-zinc-700">
                        <p class="text-[10px] text-gray-400">Recommended size: 1200x800px. Uploaded images are compressed and WebP optimized automatically.</p>
                    </div>

                    <!-- Active Switch -->
                    <div class="flex items-center space-x-3 pt-6">
                        <input type="checkbox" name="is_active" id="is_active" value="1" checked
                               class="w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 rounded focus:ring-emerald-500 focus:ring-offset-2">
                        <label for="is_active" class="text-sm font-medium text-gray-700 dark:text-zinc-300">Active (Visible on public pages)</label>
                    </div>
                </div>

                <!-- Form Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-zinc-800">
                    <a href="{{ route('admin.services.index') }}" class="px-4 py-2.5 border border-gray-300 dark:border-zinc-700 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl text-sm font-medium transition text-gray-700 dark:text-zinc-300">
                        Cancel
                    </a>
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm px-6 py-2.5 rounded-xl transition shadow-sm">
                        Create Service
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- CKEditor Init -->
    <script>
        ClassicEditor
            .create(document.querySelector('.editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</x-admin-layout>
