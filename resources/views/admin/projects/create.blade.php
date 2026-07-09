<x-admin-layout>
    <x-slot name="title">Add Portfolio Project</x-slot>

    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-zinc-400">
            <a href="{{ route('admin.projects.index') }}" class="hover:underline">Portfolio</a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white font-semibold">New Case Study</span>
        </div>

        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Create Project Case Study</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Create a dynamic portfolio case study showing project details, challenges, solutions and results.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6 lg:p-8">
            <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div class="space-y-2">
                        <label for="title" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Project Name</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="e.g., The Himalayan Resort Campaign" required
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <!-- Category -->
                    <div class="space-y-2">
                        <label for="category_id" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Portfolio Category</label>
                        <select name="category_id" id="category_id" required
                                class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Client -->
                    <div class="space-y-2">
                        <label for="client" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Client / Brand Name</label>
                        <input type="text" name="client" id="client" value="{{ old('client') }}" placeholder="e.g. Solan Roastery"
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <!-- Date -->
                    <div class="space-y-2">
                        <label for="project_date" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Project Launch Date</label>
                        <input type="date" name="project_date" id="project_date" value="{{ old('project_date') }}"
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <!-- Tech Used -->
                    <div class="space-y-2">
                        <label for="tech_raw" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Technologies / Strategy (Comma sep)</label>
                        <input type="text" name="tech_raw" id="tech_raw" value="{{ old('tech_raw') }}" placeholder="e.g., Video, Reels, Local SEO, Alpine"
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label for="description" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Short Description</label>
                    <textarea name="description" id="description" rows="2" placeholder="Brief summary of the work done..." required
                              class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ old('description') }}</textarea>
                </div>

                <!-- Case Study Details -->
                <div class="border-t border-gray-100 dark:border-zinc-800 pt-6 space-y-6">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Case Study Sections</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Challenge -->
                        <div class="space-y-2">
                            <label for="challenge" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">The Challenge</label>
                            <textarea name="challenge" id="challenge" rows="4" placeholder="What problem did the client face? (e.g. low footfall, outdated website)"
                                      class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ old('challenge') }}</textarea>
                        </div>

                        <!-- Solution -->
                        <div class="space-y-2">
                            <label for="solution" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Our Solution</label>
                            <textarea name="solution" id="solution" rows="4" placeholder="What creative strategy or tools did we implement?"
                                      class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ old('solution') }}</textarea>
                        </div>

                        <!-- Results -->
                        <div class="space-y-2">
                            <label for="results" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">The Results</label>
                            <textarea name="results" id="results" rows="4" placeholder="What metrics or growth did the client achieve? (e.g. 250% increase in bookings)"
                                      class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ old('results') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Media Section -->
                <div class="border-t border-gray-100 dark:border-zinc-800 pt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Main image -->
                    <div class="space-y-2">
                        <label for="main_image" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Featured Showcase Image</label>
                        <input type="file" name="main_image" id="main_image" accept="image/*" required
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm text-gray-500 dark:text-zinc-400 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white dark:file:bg-zinc-700">
                    </div>

                    <!-- Video URL -->
                    <div class="space-y-2">
                        <label for="video_url" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Video Embed URL (optional)</label>
                        <input type="url" name="video_url" id="video_url" value="{{ old('video_url') }}" placeholder="e.g. https://www.youtube.com/embed/..."
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        <p class="text-[10px] text-gray-400">Embeddable link format like YouTube <i>/embed/</i> path.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                    <!-- Gallery Multiple Upload -->
                    <div class="space-y-2">
                        <label for="gallery" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Gallery Case Images (Multiple)</label>
                        <input type="file" name="gallery[]" id="gallery" accept="image/*" multiple
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm text-gray-500 dark:text-zinc-400 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white dark:file:bg-zinc-700">
                    </div>

                    <!-- Featured checkbox -->
                    <div class="flex items-center space-x-3 pt-6">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1"
                               class="w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 rounded focus:ring-emerald-500 focus:ring-offset-2">
                        <label for="is_featured" class="text-sm font-medium text-gray-700 dark:text-zinc-300">Feature this project on Home/Work page</label>
                    </div>
                </div>

                <!-- Form Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-zinc-800">
                    <a href="{{ route('admin.projects.index') }}" class="px-4 py-2.5 border border-gray-300 dark:border-zinc-700 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl text-sm font-medium transition text-gray-700 dark:text-zinc-300">
                        Cancel
                    </a>
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm px-6 py-2.5 rounded-xl transition shadow-sm">
                        Create Project
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
