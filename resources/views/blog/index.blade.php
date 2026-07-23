<x-frontend-layout>
    
    <!-- Hero -->
    <section class="bg-[#F8F8F8] py-20 border-b border-gray-150">
        <div class="max-w-4xl mx-auto px-6 text-center space-y-6">
            <span class="text-xs font-bold text-zinc-600 uppercase tracking-widest block">Agency Blog</span>
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight leading-tight">
                <span class="text-[#111111]">Insights & Guides</span> <span class="text-gray-400">for Growth</span>
            </h1>
            <p class="text-base sm:text-lg text-gray-500 leading-relaxed max-w-2xl mx-auto">
                Read our latest insights about social media growth, shoot production workflows, web design benchmarks, and local tourism trends in Himachal.
            </p>
        </div>
    </section>

    <!-- Search & Filters + Grid Feed -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 space-y-12">
            
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 border-b border-gray-100 pb-8">
                <!-- Category Filters -->
                <div class="flex flex-wrap items-center gap-2">
                    <a href="/blog" 
                       class="px-4 py-2 rounded-full text-xs font-bold transition {{ !request('category') ? 'bg-[#111111] text-white' : 'bg-[#F8F8F8] text-gray-600 hover:bg-gray-200' }}">
                        All Articles
                    </a>
                    @foreach($categories as $category)
                        <a href="/blog?category={{ $category->slug }}" 
                           class="px-4 py-2 rounded-full text-xs font-bold transition {{ request('category') === $category->slug ? 'bg-[#111111] text-white' : 'bg-[#F8F8F8] text-gray-600 hover:bg-gray-200' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>

                <!-- Search Bar Form -->
                <form method="GET" action="/blog" class="flex items-center space-x-2 w-full md:w-80">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search articles..." class="w-full bg-gray-50 border border-gray-300 rounded-xl px-4 py-2 text-xs focus:ring-zinc-800 focus:border-zinc-800">
                    <button type="submit" class="bg-[#111111] hover:bg-zinc-800 text-white font-bold text-xs px-4 py-2 rounded-xl transition">
                        Find
                    </button>
                </form>
            </div>

            <!-- Articles Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($blogs as $blog)
                    <div class="bg-white border border-gray-100 hover:border-gray-200 shadow-sm hover:shadow-2xl rounded-3xl overflow-hidden group transition duration-300 flex flex-col justify-between" data-aos="fade-up">
                        <div>
                            <div class="aspect-video w-full bg-gray-100 overflow-hidden relative">
                                @if($blog->featured_image)
                                    <img src="{{ asset($blog->featured_image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="">
                                @endif
                                <span class="absolute top-4 left-4 bg-white/95 backdrop-blur text-[9px] font-extrabold text-gray-800 px-2.5 py-1 rounded-full uppercase tracking-wider">
                                    {{ $blog->category->name }}
                                </span>
                            </div>
                            <div class="p-6 space-y-3">
                                <span class="text-[10px] text-gray-400 font-semibold">{{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
                                <h3 class="text-xl font-bold tracking-tight text-gray-900 group-hover:text-black transition line-clamp-2 leading-tight">
                                    <a href="/blog/{{ $blog->slug }}">{{ $blog->title }}</a>
                                </h3>
                                <p class="text-xs text-gray-500 leading-relaxed line-clamp-3">
                                    {{ $blog->summary }}
                                </p>
                            </div>
                        </div>

                        <div class="p-6 pt-0 border-t border-gray-50 mt-4 flex items-center justify-between">
                            <!-- Writer -->
                            <div class="flex items-center space-x-2">
                                @if($blog->author->avatar)
                                    <img src="{{ asset($blog->author->avatar) }}" class="w-6 h-6 rounded-full object-cover border" alt="">
                                @else
                                    <div class="w-6 h-6 rounded-full bg-zinc-100 flex items-center justify-center text-[10px] font-bold text-gray-400">
                                        {{ substr($blog->author->name, 0, 1) }}
                                    </div>
                                @endif
                                <span class="text-[10px] font-bold text-gray-700">{{ $blog->author->name }}</span>
                            </div>
                            
                            <a href="/blog/{{ $blog->slug }}" class="inline-flex items-center space-x-1 text-xs font-bold text-[#111111] hover:text-black transition">
                                <span>Read Post</span>
                                <i data-lucide="arrow-right" class="w-3 h-3"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center text-gray-500">
                        <i data-lucide="book-open" class="w-12 h-12 mx-auto text-gray-300 mb-3"></i>
                        <p class="font-medium text-base">No blog articles found matching search criteria.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Links -->
            @if($blogs->hasPages())
                <div class="pt-12 border-t border-gray-100">
                    {{ $blogs->links() }}
                </div>
            @endif
        </div>
    </section>

</x-frontend-layout>
