<x-frontend-layout>
    
    <!-- Hero Header -->
    <section class="bg-[#F8F8F8] py-20 border-b border-gray-150">
        <div class="max-w-3xl mx-auto px-6 text-center space-y-6">
            <div class="flex items-center justify-center space-x-2 text-xs font-bold text-zinc-600 uppercase tracking-wider">
                <span>{{ $blog->category->name }}</span>
                <span>•</span>
                <span>{{ $readingTime }} Min Read</span>
            </div>
            
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-[#111111] leading-tight">
                {{ $blog->title }}
            </h1>

            <div class="flex items-center justify-center space-x-3 pt-2">
                @if($blog->author->avatar)
                    <img src="{{ asset($blog->author->avatar) }}" class="w-8 h-8 rounded-full object-cover border" alt="">
                @endif
                <div class="text-left text-xs font-semibold">
                    <div class="text-[#111111]">{{ $blog->author->name }}</div>
                    <div class="text-gray-400">Published: {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-24 bg-white">
        <div class="max-w-3xl mx-auto px-6 space-y-12">
            
            <!-- Banner Image -->
            @if($blog->featured_image)
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-sm bg-gray-100 mb-12">
                    <img src="{{ asset($blog->featured_image) }}" class="w-full h-full object-cover" alt="{{ $blog->title }}">
                </div>
            @endif

            <!-- Article Body -->
            <div class="prose max-w-none text-gray-700 leading-relaxed space-y-6">
                {!! $blog->content !!}
            </div>

            <!-- Author Bio Block -->
            <div class="border-t border-b border-gray-150 py-8 my-16 flex items-start space-x-4">
                @if($blog->author->avatar)
                    <img src="{{ asset($blog->author->avatar) }}" class="w-14 h-14 rounded-full object-cover border" alt="">
                @else
                    <div class="w-14 h-14 rounded-full bg-zinc-100 flex items-center justify-center font-bold text-gray-400 text-lg">
                        {{ substr($blog->author->name, 0, 1) }}
                    </div>
                @endif
                <div class="space-y-1">
                    <h4 class="font-bold text-gray-900 text-sm">About {{ $blog->author->name }}</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">{{ $blog->author->bio ?? 'Agency writer and content strategist.' }}</p>
                </div>
            </div>

            <!-- Related Articles -->
            @if($relatedBlogs->isNotEmpty())
                <div class="space-y-8 pt-8">
                    <h3 class="font-bold text-xl text-gray-900">Related Articles</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($relatedBlogs as $rel)
                            <div class="group space-y-3">
                                <a href="/blog/{{ $rel->slug }}" class="block aspect-video bg-gray-100 rounded-2xl overflow-hidden">
                                    @if($rel->featured_image)
                                        <img src="{{ asset($rel->featured_image) }}" class="w-full h-full object-cover group-hover:scale-102 transition duration-300" alt="">
                                    @endif
                                </a>
                                <div class="space-y-1.5">
                                    <h4 class="font-bold text-sm text-[#111111] group-hover:text-black transition line-clamp-2 leading-snug">
                                        <a href="/blog/{{ $rel->slug }}">{{ $rel->title }}</a>
                                    </h4>
                                    <p class="text-[11px] text-gray-400 leading-relaxed line-clamp-2">{{ $rel->summary }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>

</x-frontend-layout>
