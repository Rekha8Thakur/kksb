<x-frontend-layout>
    <section class="py-20 bg-[#F8F8F8] border-b border-gray-150">
        <div class="max-w-3xl mx-auto px-6 text-center space-y-4">
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Privacy Policy</h1>
            <p class="text-xs text-gray-400 font-semibold">Last Updated: {{ date('F d, Y') }}</p>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-3xl mx-auto px-6 prose text-sm text-gray-550 leading-relaxed space-y-6">
            <p>
                At {{ App\Models\Setting::get('site_name', 'KKSB Studios') }}, accessible from {{ url('/') }}, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by us and how we use it.
            </p>
            <h3 class="text-lg font-bold text-gray-900 pt-4">1. Information We Collect</h3>
            <p>
                The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information (e.g. through contact forms, newsletter forms, or job board applications).
            </p>
            <h3 class="text-lg font-bold text-gray-900 pt-4">2. How We Use Your Information</h3>
            <p>
                We use the information we collect to communicate with you about projects, send marketing materials if subscribed, process candidate screenings, and monitor website logs for analytics.
            </p>
            <h3 class="text-lg font-bold text-gray-900 pt-4">3. Log Files</h3>
            <p>
                KKSB Studios follows a standard procedure of using log files. These files log visitors when they visit websites. The information collected by log files includes internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks.
            </p>
        </div>
    </section>
</x-frontend-layout>
