<x-admin-layout>
    <x-slot name="title">Manage FAQs</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Frequently Asked Questions</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Add, edit, or delete FAQ accordion items shown across different pages.</p>
            </div>
            <a href="{{ route('admin.faqs.create') }}" class="inline-flex items-center justify-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                <span>Add FAQ</span>
            </a>
        </div>

        <!-- Table List -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm overflow-hidden">
            <form action="{{ route('admin.faqs.reorder') }}" method="POST">
                @csrf
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-700 dark:text-zinc-300">
                        <thead class="text-xs font-bold text-gray-500 uppercase bg-gray-50 dark:bg-zinc-800/50">
                            <tr>
                                <th class="px-6 py-4 w-12 text-center">Sort</th>
                                <th class="px-6 py-4">Question</th>
                                <th class="px-6 py-4">Category / Page</th>
                                <th class="px-6 py-4">Answer Snippet</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-zinc-800">
                            @forelse($faqs as $faq)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-zinc-850/30">
                                    <td class="px-6 py-4 text-center">
                                        <input type="hidden" name="orders[]" value="{{ $faq->id }}">
                                        <div class="text-gray-400 cursor-row-resize hover:text-gray-600 dark:hover:text-zinc-300">
                                            <i data-lucide="grip-vertical" class="w-4 h-4 mx-auto"></i>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $faq->question }}</td>
                                    <td class="px-6 py-4">
                                        <span class="text-xs bg-zinc-100 dark:bg-zinc-800 px-2 py-1 rounded text-gray-700 dark:text-zinc-350 capitalize">
                                            {{ $faq->category }} page
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 dark:text-zinc-400 max-w-xs truncate">{{ $faq->answer }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="p-1 text-gray-500 hover:text-emerald-600 dark:text-zinc-400 dark:hover:text-emerald-400 transition">
                                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                                            </a>
                                            <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1 text-gray-500 hover:text-rose-600 transition">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500 dark:text-zinc-550">
                                        <i data-lucide="help-circle" class="w-12 h-12 mx-auto text-gray-300 dark:text-zinc-700 mb-3"></i>
                                        <p class="font-medium text-base">No FAQs found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($faqs->isNotEmpty())
                    <div class="px-6 py-4 bg-gray-50 dark:bg-zinc-800/20 border-t border-gray-100 dark:border-zinc-850 flex items-center justify-between">
                        <p class="text-xs text-gray-500 dark:text-zinc-400">Order changes are saved instantly upon submitting.</p>
                        <button type="submit" class="bg-zinc-900 hover:bg-zinc-850 text-white dark:bg-white dark:hover:bg-zinc-100 dark:text-zinc-900 text-xs font-semibold px-4 py-2 rounded-lg transition shadow-sm">
                            Save Sort Order
                        </button>
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-admin-layout>
