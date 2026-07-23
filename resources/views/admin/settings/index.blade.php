<x-admin-layout>
    <x-slot name="title">CMS Settings</x-slot>

    <div class="max-w-4xl mx-auto space-y-6" x-data="{ tab: 'general' }">
        <!-- Page Header -->
        <div>
            <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">CMS Settings</h1>
            <p class="text-sm text-gray-500 dark:text-zinc-400">Configure global website details, homepage headings, mission values, and social links.</p>
        </div>

        <!-- Navigation Tabs -->
        <div class="flex space-x-1 bg-gray-200/60 dark:bg-zinc-900 p-1.5 rounded-xl border border-gray-300/40 dark:border-zinc-800">
            <button @click="tab = 'general'" :class="tab === 'general' ? 'bg-white dark:bg-zinc-800 text-gray-900 dark:text-white font-bold shadow-sm' : 'text-gray-500 hover:text-gray-800 dark:text-zinc-400 dark:hover:text-zinc-200'" class="flex-1 py-2 px-3 rounded-lg text-xs font-semibold transition">
                General & Brand
            </button>
            <button @click="tab = 'home'" :class="tab === 'home' ? 'bg-white dark:bg-zinc-800 text-gray-900 dark:text-white font-bold shadow-sm' : 'text-gray-500 hover:text-gray-800 dark:text-zinc-400 dark:hover:text-zinc-200'" class="flex-1 py-2 px-3 rounded-lg text-xs font-semibold transition">
                Homepage Hero
            </button>
            <button @click="tab = 'about'" :class="tab === 'about' ? 'bg-white dark:bg-zinc-800 text-gray-900 dark:text-white font-bold shadow-sm' : 'text-gray-500 hover:text-gray-800 dark:text-zinc-400 dark:hover:text-zinc-200'" class="flex-1 py-2 px-3 rounded-lg text-xs font-semibold transition">
                About Story
            </button>
            <button @click="tab = 'socials'" :class="tab === 'socials' ? 'bg-white dark:bg-zinc-800 text-gray-900 dark:text-white font-bold shadow-sm' : 'text-gray-500 hover:text-gray-800 dark:text-zinc-400 dark:hover:text-zinc-200'" class="flex-1 py-2 px-3 rounded-lg text-xs font-semibold transition">
                Social Networks
            </button>
            <button @click="tab = 'showreel'" :class="tab === 'showreel' ? 'bg-white dark:bg-zinc-800 text-gray-900 dark:text-white font-bold shadow-sm' : 'text-gray-500 hover:text-gray-800 dark:text-zinc-400 dark:hover:text-zinc-200'" class="flex-1 py-2 px-3 rounded-lg text-xs font-semibold transition">
                Homepage Showreel
            </button>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-zinc-900 rounded-2xl border border-gray-200 dark:border-zinc-800 shadow-sm p-6 lg:p-8">
            <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Tab 1: General & Brand -->
                <div x-show="tab === 'general'" class="space-y-6">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">General Brand Settings</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Site Name</label>
                            <input type="text" name="site_name" value="{{ App\Models\Setting::get('site_name', 'KKSB Studios') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Site Tagline</label>
                            <input type="text" name="site_tagline" value="{{ App\Models\Setting::get('site_tagline') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Contact Email</label>
                            <input type="email" name="contact_email" value="{{ App\Models\Setting::get('contact_email') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Contact Phone</label>
                            <input type="text" name="contact_phone" value="{{ App\Models\Setting::get('contact_phone') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">WhatsApp Number</label>
                            <input type="text" name="contact_whatsapp" value="{{ App\Models\Setting::get('contact_whatsapp') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Office Address</label>
                        <input type="text" name="contact_address" value="{{ App\Models\Setting::get('contact_address') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Business Hours</label>
                            <input type="text" name="business_hours" value="{{ App\Models\Setting::get('business_hours') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Google Maps Embed URL</label>
                            <input type="text" name="google_map_embed" value="{{ App\Models\Setting::get('google_map_embed') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                    </div>
                </div>

                <!-- Tab 2: Homepage Hero -->
                <div x-show="tab === 'home'" class="space-y-6" style="display: none;">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Homepage Hero Settings</h3>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Hero Main Title (H1)</label>
                        <input type="text" name="home_hero_title" value="{{ App\Models\Setting::get('home_hero_title') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Hero Subtitle Paragraph</label>
                        <textarea name="home_hero_subtitle" rows="3" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ App\Models\Setting::get('home_hero_subtitle') }}</textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Hero Background Image</label>
                        @if($path = App\Models\Setting::get('home_hero_bg'))
                            <div class="flex items-center space-x-3 mb-2">
                                <img src="{{ asset($path) }}" class="w-20 h-10 object-cover rounded border border-gray-300" alt="">
                                <span class="text-xs text-gray-500">Current Hero Image</span>
                            </div>
                        @endif
                        <input type="file" name="home_hero_bg_file" accept="image/*" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2 text-sm text-gray-500 dark:text-zinc-400 file:mr-4 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white dark:file:bg-zinc-700">
                    </div>
                </div>

                <!-- Tab 3: About Story -->
                <div x-show="tab === 'about'" class="space-y-6" style="display: none;">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">About Page Content Settings</h3>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">About Hero Title</label>
                        <input type="text" name="about_hero_title" value="{{ App\Models\Setting::get('about_hero_title') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">About Hero Subtitle</label>
                        <textarea name="about_hero_subtitle" rows="2" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ App\Models\Setting::get('about_hero_subtitle') }}</textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Company Story Header</label>
                        <input type="text" name="about_story_title" value="{{ App\Models\Setting::get('about_story_title') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Company Story Content</label>
                        <textarea name="about_story_text" rows="5" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ App\Models\Setting::get('about_story_text') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-gray-150 dark:border-zinc-800 pt-6">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Company Mission Statement</label>
                            <textarea name="about_mission" rows="3" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ App\Models\Setting::get('about_mission') }}</textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Company Vision Statement</label>
                            <textarea name="about_vision" rows="3" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">{{ App\Models\Setting::get('about_vision') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Tab 4: Socials -->
                <div x-show="tab === 'socials'" class="space-y-6" style="display: none;">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Social Network Profiles</h3>

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Instagram Channel link</label>
                            <input type="url" name="social_instagram" value="{{ App\Models\Setting::get('social_instagram') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">YouTube Channel link</label>
                            <input type="url" name="social_youtube" value="{{ App\Models\Setting::get('social_youtube') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">LinkedIn Business Profile</label>
                            <input type="url" name="social_linkedin" value="{{ App\Models\Setting::get('social_linkedin') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700 dark:text-zinc-300">Facebook Business page</label>
                            <input type="url" name="social_facebook" value="{{ App\Models\Setting::get('social_facebook') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                        </div>
                    </div>
                </div>

                <!-- Tab 5: Showreel Videos -->
                <div x-show="tab === 'showreel'" class="space-y-6" style="display: none;">
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Homepage Showreel Settings</h3>
                    <p class="text-xs text-gray-500 dark:text-zinc-400">Enter full YouTube URLs (e.g. https://www.youtube.com/watch?v=...) and custom titles. The system will automatically extract the video ID, generate the embed players, and load the cover thumbnails.</p>

                    <!-- Video 1 -->
                    <div class="border-b border-gray-100 dark:border-zinc-800 pb-6 space-y-4">
                        <h4 class="text-sm font-bold text-gray-800 dark:text-zinc-200">Video #1 (Left Card)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="text-xs font-semibold text-gray-600 dark:text-zinc-400">YouTube URL</label>
                                <input type="url" name="showreel_video_1" value="{{ App\Models\Setting::get('showreel_video_1', 'https://www.youtube.com/watch?v=H7ch9Z3_qeM') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-semibold text-gray-600 dark:text-zinc-400">Custom Title</label>
                                <input type="text" name="showreel_title_1" value="{{ App\Models\Setting::get('showreel_title_1', 'Mahasu Devta Documentary') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                            </div>
                        </div>
                    </div>

                    <!-- Video 2 -->
                    <div class="border-b border-gray-100 dark:border-zinc-800 pb-6 space-y-4">
                        <h4 class="text-sm font-bold text-gray-800 dark:text-zinc-200">Video #2 (Center Card)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="text-xs font-semibold text-gray-600 dark:text-zinc-400">YouTube URL</label>
                                <input type="url" name="showreel_video_2" value="{{ App\Models\Setting::get('showreel_video_2', 'https://www.youtube.com/watch?v=eyvS1WsEsNY') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-semibold text-gray-600 dark:text-zinc-400">Custom Title</label>
                                <input type="text" name="showreel_title_2" value="{{ App\Models\Setting::get('showreel_title_2', 'Shoolini Mata Documentary') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                            </div>
                        </div>
                    </div>

                    <!-- Video 3 -->
                    <div class="pb-4 space-y-4">
                        <h4 class="text-sm font-bold text-gray-800 dark:text-zinc-200">Video #3 (Right Card)</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="text-xs font-semibold text-gray-600 dark:text-zinc-400">YouTube URL</label>
                                <input type="url" name="showreel_video_3" value="{{ App\Models\Setting::get('showreel_video_3', 'https://www.youtube.com/watch?v=jJmfDRKFFGI') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                            </div>
                            <div class="space-y-2">
                                <label class="text-xs font-semibold text-gray-600 dark:text-zinc-400">Custom Title</label>
                                <input type="text" name="showreel_title_3" value="{{ App\Models\Setting::get('showreel_title_3', 'Laxmanjees Sweets Kandaghat') }}" class="w-full bg-gray-50 dark:bg-zinc-800 border border-gray-300 dark:border-zinc-700 rounded-xl px-4 py-2.5 text-sm focus:ring-emerald-500 focus:border-emerald-500">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-100 dark:border-zinc-800">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm px-6 py-2.5 rounded-xl transition shadow-sm">
                        Save Global Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
