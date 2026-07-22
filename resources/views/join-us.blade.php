<x-frontend-layout>
    <!-- Page Container -->
    <div class="relative overflow-hidden selection:bg-[#111111] selection:text-white" x-data="{
        showInfluencerModal: false,
        showCareerModal: false
    }">
        <!-- HERO SECTION -->
        <section class="relative bg-white pt-8 lg:pt-10 pb-8 overflow-hidden">
            <!-- Floating Background Graphic Parallax Text -->
            <div class="absolute top-4 left-1/2 -translate-x-1/2 text-[140px] md:text-[220px] font-black text-gray-200/60 select-none pointer-events-none tracking-tighter uppercase whitespace-nowrap -z-10">
                JOIN US
            </div>

            <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px] text-center space-y-6">
                <span class="text-[#FF6A00] uppercase font-bold tracking-widest text-[13px] block">
                    &mdash; JOIN KKSB STUDIOS &mdash;
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-[54px] font-extrabold text-[#111111] tracking-tight max-w-3xl mx-auto leading-tight" data-aos="fade-up" data-aos-duration="1000">
                    Let's Build Something Amazing Together
                </h1>
                <p class="text-[16px] md:text-[18px] text-[#666666] leading-relaxed font-light max-w-2xl mx-auto" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    Whether you're a content creator looking to collaborate with us or a creative professional seeking opportunities at KKSB Studios, we'd love to hear from you.
                </p>
            </div>
        </section>

        <!-- TWO CARDS SECTION -->
        <section class="pb-24 bg-white">
            <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px]">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-stretch">
                    
                    <!-- Left Card: Join as an Influencer -->
                    <div class="border border-[#ECECEC] rounded-[24px] p-8 lg:p-10 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between" data-aos="fade-right" data-aos-duration="1000">
                        <div class="space-y-6">
                            <!-- Icon Circle -->
                            <div class="w-14 h-14 bg-[#FF6A00]/10 rounded-full flex items-center justify-center text-[#FF6A00]">
                                <i data-lucide="camera" class="w-6 h-6"></i>
                            </div>

                            <div class="space-y-2">
                                <h2 class="text-2xl lg:text-3xl font-bold text-[#111111]">Join as an Influencer</h2>
                                <p class="text-[14px] font-semibold text-[#FF6A00] uppercase tracking-wider">Become a Creator Partner</p>
                            </div>

                            <div class="border-t border-[#ECECEC] pt-4"></div>

                            <p class="text-[15px] text-[#666666] leading-relaxed font-light">
                                Join the KKSB Studios Creator Network and collaborate with brands on promotional campaigns, influencer marketing projects, travel collaborations, event coverage, and exclusive content opportunities. We're always looking for passionate creators who can deliver authentic and engaging content.
                            </p>

                            <!-- Icons Row -->
                            <div class="flex flex-wrap gap-2.5 pt-6">
                                <div class="flex items-center space-x-2 bg-[#FAFAFA] border border-[#ECECEC] rounded-lg px-3 py-2 text-[#111111] text-[12px] font-semibold whitespace-nowrap">
                                    <i data-lucide="handshake" class="w-4 h-4 text-[#FF6A00]"></i>
                                    <span>Brand Collaborations</span>
                                </div>
                                <div class="flex items-center space-x-2 bg-[#FAFAFA] border border-[#ECECEC] rounded-lg px-3 py-2 text-[#111111] text-[12px] font-semibold whitespace-nowrap">
                                    <i data-lucide="megaphone" class="w-4 h-4 text-[#FF6A00]"></i>
                                    <span>Influencer Campaigns</span>
                                </div>
                                <div class="flex items-center space-x-2 bg-[#FAFAFA] border border-[#ECECEC] rounded-lg px-3 py-2 text-[#111111] text-[12px] font-semibold whitespace-nowrap">
                                    <i data-lucide="plane" class="w-4 h-4 text-[#FF6A00]"></i>
                                    <span>Travel & Event Opportunities</span>
                                </div>
                                <div class="flex items-center space-x-2 bg-[#FAFAFA] border border-[#ECECEC] rounded-lg px-3 py-2 text-[#111111] text-[12px] font-semibold whitespace-nowrap">
                                    <i data-lucide="star" class="w-4 h-4 text-[#FF6A00]"></i>
                                    <span>Exclusive Access</span>
                                </div>
                            </div>
                        </div>

                        <div class="pt-8">
                            <button @click="showInfluencerModal = true" class="w-full bg-[#111111] hover:bg-[#222222] text-white text-[14px] font-semibold h-[50px] px-6 rounded-[12px] transition duration-300 flex items-center justify-center space-x-2 group">
                                <span>Apply as an Influencer</span>
                                <span class="group-hover:translate-x-1 transition-transform duration-200">&rarr;</span>
                            </button>
                        </div>
                    </div>

                    <!-- Right Card: Careers & Internships -->
                    <div class="border border-[#ECECEC] rounded-[24px] p-8 lg:p-10 bg-white shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between" data-aos="fade-left" data-aos-duration="1000">
                        <div class="space-y-6">
                            <!-- Icon Circle -->
                            <div class="w-14 h-14 bg-zinc-100 rounded-full flex items-center justify-center text-zinc-700">
                                <i data-lucide="briefcase" class="w-6 h-6"></i>
                            </div>

                            <div class="space-y-2">
                                <h2 class="text-2xl lg:text-3xl font-bold text-[#111111]">Careers & Internships</h2>
                                <p class="text-[14px] font-semibold text-[#FF6A00] uppercase tracking-wider">Work With KKSB Studios</p>
                            </div>

                            <div class="border-t border-[#ECECEC] pt-4"></div>

                            <p class="text-[15px] text-[#666666] leading-relaxed font-light">
                                Interested in becoming a part of KKSB Studios? Whether you're looking for a full-time role, freelance projects, or an internship, we're always happy to connect with talented individuals across creative and marketing fields.
                            </p>

                            <!-- Talent requirements box -->
                            <div class="bg-[#FAFAFA] border border-[#ECECEC] rounded-[16px] p-5">
                                <p class="text-[12px] font-bold text-[#111111] uppercase tracking-wider mb-3">We're looking for talent in:</p>
                                <div class="grid grid-cols-2 gap-x-4 gap-y-2 text-[13px] text-[#666666] font-medium">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-1.5 h-1.5 bg-[#FF6A00] rounded-full"></span>
                                        <span>Video Editors</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-1.5 h-1.5 bg-[#FF6A00] rounded-full"></span>
                                        <span>Content Writers</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-1.5 h-1.5 bg-[#FF6A00] rounded-full"></span>
                                        <span>Cinematographers</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-1.5 h-1.5 bg-[#FF6A00] rounded-full"></span>
                                        <span>Photographers</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-1.5 h-1.5 bg-[#FF6A00] rounded-full"></span>
                                        <span>Graphic Designers</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-1.5 h-1.5 bg-[#FF6A00] rounded-full"></span>
                                        <span>Content Creators</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-1.5 h-1.5 bg-[#FF6A00] rounded-full"></span>
                                        <span>Motion Graphic Artists</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-1.5 h-1.5 bg-[#FF6A00] rounded-full"></span>
                                        <span>Sales & Business Dev</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-1.5 h-1.5 bg-[#FF6A00] rounded-full"></span>
                                        <span>Social Media Managers</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-1.5 h-1.5 bg-[#FF6A00] rounded-full"></span>
                                        <span>Website Developers</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-1.5 h-1.5 bg-[#FF6A00] rounded-full"></span>
                                        <span>Performance Marketers</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-1.5 h-1.5 bg-[#FF6A00] rounded-full"></span>
                                        <span>Interns & Many More</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-8">
                            <button @click="showCareerModal = true" class="w-full bg-[#111111] hover:bg-[#222222] text-white text-[14px] font-semibold h-[50px] px-6 rounded-[12px] transition duration-300 flex items-center justify-center space-x-2 group">
                                <span>Apply Now</span>
                                <span class="group-hover:translate-x-1 transition-transform duration-200">&rarr;</span>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Footer Have Questions -->
                <div class="mt-16 flex items-center justify-center space-x-3 text-center border-t border-[#ECECEC] pt-10">
                    <div class="w-10 h-10 bg-[#FF6A00]/10 rounded-full flex items-center justify-center text-[#FF6A00]">
                        <i data-lucide="mail" class="w-5 h-5"></i>
                    </div>
                    <div class="text-left">
                        <h4 class="text-[14px] font-semibold text-[#111111]">Have questions?</h4>
                        <p class="text-[13px] text-[#666666]">We're here to help. Reach out to us anytime.</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- Influencer Form Modal -->
        <div class="fixed inset-0 z-50 overflow-y-auto" x-show="showInfluencerModal" x-transition x-cloak>
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-black/55 backdrop-blur-sm transition-opacity" @click="showInfluencerModal = false"></div>
            
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="bg-white border border-[#ECECEC] rounded-[20px] max-w-lg w-full p-6 lg:p-8 relative shadow-2xl z-10 my-auto" @click.away="showInfluencerModal = false">
                    <button @click="showInfluencerModal = false" class="absolute top-5 right-5 text-gray-400 hover:text-[#111111] transition focus:outline-none">
                        <i data-lucide="x" class="w-6 h-6"></i>
                    </button>

                    <div class="space-y-4">
                        <div class="w-12 h-12 bg-[#FF6A00]/10 rounded-full flex items-center justify-center text-[#FF6A00]">
                            <i data-lucide="camera" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-[#111111]">Apply as an Influencer</h3>
                            <p class="text-[13px] text-[#666666] mt-1">Join our network and build campaigns for top brands.</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('join-us.apply') }}" class="mt-6 space-y-4">
                        @csrf
                        <input type="hidden" name="type" value="influencer">
                        
                        <!-- Honeypot -->
                        <div style="display: none;">
                            <input type="text" name="honeypot" value="">
                        </div>

                        <div class="space-y-1">
                            <label for="inf_name" class="text-[12px] font-semibold text-[#111111]">Your Name *</label>
                            <input type="text" id="inf_name" name="name" required placeholder="Enter your full name" 
                                   class="w-full bg-white border border-[#ECECEC] rounded-[10px] h-[48px] px-4 text-[14px] text-[#111111] focus:border-[#111111] outline-none transition">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label for="inf_email" class="text-[12px] font-semibold text-[#111111]">Email Address *</label>
                                <input type="email" id="inf_email" name="email" required placeholder="Enter your email" 
                                       class="w-full bg-white border border-[#ECECEC] rounded-[10px] h-[48px] px-4 text-[14px] text-[#111111] focus:border-[#111111] outline-none transition">
                            </div>
                            <div class="space-y-1">
                                <label for="inf_phone" class="text-[12px] font-semibold text-[#111111]">Phone Number</label>
                                <input type="text" id="inf_phone" name="phone" placeholder="Enter phone number" 
                                       class="w-full bg-white border border-[#ECECEC] rounded-[10px] h-[48px] px-4 text-[14px] text-[#111111] focus:border-[#111111] outline-none transition">
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="inf_social" class="text-[12px] font-semibold text-[#111111]">Instagram or YouTube Link *</label>
                            <input type="url" id="inf_social" name="social_link" required placeholder="https://instagram.com/yourprofile" 
                                   class="w-full bg-white border border-[#ECECEC] rounded-[10px] h-[48px] px-4 text-[14px] text-[#111111] focus:border-[#111111] outline-none transition">
                        </div>

                        <div class="space-y-1">
                            <label for="inf_message" class="text-[12px] font-semibold text-[#111111]">Tell us about your audience & content</label>
                            <textarea id="inf_message" name="message" rows="3" placeholder="Tell us about your content, followers count, or niche..." 
                                      class="w-full bg-white border border-[#ECECEC] rounded-[10px] p-4 text-[14px] text-[#111111] focus:border-[#111111] outline-none transition resize-none"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-[#111111] hover:bg-[#222222] text-white text-[14px] font-semibold h-[48px] rounded-[10px] transition duration-300 mt-2 shadow-md">
                            Submit Application
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Careers Form Modal -->
        <div class="fixed inset-0 z-50 overflow-y-auto" x-show="showCareerModal" x-transition x-cloak>
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-black/55 backdrop-blur-sm transition-opacity" @click="showCareerModal = false"></div>
            
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="bg-white border border-[#ECECEC] rounded-[20px] max-w-lg w-full p-6 lg:p-8 relative shadow-2xl z-10 my-auto" @click.away="showCareerModal = false">
                    <button @click="showCareerModal = false" class="absolute top-5 right-5 text-gray-400 hover:text-[#111111] transition focus:outline-none">
                        <i data-lucide="x" class="w-6 h-6"></i>
                    </button>

                    <div class="space-y-4">
                        <div class="w-12 h-12 bg-zinc-100 rounded-full flex items-center justify-center text-zinc-700">
                            <i data-lucide="briefcase" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-[#111111]">Apply for Career & Internships</h3>
                            <p class="text-[13px] text-[#666666] mt-1">Join the KKSB Studios team and grow with us.</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('join-us.apply') }}" class="mt-6 space-y-4">
                        @csrf
                        <input type="hidden" name="type" value="career">
                        
                        <!-- Honeypot -->
                        <div style="display: none;">
                            <input type="text" name="honeypot" value="">
                        </div>

                        <div class="space-y-1">
                            <label for="car_name" class="text-[12px] font-semibold text-[#111111]">Your Name *</label>
                            <input type="text" id="car_name" name="name" required placeholder="Enter your full name" 
                                   class="w-full bg-white border border-[#ECECEC] rounded-[10px] h-[48px] px-4 text-[14px] text-[#111111] focus:border-[#111111] outline-none transition">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label for="car_email" class="text-[12px] font-semibold text-[#111111]">Email Address *</label>
                                <input type="email" id="car_email" name="email" required placeholder="Enter your email" 
                                       class="w-full bg-white border border-[#ECECEC] rounded-[10px] h-[48px] px-4 text-[14px] text-[#111111] focus:border-[#111111] outline-none transition">
                            </div>
                            <div class="space-y-1">
                                <label for="car_phone" class="text-[12px] font-semibold text-[#111111]">Phone Number</label>
                                <input type="text" id="car_phone" name="phone" placeholder="Enter phone number" 
                                       class="w-full bg-white border border-[#ECECEC] rounded-[10px] h-[48px] px-4 text-[14px] text-[#111111] focus:border-[#111111] outline-none transition">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label for="car_position" class="text-[12px] font-semibold text-[#111111]">Position / Field *</label>
                                <select id="car_position" name="position" required 
                                        class="w-full bg-white border border-[#ECECEC] rounded-[10px] h-[48px] px-4 text-[14px] text-[#111111] focus:border-[#111111] outline-none transition">
                                    <option value="">Select a position</option>
                                    <option value="Video Editor">Video Editor</option>
                                    <option value="Cinematographer">Cinematographer</option>
                                    <option value="Graphic Designer">Graphic Designer</option>
                                    <option value="Motion Graphic Artist">Motion Graphic Artist</option>
                                    <option value="Social Media Manager">Social Media Manager</option>
                                    <option value="Performance Marketer">Performance Marketer</option>
                                    <option value="Content Writer">Content Writer</option>
                                    <option value="Photographer">Photographer</option>
                                    <option value="Content Creator">Content Creator</option>
                                    <option value="Sales & Business Development">Sales & Business Development</option>
                                    <option value="Website Developer">Website Developer</option>
                                    <option value="Internship">Internship</option>
                                    <option value="Other">Other Role</option>
                                </select>
                            </div>
                            <div class="space-y-1">
                                <label for="car_resume" class="text-[12px] font-semibold text-[#111111]">Resume / Portfolio Link *</label>
                                <input type="url" id="car_resume" name="resume_link" required placeholder="Google Drive, Behance, or CV Link" 
                                       class="w-full bg-white border border-[#ECECEC] rounded-[10px] h-[48px] px-4 text-[14px] text-[#111111] focus:border-[#111111] outline-none transition">
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="car_message" class="text-[12px] font-semibold text-[#111111]">Brief Message (Optional)</label>
                            <textarea id="car_message" name="message" rows="3" placeholder="Tell us why you want to work with us, your experience, or skills..." 
                                      class="w-full bg-white border border-[#ECECEC] rounded-[10px] p-4 text-[14px] text-[#111111] focus:border-[#111111] outline-none transition resize-none"></textarea>
                        </div>

                        <button type="submit" class="w-full bg-[#111111] hover:bg-[#222222] text-white text-[14px] font-semibold h-[48px] rounded-[10px] transition duration-300 mt-2 shadow-md">
                            Submit Application
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-frontend-layout>
