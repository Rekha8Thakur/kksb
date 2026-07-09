<x-frontend-layout>
    
    <!-- Hero Header -->
    <section class="bg-[#F8F8F8] py-20 border-b border-gray-150">
        <div class="max-w-4xl mx-auto px-6 text-center space-y-6">
            <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest block">Get In Touch</span>
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-[#111111] leading-tight">
                Let's Build Something Together
            </h1>
            <p class="text-base sm:text-lg text-gray-500 leading-relaxed max-w-2xl mx-auto">
                Ready to take the next step? Fill out the proposal form, schedule a whatsapp call, or visit our studio in Solan.
            </p>
        </div>
    </section>

    <!-- Map & Form Content -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-16">
            <!-- Left panel: Contact details and Map -->
            <div class="lg:col-span-5 space-y-8">
                <!-- Image & Address Card -->
                <div class="relative overflow-hidden rounded-[32px] p-8 lg:p-10 text-white min-h-[380px] flex flex-col justify-between shadow-lg" data-aos="fade-right">
                    <!-- Background image -->
                    <div class="absolute inset-0 z-0 bg-zinc-900 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1542744094-3a31f103e35f?q=80&w=1200&auto=format&fit=crop');"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/75 to-transparent z-10"></div>
                    
                    <div class="relative z-20">
                        <span class="text-[9px] font-extrabold text-[#2E7D32] bg-white px-2.5 py-1 rounded-full uppercase tracking-wider">KKSB Studio</span>
                    </div>

                    <div class="relative z-20 space-y-4">
                        <h3 class="text-2xl font-bold tracking-tight">Let's build something together.</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs opacity-90 pt-2 border-t border-white/20">
                            <div class="space-y-1">
                                <span class="font-bold block uppercase text-[9px] text-[#2E7D32] tracking-wider">Studio Address</span>
                                <p>{{ App\Models\Setting::get('contact_address', 'Solan, Himachal Pradesh, India') }}</p>
                            </div>
                            <div class="space-y-1">
                                <span class="font-bold block uppercase text-[9px] text-[#2E7D32] tracking-wider">Email Address</span>
                                <p class="truncate"><a href="mailto:{{ App\Models\Setting::get('contact_email', 'hello@kksbstudios.com') }}" class="hover:underline">{{ App\Models\Setting::get('contact_email', 'hello@kksbstudios.com') }}</a></p>
                            </div>
                            <div class="space-y-1">
                                <span class="font-bold block uppercase text-[9px] text-[#2E7D32] tracking-wider">Phone Support</span>
                                <p>{{ App\Models\Setting::get('contact_phone', '+91 78761 46013') }}</p>
                            </div>
                            <div class="space-y-1">
                                <span class="font-bold block uppercase text-[9px] text-[#2E7D32] tracking-wider">Hours</span>
                                <p>{{ App\Models\Setting::get('business_hours', 'Mon - Sat: 10:00 AM - 7:00 PM') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Maps Embed -->
                <div class="aspect-video w-full rounded-3xl overflow-hidden border border-gray-200 shadow-sm bg-gray-50" data-aos="fade-right" data-aos-delay="100">
                    <iframe class="w-full h-full" src="{{ App\Models\Setting::get('google_map_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3429.6267568579044!2d77.1082697!3d30.9111166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390f86c2aa27fae7%3A0x7d6f51278ffbdc0d!2sSolan%2C%20Himachal%20Pradesh!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin') }}" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Right panel: Contact Enquiry Form -->
            <div class="lg:col-span-7 bg-[#F8F8F8] border border-gray-150 p-8 lg:p-10 rounded-3xl">
                <h3 class="text-2xl font-bold tracking-tight text-gray-900 mb-6">Describe Your Scope</h3>

                <form method="POST" action="/contact/submit" class="space-y-6">
                    @csrf
                    
                    <!-- Bot Spam Honeypot Protection -->
                    <div style="display: none;">
                        <input type="text" name="honeypot" id="honeypot" value="">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label for="name" class="text-xs font-bold text-gray-700 uppercase">Your Name</label>
                            <input type="text" name="name" id="name" required placeholder="e.g. Rajesh Sen"
                                   class="w-full bg-white border border-gray-300 rounded-xl px-4 py-2.5 text-xs text-[#111111] focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div class="space-y-1">
                            <label for="email" class="text-xs font-bold text-gray-700 uppercase">Email Address</label>
                            <input type="email" name="email" id="email" required placeholder="e.g. rajesh@resort.com"
                                   class="w-full bg-white border border-gray-300 rounded-xl px-4 py-2.5 text-xs text-[#111111] focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="space-y-1">
                            <label for="phone" class="text-xs font-bold text-gray-700 uppercase">Phone Number</label>
                            <input type="text" name="phone" id="phone" placeholder="e.g. +91 98160 12345"
                                   class="w-full bg-white border border-gray-300 rounded-xl px-4 py-2.5 text-xs text-[#111111] focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div class="space-y-1">
                            <label for="company" class="text-xs font-bold text-gray-700 uppercase">Company Name</label>
                            <input type="text" name="company" id="company" placeholder="e.g. Himalayan Resort"
                                   class="w-full bg-white border border-gray-300 rounded-xl px-4 py-2.5 text-xs text-[#111111] focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                    </div>

                    <!-- Service dropdown selection -->
                    <div class="space-y-1">
                        <label for="service_interest" class="text-xs font-bold text-gray-700 uppercase">Service Interest</label>
                        <select name="service_interest" id="service_interest"
                                class="w-full bg-white border border-gray-300 rounded-xl px-4 py-2.5 text-xs text-[#111111] focus:ring-emerald-500 focus:border-emerald-500">
                            <option value="">Select Service Area</option>
                            @foreach(App\Models\Service::where('is_active', true)->orderBy('order')->get() as $cService)
                                <option value="{{ $cService->title }}" {{ request('service') === $cService->title ? 'selected' : '' }}>{{ $cService->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Budget Radio Selection -->
                    <div class="space-y-2">
                        <span class="text-xs font-bold text-gray-700 uppercase block">Estimated Project Budget</span>
                        <div class="flex flex-wrap gap-3">
                            @foreach(['Under ₹25k', '₹25k - ₹50k', '₹50k - ₹1 Lakh', '₹1 Lakh - ₹3 Lakhs', '₹3 Lakhs+'] as $budgetRange)
                                <label class="inline-flex items-center space-x-2 bg-white border border-gray-300 rounded-full px-4 py-2 text-xs font-semibold cursor-pointer hover:bg-gray-50">
                                    <input type="radio" name="budget" value="{{ $budgetRange }}" class="text-emerald-600 focus:ring-emerald-500">
                                    <span>{{ $budgetRange }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Message Details -->
                    <div class="space-y-1">
                        <label for="message" class="text-xs font-bold text-gray-700 uppercase">Message & Details</label>
                        <textarea name="message" id="message" rows="4" required placeholder="Describe your creative requirements, timeline, target files and details..."
                                  class="w-full bg-white border border-gray-300 rounded-xl px-4 py-2 text-xs text-[#111111] focus:ring-emerald-500 focus:border-emerald-500"></textarea>
                    </div>

                    <!-- Action buttons -->
                    <div class="pt-4 border-t border-gray-200/50">
                        <button type="submit" class="inline-flex items-center justify-center space-x-2 bg-[#111111] hover:bg-[#2E7D32] text-white text-xs font-bold px-6 py-3.5 rounded-full transition w-full shadow-lg">
                            <span>Submit Project Request</span>
                            <i data-lucide="send" class="w-4 h-4"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- FAQs Section -->
    @if($faqs->isNotEmpty())
    <section class="py-24 bg-[#F8F8F8]" x-data="{ active: null }">
        <div class="max-w-4xl mx-auto px-6 space-y-12">
            <div class="text-center space-y-4 max-w-xl mx-auto">
                <span class="text-xs font-bold text-[#2E7D32] uppercase tracking-widest block">Inquiries</span>
                <h2 class="text-4xl font-extrabold tracking-tight">Contact Frequently Asked Questions</h2>
            </div>

            <div class="space-y-4">
                @foreach($faqs as $index => $faq)
                    <div class="bg-white rounded-2xl border border-gray-150 overflow-hidden transition duration-300">
                        <button @click="active = (active === {{ $index }} ? null : {{ $index }})" 
                                class="w-full flex items-center justify-between p-6 font-bold text-left text-sm sm:text-base text-gray-900 focus:outline-none">
                            <span>{{ $faq->question }}</span>
                            <span class="text-gray-400 transition-transform duration-200" :class="active === {{ $index }} ? 'rotate-45' : ''">
                                <i data-lucide="plus" class="w-4 h-4"></i>
                            </span>
                        </button>
                        <div x-show="active === {{ $index }}" x-transition class="p-6 pt-0 text-xs sm:text-sm text-gray-500 leading-relaxed border-t border-gray-50">
                            {{ $faq->answer }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

</x-frontend-layout>
