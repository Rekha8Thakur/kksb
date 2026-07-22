<x-frontend-layout>
    <!-- Page Container -->
    <div class="relative overflow-hidden selection:bg-[#111111] selection:text-white bg-white min-h-[calc(100vh-80px)] flex items-center py-12 lg:py-16">
        
        <!-- CONTACT FORM SECTION -->
        <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px] w-full" data-aos="fade-up" data-aos-duration="1000">
            <div class="bg-white border border-[#ECECEC] rounded-[24px] p-8 lg:p-16 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 shadow-sm">
                
                <!-- Left Panel: Trust & Badges -->
                <div class="lg:col-span-5 flex flex-col justify-between space-y-12">
                    <div class="space-y-4">
                        <span class="text-[13px] font-semibold text-[#666666] tracking-[0.2em] uppercase block">
                            TELL US ABOUT YOUR PROJECT
                        </span>
                        <h2 class="text-3xl lg:text-[44px] lg:leading-[1.2] font-bold tracking-tight">
                            <span class="text-[#111111]">We're Here</span> <span class="text-gray-400">to Bring Your Ideas to Life.</span>
                        </h2>
                        <p class="text-[16px] text-[#666666] leading-relaxed font-light">
                            Fill out the form and our team will get back to you within 24 hours.
                        </p>
                    </div>

                    <!-- Trust Cards -->
                    <div class="space-y-6 pt-4 border-t border-[#ECECEC]">
                        <!-- Quick Response -->
                        <div class="flex items-start space-x-4">
                            <div class="p-2 border border-[#ECECEC] rounded-[10px] text-[#111111] bg-[#FAFAFA]">
                                <i data-lucide="clock" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-[15px] font-semibold text-[#111111]">Quick Response</h4>
                                <p class="text-[13px] text-[#666666] mt-0.5">We reply within 24 working hours.</p>
                            </div>
                        </div>
                        
                        <!-- Confidential -->
                        <div class="flex items-start space-x-4">
                            <div class="p-2 border border-[#ECECEC] rounded-[10px] text-[#111111] bg-[#FAFAFA]">
                                <i data-lucide="shield-check" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-[15px] font-semibold text-[#111111]">Confidential</h4>
                                <p class="text-[13px] text-[#666666] mt-0.5">Your information is safe with us.</p>
                            </div>
                        </div>

                        <!-- No Spam -->
                        <div class="flex items-start space-x-4">
                            <div class="p-2 border border-[#ECECEC] rounded-[10px] text-[#111111] bg-[#FAFAFA]">
                                <i data-lucide="mail-check" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="text-[15px] font-semibold text-[#111111]">No Spam</h4>
                                <p class="text-[13px] text-[#666666] mt-0.5">We respect your inbox.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Panel: Form -->
                <div class="lg:col-span-7">
                    <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6">
                        @csrf
                        
                        <!-- Honeypot -->
                        <div style="display: none;">
                            <input type="text" name="honeypot" id="honeypot" value="">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Your Name -->
                            <div class="space-y-2">
                                <label for="name" class="text-[13px] font-medium text-[#111111]">Your Name *</label>
                                <input type="text" name="name" id="name" required placeholder="Enter your name" 
                                       class="w-full bg-white border border-[#ECECEC] rounded-[10px] md:rounded-[12px] h-[54px] px-5 text-[14px] text-[#111111] placeholder:text-gray-400 focus:border-[#111111] focus:ring-1 focus:ring-[#111111] transition duration-300 outline-none">
                            </div>
                            
                            <!-- Email Address -->
                            <div class="space-y-2">
                                <label for="email" class="text-[13px] font-medium text-[#111111]">Email Address *</label>
                                <input type="email" name="email" id="email" required placeholder="Enter your email" 
                                       class="w-full bg-white border border-[#ECECEC] rounded-[10px] md:rounded-[12px] h-[54px] px-5 text-[14px] text-[#111111] placeholder:text-gray-400 focus:border-[#111111] focus:ring-1 focus:ring-[#111111] transition duration-300 outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Phone Number -->
                            <div class="space-y-2">
                                <label for="phone" class="text-[13px] font-medium text-[#111111]">Phone Number</label>
                                <input type="text" name="phone" id="phone" placeholder="Enter your phone number" 
                                       class="w-full bg-white border border-[#ECECEC] rounded-[10px] md:rounded-[12px] h-[54px] px-5 text-[14px] text-[#111111] placeholder:text-gray-400 focus:border-[#111111] focus:ring-1 focus:ring-[#111111] transition duration-300 outline-none">
                            </div>

                            <!-- Company / Brand Name -->
                            <div class="space-y-2">
                                <label for="company" class="text-[13px] font-medium text-[#111111]">Company / Brand Name</label>
                                <input type="text" name="company" id="company" placeholder="Enter your brand or company" 
                                       class="w-full bg-white border border-[#ECECEC] rounded-[10px] md:rounded-[12px] h-[54px] px-5 text-[14px] text-[#111111] placeholder:text-gray-400 focus:border-[#111111] focus:ring-1 focus:ring-[#111111] transition duration-300 outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- What can we help you with -->
                            <div class="space-y-2">
                                <label for="service_interest" class="text-[13px] font-medium text-[#111111]">What can we help you with?</label>
                                <select name="service_interest" id="service_interest"
                                        class="w-full bg-white border border-[#ECECEC] rounded-[10px] md:rounded-[12px] h-[54px] px-5 text-[14px] text-[#111111] focus:border-[#111111] focus:ring-1 focus:ring-[#111111] transition duration-300 outline-none">
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

                            <!-- Project Budget (Approx.) -->
                            <div class="space-y-2">
                                <label for="budget" class="text-[13px] font-medium text-[#111111]">Project Budget (Approx.)</label>
                                <select name="budget" id="budget"
                                        class="w-full bg-white border border-[#ECECEC] rounded-[10px] md:rounded-[12px] h-[54px] px-5 text-[14px] text-[#111111] focus:border-[#111111] focus:ring-1 focus:ring-[#111111] transition duration-300 outline-none">
                                    <option value="">Select your budget</option>
                                    <option value="Under ₹25k">Under ₹25k</option>
                                    <option value="₹25k - ₹50k">₹25k - ₹50k</option>
                                    <option value="₹50k - ₹1 Lakh">₹50k - ₹1 Lakh</option>
                                    <option value="₹1 Lakh - ₹3 Lakhs">₹1 Lakh - ₹3 Lakhs</option>
                                    <option value="₹3 Lakhs+">₹3 Lakhs+</option>
                                </select>
                            </div>
                        </div>

                        <!-- Tell us about your project -->
                        <div class="space-y-2">
                            <label for="message" class="text-[13px] font-medium text-[#111111]">Tell us about your project *</label>
                            <textarea name="message" id="message" rows="5" required placeholder="Write a few lines about your project, goals and requirements..." 
                                      class="w-full bg-white border border-[#ECECEC] rounded-[12px] p-5 text-[14px] text-[#111111] placeholder:text-gray-400 focus:border-[#111111] focus:ring-1 focus:ring-[#111111] transition duration-300 outline-none resize-none"></textarea>
                        </div>

                        <!-- Action Submit Button -->
                        <div class="pt-2">
                            <button type="submit" class="w-full bg-[#111111] hover:bg-[#222222] text-white text-[14px] font-semibold h-[52px] px-5 rounded-[12px] transition duration-300 shadow-md flex items-center justify-center space-x-2 group">
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
