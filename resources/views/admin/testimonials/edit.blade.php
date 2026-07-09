<x-admin-layout>
    <x-slot name="title">Edit Testimonial</x-slot>

    <div class="max-w-xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-zinc-400">
            <a href="{{ route('admin.testimonials.index') }}" class="hover:underline">Testimonials</a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white font-semibold">Edit Review</span>
        </div>

        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Edit Testimonial: {{ $testimonial->client_name }}</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Modify client rating and feedback testimonial text.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6 lg:p-8">
            <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PATCH')

                <!-- Name -->
                <div class="space-y-2">
                    <label for="client_name" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Client Name</label>
                    <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $testimonial->client_name) }}" placeholder="e.g. Rajesh Sen" required
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <!-- Company -->
                <div class="space-y-2">
                    <label for="client_company" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Company / Brand Name</label>
                    <input type="text" name="client_company" id="client_company" value="{{ old('client_company', $testimonial->client_company) }}" placeholder="e.g. Himalayan Resorts"
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <!-- Rating -->
                <div class="space-y-2">
                    <label for="rating" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Rating (1-5 Stars)</label>
                    <select name="rating" id="rating" required
                            class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="5" {{ old('rating', $testimonial->rating) == 5 ? 'selected' : '' }}>5 Stars</option>
                        <option value="4" {{ old('rating', $testimonial->rating) == 4 ? 'selected' : '' }}>4 Stars</option>
                        <option value="3" {{ old('rating', $testimonial->rating) == 3 ? 'selected' : '' }}>3 Stars</option>
                        <option value="2" {{ old('rating', $testimonial->rating) == 2 ? 'selected' : '' }}>2 Stars</option>
                        <option value="1" {{ old('rating', $testimonial->rating) == 1 ? 'selected' : '' }}>1 Star</option>
                    </select>
                </div>

                <!-- Feedback -->
                <div class="space-y-2">
                    <label for="feedback" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Feedback / Review Comment</label>
                    <textarea name="feedback" id="feedback" rows="4" placeholder="Client feedback details..." required
                              class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ old('feedback', $testimonial->feedback) }}</textarea>
                </div>

                <!-- Avatar -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300 block">Client Avatar Image</label>
                    @if($testimonial->client_avatar)
                        <div class="flex items-center space-x-3 mb-2">
                            <img src="{{ asset($testimonial->client_avatar) }}" class="w-10 h-10 rounded-full object-cover border border-gray-300" alt="">
                            <span class="text-xs text-gray-500">Current Avatar</span>
                        </div>
                    @endif
                    <input type="file" name="client_avatar" id="client_avatar" accept="image/*"
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm text-gray-500 dark:text-zinc-400 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white dark:file:bg-zinc-700">
                </div>

                <!-- Form Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-zinc-800">
                    <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2.5 border border-gray-300 dark:border-zinc-700 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl text-sm font-medium transition text-gray-700 dark:text-zinc-300">
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
