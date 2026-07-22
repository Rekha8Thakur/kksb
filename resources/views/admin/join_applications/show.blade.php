<x-admin-layout>
    <x-slot name="title">View Application Detail</x-slot>

    <div class="max-w-2xl mx-auto space-y-6">
        <!-- Header Links -->
        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-zinc-400">
            <a href="{{ route('admin.join-applications.index') }}" class="hover:underline">Join Applications</a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white font-semibold">Application Detail</span>
        </div>

        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Application Details</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Submitted: {{ $application->created_at->format('M d, Y H:i:s') }}</p>
        </div>

        <!-- Details Card -->
        <div class="bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 rounded-2xl shadow-sm p-6 lg:p-8 space-y-6">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Applicant Basic Info -->
                <div class="space-y-1">
                    <div class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Applicant Info</div>
                    <div class="font-bold text-gray-900 dark:text-white text-base">{{ $application->name }}</div>
                    <div class="text-sm text-gray-600 dark:text-zinc-350">{{ $application->email }}</div>
                    <div class="text-sm text-gray-600 dark:text-zinc-350">{{ $application->phone ?? 'No phone provided' }}</div>
                </div>

                <!-- Application Type & Links -->
                <div class="space-y-1">
                    <div class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Application context</div>
                    <div class="text-sm text-gray-700 dark:text-zinc-300">
                        Type: 
                        @if($application->type === 'influencer')
                            <span class="font-bold text-purple-600 dark:text-purple-400">Influencer Partner</span>
                        @else
                            <span class="font-bold text-blue-600 dark:text-blue-400">Careers & Internships</span>
                        @endif
                    </div>
                    
                    @if($application->type === 'career' && $application->position)
                        <div class="text-sm text-gray-700 dark:text-zinc-300">Position: <span class="font-semibold">{{ $application->position }}</span></div>
                    @endif

                    @if($application->type === 'influencer' && $application->social_link)
                        <div class="text-sm text-gray-700 dark:text-zinc-300 pt-1">
                            Social Profile: 
                            <a href="{{ $application->social_link }}" target="_blank" class="font-semibold text-amber-600 hover:underline inline-flex items-center space-x-1">
                                <span>Link</span>
                                <i data-lucide="external-link" class="w-3 h-3"></i>
                            </a>
                        </div>
                    @elseif($application->type === 'career' && $application->resume_link)
                        <div class="text-sm text-gray-700 dark:text-zinc-300 pt-1">
                            Resume/Portfolio: 
                            <a href="{{ $application->resume_link }}" target="_blank" class="font-semibold text-blue-600 hover:underline inline-flex items-center space-x-1">
                                <span>View File/Link</span>
                                <i data-lucide="external-link" class="w-3 h-3"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Message / Cover letter -->
            @if($application->message)
                <div class="border-t border-gray-100 dark:border-zinc-850 pt-6 space-y-2">
                    <div class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Applicant Message / Cover Details</div>
                    <div class="bg-gray-50 dark:bg-zinc-850 p-4 rounded-xl text-gray-800 dark:text-zinc-200 text-sm whitespace-pre-line leading-relaxed">
                        {{ $application->message }}
                    </div>
                </div>
            @endif

            <!-- Action Status updating -->
            <div class="border-t border-gray-100 dark:border-zinc-850 pt-6 flex items-center justify-between">
                <!-- Change status -->
                <form action="{{ route('admin.join-applications.status', $application) }}" method="POST" class="flex items-center space-x-2">
                    @csrf
                    <label for="status" class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Mark as</label>
                    <select name="status" onchange="this.form.submit()" 
                            class="text-xs bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-lg px-2.5 py-1.5 focus:ring-emerald-500">
                        <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="reviewed" {{ $application->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                        <option value="archived" {{ $application->status === 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                </form>

                <div class="flex space-x-2">
                    <a href="mailto:{{ $application->email }}?subject=Reply to your application to KKSB Studios" class="inline-flex items-center space-x-1 bg-[#111111] hover:bg-[#222222] text-white text-xs font-semibold px-4 py-2 rounded-lg transition shadow-sm">
                        <i data-lucide="mail" class="w-3.5 h-3.5"></i>
                        <span>Contact via Email</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
