<x-admin-layout>
    <x-slot name="title">Job Applications</x-slot>

    <div class="space-y-6">
        <!-- Header -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-zinc-400">
            <a href="{{ route('admin.careers.index') }}" class="hover:underline">Careers</a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white font-semibold">Applications</span>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">
                    @if($job)
                        Applications for: {{ $job->title }}
                    @else
                        All Job Applications
                    @endif
                </h1>
                <p class="text-sm text-gray-500 dark:text-zinc-400">Review resumes and update applicant screening status details.</p>
            </div>
        </div>

        <!-- Applications Table List -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-700 dark:text-zinc-300">
                    <thead class="text-xs font-bold text-gray-500 uppercase bg-gray-50 dark:bg-zinc-800/50">
                        <tr>
                            <th class="px-6 py-4">Applicant Name</th>
                            <th class="px-6 py-4">Contact Info</th>
                            <th class="px-6 py-4">Applied Job Role</th>
                            <th class="px-6 py-4">Resume / Files</th>
                            <th class="px-6 py-4">Date Applied</th>
                            <th class="px-6 py-4">Screening Status</th>
                            <th class="px-6 py-4 text-right">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-zinc-800">
                        @forelse($applications as $application)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-zinc-850/30">
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $application->name }}</td>
                                <td class="px-6 py-4">
                                    <div class="text-xs text-gray-700 dark:text-zinc-300">{{ $application->email }}</div>
                                    <div class="text-[10px] text-gray-400">{{ $application->phone ?? '-' }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-xs bg-zinc-100 dark:bg-zinc-850 px-2.5 py-1 rounded font-medium text-gray-800 dark:text-zinc-300">
                                        {{ $application->job->title }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ asset($application->resume_path) }}" target="_blank" class="inline-flex items-center space-x-1 text-xs text-emerald-600 dark:text-emerald-400 font-bold hover:underline">
                                        <i data-lucide="file-text" class="w-4 h-4"></i>
                                        <span>Download PDF</span>
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-gray-500 dark:text-zinc-400 text-xs">
                                    {{ $application->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.careers.applications.status', $application) }}" method="POST" class="inline-block">
                                        @csrf
                                        <select name="status" onchange="this.form.submit()" 
                                                class="text-xs bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-lg px-2 py-1 focus:ring-emerald-500">
                                            <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="reviewed" {{ $application->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                            <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                            <option value="hired" {{ $application->status === 'hired' ? 'selected' : '' }}>Hired</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form method="POST" action="{{ route('admin.careers.applications.destroy', $application) }}" onsubmit="return confirm('Delete this job application?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1 text-gray-500 hover:text-rose-600 transition">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-500 dark:text-zinc-550">
                                    <i data-lucide="users" class="w-12 h-12 mx-auto text-gray-300 dark:text-zinc-750 mb-3"></i>
                                    <p class="font-medium text-base">No job applications found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
