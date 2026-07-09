<x-admin-layout>
    <x-slot name="title">Manage Careers & Jobs</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Careers & Job Board</h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Post open job vacancies, manage requirements and review applicant profiles.</p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('admin.careers.applications') }}" class="inline-flex items-center justify-center space-x-2 border border-gray-300 dark:border-zinc-700 bg-white dark:bg-zinc-900 text-gray-700 dark:text-zinc-300 hover:bg-gray-150 text-sm font-semibold px-4 py-2.5 rounded-xl transition">
                    <i data-lucide="users" class="w-4 h-4"></i>
                    <span>All Applications</span>
                </a>
                <a href="{{ route('admin.careers.create') }}" class="inline-flex items-center justify-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition shadow-sm">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i>
                    <span>Post New Job</span>
                </a>
            </div>
        </div>

        <!-- Jobs Grid List -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($jobs as $job)
                <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6 flex flex-col justify-between space-y-4">
                    <div>
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white">{{ $job->title }}</h3>
                                <div class="text-xs text-gray-400 mt-1">
                                    {{ $job->location }} • <span class="capitalize">{{ $job->type }}</span>
                                </div>
                            </div>
                            <span class="inline-flex px-2 py-0.5 text-[10px] font-bold rounded-full {{ $job->is_active ? 'bg-emerald-50 dark:bg-emerald-950/30 text-emerald-700 dark:text-emerald-400 border border-emerald-100 dark:border-emerald-900/30' : 'bg-zinc-150 dark:bg-zinc-800 text-zinc-500 border border-zinc-200' }}">
                                {{ $job->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 dark:text-zinc-350 line-clamp-3 mt-3">
                            {{ $job->description }}
                        </p>
                    </div>

                    <div class="border-t border-gray-100 dark:border-zinc-800 pt-4 flex items-center justify-between">
                        <a href="{{ route('admin.careers.applications', $job) }}" class="text-xs text-emerald-600 dark:text-emerald-400 font-bold hover:underline flex items-center space-x-1">
                            <i data-lucide="users" class="w-3.5 h-3.5"></i>
                            <span>{{ $job->applications_count }} Applications Received</span>
                        </a>

                        <div class="flex space-x-2">
                            <a href="{{ route('admin.careers.edit', $job) }}" class="p-1 text-gray-500 hover:text-emerald-600 transition" title="Edit Job Opening">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.careers.destroy', $job) }}" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1 text-gray-500 hover:text-rose-600 transition" title="Delete Job Opening">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 rounded-2xl p-12 text-center text-gray-500 dark:text-zinc-550">
                    <i data-lucide="briefcase" class="w-12 h-12 mx-auto text-gray-300 dark:text-zinc-750 mb-3"></i>
                    <p class="font-medium text-base">No job openings found</p>
                </div>
            @endforelse
        </div>
    </div>
</x-admin-layout>
