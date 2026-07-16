<x-frontend-layout>
    <!-- Inject Google Font Inter and Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Hero Header (Static Dark Theme, No Video/Text Animations) -->
    <section class="relative bg-zinc-950 text-white py-24 border-b border-white/10">
        <div class="max-w-4xl mx-auto px-6 text-center space-y-6">
            <span class="liquid-glass inline-flex px-4 py-1.5 rounded-full text-xs font-bold text-white border border-white/10 uppercase tracking-widest font-barlow">// Get In Touch</span>
            <h1 class="font-barlow italic text-4xl sm:text-6xl font-extrabold tracking-tight text-white leading-[0.9] tracking-[-3px] uppercase">
                Let's Build Something Together
            </h1>
            <p class="text-base sm:text-lg text-white/80 leading-relaxed max-w-2xl mx-auto font-barlow font-light">
                Ready to take the next step? Fill out the proposal form, schedule a whatsapp call, or visit our studio in Solan.
            </p>
        </div>
    </section>

    <!-- Map & Form Content -->
    <section class="py-24 bg-zinc-950 text-white">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-16">
            <!-- Left panel: Contact details and Map -->
            <div class="lg:col-span-5 space-y-8">
                <!-- Image & Address Card -->
                <div class="relative overflow-hidden rounded-[32px] p-8 lg:p-10 text-white min-h-[380px] flex flex-col justify-between border border-white/10 liquid-glass hover:border-white/20 transition-all duration-300">
                    <!-- Background image -->
                    <div class="absolute inset-0 z-0 bg-zinc-900 bg-cover bg-center opacity-30" style="background-image: url('https://images.unsplash.com/photo-1542744094-3a31f103e35f?q=80&w=1200&auto=format&fit=crop');"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-950 via-zinc-950/75 to-transparent z-10"></div>
                    
                    <div class="relative z-20">
                        <span class="text-[9px] font-extrabold text-white bg-white/10 px-2.5 py-1 rounded-full uppercase tracking-wider font-barlow">KKSB Studio</span>
                    </div>

                    <div class="relative z-20 space-y-4">
                        <h3 class="text-2xl font-bold tracking-tight font-barlow">Let's build something together.</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs opacity-90 pt-4 border-t border-white/10">
                            <div class="space-y-1">
                                <span class="font-bold block uppercase text-[9px] text-white/60 tracking-wider font-barlow">Studio Address</span>
                                <p class="font-barlow font-light">{{ App\Models\Setting::get('contact_address', 'Solan, Himachal Pradesh, India') }}</p>
                            </div>
                            <div class="space-y-1">
                                <span class="font-bold block uppercase text-[9px] text-white/60 tracking-wider font-barlow">Email Address</span>
                                <p class="truncate font-barlow font-light"><a href="mailto:{{ App\Models\Setting::get('contact_email', 'hello@kksbstudios.com') }}" class="hover:underline">{{ App\Models\Setting::get('contact_email', 'hello@kksbstudios.com') }}</a></p>
                            </div>
                            <div class="space-y-1">
                                <span class="font-bold block uppercase text-[9px] text-white/60 tracking-wider font-barlow">Phone Support</span>
                                <p class="font-barlow font-light">{{ App\Models\Setting::get('contact_phone', '+91 78761 46013') }}</p>
                            </div>
                            <div class="space-y-1">
                                <span class="font-bold block uppercase text-[9px] text-white/60 tracking-wider font-barlow">Hours</span>
                                <p class="font-barlow font-light">{{ App\Models\Setting::get('business_hours', 'Mon - Sat: 10:00 AM - 7:00 PM') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Google Maps Embed -->
                <div class="aspect-video w-full rounded-3xl overflow-hidden border border-white/10 liquid-glass">
                    <iframe class="w-full h-full opacity-80 hover:opacity-100 transition-opacity duration-300" src="{{ App\Models\Setting::get('google_map_embed', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3429.6267568579044!2d77.1082697!3d30.9111166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390f86c2aa27fae7%3A0x7d6f51278ffbdc0d!2sSolan%2C%20Himachal%20Pradesh!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin') }}" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Right panel: Contact Enquiry Form -->
            <div class="lg:col-span-7 liquid-glass border border-white/10 p-8 lg:p-10 rounded-[32px]">
                <h3 class="text-2xl font-bold tracking-tight text-white mb-6 font-barlow">Describe Your Scope</h3>

                <form method="POST" action="/contact/submit" class="space-y-6">
                    @csrf
                    
                    <!-- Bot Spam Honeypot Protection -->
                    <div style="display: none;">
                        <input type="text" name="honeypot" id="honeypot" value="">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="space-y-1.5">
                            <label for="name" class="text-xs font-bold text-white/70 uppercase font-barlow tracking-wider">Your Name</label>
                            <input type="text" name="name" id="name" required placeholder="e.g. Rajesh Sen"
                                   class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-xs text-white placeholder-white/30 focus:ring-white focus:border-white focus:bg-zinc-900/50 transition">
                        </div>

                        <div class="space-y-1.5">
                            <label for="email" class="text-xs font-bold text-white/70 uppercase font-barlow tracking-wider">Email Address</label>
                            <input type="email" name="email" id="email" required placeholder="e.g. rajesh@resort.com"
                                   class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-xs text-white placeholder-white/30 focus:ring-white focus:border-white focus:bg-zinc-900/50 transition">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="space-y-1.5">
                            <label for="phone" class="text-xs font-bold text-white/70 uppercase font-barlow tracking-wider">Phone Number</label>
                            <input type="text" name="phone" id="phone" placeholder="e.g. +91 98160 12345"
                                   class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-xs text-white placeholder-white/30 focus:ring-white focus:border-white focus:bg-zinc-900/50 transition">
                        </div>

                        <div class="space-y-1.5">
                            <label for="company" class="text-xs font-bold text-white/70 uppercase font-barlow tracking-wider">Company Name</label>
                            <input type="text" name="company" id="company" placeholder="e.g. Himalayan Resort"
                                   class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2.5 text-xs text-white placeholder-white/30 focus:ring-white focus:border-white focus:bg-zinc-900/50 transition">
                        </div>
                    </div>

                    <!-- Service dropdown selection -->
                    <div class="space-y-1.5">
                        <label for="service_interest" class="text-xs font-bold text-white/70 uppercase font-barlow tracking-wider">Service Interest</label>
                        <select name="service_interest" id="service_interest"
                                class="w-full bg-zinc-900 border border-white/10 rounded-xl px-4 py-2.5 text-xs text-white placeholder-white/30 focus:ring-white focus:border-white focus:bg-zinc-900/50 transition">
                            <option value="">Select Service Area</option>
                            @foreach(App\Models\Service::where('is_active', true)->orderBy('order')->get() as $cService)
                                <option value="{{ $cService->title }}" {{ request('service') === $cService->title ? 'selected' : '' }}>{{ $cService->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Budget Radio Selection -->
                    <div class="space-y-2">
                        <span class="text-xs font-bold text-white/70 uppercase block font-barlow tracking-wider">Estimated Project Budget</span>
                        <div class="flex flex-wrap gap-3">
                            @foreach(['Under ₹25k', '₹25k - ₹50k', '₹50k - ₹1 Lakh', '₹1 Lakh - ₹3 Lakhs', '₹3 Lakhs+'] as $budgetRange)
                                <label class="inline-flex items-center space-x-2 bg-white/5 border border-white/10 rounded-full px-4 py-2 text-xs font-semibold cursor-pointer hover:bg-white/10 transition">
                                    <input type="radio" name="budget" value="{{ $budgetRange }}" class="text-white focus:ring-zinc-650 bg-zinc-900 border-white/15">
                                    <span class="font-barlow text-white/90">{{ $budgetRange }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Message Details -->
                    <div class="space-y-1.5">
                        <label for="message" class="text-xs font-bold text-white/70 uppercase font-barlow tracking-wider">Message & Details</label>
                        <textarea name="message" id="message" rows="4" required placeholder="Describe your creative requirements, timeline, target files and details..."
                                  class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-xs text-white placeholder-white/30 focus:ring-white focus:border-white focus:bg-zinc-900/50 transition"></textarea>
                    </div>

                    <!-- Action buttons -->
                    <div class="pt-4 border-t border-white/10">
                        <button type="submit" class="inline-flex items-center justify-center space-x-2 bg-white hover:bg-zinc-200 text-black text-xs font-bold px-6 py-3.5 rounded-full transition w-full shadow-lg">
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
    <section class="py-24 bg-zinc-950 text-white border-t border-white/10" x-data="{ active: null }">
        <div class="max-w-4xl mx-auto px-6 space-y-12">
            <div class="text-center space-y-4 max-w-xl mx-auto">
                <span class="text-xs font-bold text-white/60 uppercase tracking-widest block font-barlow">// Inquiries</span>
                <h2 class="font-barlow italic text-4xl font-extrabold tracking-tight text-white">Contact Frequently Asked Questions</h2>
            </div>

            <div class="space-y-4">
                @foreach($faqs as $index => $faq)
                    <div class="liquid-glass rounded-2xl border border-white/10 overflow-hidden transition duration-300">
                        <button @click="active = (active === {{ $index }} ? null : {{ $index }})" 
                                class="w-full flex items-center justify-between p-6 font-bold text-left text-sm sm:text-base text-white hover:text-zinc-300 focus:outline-none font-barlow">
                            <span>{{ $faq->question }}</span>
                            <span class="text-white/60 transition-transform duration-200" :class="active === {{ $index }} ? 'rotate-45' : ''">
                                <i data-lucide="plus" class="w-4 h-4"></i>
                            </span>
                        </button>
                        <div x-show="active === {{ $index }}" x-transition class="p-6 pt-0 text-xs sm:text-sm text-white/75 leading-relaxed border-t border-white/5 font-barlow font-light">
                            {{ $faq->answer }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</x-frontend-layout>
