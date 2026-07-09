<x-admin-layout>
    <x-slot name="title">Edit Client Logo</x-slot>

    <div class="max-w-xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-zinc-400">
            <a href="{{ route('admin.clients.index') }}" class="hover:underline">Clients</a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white font-semibold">Edit Client</span>
        </div>

        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Edit Client Logo</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Modify client brand name website link and logo.</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6 lg:p-8">
            <form method="POST" action="{{ route('admin.clients.update', $client) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PATCH')

                <!-- Name -->
                <div class="space-y-2">
                    <label for="name" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Client / Brand Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $client->name) }}" placeholder="e.g. Solan Roastery" required
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <!-- Website URL -->
                <div class="space-y-2">
                    <label for="website_url" class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Website URL (optional)</label>
                    <input type="url" name="website_url" id="website_url" value="{{ old('website_url', $client->website_url) }}" placeholder="https://..."
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                </div>

                <!-- Logo Image -->
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300 block">Brand Logo Image</label>
                    @if($client->logo)
                        <div class="h-14 w-28 bg-gray-100 dark:bg-zinc-850 rounded flex items-center justify-center p-1 border border-gray-200 dark:border-zinc-800 mb-2">
                            <img src="{{ asset($client->logo) }}" class="max-h-full max-w-full object-contain" alt="">
                        </div>
                    @endif
                    <input type="file" name="logo" id="logo" accept="image/*"
                           class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm text-gray-500 dark:text-zinc-400 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white dark:file:bg-zinc-700">
                </div>

                <!-- Form Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-zinc-800">
                    <a href="{{ route('admin.clients.index') }}" class="px-4 py-2.5 border border-gray-300 dark:border-zinc-700 hover:bg-gray-100 dark:hover:bg-zinc-800 rounded-xl text-sm font-medium transition text-gray-700 dark:text-zinc-300">
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
