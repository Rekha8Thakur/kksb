<x-admin-layout>
    <x-slot name="title">Add FAQ Accordion</x-slot>

    <div class="max-w-xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-zinc-400">
            <a href="{{ route('admin.faqs.index') }}" class="hover:underline">FAQs</a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white font-semibold">New FAQ</span>
        </div>

        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Create FAQ</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Create an accordion toggle entry for customer queries.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6 lg:p-8">
            <form method="POST" action="{{ route('admin.faqs.store') }}" class="space-y-6">
                @csrf

                <!-- Category -->
                <div class="space-y-2">
                    <label for="category" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Page Category</label>
                    <select name="category" id="category" required
                            class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="home" selected>Home Page</option>
                        <option value="services">Services Page</option>
                        <option value="contact">Contact Page</option>
                        <option value="general">General / Other Page</option>
                    </select>
                </div>

                <!-- Question -->
                <div class="space-y-2">
                    <label for="question" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">FAQ Question Title</label>
                    <input type="text" name="question" id="question" value="{{ old('question') }}" placeholder="e.g. Do you work outside Himachal?" required
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <!-- Answer -->
                <div class="space-y-2">
                    <label for="answer" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">FAQ Answer text</label>
                    <textarea name="answer" id="answer" rows="4" placeholder="Enter the detailed answer description..." required
                              class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ old('answer') }}</textarea>
                </div>

                <!-- Form Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-zinc-800">
                    <a href="{{ route('admin.faqs.index') }}" class="px-4 py-2.5 border border-gray-300 dark:border-zinc-700 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl text-sm font-medium transition text-gray-700 dark:text-zinc-300">
                        Cancel
                    </a>
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm px-6 py-2.5 rounded-xl transition shadow-sm">
                        Create FAQ
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
