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
            <!-- Form -->
            <form method="POST" action="{{ route('join-career.store') }}" enctype="multipart/form-data" class="space-y-8"
                  x-data="{
                      step: 1,
                      maxStep: 5,
                      validateStep(stepNum) {
                          const container = document.getElementById('step-container-' + stepNum);
                          if (!container) return true;
                          
                          // Validate applying_for[]
                          const applyingCheckboxes = container.querySelectorAll('input[name=\'applying_for[]\']');
                          if (applyingCheckboxes.length > 0) {
                              const checked = Array.from(applyingCheckboxes).some(cb => cb.checked);
                              if (!checked) {
                                  applyingCheckboxes[0].setCustomValidity('Please select at least one role.');
                                  applyingCheckboxes[0].reportValidity();
                                  return false;
                              } else {
                                  applyingCheckboxes[0].setCustomValidity('');
                              }
                          }
                          
                          // Validate experience_level[]
                          const expCheckboxes = container.querySelectorAll('input[name=\'experience_level[]\']');
                          if (expCheckboxes.length > 0) {
                              const checked = Array.from(expCheckboxes).some(cb => cb.checked);
                              if (!checked) {
                                  expCheckboxes[0].setCustomValidity('Please select at least one experience level.');
                                  expCheckboxes[0].reportValidity();
                                  return false;
                              } else {
                                  expCheckboxes[0].setCustomValidity('');
                              }
                          }
                          
                          // Validate general inputs
                          const inputs = container.querySelectorAll('input, select, textarea');
                          for (let i = 0; i < inputs.length; i++) {
                              const input = inputs[i];
                              if (input.name === 'applying_for[]' || input.name === 'experience_level[]') continue;
                              if (!input.checkValidity()) {
                                  input.reportValidity();
                                  return false;
                              }
                          }
                          return true;
                      },
                      nextStep() {
                          if (this.validateStep(this.step)) {
                              if (this.step < this.maxStep) {
                                  this.step++;
                                  window.scrollTo({ top: 0, behavior: 'smooth' });
                              }
                          }
                      },
                      prevStep() {
                          if (this.step > 1) {
                              this.step--;
                              window.scrollTo({ top: 0, behavior: 'smooth' });
                          }
                      },
                      goToStep(targetStep) {
                          if (targetStep < this.step) {
                              this.step = targetStep;
                              window.scrollTo({ top: 0, behavior: 'smooth' });
                          } else if (targetStep > this.step) {
                              // Validate all steps between current step and targetStep - 1
                              for (let s = this.step; s < targetStep; s++) {
                                  if (!this.validateStep(s)) {
                                      return; // Stop at first invalid step
                                  }
                              }
                              this.step = targetStep;
                              window.scrollTo({ top: 0, behavior: 'smooth' });
                          }
                      },
                      clearValidity(name) {
                          const el = this.$el.querySelector(`input[name='${name}']`);
                          if (el) el.setCustomValidity('');
                      },
                      submitForm() {
                          for (let s = 1; s <= this.maxStep; s++) {
                              if (!this.validateStep(s)) {
                                  this.step = s;
                                  this.$nextTick(() => {
                                      this.validateStep(s);
                                  });
                                  return;
                              }
                          }
                          this.$el.submit();
                      }
                  }"
                  @submit.prevent="submitForm">
                @csrf
                
                <!-- Honeypot Bot Protection -->
                <div style="display: none;">
                    <input type="text" name="honeypot" value="">
                </div>

                <!-- Step Navigation Tabs -->
                <div class="bg-white border border-gray-150 rounded-3xl p-6 shadow-sm mb-8">
                    <div class="grid grid-cols-5 gap-2 md:gap-4">
                        <!-- Tab 1 -->
                        <button type="button" @click="goToStep(1)" 
                                class="flex flex-col items-center text-center p-3 rounded-2xl transition duration-300 relative group"
                                :class="step === 1 ? 'bg-[#FF6A00]/5 text-[#FF6A00]' : (step > 1 ? 'text-emerald-600 hover:bg-emerald-50/50' : 'text-gray-400 hover:bg-gray-50/50')">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold mb-2 transition"
                                 :class="step === 1 ? 'bg-[#FF6A00] text-white shadow-md shadow-[#FF6A00]/25' : (step > 1 ? 'bg-emerald-500 text-white' : 'bg-gray-100 text-gray-400 group-hover:bg-gray-200')">
                                <template x-if="step > 1">
                                    <svg class="w-4 h-4 stroke-current" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </template>
                                <template x-if="step <= 1">
                                    <span>1</span>
                                </template>
                            </div>
                            <span class="text-[10px] md:text-xs font-bold tracking-wide uppercase">Details</span>
                        </button>

                        <!-- Tab 2 -->
                        <button type="button" @click="goToStep(2)" 
                                class="flex flex-col items-center text-center p-3 rounded-2xl transition duration-300 relative group"
                                :class="step === 2 ? 'bg-[#FF6A00]/5 text-[#FF6A00]' : (step > 2 ? 'text-emerald-600 hover:bg-emerald-50/50' : 'text-gray-400 hover:bg-gray-50/50')">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold mb-2 transition"
                                 :class="step === 2 ? 'bg-[#FF6A00] text-white shadow-md shadow-[#FF6A00]/25' : (step > 2 ? 'bg-emerald-500 text-white' : 'bg-gray-100 text-gray-400 group-hover:bg-gray-200')">
                                <template x-if="step > 2">
                                    <svg class="w-4 h-4 stroke-current" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </template>
                                <template x-if="step <= 2">
                                    <span>2</span>
                                </template>
                            </div>
                            <span class="text-[10px] md:text-xs font-bold tracking-wide uppercase">Roles</span>
                        </button>

                        <!-- Tab 3 -->
                        <button type="button" @click="goToStep(3)" 
                                class="flex flex-col items-center text-center p-3 rounded-2xl transition duration-300 relative group"
                                :class="step === 3 ? 'bg-[#FF6A00]/5 text-[#FF6A00]' : (step > 3 ? 'text-emerald-600 hover:bg-emerald-50/50' : 'text-gray-400 hover:bg-gray-50/50')">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold mb-2 transition"
                                 :class="step === 3 ? 'bg-[#FF6A00] text-white shadow-md shadow-[#FF6A00]/25' : (step > 3 ? 'bg-emerald-500 text-white' : 'bg-gray-100 text-gray-400 group-hover:bg-gray-200')">
                                <template x-if="step > 3">
                                    <svg class="w-4 h-4 stroke-current" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </template>
                                <template x-if="step <= 3">
                                    <span>3</span>
                                </template>
                            </div>
                            <span class="text-[10px] md:text-xs font-bold tracking-wide uppercase">Logistics</span>
                        </button>

                        <!-- Tab 4 -->
                        <button type="button" @click="goToStep(4)" 
                                class="flex flex-col items-center text-center p-3 rounded-2xl transition duration-300 relative group"
                                :class="step === 4 ? 'bg-[#FF6A00]/5 text-[#FF6A00]' : (step > 4 ? 'text-emerald-600 hover:bg-emerald-50/50' : 'text-gray-400 hover:bg-gray-50/50')">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold mb-2 transition"
                                 :class="step === 4 ? 'bg-[#FF6A00] text-white shadow-md shadow-[#FF6A00]/25' : (step > 4 ? 'bg-emerald-500 text-white' : 'bg-gray-100 text-gray-400 group-hover:bg-gray-200')">
                                <template x-if="step > 4">
                                    <svg class="w-4 h-4 stroke-current" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </template>
                                <template x-if="step <= 4">
                                    <span>4</span>
                                </template>
                            </div>
                            <span class="text-[10px] md:text-xs font-bold tracking-wide uppercase">Portfolio</span>
                        </button>

                        <!-- Tab 5 -->
                        <button type="button" @click="goToStep(5)" 
                                class="flex flex-col items-center text-center p-3 rounded-2xl transition duration-300 relative group"
                                :class="step === 5 ? 'bg-[#FF6A00]/5 text-[#FF6A00]' : 'text-gray-400'">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold mb-2 transition"
                                 :class="step === 5 ? 'bg-[#FF6A00] text-white shadow-md shadow-[#FF6A00]/25' : 'bg-gray-100 text-gray-400 group-hover:bg-gray-200'">
                                <span>5</span>
                            </div>
                            <span class="text-[10px] md:text-xs font-bold tracking-wide uppercase">Compensation</span>
                        </button>
                    </div>

                    <!-- Progress Bar indicator -->
                    <div class="w-full bg-gray-100 h-1.5 rounded-full mt-4 overflow-hidden">
                        <div class="bg-[#FF6A00] h-full transition-all duration-500 rounded-full" 
                             :style="'width: ' + ((step - 1) / (maxStep - 1) * 100) + '%'"></div>
                    </div>
                </div>

                <!-- Step 1: Contact Details -->
                <div id="step-container-1" x-show="step === 1" x-transition.opacity.duration.300ms class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6" style="display: block;">
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

                    <!-- Actions -->
                    <div class="pt-4 flex justify-end">
                        <button type="button" @click="nextStep()" class="bg-[#FF6A00] hover:bg-[#E55F00] text-white font-bold h-12 px-8 rounded-xl text-sm transition duration-300 shadow-md shadow-[#FF6A00]/20">
                            Next Step &rarr;
                        </button>
                    </div>
                </div>

                <!-- Step 2: Role Details -->
                <div id="step-container-2" x-show="step === 2" x-transition.opacity.duration.300ms class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6" style="display: none;">
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
                                    <input type="checkbox" name="applying_for[]" value="{{ $role }}" {{ in_array($role, $oldRoles) ? 'checked' : '' }} @change="clearValidity('applying_for[]')" class="rounded text-[#FF6A00] focus:ring-[#FF6A00]">
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
                                    <input type="checkbox" name="experience_level[]" value="{{ $exp }}" {{ in_array($exp, $oldExps) ? 'checked' : '' }} @change="clearValidity('experience_level[]')" class="rounded text-[#FF6A00] focus:ring-[#FF6A00]">
                                    <span class="text-sm font-medium text-gray-800">{{ $exp }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('experience_level') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Actions -->
                    <div class="pt-4 flex justify-between items-center">
                        <button type="button" @click="prevStep()" class="border border-gray-300 hover:border-gray-400 text-gray-700 font-semibold h-12 px-6 rounded-xl text-sm transition">
                            &larr; Previous
                        </button>
                        <button type="button" @click="nextStep()" class="bg-[#FF6A00] hover:bg-[#E55F00] text-white font-bold h-12 px-8 rounded-xl text-sm transition duration-300 shadow-md shadow-[#FF6A00]/20">
                            Next Step &rarr;
                        </button>
                    </div>
                </div>

                <!-- Step 3: Equipment & Logistics -->
                <div id="step-container-3" x-show="step === 3" x-transition.opacity.duration.300ms class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6" style="display: none;">
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

                    <!-- Actions -->
                    <div class="pt-4 flex justify-between items-center">
                        <button type="button" @click="prevStep()" class="border border-gray-300 hover:border-gray-400 text-gray-700 font-semibold h-12 px-6 rounded-xl text-sm transition">
                            &larr; Previous
                        </button>
                        <button type="button" @click="nextStep()" class="bg-[#FF6A00] hover:bg-[#E55F00] text-white font-bold h-12 px-8 rounded-xl text-sm transition duration-300 shadow-md shadow-[#FF6A00]/20">
                            Next Step &rarr;
                        </button>
                    </div>
                </div>

                <!-- Step 4: Portfolio & Links -->
                <div id="step-container-4" x-show="step === 4" x-transition.opacity.duration.300ms class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6" style="display: none;">
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

                    <!-- Actions -->
                    <div class="pt-4 flex justify-between items-center">
                        <button type="button" @click="prevStep()" class="border border-gray-300 hover:border-gray-400 text-gray-700 font-semibold h-12 px-6 rounded-xl text-sm transition">
                            &larr; Previous
                        </button>
                        <button type="button" @click="nextStep()" class="bg-[#FF6A00] hover:bg-[#E55F00] text-white font-bold h-12 px-8 rounded-xl text-sm transition duration-300 shadow-md shadow-[#FF6A00]/20">
                            Next Step &rarr;
                        </button>
                    </div>
                </div>

                <!-- Step 5: Compensation, Deadlines & Upload -->
                <div id="step-container-5" x-show="step === 5" x-transition.opacity.duration.300ms class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6" style="display: none;">
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

                    <!-- Actions -->
                    <div class="pt-4 flex justify-between items-center gap-4">
                        <button type="button" @click="prevStep()" class="border border-gray-300 hover:border-gray-400 text-gray-700 font-semibold h-14 px-6 rounded-2xl text-sm transition">
                            &larr; Previous
                        </button>
                        <button type="submit" class="flex-1 bg-[#FF6A00] hover:bg-[#E55F00] text-white font-bold h-14 rounded-2xl text-sm transition duration-300 shadow-lg shadow-[#FF6A00]/25">
                            Submit Application
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-frontend-layout>
