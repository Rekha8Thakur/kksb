<x-frontend-layout>
    
    <!-- Hero Header -->
    <section class="bg-[#F8F8F8] py-20 border-b border-gray-150">
        <div class="max-w-4xl mx-auto px-6 text-center space-y-6">
            <span class="text-xs font-bold text-zinc-600 uppercase tracking-widest block">Work With Us</span>
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight leading-tight">
                <span class="text-[#111111]">Grow Your Career</span> <span class="text-gray-400">At KKSB</span>
            </h1>
            <p class="text-base sm:text-lg text-gray-500 leading-relaxed max-w-2xl mx-auto">
                We are always looking for creative talent in Solan and beyond: video editors, strategists, developers and copywriters.
            </p>
        </div>
    </section>

    <!-- Job vacancies and apply logic -->
    <section class="py-24 bg-white" x-data="{ openApplyModal: false, activeJobId: null, activeJobTitle: '' }">
        <div class="max-w-4xl mx-auto px-6 space-y-12">
            
            <h3 class="text-2xl font-bold tracking-tight text-gray-900 border-b border-gray-100 pb-4">Open Vacancies</h3>

            <div class="divide-y divide-gray-150 space-y-8">
                @forelse($jobs as $job)
                    <div class="pt-8 first:pt-0 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6" data-aos="fade-up">
                        <div class="space-y-3">
                            <h4 class="text-xl font-bold text-gray-900 leading-snug">{{ $job->title }}</h4>
                            <div class="text-xs text-gray-500 font-semibold flex items-center space-x-4">
                                <span>{{ $job->location }}</span>
                                <span>•</span>
                                <span class="capitalize">{{ $job->type }}</span>
                                @if($job->closes_at)
                                    <span>•</span>
                                    <span>Closes: {{ $job->closes_at->format('M d, Y') }}</span>
                                @endif
                            </div>
                            <p class="text-xs text-gray-400 leading-relaxed max-w-xl">
                                {{ $job->description }}
                            </p>
                            @if(!empty($job->requirements))
                                <div class="pt-2">
                                    <span class="text-[10px] uppercase font-bold text-zinc-600 tracking-wider block">Requirements:</span>
                                    <ul class="list-disc pl-4 text-[10px] text-gray-500 space-y-0.5 mt-1 font-semibold">
                                        @foreach($job->requirements as $req)
                                            <li>{{ $req }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div>
                            <button @click="activeJobId = {{ $job->id }}; activeJobTitle = '{{ $job->title }}'; openApplyModal = true"
                                    class="inline-flex items-center space-x-1.5 bg-[#111111] hover:bg-zinc-800 text-white text-xs font-bold px-6 py-3 rounded-full transition shadow-sm">
                                <span>Apply Now</span>
                                <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="py-16 text-center text-gray-500">
                        <i data-lucide="briefcase" class="w-12 h-12 mx-auto text-gray-300 mb-3"></i>
                        <p class="font-medium text-base">No open vacancies at the moment.</p>
                        <p class="text-xs text-gray-400 mt-1">Keep an eye on this page or send a speculative application to hello@kksbstudios.com</p>
                    </div>
                @endforelse
            </div>

            <!-- Apply Modal Window -->
            <div x-show="openApplyModal" class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 bg-black/60" style="display: none;">
                <div class="bg-white border border-gray-150 rounded-3xl max-w-md w-full shadow-2xl overflow-hidden p-6 lg:p-8" @click.away="openApplyModal = false">
                    
                    <div class="flex justify-between items-center mb-6">
                        <div class="space-y-1">
                            <h3 class="text-lg font-bold text-gray-900">Submit Application</h3>
                            <p class="text-xs text-zinc-700 font-semibold" x-text="'Position: ' + activeJobTitle"></p>
                        </div>
                        <button @click="openApplyModal = false" class="text-gray-400 hover:text-gray-600"><i data-lucide="x" class="w-5 h-5"></i></button>
                    </div>

                    <form method="POST" action="/careers/apply" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <input type="hidden" name="career_job_id" :value="activeJobId">

                        <div class="space-y-1">
                            <label class="text-[10px] font-bold text-gray-500 uppercase">Full Name</label>
                            <input type="text" name="name" required placeholder="e.g. Kuldeep Sharma" 
                                   class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-2.5 text-xs text-[#111111] focus:ring-zinc-800 focus:border-zinc-800">
                        </div>

                        <div class="space-y-1">
                            <label class="text-[10px] font-bold text-gray-500 uppercase">Email Address</label>
                            <input type="email" name="email" required placeholder="e.g. kuldeep@gmail.com" 
                                   class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-2.5 text-xs text-[#111111] focus:ring-zinc-800 focus:border-zinc-800">
                        </div>

                        <div class="space-y-1">
                            <label class="text-[10px] font-bold text-gray-500 uppercase">Phone Number</label>
                            <input type="text" name="phone" placeholder="e.g. +91 78761 00000" 
                                   class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-2.5 text-xs text-[#111111] focus:ring-zinc-800 focus:border-zinc-800">
                        </div>

                        <div class="space-y-1">
                            <label class="text-[10px] font-bold text-gray-500 uppercase">Upload Resume (PDF, Max 10MB)</label>
                            <input type="file" name="resume" accept="application/pdf" required 
                                   class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-2 text-xs text-gray-500 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-zinc-950 file:text-white">
                        </div>

                        <div class="space-y-1">
                            <label class="text-[10px] font-bold text-gray-500 uppercase">Cover Letter / Note</label>
                            <textarea name="cover_letter" rows="3" placeholder="Brief outline of your background and why you wish to join us..."
                                      class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-2 text-xs text-[#111111] focus:ring-zinc-800 focus:border-zinc-800"></textarea>
                        </div>

                        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-100">
                            <button type="button" @click="openApplyModal = false" class="px-4 py-2 border border-gray-300 hover:bg-gray-100 rounded-xl text-xs font-semibold text-gray-700">Cancel</button>
                            <button type="submit" class="bg-[#111111] hover:bg-zinc-800 text-white font-bold text-xs px-5 py-2.5 rounded-xl transition shadow-sm">Send Resume</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

</x-frontend-layout>
