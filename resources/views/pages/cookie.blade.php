<x-frontend-layout>
    <!-- HERO HEADER SECTION -->
    <section class="relative py-20 bg-[#FAFAFA] border-b border-[#ECECEC] overflow-hidden">
        <!-- Ambient Grid Backdrop -->
        <div class="absolute inset-0 bg-[radial-gradient(#ECECEC_1.2px,transparent_1.2px)] [background-size:24px_24px] opacity-75 pointer-events-none"></div>
        
        <!-- Glowing gradient accent -->
        <div class="absolute -top-40 right-1/4 w-[400px] h-[400px] bg-gradient-to-br from-[#FF6A00]/10 via-[#FF6A00]/3 to-transparent rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px] relative z-10 text-center space-y-4">
            <div>
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#FF6A00]/10 text-[#FF6A00] text-xs font-bold tracking-[0.2em] uppercase border border-[#FF6A00]/20">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#FF6A00] animate-pulse"></span> LEGAL & COMPLIANCE
                </span>
            </div>
            <h1 class="text-4xl sm:text-6xl font-black tracking-tight text-[#111111] uppercase font-heading">
                Cookie <span class="text-gray-400">Policy</span>
            </h1>
            <p class="text-[13px] text-[#666666] font-semibold tracking-wide uppercase">
                Last Updated: {{ date('F d, Y') }}
            </p>
        </div>
    </section>

    <!-- CONTENT SECTION (DUAL COLUMN LAYOUT) -->
    <section class="py-16 bg-white relative overflow-hidden">
        <div class="max-w-[1440px] mx-auto px-6 lg:px-[90px] grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Sticky Sidebar Index Navigation (4 Cols) -->
            <aside class="hidden lg:block lg:col-span-4">
                <div class="sticky top-28 bg-[#FAFAFA] border border-[#ECECEC] rounded-[24px] p-8 space-y-6 shadow-sm">
                    <h3 class="text-xs font-bold tracking-[0.2em] text-[#111111] uppercase pb-3 border-b border-[#ECECEC]">
                        Table of Contents
                    </h3>
                    <nav class="flex flex-col space-y-4 text-[14px]">
                        <a href="#intro" class="toc-link text-[#FF6A00] font-bold border-l-2 border-[#FF6A00] pl-3 transition-all duration-300 block hover:text-[#FF6A00]">
                            Introduction
                        </a>
                        <a href="#what-are-cookies" class="toc-link text-gray-550 pl-0 transition-all duration-300 block hover:text-[#FF6A00] hover:translate-x-1">
                            1. What Are Cookies
                        </a>
                        <a href="#how-we-use" class="toc-link text-gray-550 pl-0 transition-all duration-300 block hover:text-[#FF6A00] hover:translate-x-1">
                            2. How We Use Cookies
                        </a>
                        <a href="#disabling-cookies" class="toc-link text-gray-550 pl-0 transition-all duration-300 block hover:text-[#FF6A00] hover:translate-x-1">
                            3. Disabling Cookies
                        </a>
                        <a href="#cookies-we-set" class="toc-link text-gray-550 pl-0 transition-all duration-300 block hover:text-[#FF6A00] hover:translate-x-1">
                            4. Cookies We Set
                        </a>
                        <a href="#third-party-cookies" class="toc-link text-gray-550 pl-0 transition-all duration-300 block hover:text-[#FF6A00] hover:translate-x-1">
                            5. Third-Party Cookies
                        </a>
                        <a href="#more-info" class="toc-link text-gray-550 pl-0 transition-all duration-300 block hover:text-[#FF6A00] hover:translate-x-1">
                            6. More Information
                        </a>
                    </nav>
                </div>
            </aside>

            <!-- Main Content Area (8 Cols) -->
            <main class="lg:col-span-8 space-y-12">
                
                <!-- Introduction -->
                <div id="intro" class="policy-section scroll-mt-28 space-y-4 bg-white border border-[#ECECEC] rounded-[24px] p-8 shadow-sm">
                    <div class="flex items-center space-x-3 text-[#FF6A00] mb-2">
                        <div class="w-10 h-10 rounded-xl bg-[#FF6A00]/10 flex items-center justify-center">
                            <i data-lucide="cookie" class="w-5 h-5"></i>
                        </div>
                        <h2 class="text-xl font-extrabold text-[#111111]">Introduction</h2>
                    </div>
                    <p class="text-[15px] text-[#555555] leading-relaxed font-light">
                        This is the Cookie Policy for <strong>{{ App\Models\Setting::get('site_name', 'KKSB Studios') }}</strong>, accessible from 
                        <a href="{{ url('/') }}" class="text-[#FF6A00] hover:underline font-medium">{{ url('/') }}</a>. 
                        We believe in transparency about how we collect and use data. This policy explains what cookies are, how we use them on our digital presence, and how you can control them.
                    </p>
                </div>

                <!-- 1. What Are Cookies -->
                <div id="what-are-cookies" class="policy-section scroll-mt-28 space-y-4 bg-white border border-[#ECECEC] rounded-[24px] p-8 shadow-sm">
                    <div class="flex items-center space-x-3 text-[#FF6A00] mb-2">
                        <div class="w-10 h-10 rounded-xl bg-[#FF6A00]/10 flex items-center justify-center">
                            <i data-lucide="help-circle" class="w-5 h-5"></i>
                        </div>
                        <h2 class="text-xl font-extrabold text-[#111111]">1. What Are Cookies</h2>
                    </div>
                    <p class="text-[15px] text-[#555555] leading-relaxed font-light">
                        As is common practice with almost all professional websites this site uses cookies, which are tiny files that are downloaded to your computer, to improve your experience.
                    </p>
                    <p class="text-[15px] text-[#555555] leading-relaxed font-light">
                        This page describes what information they gather, how we use it and why we sometimes need to store these cookies. We will also share how you can prevent these cookies from being stored however this may downgrade or 'break' certain elements of the sites functionality.
                    </p>
                </div>

                <!-- 2. How We Use Cookies -->
                <div id="how-we-use" class="policy-section scroll-mt-28 space-y-4 bg-white border border-[#ECECEC] rounded-[24px] p-8 shadow-sm">
                    <div class="flex items-center space-x-3 text-[#FF6A00] mb-2">
                        <div class="w-10 h-10 rounded-xl bg-[#FF6A00]/10 flex items-center justify-center">
                            <i data-lucide="eye" class="w-5 h-5"></i>
                        </div>
                        <h2 class="text-xl font-extrabold text-[#111111]">2. How We Use Cookies</h2>
                    </div>
                    <p class="text-[15px] text-[#555555] leading-relaxed font-light">
                        We use cookies for a variety of reasons detailed below. Unfortunately, in most cases, there are no industry standard options for disabling cookies without completely disabling the functionality and features they add to this site. 
                    </p>
                    <p class="text-[15px] text-[#555555] leading-relaxed font-light">
                        It is recommended that you leave on all cookies if you are not sure whether you need them or not in case they are used to provide a service that you use.
                    </p>
                </div>

                <!-- 3. Disabling Cookies -->
                <div id="disabling-cookies" class="policy-section scroll-mt-28 space-y-4 bg-white border border-[#ECECEC] rounded-[24px] p-8 shadow-sm">
                    <div class="flex items-center space-x-3 text-[#FF6A00] mb-2">
                        <div class="w-10 h-10 rounded-xl bg-[#FF6A00]/10 flex items-center justify-center">
                            <i data-lucide="settings" class="w-5 h-5"></i>
                        </div>
                        <h2 class="text-xl font-extrabold text-[#111111]">3. Disabling Cookies</h2>
                    </div>
                    <p class="text-[15px] text-[#555555] leading-relaxed font-light">
                        You can prevent the setting of cookies by adjusting the settings on your browser (see your browser Help for how to do this). Be aware that disabling cookies will affect the functionality of this and many other websites that you visit. Disabling cookies will usually result in also disabling certain functionality and features of this site. Therefore it is recommended that you do not disable cookies.
                    </p>
                </div>

                <!-- 4. Cookies We Set -->
                <div id="cookies-we-set" class="policy-section scroll-mt-28 space-y-6 bg-white border border-[#ECECEC] rounded-[24px] p-8 shadow-sm">
                    <div class="flex items-center space-x-3 text-[#FF6A00]">
                        <div class="w-10 h-10 rounded-xl bg-[#FF6A00]/10 flex items-center justify-center">
                            <i data-lucide="database" class="w-5 h-5"></i>
                        </div>
                        <h2 class="text-xl font-extrabold text-[#111111]">4. Cookies We Set</h2>
                    </div>
                    <p class="text-[15px] text-[#555555] leading-relaxed font-light">
                        In order to provide you with a great experience on this site, we provide the functionality to set your preferences for how this site runs when you use it. To remember your preferences, we need to set cookies so that this information can be called whenever you interact with a page is affected by your preferences.
                    </p>

                    <!-- Cookie Info Table -->
                    <div class="overflow-x-auto border border-[#ECECEC] rounded-[16px]">
                        <table class="w-full text-[13.5px] text-left border-collapse">
                            <thead>
                                <tr class="bg-[#FAFAFA] border-b border-[#ECECEC] text-[#111111] font-bold">
                                    <th class="p-4">Cookie Name</th>
                                    <th class="p-4">Type</th>
                                    <th class="p-4">Purpose</th>
                                    <th class="p-4">Duration</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#ECECEC] text-[#555555]">
                                <tr>
                                    <td class="p-4 font-mono font-bold text-[12.5px] text-[#111111]">XSRF-TOKEN</td>
                                    <td class="p-4">
                                        <span class="inline-block bg-emerald-500/10 text-emerald-700 text-[11px] font-bold px-2.5 py-0.5 rounded-full uppercase">
                                            Essential
                                        </span>
                                    </td>
                                    <td class="p-4 font-light">Security cookie designed to prevent Cross-Site Request Forgery (CSRF) attacks.</td>
                                    <td class="p-4 font-light">2 Hours</td>
                                </tr>
                                <tr>
                                    <td class="p-4 font-mono font-bold text-[12.5px] text-[#111111]">kksb_session</td>
                                    <td class="p-4">
                                        <span class="inline-block bg-emerald-500/10 text-emerald-700 text-[11px] font-bold px-2.5 py-0.5 rounded-full uppercase">
                                            Essential
                                        </span>
                                    </td>
                                    <td class="p-4 font-light">Stores session identifiers to maintain user status and preferences across requests.</td>
                                    <td class="p-4 font-light">2 Hours</td>
                                </tr>
                                <tr>
                                    <td class="p-4 font-mono font-bold text-[12.5px] text-[#111111]">_ga</td>
                                    <td class="p-4">
                                        <span class="inline-block bg-blue-500/10 text-blue-700 text-[11px] font-bold px-2.5 py-0.5 rounded-full uppercase">
                                            Analytics
                                        </span>
                                    </td>
                                    <td class="p-4 font-light">Google Analytics cookie used to distinguish unique users and compile site usage logs.</td>
                                    <td class="p-4 font-light">2 Years</td>
                                </tr>
                                <tr>
                                    <td class="p-4 font-mono font-bold text-[12.5px] text-[#111111]">_gid</td>
                                    <td class="p-4">
                                        <span class="inline-block bg-blue-500/10 text-blue-700 text-[11px] font-bold px-2.5 py-0.5 rounded-full uppercase">
                                            Analytics
                                        </span>
                                    </td>
                                    <td class="p-4 font-light">Google Analytics cookie used to store and update page view counts and sessions.</td>
                                    <td class="p-4 font-light">24 Hours</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 5. Third-Party Cookies -->
                <div id="third-party-cookies" class="policy-section scroll-mt-28 space-y-4 bg-white border border-[#ECECEC] rounded-[24px] p-8 shadow-sm">
                    <div class="flex items-center space-x-3 text-[#FF6A00] mb-2">
                        <div class="w-10 h-10 rounded-xl bg-[#FF6A00]/10 flex items-center justify-center">
                            <i data-lucide="shield-alert" class="w-5 h-5"></i>
                        </div>
                        <h2 class="text-xl font-extrabold text-[#111111]">5. Third-Party Cookies</h2>
                    </div>
                    <p class="text-[15px] text-[#555555] leading-relaxed font-light">
                        In some special cases we also use cookies provided by trusted third parties. The following section details which third party cookies you might encounter through this site.
                    </p>
                    <ul class="list-disc pl-6 text-[15px] text-[#555555] leading-relaxed font-light space-y-3">
                        <li>
                            This site uses Google Analytics which is one of the most widespread and trusted analytics solution on the web for helping us to understand how you use the site and ways that we can improve your experience. These cookies may track things such as how long you spend on the site and the pages that you visit so we can continue to produce engaging content.
                        </li>
                        <li>
                            We also embed video content from YouTube (e.g. showreels, documentaries) which sets cookies to track video plays, user bandwidth preferences, and enforce security policies.
                        </li>
                    </ul>
                </div>

                <!-- 6. More Information -->
                <div id="more-info" class="policy-section scroll-mt-28 space-y-4 bg-white border border-[#ECECEC] rounded-[24px] p-8 shadow-sm">
                    <div class="flex items-center space-x-3 text-[#FF6A00] mb-2">
                        <div class="w-10 h-10 rounded-xl bg-[#FF6A00]/10 flex items-center justify-center">
                            <i data-lucide="mail" class="w-5 h-5"></i>
                        </div>
                        <h2 class="text-xl font-extrabold text-[#111111]">6. More Information</h2>
                    </div>
                    <p class="text-[15px] text-[#555555] leading-relaxed font-light">
                        Hopefully that has clarified things for you and as was previously mentioned if there is something that you aren't sure whether you need or not it's usually safer to leave cookies enabled in case it does interact with one of the features you use on our site.
                    </p>
                    <p class="text-[15px] text-[#555555] leading-relaxed font-light">
                        However, if you are still looking for more information, you can contact us through one of our preferred contact methods:
                    </p>
                    <div class="pt-2">
                        <a href="mailto:hello@kksbstudios.com" class="inline-flex items-center space-x-2 bg-[#FF6A00] hover:bg-[#E55F00] text-white text-[14px] font-semibold px-6 py-3 rounded-[12px] transition duration-300">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                            <span>hello@kksbstudios.com</span>
                        </a>
                    </div>
                </div>

            </main>
        </div>
    </section>

    <!-- INTERSECTION OBSERVER FOR STICKY SIDEBAR SCROLL SPY -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sections = document.querySelectorAll('.policy-section');
            const navLinks = document.querySelectorAll('.toc-link');

            const observerOptions = {
                root: null,
                rootMargin: '-10% 0px -75% 0px',
                threshold: 0
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const id = entry.target.getAttribute('id');
                        navLinks.forEach(link => {
                            if (link.getAttribute('href') === `#${id}`) {
                                link.classList.add('text-[#FF6A00]', 'font-bold', 'border-l-2', 'border-[#FF6A00]', 'pl-3');
                                link.classList.remove('text-gray-500', 'pl-0', 'border-l-0');
                            } else {
                                link.classList.remove('text-[#FF6A00]', 'font-bold', 'border-l-2', 'border-[#FF6A00]', 'pl-3');
                                link.classList.add('text-gray-500', 'pl-0');
                            }
                        });
                    }
                });
            }, observerOptions);

            sections.forEach(section => {
                observer.observe(section);
            });
        });
    </script>
</x-frontend-layout>
