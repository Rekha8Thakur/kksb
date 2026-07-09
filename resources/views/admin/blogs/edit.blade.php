<x-admin-layout>
    <x-slot name="title">Edit Post: {{ $blog->title }}</x-slot>

    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-zinc-400">
            <a href="{{ route('admin.blogs.index') }}" class="hover:underline">Blogs</a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white font-semibold">Edit Article</span>
        </div>

        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Edit Blog Post</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Update the details, publishing status and meta fields for this article.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6 lg:p-8">
            <form method="POST" action="{{ route('admin.blogs.update', $blog) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PATCH')

                <!-- Title -->
                <div class="space-y-2">
                    <label for="title" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Article Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" placeholder="e.g., How to Grow Your Restaurant Brand in 2026" required
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Category -->
                    <div class="space-y-2">
                        <label for="category_id" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Blog Category</label>
                        <select name="category_id" id="category_id"
                                class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Author -->
                    <div class="space-y-2">
                        <label for="author_id" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Article Author</label>
                        <select name="author_id" id="author_id"
                                class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="">Select Author</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}" {{ old('author_id', $blog->author_id) == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Summary -->
                <div class="space-y-2">
                    <label for="summary" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Article Excerpt / Summary</label>
                    <textarea name="summary" id="summary" rows="2" placeholder="Brief outline shown in lists (approx 150 characters)..."
                              class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ old('summary', $blog->summary) }}</textarea>
                </div>

                <!-- Content -->
                <div class="space-y-2">
                    <label for="content" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Article Body Content</label>
                    <div class="dark:text-zinc-950">
                        <textarea name="content" id="content" class="editor">{{ old('content', $blog->content) }}</textarea>
                    </div>
                </div>

                <!-- Status & Publish Date -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-gray-100 dark:border-zinc-800 pt-6">
                    <div class="space-y-2">
                        <label for="status" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Publishing Status</label>
                        <select name="status" id="status" required
                                class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="draft" {{ old('status', $blog->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $blog->status) === 'published' ? 'selected' : '' }}>Published</option>
                            <option value="scheduled" {{ old('status', $blog->status) === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="published_at" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Publish Date & Time (for scheduled)</label>
                        <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at', $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '') }}"
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="space-y-2">
                    <label for="featured_image" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Featured Article Banner</label>
                    @if($blog->featured_image)
                        <div class="flex items-center space-x-3 mb-2">
                            <img src="{{ asset($blog->featured_image) }}" class="w-14 h-10 object-cover rounded border border-gray-300" alt="">
                            <span class="text-xs text-gray-500">Current Image</span>
                        </div>
                    @endif
                    <input type="file" name="featured_image" id="featured_image" accept="image/*"
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm text-gray-500 dark:text-zinc-400 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white dark:file:bg-zinc-700">
                </div>

                <!-- SEO Section -->
                <div class="border-t border-gray-100 dark:border-zinc-800 pt-6 space-y-4">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Search Engine Optimization (SEO)</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- SEO Title -->
                        <div class="space-y-2">
                            <label for="seo_title" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Meta Title</label>
                            <input type="text" name="seo_title" id="seo_title" value="{{ old('seo_title', $blog->seo_title) }}" placeholder="Custom browser tab title..."
                                   class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <!-- SEO Keywords -->
                        <div class="space-y-2">
                            <label for="seo_keywords" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Meta Keywords</label>
                            <input type="text" name="seo_keywords" id="seo_keywords" value="{{ old('seo_keywords', $blog->seo_keywords) }}" placeholder="e.g. food marketing, reels tips"
                                   class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                    </div>

                    <!-- SEO Description -->
                    <div class="space-y-2">
                        <label for="seo_description" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Meta Description</label>
                        <textarea name="seo_description" id="seo_description" rows="2" placeholder="Custom snippet shown in search engine listings..."
                                  class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ old('seo_description', $blog->seo_description) }}</textarea>
                    </div>
                </div>

                <!-- Form Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-zinc-800">
                    <a href="{{ route('admin.blogs.index') }}" class="px-4 py-2.5 border border-gray-300 dark:border-zinc-700 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl text-sm font-medium transition text-gray-700 dark:text-zinc-300">
                        Cancel
                    </a>
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm px-6 py-2.5 rounded-xl transition shadow-sm">
                        Save Changes
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
