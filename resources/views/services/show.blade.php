<x-frontend-layout>
    
    <!-- Hero Section -->
    <section class="bg-[#F8F8F8] py-20 border-b border-gray-150">
        <div class="max-w-4xl mx-auto px-6 text-center space-y-6">
            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-zinc-800 shadow-sm mx-auto">
                <i data-lucide="{{ $service->icon ?? 'briefcase' }}" class="w-8 h-8"></i>
            </div>
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-[#111111] leading-tight">
                {{ $service->title }}
            </h1>
            <p class="text-base sm:text-lg text-gray-500 leading-relaxed max-w-2xl mx-auto">
                {{ $service->short_description }}
            </p>
        </div>
    </section>

    <!-- Detail Content Grid -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-16">
            <!-- Left Panel: Content -->
            <div class="lg:col-span-8 space-y-12">
                @if($service->image_path)
                    <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-sm bg-gray-100">
                        <img src="{{ asset($service->image_path) }}" class="w-full h-full object-cover" alt="{{ $service->title }}">
                    </div>
                @endif

                <!-- Long Description (HTML Content) -->
                <div class="prose max-w-none text-gray-600 space-y-6">
                    {!! $service->long_description !!}
                </div>

                <!-- Benefits and Features Lists -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border-t border-gray-100 pt-12">
                    <!-- Benefits -->
                    @if(!empty($service->benefits))
                        <div class="space-y-4">
                            <h3 class="text-lg font-bold text-gray-900 flex items-center space-x-2">
                                <span class="text-zinc-800"><i data-lucide="check-circle" class="w-5 h-5"></i></span>
                                <span>Key Benefits</span>
                            </h3>
                            <ul class="space-y-2 text-xs text-gray-550 font-medium">
                                @foreach($service->benefits as $benefit)
                                    <li class="flex items-start space-x-2">
                                        <span class="text-zinc-400 mt-0.5">•</span>
                                        <span>{{ $benefit }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Features -->
                    @if(!empty($service->features))
                        <div class="space-y-4">
                            <h3 class="text-lg font-bold text-gray-900 flex items-center space-x-2">
                                <span class="text-zinc-800"><i data-lucide="sliders" class="w-5 h-5"></i></span>
                                <span>What is Included</span>
                            </h3>
                            <ul class="space-y-2 text-xs text-gray-550 font-medium">
                                @foreach($service->features as $feature)
                                    <li class="flex items-start space-x-2">
                                        <span class="text-zinc-400 mt-0.5">•</span>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Panel: Sidebar Links -->
            <div class="lg:col-span-4 space-y-8">
                <!-- CTA Box -->
                <div class="bg-[#F8F8F8] p-8 rounded-3xl border border-gray-150 space-y-6">
                    <h3 class="text-xl font-bold tracking-tight text-gray-900">Need this service for your brand?</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        Fill out our contact request form and get a customized visual proposal for your business in 24 hours.
                    </p>
                    <a href="/contact?service={{ urlencode($service->title) }}" class="inline-flex items-center justify-center space-x-2 bg-[#111111] hover:bg-zinc-800 text-white text-xs font-bold px-6 py-3.5 rounded-full transition w-full shadow-md">
                        <span>Discuss Your Project</span>
                        <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>

                <!-- Other Services -->
                @if($otherServices->isNotEmpty())
                    <div class="border border-gray-150 p-8 rounded-3xl space-y-6">
                        <h4 class="font-bold text-gray-900 text-sm uppercase tracking-wider">Other Services</h4>
                        <div class="divide-y divide-gray-100 space-y-4">
                            @foreach($otherServices as $other)
                                <a href="/services/{{ $other->slug }}" class="block pt-4 first:pt-0 group">
                                    <h5 class="font-bold text-sm text-[#111111] group-hover:text-black transition">{{ $other->title }}</h5>
                                    <p class="text-[11px] text-gray-400 mt-1 line-clamp-1 leading-relaxed">{{ $other->short_description }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

</x-frontend-layout>
