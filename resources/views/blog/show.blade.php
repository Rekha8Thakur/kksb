<x-frontend-layout>
    
    <!-- Style for Blog Details Premium Typography -->
    <style>
        .blog-body-container p {
            font-size: 17px;
            line-height: 1.85;
            color: #333333;
            margin-bottom: 1.75rem;
            font-weight: 350;
        }
        @media (max-width: 767px) {
            .blog-body-container p {
                font-size: 15px;
                line-height: 1.75;
            }
        }
        .blog-body-container h1,
        .blog-body-container h2,
        .blog-body-container h3,
        .blog-body-container h4,
        .blog-body-container h5,
        .blog-body-container h6 {
            color: #111111;
            font-family: "Plus Jakarta Sans", sans-serif;
            font-weight: 850;
            line-height: 1.3;
            margin-top: 2.75rem;
            margin-bottom: 1.25rem;
            letter-spacing: -0.02em;
        }
        .blog-body-container h2 {
            font-size: 1.75rem;
        }
        .blog-body-container h3 {
            font-size: 1.45rem;
        }
        .blog-body-container h4 {
            font-size: 1.25rem;
        }
        
        .blog-body-container ul,
        .blog-body-container ol {
            margin-bottom: 1.75rem;
            padding-left: 1.75rem;
            color: #333333;
            font-weight: 350;
            line-height: 1.85;
        }
        .blog-body-container ul {
            list-style-type: disc;
        }
        .blog-body-container ol {
            list-style-type: decimal;
        }
        .blog-body-container li {
            margin-bottom: 0.65rem;
        }
        
        .blog-body-container blockquote {
            border-left: 4px solid #FF6A00;
            padding: 1rem 1.5rem;
            margin: 2.25rem 0;
            background-color: #FAFAFA;
            border-radius: 0 16px 16px 0;
            font-style: italic;
            color: #222222;
        }
        .blog-body-container blockquote p {
            margin-bottom: 0;
        }

        .blog-body-container strong,
        .blog-body-container b {
            font-weight: 800;
            color: #111111;
        }

        .blog-body-container code {
            background-color: #F3F4F6;
            padding: 0.2rem 0.4rem;
            border-radius: 4px;
            font-size: 0.9em;
            color: #D53F8C;
        }

        .blog-body-container a {
            color: #FF6A00;
            text-decoration: underline;
            font-weight: 500;
            transition: color 0.2s ease;
        }
        .blog-body-container a:hover {
            color: #E65F00;
        }

        /* Question Highlight Styling */
        .question-highlight {
            background: linear-gradient(120deg, rgba(255, 106, 0, 0.08) 0%, rgba(255, 133, 51, 0.02) 100%) !important;
            border-left: 4px solid #FF6A00 !important;
            padding: 1.25rem 1.5rem !important;
            border-radius: 0 16px 16px 0 !important;
            color: #111111 !important;
            margin-top: 3.25rem !important;
            margin-bottom: 1.5rem !important;
            box-shadow: 0 4px 15px rgba(255, 106, 0, 0.02) !important;
            font-weight: 900 !important;
        }
    </style>

    <!-- Hero Header -->
    <section class="bg-[#F8F8F8] pt-8 pb-14 border-b border-gray-150">
        <div class="max-w-3xl mx-auto px-6 text-center space-y-6">
            <div class="flex items-center justify-center space-x-3 text-xs font-bold text-[#111111] uppercase tracking-wider">
                <span class="px-3.5 py-1.5 rounded-full bg-[#FF6A00]/8 text-[#FF6A00] text-[10px] font-extrabold uppercase tracking-widest border border-[#FF6A00]/15">
                    {{ $blog->category->name }}
                </span>
                <span class="text-gray-300">•</span>
                <span class="text-zinc-500 font-semibold tracking-wide">{{ $readingTime }} Min Read</span>
            </div>
            
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-[#111111] leading-tight">
                {{ $blog->title }}
            </h1>

            <div class="flex items-center justify-center space-x-3 pt-2">
                @if($blog->author->avatar)
                    <img src="{{ asset($blog->author->avatar) }}" class="w-8 h-8 rounded-full object-cover border border-gray-250 shadow-sm" alt="" loading="lazy">
                @endif
                <div class="text-left text-xs font-semibold">
                    <div class="text-[#111111]">{{ $blog->author->name }}</div>
                    <div class="text-gray-400">Published: {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="pt-12 pb-24 bg-white">
        <div class="max-w-3xl mx-auto px-6 space-y-12">
            
            <!-- Banner Image -->
            @if($blog->featured_image)
                <div class="aspect-video w-full rounded-3xl overflow-hidden shadow-md bg-gray-100 mb-12 border border-gray-100">
                    <img src="{{ asset($blog->featured_image) }}" class="w-full h-full object-cover" alt="{{ $blog->title }}" loading="lazy">
                </div>
            @endif

            <!-- Article Body -->
            <div class="blog-body-container max-w-none">
                {!! $blog->content !!}
            </div>

            <!-- Author Bio Block -->
            <div class="border-t border-b border-gray-150 py-8 my-16 flex items-start space-x-4">
                @if($blog->author->avatar)
                    <img src="{{ asset($blog->author->avatar) }}" class="w-14 h-14 rounded-full object-cover border" alt="" loading="lazy">
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
                                <a href="/blog/{{ $rel->slug }}" class="block aspect-video bg-gray-100 rounded-2xl overflow-hidden shadow-sm">
                                    @if($rel->featured_image)
                                        <img src="{{ asset($rel->featured_image) }}" class="w-full h-full object-cover group-hover:scale-102 transition duration-300" alt="" loading="lazy">
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

    <!-- JS for Highlighting Question Headings -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all heading tags inside the blog content container
            const headings = document.querySelectorAll('.blog-body-container h1, .blog-body-container h2, .blog-body-container h3, .blog-body-container h4, .blog-body-container h5, .blog-body-container h6');
            headings.forEach(heading => {
                const text = heading.textContent.trim();
                // Check if text ends with a question mark, contains one, or starts with question words
                if (text.endsWith('?') || text.includes('?') || /^(why|how|what|where|who|when|which|is|are|do|does|can|should|could)\b/i.test(text)) {
                    heading.classList.add('question-highlight');
                }
            });
        });
    </script>

</x-frontend-layout>
