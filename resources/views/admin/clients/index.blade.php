<x-admin-layout>
    <x-slot name="title">Manage Clients Showcase</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Clients Showcase</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Display client brand logos on the homepage to highlight credibility.</p>
            </div>
            <a href="{{ route('admin.clients.create') }}" class="inline-flex items-center justify-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                <span>Add Client Logo</span>
            </a>
        </div>

        <!-- Table List -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm overflow-hidden">
            <form action="{{ route('admin.clients.reorder') }}" method="POST">
                @csrf
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-700 dark:text-zinc-300">
                        <thead class="text-xs font-bold text-gray-500 uppercase bg-gray-50 dark:bg-zinc-800/50">
                            <tr>
                                <th class="px-6 py-4 w-12 text-center">Sort</th>
                                <th class="px-6 py-4">Client Brand Name</th>
                                <th class="px-6 py-4">Logo Image</th>
                                <th class="px-6 py-4">Website URL</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="sortable-tbody" class="divide-y divide-gray-100 dark:divide-zinc-800">
                            @forelse($clients as $client)
                                <tr draggable="true" class="hover:bg-gray-50/50 dark:hover:bg-zinc-850/30 transition-colors duration-150 cursor-grab active:cursor-grabbing">
                                    <td class="px-6 py-4 text-center">
                                        <input type="hidden" name="orders[]" value="{{ $client->id }}">
                                        <div class="text-gray-400 hover:text-gray-600 dark:hover:text-zinc-300">
                                            <i data-lucide="grip-vertical" class="w-4 h-4 mx-auto"></i>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $client->name }}</td>
                                    <td class="px-6 py-4">
                                        <div class="h-10 w-24 bg-gray-100 dark:bg-zinc-850 rounded flex items-center justify-center p-1.5 border border-gray-250 dark:border-zinc-800">
                                            <img src="{{ asset($client->logo) }}" class="max-h-full max-w-full object-contain" alt="">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-mono text-xs text-gray-500 dark:text-zinc-400">
                                        {{ $client->website_url ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('admin.clients.edit', $client) }}" class="p-1 text-gray-500 hover:text-emerald-600 dark:text-zinc-400 dark:hover:text-emerald-400 transition">
                                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                                            </a>
                                            <button type="button" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this client logo?')) { const f = document.getElementById('global-delete-form'); f.action = '{{ route('admin.clients.destroy', $client) }}'; f.submit(); }" class="p-1 text-gray-500 hover:text-rose-600 transition">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500 dark:text-zinc-550">
                                        <i data-lucide="images" class="w-12 h-12 mx-auto text-gray-300 dark:text-zinc-700 mb-3"></i>
                                        <p class="font-medium text-base">No client logos found</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($clients->isNotEmpty())
                    <div class="px-6 py-4 bg-gray-50 dark:bg-zinc-800/20 border-t border-gray-100 dark:border-zinc-850 flex items-center justify-between">
                        <p class="text-xs text-gray-500 dark:text-zinc-400">Drag/arrange rows to reorder client logos, then click Save Sort Order.</p>
                        <button type="submit" class="bg-zinc-900 hover:bg-zinc-850 text-white dark:bg-white dark:hover:bg-zinc-100 dark:text-zinc-900 text-xs font-semibold px-4 py-2 rounded-lg transition shadow-sm">
                            Save Sort Order
                        </button>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <!-- Hidden global form for delete actions to prevent nested forms -->
    <form id="global-delete-form" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tbody = document.querySelector('#sortable-tbody');
            if (!tbody) return;

            let dragEl = null;

            // Helper to handle swap
            function handleMove(clientY, target) {
                if (target && target !== dragEl && target.parentNode === tbody) {
                    const rect = target.getBoundingClientRect();
                    const next = (clientY - rect.top) / (rect.bottom - rect.top) > 0.5;
                    tbody.insertBefore(dragEl, next ? target.nextSibling : target);
                }
            }

            tbody.querySelectorAll('tr').forEach(row => {
                // Desktop dragstart
                row.addEventListener('dragstart', (e) => {
                    dragEl = row;
                    row.classList.add('opacity-50', 'bg-emerald-50', 'dark:bg-emerald-950/20');
                    e.dataTransfer.effectAllowed = 'move';
                    // Required by Firefox/Safari/Chrome to initialize a drag payload
                    e.dataTransfer.setData('text/plain', '');
                });

                // Desktop dragover
                row.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    const target = e.target.closest('tr');
                    handleMove(e.clientY, target);
                });

                // Desktop dragend
                row.addEventListener('dragend', () => {
                    row.classList.remove('opacity-50', 'bg-emerald-50', 'dark:bg-emerald-950/20');
                    dragEl = null;
                });

                // Touch/Mobile Events
                row.addEventListener('touchstart', (e) => {
                    dragEl = row;
                    row.classList.add('opacity-50', 'bg-emerald-50', 'dark:bg-emerald-950/20', 'pointer-events-none');
                }, { passive: true });

                row.addEventListener('touchmove', (e) => {
                    if (!dragEl) return;
                    const touch = e.touches[0];
                    // Prevent page scrolling while dragging row
                    if (e.cancelable) e.preventDefault();
                    
                    const targetElement = document.elementFromPoint(touch.clientX, touch.clientY);
                    if (targetElement) {
                        const targetRow = targetElement.closest('tr');
                        handleMove(touch.clientY, targetRow);
                    }
                }, { passive: false });

                row.addEventListener('touchend', () => {
                    if (dragEl) {
                        dragEl.classList.remove('opacity-50', 'bg-emerald-50', 'dark:bg-emerald-950/20', 'pointer-events-none');
                        dragEl = null;
                    }
                });
            });
        });
    </script>
</x-admin-layout>
