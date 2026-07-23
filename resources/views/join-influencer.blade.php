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
            <form method="POST" action="{{ route('join-influencer.store') }}" enctype="multipart/form-data" class="space-y-8">
                @csrf
                
                <!-- Honeypot Bot Protection -->
                <div style="display: none;">
                    <input type="text" name="honeypot" value="">
                </div>

                <!-- Step 1: Basic Information -->
                <div class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6">
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
                            <label for="email" class="text-xs font-bold text-gray-700 uppercase tracking-wide">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" required value="{{ old('email') }}" placeholder="you@example.com"
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
                </div>

                <!-- Step 2: Camera & Acting Suitability -->
                <div class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6">
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
                                    <input type="checkbox" name="shoot_comfort[]" value="{{ $shoot }}" {{ in_array($shoot, $oldShoots) ? 'checked' : '' }} class="rounded text-[#FF6A00] focus:ring-[#FF6A00]">
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
                                    <input type="checkbox" name="languages[]" value="{{ $lang }}" {{ in_array($lang, $oldLangs) ? 'checked' : '' }} class="rounded text-[#FF6A00] focus:ring-[#FF6A00]">
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
                </div>

                <!-- Step 3: Photos & Videos Uploads -->
                <div class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6">
                    <h2 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#111111] text-white flex items-center justify-center text-xs">3</span>
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
                </div>

                <!-- Step 4: Terms & Pricing expectations -->
                <div class="bg-white border border-gray-150 rounded-3xl p-8 shadow-sm space-y-6">
                    <h2 class="text-lg font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                        <span class="w-5 h-5 rounded-full bg-[#111111] text-white flex items-center justify-center text-xs">4</span>
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
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full bg-[#FF6A00] hover:bg-[#E55F00] text-white font-bold h-14 rounded-2xl text-sm transition duration-300 shadow-lg shadow-[#FF6A00]/25">
                    Submit Application
                </button>

            </form>
        </div>
    </div>
</x-frontend-layout>
