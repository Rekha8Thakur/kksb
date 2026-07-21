<x-frontend-layout>
    <!-- Page Container -->
    <div class="relative overflow-hidden selection:bg-[#111111] selection:text-white" x-data="{
        scrollToForm() {
            const el = document.getElementById('enquiry-form');
            if (el) {
                el.scrollIntoView({ behavior: 'smooth' });
            }
        }
    }">

        <!-- HERO SECTION -->
        <section class="relative bg-white pt-12 lg:pt-20 pb-16 lg:pb-28">
            <div class="max-w-[1440px] mx-auto px-6 lg:px-[60px] grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                <!-- Left Content (40%) -->
                <div class="lg:col-span-5 space-y-6 md:space-y-8" data-aos="fade-up" data-aos-duration="1000">
                    <span class="text-[13px] font-semibold text-[#666666] tracking-[0.2em] uppercase block">
                        CONTACT KKSB STUDIOS
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-[64px] lg:leading-[1.15] font-bold text-[#111111] tracking-tight">
                        Let's Build Something People Remember.
                    </h1>
                    <p class="text-[16px] sm:text-[18px] text-[#666666] leading-relaxed font-light max-w-xl">
                        From social media campaigns to high-impact video production, tell us what you're building—we'll help you make it stand out.
                    </p>

                    <!-- Premium Contact Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-4 sm:pt-6">
                        <!-- WhatsApp Card -->
                        <a href="https://wa.me/917876148313" target="_blank" 
                           class="group relative border border-[#ECECEC] rounded-[16px] p-5 hover:shadow-lg hover:border-[#111111] hover:-translate-y-1 transition-all duration-300 bg-white flex flex-col justify-between min-h-[140px]">
                            <div>
                                <span class="text-[#111111] group-hover:scale-110 transition duration-300 block mb-3">
                                    <i data-lucide="message-circle" class="w-6 h-6"></i>
                                </span>
                                <h3 class="text-[15px] font-semibold text-[#111111]">WhatsApp Us</h3>
                            </div>
                            <p class="text-[13px] text-[#666666] mt-2 group-hover:text-[#111111] transition">+91 78761 48313</p>
                        </a>

                        <!-- Call Card -->
                        <a href="tel:+917876148313" 
                           class="group relative border border-[#ECECEC] rounded-[16px] p-5 hover:shadow-lg hover:border-[#111111] hover:-translate-y-1 transition-all duration-300 bg-white flex flex-col justify-between min-h-[140px]">
                            <div>
                                <span class="text-[#111111] group-hover:scale-110 transition duration-300 block mb-3">
                                    <i data-lucide="phone" class="w-6 h-6"></i>
                                </span>
                                <h3 class="text-[15px] font-semibold text-[#111111]">Call Us</h3>
                            </div>
                            <p class="text-[13px] text-[#666666] mt-2 group-hover:text-[#111111] transition">+91 78761 48313</p>
                        </a>

                        <!-- Email Card -->
                        <a href="mailto:hello@kksbstudios.com" 
                           class="group relative border border-[#ECECEC] rounded-[16px] p-5 hover:shadow-lg hover:border-[#111111] hover:-translate-y-1 transition-all duration-300 bg-white flex flex-col justify-between min-h-[140px]">
                            <div>
                                <span class="text-[#111111] group-hover:scale-110 transition duration-300 block mb-3">
                                    <i data-lucide="mail" class="w-6 h-6"></i>
                                </span>
                                <h3 class="text-[15px] font-semibold text-[#111111]">Email Us</h3>
                            </div>
                            <p class="text-[13px] text-[#666666] mt-2 group-hover:text-[#111111] transition truncate">hello@kksbstudios.com</p>
                        </a>
                    </div>
                </div>

                <!-- Right Side Image (60% - Wider Section) -->
                <div class="lg:col-span-7" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <div class="relative overflow-hidden rounded-[20px] shadow-md aspect-[16/10] lg:aspect-[16/9.5] bg-gray-100">
                        <img src="{{ asset('images/landing-office.jpg') }}" 
                             alt="KKSB Studios Office" 
                             class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                    </div>
                </div>
            </div>
        </section>

        <!-- CONTACT FORM SECTION -->
        <section id="enquiry-form" class="py-20 lg:py-28 bg-[#FAFAFA] border-t border-b border-[#ECECEC]">
            <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px]">
                <div class="bg-white border border-[#ECECEC] rounded-[16px] p-8 lg:p-16 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 shadow-sm">
                    
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
                                    <span class="group-hover:translate-x-1 transition-transform duration-200">→</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICES SECTION -->
        <section class="py-20 lg:py-28 bg-white">
            <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px]">
                <div class="text-center space-y-3">
                    <span class="text-[13px] font-semibold text-[#666666] tracking-[0.2em] uppercase block">
                        WHAT CAN WE HELP YOU WITH
                    </span>
                    <h2 class="text-3xl lg:text-[48px] font-bold">
                        <span class="text-[#111111]">Our</span> <span class="text-gray-400">Services</span>
                    </h2>
                </div>

                <!-- Responsive Grid (8 Cards) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-16">
                    <!-- Service 1 -->
                    <div class="group relative border border-[#ECECEC] rounded-[16px] p-8 hover:shadow-xl hover:border-[#111111] transition-all duration-300 bg-white flex flex-col justify-between min-h-[200px]">
                        <div class="flex justify-between items-start">
                            <span class="text-[#666666] group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="instagram" class="w-8 h-8"></i>
                            </span>
                            <span class="text-gray-300 group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="arrow-up-right" class="w-5 h-5"></i>
                            </span>
                        </div>
                        <h3 class="text-[20px] font-semibold text-[#111111] mt-6">Social Media Management</h3>
                    </div>

                    <!-- Service 2 -->
                    <div class="group relative border border-[#ECECEC] rounded-[16px] p-8 hover:shadow-xl hover:border-[#111111] transition-all duration-300 bg-white flex flex-col justify-between min-h-[200px]">
                        <div class="flex justify-between items-start">
                            <span class="text-[#666666] group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="video" class="w-8 h-8"></i>
                            </span>
                            <span class="text-gray-300 group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="arrow-up-right" class="w-5 h-5"></i>
                            </span>
                        </div>
                        <h3 class="text-[20px] font-semibold text-[#111111] mt-6">Video Production</h3>
                    </div>

                    <!-- Service 3 -->
                    <div class="group relative border border-[#ECECEC] rounded-[16px] p-8 hover:shadow-xl hover:border-[#111111] transition-all duration-300 bg-white flex flex-col justify-between min-h-[200px]">
                        <div class="flex justify-between items-start">
                            <span class="text-[#666666] group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="users" class="w-8 h-8"></i>
                            </span>
                            <span class="text-gray-300 group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="arrow-up-right" class="w-5 h-5"></i>
                            </span>
                        </div>
                        <h3 class="text-[20px] font-semibold text-[#111111] mt-6">Influencer Marketing</h3>
                    </div>

                    <!-- Service 4 -->
                    <div class="group relative border border-[#ECECEC] rounded-[16px] p-8 hover:shadow-xl hover:border-[#111111] transition-all duration-300 bg-white flex flex-col justify-between min-h-[200px]">
                        <div class="flex justify-between items-start">
                            <span class="text-[#666666] group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="award" class="w-8 h-8"></i>
                            </span>
                            <span class="text-gray-300 group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="arrow-up-right" class="w-5 h-5"></i>
                            </span>
                        </div>
                        <h3 class="text-[20px] font-semibold text-[#111111] mt-6">Brand Campaigns</h3>
                    </div>

                    <!-- Service 5 -->
                    <div class="group relative border border-[#ECECEC] rounded-[16px] p-8 hover:shadow-xl hover:border-[#111111] transition-all duration-300 bg-white flex flex-col justify-between min-h-[200px]">
                        <div class="flex justify-between items-start">
                            <span class="text-[#666666] group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="trending-up" class="w-8 h-8"></i>
                            </span>
                            <span class="text-gray-300 group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="arrow-up-right" class="w-5 h-5"></i>
                            </span>
                        </div>
                        <h3 class="text-[20px] font-semibold text-[#111111] mt-6">Content Strategy</h3>
                    </div>

                    <!-- Service 6 -->
                    <div class="group relative border border-[#ECECEC] rounded-[16px] p-8 hover:shadow-xl hover:border-[#111111] transition-all duration-300 bg-white flex flex-col justify-between min-h-[200px]">
                        <div class="flex justify-between items-start">
                            <span class="text-[#666666] group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="film" class="w-8 h-8"></i>
                            </span>
                            <span class="text-gray-300 group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="arrow-up-right" class="w-5 h-5"></i>
                            </span>
                        </div>
                        <h3 class="text-[20px] font-semibold text-[#111111] mt-6">Reels & Commercial Shoots</h3>
                    </div>

                    <!-- Service 7 -->
                    <div class="group relative border border-[#ECECEC] rounded-[16px] p-8 hover:shadow-xl hover:border-[#111111] transition-all duration-300 bg-white flex flex-col justify-between min-h-[200px]">
                        <div class="flex justify-between items-start">
                            <span class="text-[#666666] group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="compass" class="w-8 h-8"></i>
                            </span>
                            <span class="text-gray-300 group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="arrow-up-right" class="w-5 h-5"></i>
                            </span>
                        </div>
                        <h3 class="text-[20px] font-semibold text-[#111111] mt-6">Travel & Tourism Campaigns</h3>
                    </div>

                    <!-- Service 8 -->
                    <div class="group relative border border-[#ECECEC] rounded-[16px] p-8 hover:shadow-xl hover:border-[#111111] transition-all duration-300 bg-white flex flex-col justify-between min-h-[200px]">
                        <div class="flex justify-between items-start">
                            <span class="text-[#666666] group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="help-circle" class="w-8 h-8"></i>
                            </span>
                            <span class="text-gray-300 group-hover:text-[#111111] transition duration-300">
                                <i data-lucide="arrow-up-right" class="w-5 h-5"></i>
                            </span>
                        </div>
                        <h3 class="text-[20px] font-semibold text-[#111111] mt-6">Other Enquiries</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- RESULTS SECTION -->
        <section class="py-20 lg:py-28 bg-[#FAFAFA] border-t border-b border-[#ECECEC]">
            <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px]">
                <div class="text-center space-y-3">
                    <span class="text-[13px] font-semibold text-[#666666] tracking-[0.2em] uppercase block">
                        WHY BRANDS CHOOSE KKSB STUDIOS
                    </span>
                    <h2 class="text-3xl lg:text-[48px] font-bold">
                        <span class="text-[#111111]">Results That Speak</span> <span class="text-gray-400">for Themselves.</span>
                    </h2>
                </div>

                <!-- 4 Statistics Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-16">
                    <!-- Stat 1 -->
                    <div class="bg-white border border-[#ECECEC] rounded-[16px] p-8 flex flex-col justify-between min-h-[160px] shadow-sm">
                        <span class="text-[#111111] block mb-4">
                            <i data-lucide="building" class="w-6 h-6"></i>
                        </span>
                        <div>
                            <span class="text-4xl lg:text-5xl font-bold text-[#111111] tracking-tight block">250+</span>
                            <span class="text-[14px] text-[#666666] mt-2 block font-medium">Businesses Worked With</span>
                        </div>
                    </div>

                    <!-- Stat 2 -->
                    <div class="bg-white border border-[#ECECEC] rounded-[16px] p-8 flex flex-col justify-between min-h-[160px] shadow-sm">
                        <span class="text-[#111111] block mb-4">
                            <i data-lucide="play-circle" class="w-6 h-6"></i>
                        </span>
                        <div>
                            <span class="text-4xl lg:text-5xl font-bold text-[#111111] tracking-tight block">Millions+</span>
                            <span class="text-[14px] text-[#666666] mt-2 block font-medium">Organic Views Generated</span>
                        </div>
                    </div>

                    <!-- Stat 3 -->
                    <div class="bg-white border border-[#ECECEC] rounded-[16px] p-8 flex flex-col justify-between min-h-[160px] shadow-sm">
                        <span class="text-[#111111] block mb-4">
                            <i data-lucide="map" class="w-6 h-6"></i>
                        </span>
                        <div>
                            <span class="text-4xl lg:text-5xl font-bold text-[#111111] tracking-tight block">Himachal</span>
                            <span class="text-[14px] text-[#666666] mt-2 block font-medium">Focused Market Experts</span>
                        </div>
                    </div>

                    <!-- Stat 4 -->
                    <div class="bg-white border border-[#ECECEC] rounded-[16px] p-8 flex flex-col justify-between min-h-[160px] shadow-sm">
                        <span class="text-[#111111] block mb-4">
                            <i data-lucide="shuffle" class="w-6 h-6"></i>
                        </span>
                        <div>
                            <span class="text-4xl lg:text-5xl font-bold text-[#111111] tracking-tight block">Strategy + Production</span>
                            <span class="text-[14px] text-[#666666] mt-2 block font-medium">Content + Distribution</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- PROCESS SECTION -->
        <section class="py-20 lg:py-28 bg-white relative">
            <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px]">
                <div class="text-center space-y-3">
                    <span class="text-[13px] font-semibold text-[#666666] tracking-[0.2em] uppercase block">
                        WHAT HAPPENS NEXT
                    </span>
                    <h2 class="text-3xl lg:text-[48px] font-bold">
                        <span class="text-[#111111]">Our Simple</span> <span class="text-gray-400">Process</span>
                    </h2>
                </div>

                <!-- 4 connected timeline cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-16 relative">
                    <!-- Connecting dotted line (visible only on desktop/md) -->
                    <div class="hidden md:block absolute top-[52px] left-[15%] right-[15%] h-[1px] border-t-2 border-dotted border-[#ECECEC] z-0"></div>

                    <!-- Step 1 -->
                    <div class="relative bg-white border border-[#ECECEC] rounded-[16px] p-8 space-y-6 shadow-sm hover:border-[#111111] transition duration-300 z-10 flex flex-col justify-between min-h-[220px]">
                        <div class="flex items-center justify-between">
                            <span class="text-[18px] font-bold text-[#111111] bg-[#FAFAFA] border border-[#ECECEC] w-10 h-10 rounded-full flex items-center justify-center">01</span>
                            <span class="text-gray-300"><i data-lucide="search" class="w-5 h-5"></i></span>
                        </div>
                        <div>
                            <h3 class="text-[18px] font-semibold text-[#111111]">We Review</h3>
                            <p class="text-[14px] text-[#666666] mt-2 leading-relaxed font-light">We carefully review your enquiry.</p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative bg-white border border-[#ECECEC] rounded-[16px] p-8 space-y-6 shadow-sm hover:border-[#111111] transition duration-300 z-10 flex flex-col justify-between min-h-[220px]">
                        <div class="flex items-center justify-between">
                            <span class="text-[18px] font-bold text-[#111111] bg-[#FAFAFA] border border-[#ECECEC] w-10 h-10 rounded-full flex items-center justify-center">02</span>
                            <span class="text-gray-300"><i data-lucide="target" class="w-5 h-5"></i></span>
                        </div>
                        <div>
                            <h3 class="text-[18px] font-semibold text-[#111111]">We Understand</h3>
                            <p class="text-[14px] text-[#666666] mt-2 leading-relaxed font-light">We identify goals, audience and project requirements.</p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative bg-white border border-[#ECECEC] rounded-[16px] p-8 space-y-6 shadow-sm hover:border-[#111111] transition duration-300 z-10 flex flex-col justify-between min-h-[220px]">
                        <div class="flex items-center justify-between">
                            <span class="text-[18px] font-bold text-[#111111] bg-[#FAFAFA] border border-[#ECECEC] w-10 h-10 rounded-full flex items-center justify-center">03</span>
                            <span class="text-gray-300"><i data-lucide="lightbulb" class="w-5 h-5"></i></span>
                        </div>
                        <div>
                            <h3 class="text-[18px] font-semibold text-[#111111]">We Recommend</h3>
                            <p class="text-[14px] text-[#666666] mt-2 leading-relaxed font-light">We recommend the best strategy.</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="relative bg-white border border-[#ECECEC] rounded-[16px] p-8 space-y-6 shadow-sm hover:border-[#111111] transition duration-300 z-10 flex flex-col justify-between min-h-[220px]">
                        <div class="flex items-center justify-between">
                            <span class="text-[18px] font-bold text-[#111111] bg-[#FAFAFA] border border-[#ECECEC] w-10 h-10 rounded-full flex items-center justify-center">04</span>
                            <span class="text-gray-300"><i data-lucide="phone-call" class="w-5 h-5"></i></span>
                        </div>
                        <div>
                            <h3 class="text-[18px] font-semibold text-[#111111]">We Connect</h3>
                            <p class="text-[14px] text-[#666666] mt-2 leading-relaxed font-light">We schedule a call or meeting.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- LOCATION SECTION -->
        <section class="py-20 lg:py-28 bg-[#FAFAFA] border-t border-b border-[#ECECEC]">
            <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px]">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                    <!-- Google Maps Embed -->
                    <div class="lg:col-span-7 h-[400px] lg:h-auto min-h-[350px] rounded-[16px] overflow-hidden border border-[#ECECEC] shadow-sm bg-white">
                        <iframe class="w-full h-full" 
                                src="{{ App\Models\Setting::get('google_map_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3422.380068478426!2d77.10892047628886!3d30.903901976211756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390578ea0eb938df%3A0x6b7dbb8a4f9a0e6c!2sSolan%2C%20Himachal%20Pradesh!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin') }}" 
                                frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <!-- Premium Information Card -->
                    <div class="lg:col-span-5 bg-white border border-[#ECECEC] rounded-[16px] p-8 lg:p-10 flex flex-col justify-between space-y-8 shadow-sm">
                        <div class="space-y-6">
                            <h3 class="text-3xl font-bold text-[#111111] tracking-tight">KKSB Studios</h3>
                            
                            <div class="space-y-4 pt-4 border-t border-[#ECECEC]">
                                <div class="flex items-start space-x-3 text-[14px]">
                                    <span class="text-[#111111] mt-0.5"><i data-lucide="map-pin" class="w-5 h-5"></i></span>
                                    <div>
                                        <p class="font-semibold text-[#111111]">Address</p>
                                        <p class="text-[#666666] mt-0.5">Solan, Himachal Pradesh 173212</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3 text-[14px]">
                                    <span class="text-[#111111] mt-0.5"><i data-lucide="phone" class="w-5 h-5"></i></span>
                                    <div>
                                        <p class="font-semibold text-[#111111]">Phone</p>
                                        <p class="text-[#666666] mt-0.5">+91 78761 48313</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3 text-[14px]">
                                    <span class="text-[#111111] mt-0.5"><i data-lucide="mail" class="w-5 h-5"></i></span>
                                    <div>
                                        <p class="font-semibold text-[#111111]">Email</p>
                                        <p class="text-[#666666] mt-0.5">hello@kksbstudios.com</p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3 text-[14px]">
                                    <span class="text-[#111111] mt-0.5"><i data-lucide="calendar" class="w-5 h-5"></i></span>
                                    <div>
                                        <p class="font-semibold text-[#111111]">Business Hours</p>
                                        <p class="text-[#666666] mt-0.5">Monday – Saturday<br>10:00 AM – 7:00 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="https://maps.google.com/?q=Solan,+Himachal+Pradesh" target="_blank"
                           class="inline-flex items-center justify-center space-x-2 bg-[#111111] hover:bg-[#222222] text-white text-[14px] font-semibold py-4 rounded-[12px] transition duration-300 w-full shadow-md group">
                            <span>Get Directions</span>
                            <span class="group-hover:translate-x-1 transition-transform duration-200">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ SECTION -->
        <section class="py-20 lg:py-28 bg-white">
            <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px]">
                <div class="text-center space-y-3">
                    <span class="text-[13px] font-semibold text-[#666666] tracking-[0.2em] uppercase block">
                        QUESTIONS? WE'VE GOT ANSWERS
                    </span>
                    <h2 class="text-3xl lg:text-[48px] font-bold">
                        <span class="text-[#111111]">Frequently Asked</span> <span class="text-gray-400">Questions</span>
                    </h2>
                </div>

                <!-- Accordion (Alpine.js) -->
                <div class="max-w-3xl mx-auto mt-16 space-y-4" x-data="{ active: null }">
                    <!-- Q1 -->
                    <div class="border border-[#ECECEC] rounded-[16px] overflow-hidden bg-white hover:border-[#111111] transition duration-300">
                        <button @click="active = (active === 1 ? null : 1)" 
                                class="w-full flex items-center justify-between p-6 font-semibold text-left text-[16px] text-[#111111] focus:outline-none">
                            <span>Do you work only with Himachal-based brands?</span>
                            <span class="text-gray-400 transition-transform duration-300" :class="active === 1 ? 'rotate-45' : ''">
                                <i data-lucide="plus" class="w-5 h-5"></i>
                            </span>
                        </button>
                        <div x-show="active === 1" x-collapse x-cloak class="p-6 pt-0 text-[14px] text-[#666666] leading-relaxed font-light border-t border-[#FAFAFA]">
                            While we are proud of our roots in Himachal Pradesh and specialize in regional markets, we work with ambitious brands across India and globally.
                        </div>
                    </div>

                    <!-- Q2 -->
                    <div class="border border-[#ECECEC] rounded-[16px] overflow-hidden bg-white hover:border-[#111111] transition duration-300">
                        <button @click="active = (active === 2 ? null : 2)" 
                                class="w-full flex items-center justify-between p-6 font-semibold text-left text-[16px] text-[#111111] focus:outline-none">
                            <span>Do you work with hotels and tourism brands?</span>
                            <span class="text-gray-400 transition-transform duration-300" :class="active === 2 ? 'rotate-45' : ''">
                                <i data-lucide="plus" class="w-5 h-5"></i>
                            </span>
                        </button>
                        <div x-show="active === 2" x-collapse x-cloak class="p-6 pt-0 text-[14px] text-[#666666] leading-relaxed font-light border-t border-[#FAFAFA]">
                            Yes, tourism and hospitality marketing is one of our core specialties. We have helped numerous resorts, homestays, and tour operators drive direct bookings and organic views.
                        </div>
                    </div>

                    <!-- Q3 -->
                    <div class="border border-[#ECECEC] rounded-[16px] overflow-hidden bg-white hover:border-[#111111] transition duration-300">
                        <button @click="active = (active === 3 ? null : 3)" 
                                class="w-full flex items-center justify-between p-6 font-semibold text-left text-[16px] text-[#111111] focus:outline-none">
                            <span>Do you offer one-time video production?</span>
                            <span class="text-gray-400 transition-transform duration-300" :class="active === 3 ? 'rotate-45' : ''">
                                <i data-lucide="plus" class="w-5 h-5"></i>
                            </span>
                        </button>
                        <div x-show="active === 3" x-collapse x-cloak class="p-6 pt-0 text-[14px] text-[#666666] leading-relaxed font-light border-t border-[#FAFAFA]">
                            Yes, we handle project-based video shoots (such as property tours, brand commercials, or product shoots), alongside our monthly creative retainers.
                        </div>
                    </div>

                    <!-- Q4 -->
                    <div class="border border-[#ECECEC] rounded-[16px] overflow-hidden bg-white hover:border-[#111111] transition duration-300">
                        <button @click="active = (active === 4 ? null : 4)" 
                                class="w-full flex items-center justify-between p-6 font-semibold text-left text-[16px] text-[#111111] focus:outline-none">
                            <span>How much do your services cost?</span>
                            <span class="text-gray-400 transition-transform duration-300" :class="active === 4 ? 'rotate-45' : ''">
                                <i data-lucide="plus" class="w-5 h-5"></i>
                            </span>
                        </button>
                        <div x-show="active === 4" x-collapse x-cloak class="p-6 pt-0 text-[14px] text-[#666666] leading-relaxed font-light border-t border-[#FAFAFA]">
                            Our pricing depends on the scope of work, content frequency, and project complexity. We customize every proposal to fit your specific requirements and budget.
                        </div>
                    </div>

                    <!-- Q5 -->
                    <div class="border border-[#ECECEC] rounded-[16px] overflow-hidden bg-white hover:border-[#111111] transition duration-300">
                        <button @click="active = (active === 5 ? null : 5)" 
                                class="w-full flex items-center justify-between p-6 font-semibold text-left text-[16px] text-[#111111] focus:outline-none">
                            <span>Can you manage complete social media?</span>
                            <span class="text-gray-400 transition-transform duration-300" :class="active === 5 ? 'rotate-45' : ''">
                                <i data-lucide="plus" class="w-5 h-5"></i>
                            </span>
                        </button>
                        <div x-show="active === 5" x-collapse x-cloak class="p-6 pt-0 text-[14px] text-[#666666] leading-relaxed font-light border-t border-[#FAFAFA]">
                            Absolutely. We offer end-to-end management, which includes content calendars, copywriting, graphic design, video production, reels planning, and performance reports.
                        </div>
                    </div>

                    <!-- Q6 -->
                    <div class="border border-[#ECECEC] rounded-[16px] overflow-hidden bg-white hover:border-[#111111] transition duration-300">
                        <button @click="active = (active === 6 ? null : 6)" 
                                class="w-full flex items-center justify-between p-6 font-semibold text-left text-[16px] text-[#111111] focus:outline-none">
                            <span>Do you work outside Solan?</span>
                            <span class="text-gray-400 transition-transform duration-300" :class="active === 6 ? 'rotate-45' : ''">
                                <i data-lucide="plus" class="w-5 h-5"></i>
                            </span>
                        </button>
                        <div x-show="active === 6" x-collapse x-cloak class="p-6 pt-0 text-[14px] text-[#666666] leading-relaxed font-light border-t border-[#FAFAFA]">
                            Yes, our production team travels across Himachal (including Shimla, Manali, Dharamshala, Spiti) and outside the state for shoots and brand campaigns.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FINAL CTA -->
        <section class="mx-6 lg:mx-[90px] mb-20 lg:mb-28">
            <div class="relative bg-[#111111] text-white rounded-[24px] py-20 lg:py-28 px-6 text-center overflow-hidden shadow-xl">
                <!-- Dotgrid Pattern -->
                <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:16px_16px] pointer-events-none"></div>

                <div class="relative z-10 max-w-2xl mx-auto space-y-6">
                    <h2 class="text-3xl sm:text-4xl lg:text-[56px] lg:leading-[1.1] font-bold tracking-tight">
                        Have a Project in Mind?<br>Let's Talk.
                    </h2>
                    <p class="text-[15px] sm:text-[18px] text-gray-400 font-light max-w-xl mx-auto leading-relaxed">
                        Tell us your goal, timeline and budget—we'll help you figure out the right next step.
                    </p>
                    <div class="pt-4 flex flex-col sm:flex-row justify-center items-center gap-4">
                        <button @click="scrollToForm()" 
                                class="w-full sm:w-auto bg-white text-[#111111] hover:bg-gray-100 font-semibold px-8 py-4 rounded-[12px] text-[14px] transition duration-300 shadow-md">
                            Send Enquiry →
                        </button>
                        <a href="https://wa.me/917876148313" target="_blank"
                           class="w-full sm:w-auto border border-white/20 text-white hover:bg-white/10 hover:border-white font-semibold px-8 py-4 rounded-[12px] text-[14px] transition duration-300">
                            WhatsApp Us
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- MOBILE STICKY BOTTOM BAR -->
        <div class="md:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-[#ECECEC] py-3 px-4 shadow-[0_-4px_12px_rgba(0,0,0,0.05)]">
            <div class="grid grid-cols-3 gap-3">
                <a href="tel:+917876148313" 
                   class="flex flex-col items-center justify-center py-2 text-[12px] font-semibold text-[#111111] border border-[#ECECEC] rounded-[10px] bg-[#FAFAFA] hover:border-[#111111] transition">
                    <span class="mb-1"><i data-lucide="phone" class="w-4 h-4"></i></span>
                    <span>Call</span>
                </a>
                <a href="https://wa.me/917876148313" target="_blank"
                   class="flex flex-col items-center justify-center py-2 text-[12px] font-semibold text-[#111111] border border-[#ECECEC] rounded-[10px] bg-[#FAFAFA] hover:border-[#111111] transition">
                    <span class="mb-1"><i data-lucide="message-circle" class="w-4 h-4"></i></span>
                    <span>WhatsApp</span>
                </a>
                <button @click="scrollToForm()" 
                   class="flex flex-col items-center justify-center py-2 text-[12px] font-semibold text-white border border-[#111111] rounded-[10px] bg-[#111111] hover:bg-[#222222] transition">
                    <span class="mb-1"><i data-lucide="edit" class="w-4 h-4"></i></span>
                    <span>Enquire</span>
                </button>
            </div>
        </div>

    </div>
</x-frontend-layout>
