<x-admin-layout>
    <x-slot name="title">Edit Team & Author Profile</x-slot>

    <div class="max-w-xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-zinc-400">
            <a href="{{ route('admin.authors.index') }}" class="hover:underline">Team & Authors</a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white font-semibold">Edit Profile</span>
        </div>

        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Edit Profile: {{ $author->name }}</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Modify profile biography, avatar, and social link handles.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6 lg:p-8">
            <form method="POST" action="{{ route('admin.authors.update', $author) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PATCH')

                <!-- Name -->
                <div class="space-y-2">
                    <label for="name" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $author->name) }}" placeholder="e.g. Kuldeep Sharma" required
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <!-- Bio -->
                <div class="space-y-2">
                    <label for="bio" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Biography</label>
                    <textarea name="bio" id="bio" rows="3" placeholder="Brief writer background description..."
                              class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ old('bio', $author->bio) }}</textarea>
                </div>

                <!-- Avatar -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300 block">Avatar Image</label>
                    @if($author->avatar)
                        <div class="flex items-center space-x-3 mb-2">
                            <img src="{{ asset($author->avatar) }}" class="w-10 h-10 rounded-full object-cover border border-gray-300" alt="">
                            <span class="text-xs text-gray-500">Current Avatar</span>
                        </div>
                    @endif
                    <input type="file" name="avatar" id="avatar" accept="image/*"
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm text-gray-500 dark:text-zinc-400 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white dark:file:bg-zinc-700">
                </div>

                <!-- Socials Section -->
                <div class="border-t border-gray-100 dark:border-zinc-800 pt-6 space-y-4">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Social Network Profiles</h3>
                    
                    <!-- Instagram -->
                    <div class="space-y-2">
                        <label for="instagram" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Instagram Profile URL</label>
                        <input type="url" name="instagram" id="instagram" value="{{ old('instagram', $author->social_links['instagram'] ?? '') }}" placeholder="https://instagram.com/..."
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <!-- LinkedIn -->
                    <div class="space-y-2">
                        <label for="linkedin" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">LinkedIn Profile URL</label>
                        <input type="url" name="linkedin" id="linkedin" value="{{ old('linkedin', $author->social_links['linkedin'] ?? '') }}" placeholder="https://linkedin.com/in/..."
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>
                </div>

                <!-- Form Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-zinc-800">
                    <a href="{{ route('admin.authors.index') }}" class="px-4 py-2.5 border border-gray-300 dark:border-zinc-700 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl text-sm font-medium transition text-gray-700 dark:text-zinc-300">
                        Cancel
                    </a>
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm px-6 py-2.5 rounded-xl transition shadow-sm">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
