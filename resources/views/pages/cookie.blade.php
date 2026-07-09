<x-frontend-layout>
    <section class="py-20 bg-[#F8F8F8] border-b border-gray-150">
        <div class="max-w-3xl mx-auto px-6 text-center space-y-4">
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Cookie Policy</h1>
            <p class="text-xs text-gray-400 font-semibold">Last Updated: {{ date('F d, Y') }}</p>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-3xl mx-auto px-6 prose text-sm text-gray-550 leading-relaxed space-y-6">
            <p>
                This is the Cookie Policy for {{ App\Models\Setting::get('site_name', 'KKSB Studios') }}, accessible from {{ url('/') }}.
            </p>
            <h3 class="text-lg font-bold text-gray-900 pt-4">1. What Are Cookies</h3>
            <p>
                As is common practice with almost all professional websites this site uses cookies, which are tiny files that are downloaded to your computer, to improve your experience.
            </p>
            <h3 class="text-lg font-bold text-gray-900 pt-4">2. How We Use Cookies</h3>
            <p>
                We use cookies for a variety of reasons detailed below. Unfortunately, in most cases, there are no industry standard options for disabling cookies without completely disabling the functionality and features they add to this site.
            </p>
            <h3 class="text-lg font-bold text-gray-900 pt-4">3. Disabling Cookies</h3>
            <p>
                You can prevent the setting of cookies by adjusting the settings on your browser. Be aware that disabling cookies will affect the functionality of this and many other websites that you visit.
            </p>
        </div>
    </section>
</x-frontend-layout>
