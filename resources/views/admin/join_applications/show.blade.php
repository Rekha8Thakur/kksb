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

            <!-- Custom Form Data (KKSB Creative Faces & Careers Form Fields) -->
            @if($application->form_data)
                <div class="border-t border-gray-100 dark:border-zinc-850 pt-6 space-y-6">
                    <div class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Additional Profile Fields</div>
                    
                    @if($application->type === 'influencer')
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Age</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['age'] ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Gender</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['gender'] ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Current City</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['city'] ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Camera Comfort</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['comfortable_camera'] ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Past Acting/Modeling Experience</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['past_experience'] ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Comfortable Traveling Nearby</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['travel_comfort'] ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800 col-span-1 sm:col-span-2">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Main Goals / Seeking</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['seeking'] ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Okay with Unpaid Trials</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['trial_ok'] ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Shoot Availability</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['availability'] ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Role Type Comfort</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['role_comfort'] ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Expected Pay per Shoot</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['expected_amount'] ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800 col-span-1 sm:col-span-2">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Usage Agreement</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['usage_permission'] ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <!-- Shoot Types Comfort List -->
                        <div class="bg-gray-50 dark:bg-zinc-850 p-4 rounded-xl border border-gray-100 dark:border-zinc-800 text-sm space-y-1.5">
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Comfortable Shoot Types</span>
                            <div class="flex flex-wrap gap-2 pt-1">
                                @if(isset($application->form_data['shoot_comfort']) && is_array($application->form_data['shoot_comfort']))
                                    @foreach($application->form_data['shoot_comfort'] as $item)
                                        <span class="bg-[#FF6A00]/10 text-[#FF6A00] text-xs font-semibold px-2.5 py-1 rounded-md">{{ $item }}</span>
                                    @endforeach
                                @else
                                    <p class="text-xs text-gray-500">None specified</p>
                                @endif
                            </div>
                        </div>

                        <!-- Spoken Languages -->
                        <div class="bg-gray-50 dark:bg-zinc-850 p-4 rounded-xl border border-gray-100 dark:border-zinc-800 text-sm space-y-1.5">
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Spoken Languages</span>
                            <div class="flex flex-wrap gap-2 pt-1">
                                @if(isset($application->form_data['languages']) && is_array($application->form_data['languages']))
                                    @foreach($application->form_data['languages'] as $lang)
                                        <span class="bg-gray-200 dark:bg-zinc-800 text-gray-800 dark:text-zinc-200 text-xs font-semibold px-2.5 py-1 rounded-md">{{ $lang }}</span>
                                    @endforeach
                                @else
                                    <p class="text-xs text-gray-500">None specified</p>
                                @endif
                            </div>
                        </div>

                        <!-- Restrictions -->
                        <div class="bg-gray-50 dark:bg-zinc-850 p-4 rounded-xl border border-gray-100 dark:border-zinc-800 text-sm space-y-1">
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Restrictions / Comfort Limits</span>
                            <p class="text-gray-900 dark:text-white font-medium">{{ $application->form_data['restrictions'] ?? 'None specified' }}</p>
                        </div>

                        <!-- Photo Assets Gallery Grid -->
                        @if(isset($application->form_data['photos']) && is_array($application->form_data['photos']))
                            <div class="space-y-2 pt-2">
                                <span class="text-xs text-gray-400 font-semibold uppercase tracking-wider block">Uploaded Photos ({{ count($application->form_data['photos']) }})</span>
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                    @foreach($application->form_data['photos'] as $photoUrl)
                                        <a href="{{ asset($photoUrl) }}" target="_blank" class="block aspect-square rounded-lg overflow-hidden border border-gray-200 dark:border-zinc-800 shadow-sm hover:shadow-lg transition">
                                            <img src="{{ asset($photoUrl) }}" class="w-full h-full object-cover" alt="Uploaded Portfolio Photo">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Intro Video Asset Player -->
                        @if(!empty($application->form_data['intro_video']))
                            <div class="space-y-2 pt-2">
                                <span class="text-xs text-gray-400 font-semibold uppercase tracking-wider block">Introduction Video</span>
                                <div class="rounded-xl overflow-hidden border border-gray-200 dark:border-zinc-800 max-w-md bg-black">
                                    <video controls class="w-full h-auto">
                                        <source src="{{ asset($application->form_data['intro_video']) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        @endif
                    
                    @elseif($application->type === 'career')
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Current City</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['city'] ?? 'N/A' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Own Camera?</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['own_camera'] ?? 'No' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Own Gimbal?</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['own_gimbal'] ?? 'No' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Own Vehicle?</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['own_vehicle'] ?? 'No' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Can Relocate to Solan?</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['relocate_solan'] ?? 'No' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Comfortable with Deadlines/Revisions?</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['comfort_deadlines'] ?? 'Yes' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Expected Salary</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['salary_expected'] ?? 'Negotiable' }}</p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Available to Join From</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">{{ $application->form_data['join_availability'] ?? 'Immediate' }}</p>
                            </div>
                        </div>

                        <!-- Roles Applying For -->
                        <div class="bg-gray-50 dark:bg-zinc-850 p-4 rounded-xl border border-gray-100 dark:border-zinc-800 text-sm space-y-1.5">
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Applying For Roles</span>
                            <div class="flex flex-wrap gap-2 pt-1">
                                @if(isset($application->form_data['applying_for']) && is_array($application->form_data['applying_for']))
                                    @foreach($application->form_data['applying_for'] as $role)
                                        <span class="bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs font-semibold px-2.5 py-1 rounded-md">{{ $role }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- Experience Level List -->
                        <div class="bg-gray-50 dark:bg-zinc-850 p-4 rounded-xl border border-gray-100 dark:border-zinc-800 text-sm space-y-1.5">
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Experience Level</span>
                            <div class="flex flex-wrap gap-2 pt-1">
                                @if(isset($application->form_data['experience_level']) && is_array($application->form_data['experience_level']))
                                    @foreach($application->form_data['experience_level'] as $exp)
                                        <span class="bg-[#FF6A00]/10 text-[#FF6A00] text-xs font-semibold px-2.5 py-1 rounded-md">{{ $exp }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- YouTube / Client Work Links -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">YouTube Work Link</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">
                                    @if(!empty($application->form_data['youtube']))
                                        <a href="{{ $application->form_data['youtube'] }}" target="_blank" class="text-blue-600 hover:underline flex items-center gap-1.5">
                                            <span>View Link</span>
                                            <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>
                            <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800">
                                <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Previous Client Work Link</span>
                                <p class="font-semibold text-gray-900 dark:text-white mt-0.5">
                                    @if(!empty($application->form_data['previous_work']))
                                        <a href="{{ $application->form_data['previous_work'] }}" target="_blank" class="text-blue-600 hover:underline flex items-center gap-1.5">
                                            <span>View Link</span>
                                            <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </p>
                            </div>
                        </div>

                        <!-- Software Knowledge -->
                        <div class="bg-gray-50 dark:bg-zinc-850 p-4 rounded-xl border border-gray-100 dark:border-zinc-800 text-sm space-y-1">
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Software Knowledge</span>
                            <p class="text-gray-900 dark:text-white font-medium whitespace-pre-line leading-relaxed">{{ $application->form_data['software_knowledge'] ?? 'None specified' }}</p>
                        </div>

                        <!-- Laptop Specs -->
                        <div class="bg-gray-50 dark:bg-zinc-850 p-4 rounded-xl border border-gray-100 dark:border-zinc-800 text-sm space-y-1">
                            <span class="text-[10px] text-gray-400 font-bold uppercase tracking-wider block">Laptop/Desktop Specifications</span>
                            <p class="text-gray-900 dark:text-white font-medium whitespace-pre-line leading-relaxed">{{ $application->form_data['laptop_specs'] ?? 'None specified' }}</p>
                        </div>

                        <!-- Uploaded Resumes / Portfolios -->
                        @if(isset($application->form_data['resumes']) && is_array($application->form_data['resumes']) && count($application->form_data['resumes']) > 0)
                            <div class="space-y-2 pt-2">
                                <span class="text-xs text-gray-400 font-semibold uppercase tracking-wider block">Uploaded Resume / Document Files</span>
                                <div class="space-y-2">
                                    @foreach($application->form_data['resumes'] as $index => $resumeUrl)
                                        <div class="bg-gray-50 dark:bg-zinc-850 p-3.5 rounded-xl border border-gray-100 dark:border-zinc-800 flex items-center justify-between text-sm">
                                            <div class="flex items-center space-x-2.5">
                                                <i data-lucide="file-text" class="w-5 h-5 text-red-500"></i>
                                                <span class="font-medium text-gray-800 dark:text-zinc-200">Attachment #{{ $index + 1 }}</span>
                                            </div>
                                            <a href="{{ asset($resumeUrl) }}" target="_blank" class="inline-flex items-center space-x-1.5 text-xs font-bold text-blue-600 hover:underline">
                                                <span>Download / View</span>
                                                <i data-lucide="download" class="w-3.5 h-3.5"></i>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif
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
