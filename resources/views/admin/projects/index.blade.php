<x-admin-layout>
    <x-slot name="title">Manage Portfolio Projects</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Portfolio Case Studies</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Manage digital agency projects, clients, results and galleries.</p>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center justify-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
                <i data-lucide="plus-circle" class="w-4 h-4"></i>
                <span>Add Project</span>
            </a>
        </div>

        <!-- Projects List Table -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm overflow-hidden">
            <form action="{{ route('admin.projects.reorder') }}" method="POST" id="reorderForm">
                @csrf
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-gray-700 dark:text-zinc-300">
                        <thead class="text-xs font-bold text-gray-500 uppercase bg-gray-50 dark:bg-zinc-800/50">
                            <tr>
                                <th class="px-6 py-4 w-12 text-center">Sort</th>
                                <th class="px-6 py-4">Project / Case Study</th>
                                <th class="px-6 py-4">Category</th>
                                <th class="px-6 py-4">Client</th>
                                <th class="px-6 py-4">Project Date</th>
                                <th class="px-6 py-4 text-center">Featured</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-zinc-800">
                            @forelse($projects as $project)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-zinc-850/30">
                                    <td class="px-6 py-4 text-center">
                                        <input type="hidden" name="orders[]" value="{{ $project->id }}">
                                        <div class="text-gray-400 cursor-row-resize hover:text-gray-600 dark:hover:text-zinc-300">
                                            <i data-lucide="grip-vertical" class="w-4 h-4 mx-auto"></i>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            @if($project->main_image)
                                                <img src="{{ asset($project->main_image) }}" class="w-10 h-7 rounded object-cover" alt="">
                                            @else
                                                <div class="w-10 h-7 rounded bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center text-zinc-400">
                                                    <i data-lucide="image" class="w-3.5 h-3.5"></i>
                                                </div>
                                            @endif
                                            <div class="font-semibold text-gray-900 dark:text-white">{{ $project->title }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-xs bg-zinc-100 dark:bg-zinc-800 text-gray-700 dark:text-zinc-300 px-2 py-1 rounded">
                                            {{ $project->category->name ?? 'Uncategorized' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500 dark:text-zinc-400">{{ $project->client ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 text-gray-500 dark:text-zinc-400 font-mono text-xs">{{ $project->project_date ? $project->project_date->format('M Y') : 'N/A' }}</td>
                                    <td class="px-6 py-4 text-center">
                                        @if($project->is_featured)
                                            <span class="inline-flex px-2 py-0.5 text-[10px] font-bold rounded bg-amber-50 dark:bg-amber-950/30 text-amber-700 dark:text-amber-400 border border-amber-100 dark:border-amber-900/30 uppercase tracking-wide">
                                                Featured
                                            </span>
                                        @else
                                            <span class="text-gray-400 text-xs">-</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('admin.projects.edit', $project) }}" class="p-1 text-gray-500 hover:text-emerald-600 dark:text-zinc-400 dark:hover:text-emerald-400 transition" title="Edit Case Study">
                                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                                            </a>
                                            <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Are you sure you want to delete this case study?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1 text-gray-500 hover:text-rose-600 dark:text-zinc-400 dark:hover:text-rose-400 transition" title="Delete Case Study">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-12 text-center text-gray-500 dark:text-zinc-500">
                                        <i data-lucide="folder" class="w-12 h-12 mx-auto text-gray-300 dark:text-zinc-750 mb-3"></i>
                                        <p class="font-medium text-base">No projects found</p>
                                        <p class="text-xs text-gray-400 mt-1">Get started by creating your first portfolio project case study.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($projects->isNotEmpty())
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
