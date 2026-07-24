<x-frontend-layout>
    <div class="min-h-screen bg-[#FAFAFA] py-12">
        <div class="max-w-3xl mx-auto px-6">
            
            <!-- Breadcrumbs -->
            <nav class="flex items-center space-x-2 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-6">
                <a href="/join-us" class="hover:text-[#FF6A00] transition">Join Us</a>
                <span>&mdash;</span>
                <span class="text-gray-900">Influencer Application</span>
            </nav>

            <!-- Header -->
            <div class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-4 mb-8">
                <div class="w-12 h-12 bg-[#FF6A00]/10 rounded-full flex items-center justify-center text-[#FF6A00]">
                    <i data-lucide="camera" class="w-6 h-6"></i>
                </div>
                <div class="space-y-2">
                    <h1 class="text-3xl font-black text-[#111111] tracking-tight">KKSB Creative Faces</h1>
                    <p class="text-sm font-semibold text-[#FF6A00] uppercase tracking-wider">Registration Form</p>
                    <p class="text-xs text-gray-500 leading-relaxed font-light pt-2">
                        Become a KKSB Studio Model/Creator partner. Share your details, photo/video assets, and availability to join our upcoming commercial, tourism, and brand campaigns.
                    </p>
                </div>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('join-influencer.store') }}" enctype="multipart/form-data" class="space-y-8"
                  x-data="{
                      step: 1,
                      maxStep: 4,
                      validateStep(stepNum) {
                          const container = document.getElementById('step-container-' + stepNum);
                          if (!container) return true;
                          
                          // Validate shoot_comfort[]
                          const shootCheckboxes = container.querySelectorAll('input[name=\'shoot_comfort[]\']');
                          if (shootCheckboxes.length > 0) {
                              const checked = Array.from(shootCheckboxes).some(cb => cb.checked);
                              if (!checked) {
                                  shootCheckboxes[0].setCustomValidity('Please select at least one shoot type.');
                                  shootCheckboxes[0].reportValidity();
                                  return false;
                              } else {
                                  shootCheckboxes[0].setCustomValidity('');
                              }
                          }
                          
                          // Validate languages[]
                          const langCheckboxes = container.querySelectorAll('input[name=\'languages[]\']');
                          if (langCheckboxes.length > 0) {
                              const checked = Array.from(langCheckboxes).some(cb => cb.checked);
                              if (!checked) {
                                  langCheckboxes[0].setCustomValidity('Please select at least one language.');
                                  langCheckboxes[0].reportValidity();
                                  return false;
                              } else {
                                  langCheckboxes[0].setCustomValidity('');
                              }
                          }
                          
                          // Validate general inputs
                          const inputs = container.querySelectorAll('input, select, textarea');
                          for (let i = 0; i < inputs.length; i++) {
                              const input = inputs[i];
                              if (input.name === 'shoot_comfort[]' || input.name === 'languages[]') continue;
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
                    <div class="grid grid-cols-4 gap-2 md:gap-4">
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
                            <span class="text-[10px] md:text-xs font-bold tracking-wide uppercase">Experience</span>
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
                            <span class="text-[10px] md:text-xs font-bold tracking-wide uppercase">Availability</span>
                        </button>

                        <!-- Tab 4 -->
                        <button type="button" @click="goToStep(4)" 
                                class="flex flex-col items-center text-center p-3 rounded-2xl transition duration-300 relative group"
                                :class="step === 4 ? 'bg-[#FF6A00]/5 text-[#FF6A00]' : 'text-gray-400'">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold mb-2 transition"
                                 :class="step === 4 ? 'bg-[#FF6A00] text-white shadow-md shadow-[#FF6A00]/25' : 'bg-gray-100 text-gray-400 group-hover:bg-gray-200'">
                                <span>4</span>
                            </div>
                            <span class="text-[10px] md:text-xs font-bold tracking-wide uppercase">Portfolio</span>
                        </button>
                    </div>

                    <!-- Progress Bar indicator -->
                    <div class="w-full bg-gray-100 h-1.5 rounded-full mt-4 overflow-hidden">
                        <div class="bg-[#FF6A00] h-full transition-all duration-500 rounded-full" 
                             :style="'width: ' + ((step - 1) / (maxStep - 1) * 100) + '%'"></div>
                    </div>
                </div>

                <!-- Step 1: Basic Information -->
                <div id="step-container-1" x-show="step === 1" x-transition.opacity.duration.300ms class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6" style="display: block;">
                    <h2 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#111111] text-white flex items-center justify-center text-xs">1</span>
                        Personal Details
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div class="space-y-2">
                            <label for="name" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" id="name" name="name" required value="{{ old('name') }}" placeholder="Your first and last name"
                                   class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                            @error('name') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <!-- Email -->
                        <div class="space-y-2">
                            <label for="email" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com"
                                   class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                            @error('email') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <!-- Mobile Number -->
                        <div class="space-y-2">
                            <label for="phone" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Mobile Number <span class="text-red-500">*</span></label>
                            <input type="text" id="phone" name="phone" required value="{{ old('phone') }}" placeholder="WhatsApp/Contact number"
                                   class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                            @error('phone') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <!-- Instagram Username -->
                        <div class="space-y-2">
                            <label for="instagram" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Instagram Username/Link <span class="text-red-500">*</span></label>
                            <input type="text" id="instagram" name="instagram" required value="{{ old('instagram') }}" placeholder="@username or full profile link"
                                   class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                            @error('instagram') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <!-- Age -->
                        <div class="space-y-2">
                            <label for="age" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Age <span class="text-red-500">*</span></label>
                            <input type="number" id="age" name="age" required value="{{ old('age') }}" min="1" max="120" placeholder="e.g. 24"
                                   class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                            @error('age') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        </div>

                        <!-- Gender -->
                        <div class="space-y-2">
                            <label for="gender" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Gender <span class="text-red-500">*</span></label>
                            <select id="gender" name="gender" required
                                    class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                                <option value="" disabled selected>Select gender</option>
                                <option value="Male" {{ old('gender') === 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') === 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender') === 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Current City -->
                    <div class="space-y-2">
                        <label for="city" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Current City / Location <span class="text-red-500">*</span></label>
                        <input type="text" id="city" name="city" required value="{{ old('city') }}" placeholder="Where are you currently located?"
                               class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                        @error('city') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Actions -->
                    <div class="pt-4 flex justify-end">
                        <button type="button" @click="nextStep()" class="bg-[#FF6A00] hover:bg-[#E55F00] text-white font-bold h-12 px-8 rounded-xl text-sm transition duration-300 shadow-md shadow-[#FF6A00]/20">
                            Next Step &rarr;
                        </button>
                    </div>
                </div>

                <!-- Step 2: Camera & Acting Suitability -->
                <div id="step-container-2" x-show="step === 2" x-transition.opacity.duration.300ms class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6" style="display: none;">
                    <h2 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#111111] text-white flex items-center justify-center text-xs">2</span>
                        Camera Experience & Suitability
                    </h2>

                    <!-- Comfortable on camera? -->
                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Are you comfortable on camera? <span class="text-red-500">*</span></span>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="comfortable_camera" value="Yes" required {{ old('comfortable_camera') === 'Yes' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Yes</span>
                            </label>
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="comfortable_camera" value="No" {{ old('comfortable_camera') === 'No' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">No</span>
                            </label>
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="comfortable_camera" value="Maybe" {{ old('comfortable_camera') === 'Maybe' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Maybe</span>
                            </label>
                        </div>
                        @error('comfortable_camera') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Past acting/modeling experience -->
                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Have you done acting/modeling/content creation before? <span class="text-red-500">*</span></span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="past_experience" value="Yes, I have experience" required {{ old('past_experience') === 'Yes, I have experience' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Yes, I have experience</span>
                            </label>
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="past_experience" value="No, I am a beginner" {{ old('past_experience') === 'No, I am a beginner' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">No, I am a beginner</span>
                            </label>
                        </div>
                        @error('past_experience') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Type of Shoots Comfort -->
                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Which type of shoots would you be comfortable with? <span class="text-red-500">*</span></span>
                        <p class="text-xs text-gray-400 font-light -mt-2">Select all that apply</p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @php
                                $shoots = ['Fashion/Modeling', 'Acting/Drama/Skit', 'Travel & Tourism Vlogs', 'Corporate/Commercial Advertisement', 'Food & Restaurant Promos', 'Voice Over/Anchor Roles'];
                                $oldShoots = old('shoot_comfort', []);
                            @endphp
                            @foreach($shoots as $shoot)
                                <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                    <input type="checkbox" name="shoot_comfort[]" value="{{ $shoot }}" {{ in_array($shoot, $oldShoots) ? 'checked' : '' }} @change="clearValidity('shoot_comfort[]')" class="rounded text-[#FF6A00] focus:ring-[#FF6A00]">
                                    <span class="text-sm font-medium text-gray-800">{{ $shoot }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('shoot_comfort') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Languages -->
                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Languages You Speak Fluently <span class="text-red-500">*</span></span>
                        <p class="text-xs text-gray-400 font-light -mt-2">Select all that apply</p>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            @php
                                $langs = ['Hindi', 'English', 'Pahari (Local Himachal)', 'Punjabi', 'Other'];
                                $oldLangs = old('languages', []);
                            @endphp
                            @foreach($langs as $lang)
                                <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                    <input type="checkbox" name="languages[]" value="{{ $lang }}" {{ in_array($lang, $oldLangs) ? 'checked' : '' }} @change="clearValidity('languages[]')" class="rounded text-[#FF6A00] focus:ring-[#FF6A00]">
                                    <span class="text-sm font-medium text-gray-800">{{ $lang }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('languages') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Travel Comfort -->
                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Are you comfortable traveling for shoots nearby? <span class="text-red-500">*</span></span>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="travel_comfort" value="Yes" required {{ old('travel_comfort') === 'Yes' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Yes</span>
                            </label>
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="travel_comfort" value="No" {{ old('travel_comfort') === 'No' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">No</span>
                            </label>
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="travel_comfort" value="Maybe (depends on travel expense)" {{ old('travel_comfort') === 'Maybe (depends on travel expense)' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Maybe</span>
                            </label>
                        </div>
                        @error('travel_comfort') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
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

                <!-- Step 3: Availability, Goals & Compensation -->
                <div id="step-container-3" x-show="step === 3" x-transition.opacity.duration.300ms class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6" style="display: none;">
                    <h2 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#111111] text-white flex items-center justify-center text-xs">3</span>
                        Availability, Goals & Compensation
                    </h2>

                    <!-- What are you mainly looking for? -->
                    <div class="space-y-2">
                        <label for="seeking" class="text-xs font-bold text-gray-700 uppercase tracking-wide">What are you mainly looking for through KKSB Studios? <span class="text-red-500">*</span></label>
                        <input type="text" id="seeking" name="seeking" required value="{{ old('seeking') }}" placeholder="e.g. Paid acting work, collab shoots, modeling portfolio building"
                               class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                        @error('seeking') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Unpaid trial comfort -->
                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Are you okay with unpaid trial/collaboration-based shoots in the initial phase? <span class="text-red-500">*</span></span>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="trial_ok" value="Yes, I am comfortable with it" required {{ old('trial_ok') === 'Yes, I am comfortable with it' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Yes, I am</span>
                            </label>
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="trial_ok" value="No, only paid projects" {{ old('trial_ok') === 'No, only paid projects' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">No, only paid</span>
                            </label>
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="trial_ok" value="Maybe (depends on details)" {{ old('trial_ok') === 'Maybe (depends on details)' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Maybe</span>
                            </label>
                        </div>
                        @error('trial_ok') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Availability -->
                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">What is your availability for shoots? <span class="text-red-500">*</span></span>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="availability" value="Full-time available" required {{ old('availability') === 'Full-time available' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Full-time</span>
                            </label>
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="availability" value="Part-time available" {{ old('availability') === 'Part-time available' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Part-time</span>
                            </label>
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="availability" value="Only on weekends" {{ old('availability') === 'Only on weekends' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Weekends only</span>
                            </label>
                        </div>
                        @error('availability') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Role comfort -->
                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Which role type are you most comfortable with? <span class="text-red-500">*</span></span>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="role_comfort" value="Lead/Main role character" required {{ old('role_comfort') === 'Lead/Main role character' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Lead Character</span>
                            </label>
                            <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                                <input type="radio" name="role_comfort" value="Secondary or Supporting role" {{ old('role_comfort') === 'Secondary or Supporting role' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                                <span class="text-sm font-medium text-gray-800">Supporting / Extra</span>
                            </label>
                        </div>
                        @error('role_comfort') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Restrictions -->
                    <div class="space-y-2">
                        <label for="restrictions" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Do you have any restrictions or comfort limits we should know about? <span class="text-red-500">*</span></label>
                        <input type="text" id="restrictions" name="restrictions" required value="{{ old('restrictions') }}" placeholder="e.g. None, No night shoots, Specific outfit preferences"
                               class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                        @error('restrictions') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Expected amount -->
                    <div class="space-y-2">
                        <label for="expected_amount" class="text-xs font-bold text-gray-700 uppercase tracking-wide">If selected for future paid projects, what is your expected per-shoot amount? <span class="text-red-500">*</span></label>
                        <input type="text" id="expected_amount" name="expected_amount" required value="{{ old('expected_amount') }}" placeholder="Your quote (e.g. ₹2000 per shoot day, or Negotiable)"
                               class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl h-12 px-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition">
                        @error('expected_amount') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Usage permissions -->
                    <div class="space-y-3">
                        <span class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Usage Permission Agreement <span class="text-red-500">*</span></span>
                        <p class="text-xs text-gray-400 font-light leading-relaxed -mt-1">I authorize KKSB Studios to utilize the photos and video clips captured during shoots for promotional activities, social media distribution, and brand advertisements.</p>
                        <label class="flex items-center space-x-3 bg-[#FAFAFA] hover:bg-gray-50 border border-gray-200 rounded-xl p-4 cursor-pointer">
                            <input type="radio" name="usage_permission" value="I Agree" required {{ old('usage_permission') === 'I Agree' ? 'checked' : '' }} class="text-[#FF6A00] focus:ring-[#FF6A00]">
                            <span class="text-sm font-semibold text-gray-800">I Agree to the Terms</span>
                        </label>
                        @error('usage_permission') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Why do you want to join? -->
                    <div class="space-y-2">
                        <label for="message" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Why do you want to join creative shoots? <span class="text-red-500">*</span></label>
                        <textarea id="message" name="message" required rows="4" placeholder="Briefly describe your passion for acting, modeling, or content creation, and why you'd like to work with KKSB Studios..."
                                  class="w-full bg-[#FAFAFA] border border-gray-200 rounded-xl p-4 text-sm text-gray-900 focus:border-[#FF6A00] focus:bg-white outline-none transition resize-none">{{ old('message') }}</textarea>
                        @error('message') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
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

                <!-- Step 4: Portfolio Assets Upload -->
                <div id="step-container-4" x-show="step === 4" x-transition.opacity.duration.300ms class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6" style="display: none;">
                    <h2 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#111111] text-white flex items-center justify-center text-xs">4</span>
                        Portfolio Assets Upload
                    </h2>

                    <!-- Upload Photos -->
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Upload Your Best Photos <span class="text-red-500">*</span></label>
                        <p class="text-xs text-gray-400 font-light leading-relaxed">Provide 2 to 5 clear photos of yourself (Front portrait, full profile, casual looks). Max file size: 10MB per image.</p>
                        <input type="file" name="photos[]" required multiple accept="image/*"
                               class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-[#FF6A00]/10 file:text-[#FF6A00] hover:file:bg-[#FF6A00]/20 file:cursor-pointer cursor-pointer border border-dashed border-gray-300 rounded-xl p-4">
                        @error('photos') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                        @error('photos.*') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
                    </div>

                    <!-- Upload Video -->
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-gray-700 uppercase tracking-wide block">Upload a Short Introduction Video</label>
                        <p class="text-xs text-gray-400 font-light leading-relaxed">A short 30-60 sec video introducing yourself, your city, and your camera comfort. (Optional, Max size: 50MB).</p>
                        <input type="file" name="intro_video" accept="video/*"
                               class="w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 file:cursor-pointer cursor-pointer border border-dashed border-gray-300 rounded-xl p-4">
                        @error('intro_video') <p class="text-xs text-red-500 font-semibold">{{ $message }}</p> @enderror
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
