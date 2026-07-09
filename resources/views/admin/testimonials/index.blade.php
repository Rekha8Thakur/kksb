<x-admin-layout>
    <x-slot name="title">Manage Testimonials</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Client Testimonials</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Manage client reviews, companies, ratings and feedback text.</p>
            </div>
            <a href="{{ route('admin.testimonials.create') }}" class="inline-flex items-center justify-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                <span>Add Review</span>
            </a>
        </div>

        <!-- List Table -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm overflow-hidden">
            <form action="{{ route('admin.testimonials.reorder') }}" method="POST">
                @csrf
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-700 dark:text-zinc-300">
                        <thead class="text-xs font-bold text-gray-500 uppercase bg-gray-50 dark:bg-zinc-800/50">
                            <tr>
                                <th class="px-6 py-4 w-12 text-center">Sort</th>
                                <th class="px-6 py-4">Client Name</th>
                                <th class="px-6 py-4">Company</th>
                                <th class="px-6 py-4">Rating</th>
                                <th class="px-6 py-4">Feedback</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-zinc-800">
                            @forelse($testimonials as $testimonial)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-zinc-850/30">
                                    <td class="px-6 py-4 text-center">
                                        <input type="hidden" name="orders[]" value="{{ $testimonial->id }}">
                                        <div class="text-gray-400 cursor-row-resize hover:text-gray-600 dark:hover:text-zinc-300">
                                            <i data-lucide="grip-vertical" class="w-4 h-4 mx-auto"></i>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            @if($testimonial->client_avatar)
                                                <img src="{{ asset($testimonial->client_avatar) }}" class="w-8 h-8 rounded-full object-cover border border-gray-200" alt="">
                                            @else
                                                <div class="w-8 h-8 rounded-full bg-zinc-100 dark:bg-zinc-850 flex items-center justify-center font-bold text-xs uppercase text-zinc-400">
                                                    {{ substr($testimonial->client_name, 0, 1) }}
                                                </div>
                                            @endif
                                            <div class="font-semibold text-gray-900 dark:text-white">{{ $testimonial->client_name }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 dark:text-zinc-400">{{ $testimonial->client_company ?? '-' }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex text-amber-400">
                                            @for($i=1; $i<=5; $i++)
                                                <i data-lucide="star" class="w-3.5 h-3.5 {{ $i <= $testimonial->rating ? 'fill-current' : 'text-gray-200 dark:text-zinc-800' }}"></i>
                                            @endfor
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 dark:text-zinc-400 max-w-xs truncate">{{ $testimonial->feedback }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="p-1 text-gray-500 hover:text-emerald-600 dark:text-zinc-400 dark:hover:text-emerald-400 transition">
                                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                                            </a>
                                            <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" onsubmit="return confirm('Are you sure?');">
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
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500 dark:text-zinc-550">
                                        <i data-lucide="message-square" class="w-12 h-12 mx-auto text-gray-300 dark:text-zinc-700 mb-3"></i>
                                        <p class="font-medium text-base">No testimonials found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($testimonials->isNotEmpty())
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
