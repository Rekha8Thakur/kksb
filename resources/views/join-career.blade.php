<x-frontend-layout>
    <div class="min-h-screen bg-[#FAFAFA] py-12">
        <div class="max-w-3xl mx-auto px-6">
            
            <!-- Breadcrumbs -->
            <nav class="flex items-center space-x-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-6">
                <a href="/join-us" class="hover:text-[#FF6A00] transition">Join Us</a>
                <span>&mdash;</span>
                <span class="text-gray-900">Career Application</span>
            </nav>

            <!-- Header -->
            <div class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-4 mb-8">
                <div class="w-12 h-12 bg-zinc-100 rounded-full flex items-center justify-center text-zinc-700">
                    <i data-lucide="briefcase" class="w-6 h-6"></i>
                </div>
                <div class="space-y-2">
                    <h1 class="text-3xl font-black text-[#111111] tracking-tight">KKSB Creative Team</h1>
                    <p class="text-sm font-semibold text-[#FF6A00] uppercase tracking-wider">Hiring & Careers Form</p>
                    <p class="text-xs text-gray-500 leading-relaxed font-light pt-2">
                        Thank you for showing interest in working with KKSB Studios. We are looking for passionate, creative, disciplined, and growth-oriented individuals who want to build impactful content and creative projects with us.
                    </p>
                </div>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('join-career.store') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <!-- Honeypot Bot Protection -->
                <div style="display: none;">
                    <input type="text" name="honeypot" value="">
                </div>

                <!-- Step 1: Contact Details -->
                <div class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6">
                    <h2 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#111111] text-white flex items-center justify-center text-xs">1</span>
                        Contact Details
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div class="space-y-2">
                            <label for="name" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" required value="{{ old('name') }}" placeholder="Your first and last name"
                                   class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                            @error('name') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="space-y-2">
                            <label for="phone" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Phone Number <span class="text-red-500">*</span></label>
                            <input type="text" id="phone" name="phone" required value="{{ old('phone') }}" placeholder="WhatsApp/Contact number"
                                   class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                            @error('phone') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <!-- Email -->
                        <div class="space-y-2 col-span-1 md:col-span-2">
                            <label for="email" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" required value="{{ old('email') }}" placeholder="you@example.com"
                                   class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                            @error('email') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <!-- Current City -->
                        <div class="space-y-2 col-span-1 md:col-span-2">
                            <label for="city" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Current City / Location <span class="text-red-500">*</span></label>
                            <input type="text" id="city" name="city" required value="{{ old('city') }}" placeholder="Where are you currently located?"
                                   class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                            @error('city') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- Step 2: Role Details -->
                <div class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6">
                    <h2 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#111111] text-white flex items-center justify-center text-xs">2</span>
                        Role & Skills Selection
                    </h2>

                    <!-- Applying For -->
                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Applying For <span class="text-red-500">*</span></span>
                        <p class="text-xs text-gray-400 font-light -mt-2">Select all roles you are comfortable with</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @php
                                $roles = ['Video Editor', 'Video Editor + Camera Handling', 'Cinematic Videographer', 'Digital Marketing + Social Media Management', 'Content Research & Scripting', 'Graphic Designer'];
                                $oldRoles = old('applying_for', []);
                            @endphp
                            @foreach($roles as $role)
                                <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                    <input type="checkbox" name="applying_for[]" value="{{ $role }}" {{ in_array($role, $oldRoles) ? 'checked' : '' }} class="rounded text-[#FF6A00] focus:ring-[#FF6A00]">
                                    <span class="text-sm font-medium text-gray-800">{{ $role }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('applying_for') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Software Knowledge -->
                    <div class="space-y-2">
                        <label for="software_knowledge" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Software Knowledge You Have</label>
                        <textarea id="software_knowledge" name="software_knowledge" rows="3" placeholder="e.g. Adobe Premiere Pro, Adobe After Effects, Photoshop, Audition, DaVinci Resolve, Canva etc."
                                  class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl p-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition resize-none">{{ old('software_knowledge') }}</textarea>
                        @error('software_knowledge') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Experience Level -->
                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Experience Level <span class="text-red-500">*</span></span>
                        <p class="text-xs text-gray-400 font-light -mt-2">Select all that apply</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @php
                                $exps = ['0-6 Month', '1 Year', '2 Year', '3 + Year'];
                                $oldExps = old('experience_level', []);
                            @endphp
                            @foreach($exps as $exp)
                                <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                    <input type="checkbox" name="experience_level[]" value="{{ $exp }}" {{ in_array($exp, $oldExps) ? 'checked' : '' }} class="rounded text-[#FF6A00] focus:ring-[#FF6A00]">
                                    <span class="text-sm font-medium text-gray-800">{{ $exp }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('experience_level') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Step 3: Equipment & Logistics -->
                <div class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6">
                    <h2 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#111111] text-white flex items-center justify-center text-xs">3</span>
                        Equipment & Location Logistics
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Own Camera? -->
                        <div class="space-y-3">
                            <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Do you own a Camera?</span>
                            <div class="flex flex-col gap-2">
                                <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-3 cursor-pointer">
                                    <input type="radio" name="own_camera" value="Yes" {{ old('own_camera') === 'Yes' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                    <span class="text-sm font-medium text-gray-800">Yes</span>
                                </label>
                                <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-3 cursor-pointer">
                                    <input type="radio" name="own_camera" value="No" {{ old('own_camera') === 'No' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                    <span class="text-sm font-medium text-gray-800">No</span>
                                </label>
                            </div>
                        </div>

                        <!-- Own Gimbal? -->
                        <div class="space-y-3">
                            <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Do you own a Gimbal?</span>
                            <div class="flex flex-col gap-2">
                                <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-3 cursor-pointer">
                                    <input type="radio" name="own_gimbal" value="Yes" {{ old('own_gimbal') === 'Yes' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                    <span class="text-sm font-medium text-gray-800">Yes</span>
                                </label>
                                <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-3 cursor-pointer">
                                    <input type="radio" name="own_gimbal" value="No" {{ old('own_gimbal') === 'No' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                    <span class="text-sm font-medium text-gray-800">No</span>
                                </label>
                            </div>
                        </div>

                        <!-- Own Vehicle? -->
                        <div class="space-y-3">
                            <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Own vehicle for travel?</span>
                            <div class="flex flex-col gap-2">
                                <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-3 cursor-pointer">
                                    <input type="radio" name="own_vehicle" value="Yes" {{ old('own_vehicle') === 'Yes' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                    <span class="text-sm font-medium text-gray-800">Yes</span>
                                </label>
                                <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-3 cursor-pointer">
                                    <input type="radio" name="own_vehicle" value="No" {{ old('own_vehicle') === 'No' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                    <span class="text-sm font-medium text-gray-800">No</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Laptop specs -->
                    <div class="space-y-2">
                        <label for="laptop_specs" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Laptop/Desktop Specifications (For Freelancers)</label>
                        <textarea id="laptop_specs" name="laptop_specs" rows="3" placeholder="e.g. 16GB RAM, i7 Processor, RTX 3060 Graphics Card, 512GB SSD etc."
                                  class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl p-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition resize-none">{{ old('laptop_specs') }}</textarea>
                        @error('laptop_specs') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Relocate to Solan -->
                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Can you relocate/work from Solan if required?</span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="relocate_solan" value="Yes" {{ old('relocate_solan') === 'Yes' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Yes, I can relocate</span>
                            </label>
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="relocate_solan" value="No" {{ old('relocate_solan') === 'No' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">No, I prefer remote/other location</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Portfolio & Links -->
                <div class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6">
                    <h2 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#111111] text-white flex items-center justify-center text-xs">4</span>
                        Portfolio & Work Showcase
                    </h2>

                    <div class="space-y-4">
                        <!-- Instagram / Portfolio -->
                        <div class="space-y-2">
                            <label for="instagram" class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Instagram ID / Portfolio Link</label>
                            <input type="text" id="instagram" name="instagram" value="{{ old('instagram') }}" placeholder="Link to your portfolio site or Behance/Dribbble/Instagram profile"
                                   class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                            @error('instagram') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <!-- YouTube Work Link -->
                        <div class="space-y-2">
                            <label for="youtube" class="text-xs font-bold text-gray-700 uppercase tracking-wide block">YouTube Work Link (if any)</label>
                            <input type="text" id="youtube" name="youtube" value="{{ old('youtube') }}" placeholder="Link to a YouTube playlist or showreel video of your work"
                                   class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                            @error('youtube') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <!-- Previous Client Work -->
                        <div class="space-y-2">
                            <label for="previous_work" class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Previous Client Work (if any)</label>
                            <input type="text" id="previous_work" name="previous_work" value="{{ old('previous_work') }}" placeholder="Brief list or link to works delivered for past clients"
                                   class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                            @error('previous_work') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <!-- Step 5: Details & Resumes -->
                <div class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6">
                    <h2 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#111111] text-white flex items-center justify-center text-xs">5</span>
                        Compensation, Deadlines & Upload
                    </h2>

                    <!-- Comfort with deadlines -->
                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Are you comfortable with shoot deadlines and revisions?</span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="comfort_deadlines" value="Yes" {{ old('comfort_deadlines') === 'Yes' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Yes</span>
                            </label>
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="comfort_deadlines" value="No" {{ old('comfort_deadlines') === 'No' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">No</span>
                            </label>
                        </div>
                    </div>

                    <!-- Salary expected -->
                    <div class="space-y-2">
                        <label for="salary_expected" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Salary Expected?</label>
                        <input type="text" id="salary_expected" name="salary_expected" value="{{ old('salary_expected') }}" placeholder="Your expectations (e.g. ₹25000/month, Negotiable, or Freelance rates)"
                               class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                        @error('salary_expected') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Join availability -->
                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Available to Join From</span>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="join_availability" value="Immediate" {{ old('join_availability') === 'Immediate' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Immediate</span>
                            </label>
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="join_availability" value="Within 15 Days" {{ old('join_availability') === 'Within 15 Days' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Within 15 Days</span>
                            </label>
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="join_availability" value="Within 1 Month" {{ old('join_availability') === 'Within 1 Month' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Within 1 Month</span>
                            </label>
                        </div>
                    </div>

                    <!-- Upload Resumes -->
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Upload Your Resume (Optional)</label>
                        <p class="text-xs text-gray-400 font-light leading-relaxed">Provide up to 3 files (PDF, Word, or Zip formats). Max file size: 10MB per file.</p>
                        <input type="file" name="resumes[]" multiple accept=".pdf,.doc,.docx,.zip"
                               class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#FF6A00]/10 file:text-[#FF6A00] hover:file:bg-[#FF6A00]/20 file:cursor-pointer cursor-pointer border border-dashed border-gray-300 rounded-xl p-4">
                        @error('resumes') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        @error('resumes.*') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full bg-[#FF6A00] hover:bg-[#E55F00] text-white font-bold h-14 rounded-2xl text-sm transition duration-300 shadow-lg shadow-[#FF6A00]/25">
                    Submit Application
                </button>

            </form>
        </div>
    </div>
</x-frontend-layout>
