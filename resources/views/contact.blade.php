<x-frontend-layout>
    <!-- Page Container -->
    <div class="relative overflow-hidden bg-zinc-950 min-h-[calc(100vh-80px)] flex items-center py-12 lg:py-16 selection:bg-[#FF6A00] selection:text-white">
        
        <!-- Decorative subtle orange gradient glow in background -->
        <div class="absolute top-1/4 left-1/4 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-[#FF6A00]/10 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute bottom-1/4 right-1/4 translate-x-1/2 translate-y-1/2 w-80 h-80 bg-[#FF6A00]/5 rounded-full blur-[120px] pointer-events-none"></div>

        <!-- CONTACT FORM SECTION -->
        <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px] w-full relative z-10" data-aos="fade-up" data-aos-duration="1000">
            <div class="bg-zinc-900 border border-zinc-800 rounded-[32px] p-8 lg:p-16 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 shadow-2xl">
                
                <!-- Left Panel: Trust & Badges -->
                <div class="lg:col-span-5 flex flex-col justify-between space-y-12">
                    <div class="space-y-4">
                        <span class="text-[13px] font-bold text-[#FF6A00] tracking-[0.2em] uppercase block">
                            TELL US ABOUT YOUR PROJECT
                        </span>
                        <h2 class="text-3xl lg:text-[44px] lg:leading-[1.2] font-black tracking-tight">
                            <span class="text-white">We're Here</span> <br class="hidden lg:inline" />
                            <span class="text-zinc-400">to Bring Your Ideas to Life.</span>
                        </h2>
                        <p class="text-[16px] text-zinc-400 leading-relaxed font-light">
                            Fill out the form and our team will get back to you within 24 hours.
                        </p>
                    </div>

                    <!-- Trust Cards -->
                    <div class="space-y-6 pt-8 border-t border-zinc-800">
                        <!-- Quick Response -->
                        <div class="flex items-start space-x-4">
                            <div class="p-2.5 border border-zinc-800 rounded-[12px] text-[#FF6A00] bg-zinc-950">
                                <i data-lucide="clock" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-[15px] font-semibold text-white">Quick Response</h4>
                                <p class="text-[13px] text-zinc-400 mt-0.5 font-light">We reply within 24 working hours.</p>
                            </div>
                        </div>
                        
                        <!-- Confidential -->
                        <div class="flex items-start space-x-4">
                            <div class="p-2.5 border border-zinc-800 rounded-[12px] text-[#FF6A00] bg-zinc-950">
                                <i data-lucide="shield-check" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-[15px] font-semibold text-white">Confidential</h4>
                                <p class="text-[13px] text-zinc-400 mt-0.5 font-light">Your information is safe with us.</p>
                            </div>
                        </div>

                        <!-- No Spam -->
                        <div class="flex items-start space-x-4">
                            <div class="p-2.5 border border-zinc-800 rounded-[12px] text-[#FF6A00] bg-zinc-950">
                                <i data-lucide="mail-check" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-[15px] font-semibold text-white">No Spam</h4>
                                <p class="text-[13px] text-zinc-400 mt-0.5 font-light">We respect your inbox.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Panel: Form -->
                <div class="lg:col-span-7">
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl text-sm font-semibold">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
                        @csrf
                        
                        <!-- Honeypot -->
                        <div style="display: none;">
                            <input type="text" name="honeypot" id="honeypot" value="">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Your Name -->
                            <div class="space-y-2">
                                <label for="name" class="text-[13px] font-semibold text-zinc-300">Your Name <span class="text-[#FF6A00]">*</span></label>
                                <input type="text" name="name" id="name" required placeholder="Enter your name" 
                                       class="w-full bg-zinc-950 border border-zinc-800 rounded-[12px] h-[54px] px-5 text-[14px] text-white placeholder:text-zinc-650 focus:border-[#FF6A00] focus:ring-1 focus:ring-[#FF6A00] transition duration-300 outline-none">
                            </div>
                            
                            <!-- Phone Number (placed in place of email) -->
                            <div class="space-y-2">
                                <label for="phone" class="text-[13px] font-semibold text-zinc-300">Phone Number</label>
                                <input type="text" name="phone" id="phone" placeholder="Enter your phone number" 
                                       class="w-full bg-zinc-950 border border-zinc-800 rounded-[12px] h-[54px] px-5 text-[14px] text-white placeholder:text-zinc-650 focus:border-[#FF6A00] focus:ring-1 focus:ring-[#FF6A00] transition duration-300 outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Email Address (placed in place of phone, star removed) -->
                            <div class="space-y-2">
                                <label for="email" class="text-[13px] font-semibold text-zinc-300">Email Address</label>
                                <input type="email" name="email" id="email" placeholder="Enter your email" 
                                       class="w-full bg-zinc-950 border border-zinc-800 rounded-[12px] h-[54px] px-5 text-[14px] text-white placeholder:text-zinc-650 focus:border-[#FF6A00] focus:ring-1 focus:ring-[#FF6A00] transition duration-300 outline-none">
                            </div>

                            <!-- Brand Name (changed label and placeholder) -->
                            <div class="space-y-2">
                                <label for="company" class="text-[13px] font-semibold text-zinc-300">Brand Name</label>
                                <input type="text" name="company" id="company" placeholder="Enter your brand name" 
                                       class="w-full bg-zinc-950 border border-zinc-800 rounded-[12px] h-[54px] px-5 text-[14px] text-white placeholder:text-zinc-650 focus:border-[#FF6A00] focus:ring-1 focus:ring-[#FF6A00] transition duration-300 outline-none">
                            </div>
                        </div>

                        <!-- What can we help you with (full width row, budget dropdown removed) -->
                        <div class="space-y-2">
                            <label for="service_interest" class="text-[13px] font-semibold text-zinc-300">What can we help you with?</label>
                            <select name="service_interest" id="service_interest"
                                    class="w-full bg-zinc-950 border border-zinc-800 rounded-[12px] h-[54px] px-5 text-[14px] text-zinc-400 focus:border-[#FF6A00] focus:ring-1 focus:ring-[#FF6A00] transition duration-300 outline-none">
                                <option value="">Select a service</option>
                                <option value="Social Media Management">Social Media Management</option>
                                <option value="Video Production">Video Production</option>
                                <option value="Influencer Marketing">Influencer Marketing</option>
                                <option value="Brand Campaigns">Brand Campaigns</option>
                                <option value="Content Strategy">Content Strategy</option>
                                <option value="Reels & Commercial Shoots">Reels & Commercial Shoots</option>
                                <option value="Travel & Tourism Campaigns">Travel & Tourism Campaigns</option>
                                <option value="Other Enquiries">Other Enquiries</option>
                            </select>
                        </div>

                        <!-- Tell us about your project (star removed) -->
                        <div class="space-y-2">
                            <label for="message" class="text-[13px] font-semibold text-zinc-300">Tell us about your project</label>
                            <textarea name="message" id="message" rows="5" required placeholder="Write a few lines about your project, goals and requirements..." 
                                      class="w-full bg-zinc-950 border border-zinc-800 rounded-[12px] p-5 text-[14px] text-white placeholder:text-zinc-650 focus:border-[#FF6A00] focus:ring-1 focus:ring-[#FF6A00] transition duration-300 outline-none resize-none"></textarea>
                        </div>

                        <!-- Action Submit Button -->
                        <div class="pt-2">
                            <button type="submit" class="w-full bg-[#FF6A00] hover:bg-[#E55F00] text-white text-[14px] font-bold h-[54px] px-5 rounded-[12px] transition duration-300 shadow-lg shadow-[#FF6A00]/25 flex items-center justify-center space-x-2 group">
                                <span>Send Enquiry</span>
                                <span class="group-hover:translate-x-1 transition-transform duration-200">&rarr;</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-frontend-layout>
