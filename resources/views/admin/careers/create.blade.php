<x-admin-layout>
    <x-slot name="title">Add Job Opening</x-slot>

    <div class="max-w-xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-zinc-400">
            <a href="{{ route('admin.careers.index') }}" class="hover:underline">Careers</a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white font-semibold">New Job Opening</span>
        </div>

        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Post New Job</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Add a career vacancy listing on the careers page board.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6 lg:p-8">
            <form method="POST" action="{{ route('admin.careers.store') }}" class="space-y-6">
                @csrf

                <!-- Title -->
                <div class="space-y-2">
                    <label for="title" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Job Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="e.g. Video Editor" required
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Location -->
                    <div class="space-y-2">
                        <label for="location" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Job Location</label>
                        <input type="text" name="location" id="location" value="{{ old('location') }}" placeholder="e.g. Solan, Himachal Pradesh" required
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <!-- Type -->
                    <div class="space-y-2">
                        <label for="type" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Employment Type</label>
                        <select name="type" id="type" required
                                class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="full-time" selected>Full-Time</option>
                            <option value="part-time">Part-Time</option>
                            <option value="remote">Remote</option>
                            <option value="contract">Contract</option>
                        </select>
                    </div>
                </div>

                <!-- Description -->
                <div class="space-y-2">
                    <label for="description" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Description Summary</label>
                    <textarea name="description" id="description" rows="3" placeholder="Brief outline of the job role..." required
                              class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ old('description') }}</textarea>
                </div>

                <!-- Requirements -->
                <div class="space-y-2">
                    <label for="requirements" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Requirements (One per line)</label>
                    <textarea name="requirements" id="requirements" rows="4" placeholder="e.g.&#10;• 2+ Years editing Premiere Pro&#10;• Experience grading Color profiles"
                              class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ old('requirements') }}</textarea>
                </div>

                <!-- Benefits -->
                <div class="space-y-2">
                    <label for="benefits" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Benefits & Perks (One per line)</label>
                    <textarea name="benefits" id="benefits" rows="3" placeholder="e.g.&#10;• High-end workstation provided&#10;• Competitive basic salary"
                              class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ old('benefits') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                    <!-- Closes At -->
                    <div class="space-y-2">
                        <label for="closes_at" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Application Deadline</label>
                        <input type="date" name="closes_at" id="closes_at" value="{{ old('closes_at') }}"
                               class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <!-- Active Switch -->
                    <div class="flex items-center space-x-3 pt-6">
                        <input type="checkbox" name="is_active" id="is_active" value="1" checked
                               class="w-4 h-4 text-emerald-600 bg-gray-100 border-gray-300 rounded focus:ring-emerald-500 focus:ring-offset-2">
                        <label for="is_active" class="text-sm font-medium text-gray-700 dark:text-zinc-300">Active (Accepting applications)</label>
                    </div>
                </div>

                <!-- Form Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-zinc-800">
                    <a href="{{ route('admin.careers.index') }}" class="px-4 py-2.5 border border-gray-300 dark:border-zinc-700 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl text-sm font-medium transition text-gray-700 dark:text-zinc-300">
                        Cancel
                    </a>
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm px-6 py-2.5 rounded-xl transition shadow-sm">
                        Create Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
