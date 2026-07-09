<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CareerJob;
use App\Models\Client;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AgencyCmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Settings (Global Site CMS)
        $settings = [
            'site_name' => 'KKSB Studios',
            'site_tagline' => 'Creative & Digital Solutions for Growing Brands',
            'contact_email' => 'hello@kksbstudios.com',
            'contact_phone' => '+91 78761 46013',
            'contact_whatsapp' => '+91 78761 46353',
            'contact_address' => 'Solan, Himachal Pradesh 173212',
            'business_hours' => 'Monday - Saturday: 10:00 AM - 7:00 PM',
            'google_map_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3422.380068478426!2d77.10892047628886!3d30.903901976211756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390578ea0eb938df%3A0x6b7dbb8a4f9a0e6c!2sSolan%2C%20Himachal%20Pradesh!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin',
            
            // Social Links
            'social_instagram' => 'https://instagram.com/kksbstudios',
            'social_youtube' => 'https://youtube.com/kksbstudios',
            'social_linkedin' => 'https://linkedin.com/company/kksbstudios',
            'social_facebook' => 'https://facebook.com/kksbstudios',

            // Home Page CMS
            'home_hero_title' => 'Let’s Build Something People Remember.',
            'home_hero_subtitle' => 'From social media campaigns to high-impact video production, tell us what you’re building — we’ll help you make it stand out.',
            'home_hero_bg' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=1200&auto=format&fit=crop',
            'home_stats_json' => json_encode([
                ['value' => '250+', 'label' => 'Businesses Worked With'],
                ['value' => 'Millions+', 'label' => 'Organic Views Generated'],
                ['value' => 'Himachal', 'label' => 'Focused Market Experts'],
                ['value' => 'Strategy + Production + Distribution', 'label' => 'End-to-End Execution']
            ]),
            'home_process_title' => 'Our Simple Process',
            'home_process_subtitle' => 'A transparent and proven process that ensures great results every time.',

            // About Page CMS
            'about_hero_title' => 'Built in Himachal. Creating Beyond Boundaries.',
            'about_hero_subtitle' => 'KKSB Studios is a creative and marketing agency combining strategy, storytelling, content production and digital execution to help brands grow.',
            'about_story_title' => 'It Started With Stories. It Grew Into a Studio.',
            'about_story_text' => 'What began as a passion for storytelling and creating content around Himachal\'s culture, people and places, slowly turned into a purpose. We understood the power of content to connect, influence and grow businesses. From a creator to a team, from local stories to brand journeys, KKSB Studios is a full-service creative and marketing agency trusted by hundreds of brands.',
            'about_founder_name' => 'Kuldeep Sharma',
            'about_founder_title' => 'Founder & Creative Director',
            'about_founder_quote' => 'Creator Experience. Agency Thinking.',
            'about_founder_bio' => 'Content creator, filmmaker and marketing professional with years of experience working with brands, businesses and government agencies across Himachal and beyond. KKSB Studios is the result of that journey, learnings and the belief that good content can truly build brands.',
            'about_founder_image' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=600&auto=format&fit=crop',
            'about_mission' => 'To elevate regional brands onto the national stage through world-class storytelling and metrics-driven digital strategy.',
            'about_vision' => 'To build one of the most trusted creative and marketing companies in India, powered by local talent and global vision.',
            'about_timeline_json' => json_encode([
                ['year' => '2019', 'title' => 'The Spark', 'description' => 'Began as a photography & travel channel capturing the scenic stories of Himachal.'],
                ['year' => '2021', 'title' => 'Going Professional', 'description' => 'Registered KKSB Studios and set up our first physical office in Solan.'],
                ['year' => '2023', 'title' => 'Team & Client Expansion', 'description' => 'Expanded to a core team of 6+ specialists, working with leading resorts and state campaigns.'],
                ['year' => '2026', 'title' => 'The Next Level', 'description' => 'Building dynamic CMS web projects and expanding digital ads reach for 250+ clients.']
            ])
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }

        // 2. Categories
        $blogCat1 = Category::create(['name' => 'Marketing', 'slug' => 'marketing', 'type' => 'blog']);
        $blogCat2 = Category::create(['name' => 'Video Production', 'slug' => 'video-production-blog', 'type' => 'blog']);
        $blogCat3 = Category::create(['name' => 'Branding', 'slug' => 'branding', 'type' => 'blog']);

        $portCat1 = Category::create(['name' => 'Social Media Management', 'slug' => 'social-media-management', 'type' => 'portfolio']);
        $portCat2 = Category::create(['name' => 'Video Production', 'slug' => 'video-production', 'type' => 'portfolio']);
        $portCat3 = Category::create(['name' => 'Website Revamp', 'slug' => 'website-revamp', 'type' => 'portfolio']);
        $portCat4 = Category::create(['name' => 'Brand Strategy', 'slug' => 'brand-strategy', 'type' => 'portfolio']);

        // 3. Authors
        $author1 = Author::create([
            'name' => 'Kuldeep Sharma',
            'bio' => 'Founder of KKSB Studios. Filmmaker and Brand Consultant.',
            'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=600&auto=format&fit=crop',
            'social_links' => ['instagram' => 'https://instagram.com/kksbstudios', 'linkedin' => 'https://linkedin.com']
        ]);
        $author2 = Author::create([
            'name' => 'Ritika Thakur',
            'bio' => 'Head of Content and Research at KKSB Studios.',
            'avatar' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?q=80&w=600&auto=format&fit=crop',
            'social_links' => ['linkedin' => 'https://linkedin.com']
        ]);

        // 4. Services
        $services = [
            [
                'title' => 'Social Media Management',
                'slug' => 'social-media-management',
                'icon' => 'Instagram',
                'short_description' => 'We manage your social presence with strategy, content and consistent engagement.',
                'long_description' => 'In today\'s digital-first world, your social media profiles are often the first point of contact for potential customers. We take complete ownership of your social channels, ensuring your brand stays active, engaging, and relevant. From content calendars to community engagement, we manage it all.',
                'benefits' => ['Consistent Posting Schedule', 'High Quality Custom Graphics', 'Organic Reach Growth', 'Active Community Management'],
                'features' => ['Content Calendar & Scheduling', 'Custom Reel & Post Graphic Design', 'Hashtag & Keyword Research', 'Monthly Analytics Reporting'],
                'image_path' => 'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?q=80&w=800',
                'order' => 1
            ],
            [
                'title' => 'Video Production',
                'slug' => 'video-production',
                'icon' => 'Video',
                'short_description' => 'High quality videos that tell your brand story and drive attention across platforms.',
                'long_description' => 'Video is the most powerful medium for storytelling. Our production team handles everything from scriptwriting and storyboarding to shooting and post-production. Whether it\'s a corporate film, YouTube content, or a digital commercial, we produce high-impact visuals.',
                'benefits' => ['Cinematic Grade Camera Equipment', 'Professional Scriptwriting', 'Professional Voiceovers & Music Licensing', 'High Audience Retention Rates'],
                'features' => ['Script & Storyboard Development', 'Full Frame 4K Shooting', 'Advanced Color Grading', 'Audio Engineering & Sound Design'],
                'image_path' => 'https://images.unsplash.com/photo-1536240478700-b869070f9279?q=80&w=800',
                'order' => 2
            ],
            [
                'title' => 'Reels & Short-Form Content',
                'slug' => 'reels-and-short-form-content',
                'icon' => 'Zap',
                'short_description' => 'Scroll-stopping reels and shorts designed to increase reach and engagement.',
                'long_description' => 'Short-form vertical video is the fastest way to grow organically today. We specialize in producing quick, energetic, and engaging Reels, TikToks, and YouTube Shorts that leverage current trends while maintaining brand identity.',
                'benefits' => ['Rapid Organic View Growth', 'Viral Potential Strategies', 'Trendy Editing Techniques', 'High Conversion CTA Hooks'],
                'features' => ['Trend Audits & Audio Research', 'On-Camera Coaching & Direction', 'Dynamic On-Screen Captions & Graphics', 'Batch Production Schedules'],
                'image_path' => 'https://images.unsplash.com/photo-1531403009284-440f080d1e12?q=80&w=800',
                'order' => 3
            ],
            [
                'title' => 'Brand Strategy',
                'slug' => 'brand-strategy',
                'icon' => 'Compass',
                'short_description' => 'Research-driven strategies that define your brand and create a strong market position.',
                'long_description' => 'A great brand isn\'t just a logo; it\'s an emotional connection. We work with you to define your brand identity, target demographics, voice, and long-term goals, creating a unified roadmap for all your marketing efforts.',
                'benefits' => ['Clear Brand Identity & Position', 'Identified Target Personas', 'Consistent Messaging Framework', 'Cohesive Brand Guidelines'],
                'features' => ['Competitor Analysis & Audits', 'Brand Messaging Guides', 'Logo & Identity Design', 'Marketing Launch Blueprints'],
                'image_path' => 'https://images.unsplash.com/photo-1432821596592-e2c18b78144f?q=80&w=800',
                'order' => 4
            ],
            [
                'title' => 'Influencer Marketing',
                'slug' => 'influencer-marketing',
                'icon' => 'Users',
                'short_description' => 'Connect with the right creators to promote your brand and drive genuine results.',
                'long_description' => 'Leverage the trust of established creators. We source, vet, and manage campaigns with influencers who genuinely align with your audience. We focus on micro-influencers and regional stars for maximum conversion and engagement.',
                'benefits' => ['Authentic Word-of-Mouth Authority', 'Access to Targeted Local Communities', 'Content Assets for Ad Reuse', 'End-to-End Campaign Management'],
                'features' => ['Influencer Match & Vetting', 'Contract Negotiations', 'Creative Briefing & Direction', 'Tracking & ROI Analysis'],
                'image_path' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?q=80&w=800',
                'order' => 5
            ],
            [
                'title' => 'Website Design & Development',
                'slug' => 'web-design-development',
                'icon' => 'Globe',
                'short_description' => 'Modern, responsive and conversion-focused websites that represent your brand perfectly.',
                'long_description' => 'Your website is your digital storefront. We design and build ultra-fast, mobile-friendly, and SEO-optimized websites that turn visitors into customers. Specializing in minimal, premium aesthetics for clean digital representation.',
                'benefits' => ['Ultra-fast Loading Speeds', 'Highly Intuitive Mobile Design', 'CMS Managed Content Blocks', 'Optimized Landing Pages for Ads'],
                'features' => ['Custom UI/UX Wireframing', 'Modern HTML5/CSS3/Alpine.js Development', 'Laravel CMS Backends', 'Built-in SEO Best Practices'],
                'image_path' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800',
                'order' => 6
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // 5. Projects (Portfolio)
        $projects = [
            [
                'title' => 'The Himalayan Resort',
                'slug' => 'the-himalayan-resort',
                'category_id' => $portCat1->id,
                'client' => 'Himalayan Leisure Group',
                'project_date' => '2025-06-15',
                'description' => 'A luxury hospitality social media management and content shoot.',
                'challenge' => 'The Himalayan Resort had low online presence, and bookings were heavily reliant on third-party aggregators (OTAs) with high commissions. They lacked high-quality content representing the actual property vibe.',
                'solution' => 'We executed a full social media management plan, including cinematic property tours, reels showcasing local food experiences, guest testimonial videos, and local influencer collaborations.',
                'results' => 'A massive boost in brand visibility and inquiries. Direct bookings increased by 250% over a 4-month period, reducing reliance on OTA channels.',
                'technologies_used' => ['Social Media Strategy', 'Cinematography', 'Influencer Collabs', 'Ad Management'],
                'main_image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200&auto=format&fit=crop',
                'gallery_images' => ['https://images.unsplash.com/photo-1582719508461-905c673771fd?q=80&w=600', 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?q=80&w=600', 'https://images.unsplash.com/photo-1445019980597-93fa8acb246c?q=80&w=600'],
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'is_featured' => true,
                'order' => 1
            ],
            [
                'title' => 'The Cafe Project',
                'slug' => 'the-cafe-project',
                'category_id' => $portCat2->id,
                'client' => 'The Solan Roastery',
                'project_date' => '2025-09-10',
                'description' => 'A high-energy content shoot and reels strategy to increase footfall.',
                'challenge' => 'Low footfall during weekdays and limited awareness among tourists visiting the Solan region.',
                'solution' => 'We designed a weekly Reels strategy highlighting food aesthetics, "Behind the Brew" stories, and interactive micro-influencer meetups. We utilized trendy audio tracks and cinematic close-up shots.',
                'results' => 'Accumulated 1M+ views across reels in 3 months. Weekday footfall grew by 300% as tourists began using cafe reels as navigation landmarks.',
                'technologies_used' => ['Reels Strategy', 'Food Styling', 'Influencer Outreach', 'Local SEO'],
                'main_image' => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=1200&auto=format&fit=crop',
                'gallery_images' => ['https://images.unsplash.com/photo-1498804103079-a6351b050096?q=80&w=600', 'https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=600'],
                'video_url' => null,
                'is_featured' => true,
                'order' => 2
            ],
            [
                'title' => 'Hillview Homes',
                'slug' => 'hillview-homes',
                'category_id' => $portCat3->id,
                'client' => 'Hillview Real Estate',
                'project_date' => '2025-11-01',
                'description' => 'A website revamp and lead funnel configuration for luxury cottages.',
                'challenge' => 'The client was receiving low-quality, spam leads from basic social media ads and had an outdated, slow website that didn\'t display cottage layouts properly.',
                'solution' => 'We designed and developed a premium, fast Laravel-based website showing detailed 3D layouts, integrated a detailed lead form with validation, and set up Google search and Facebook ad funnels.',
                'results' => 'Generated 500+ highly qualified leads in 2 months with a 40% increase in lead-to-site conversion rates.',
                'technologies_used' => ['Web Development', 'UI/UX Design', 'Lead Funnel Opt', 'Facebook Ads'],
                'main_image' => 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?q=80&w=1200&auto=format&fit=crop',
                'gallery_images' => ['https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=600', 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?q=80&w=600'],
                'video_url' => null,
                'is_featured' => true,
                'order' => 3
            ],
            [
                'title' => 'Future Edge Academy',
                'slug' => 'future-edge-academy',
                'category_id' => $portCat4->id,
                'client' => 'Future Edge Edu Society',
                'project_date' => '2026-02-20',
                'description' => 'Content strategy, student video diaries, and lead generation.',
                'challenge' => 'Declining course enrollment and difficulty standing out from competitor academies in the region.',
                'solution' => 'We implemented a content strategy focused on student success diaries, video walkthroughs of classrooms, and local lead-generation social ads targeting parents.',
                'results' => 'Achieved a 3X increase in physical inquiries and 200% overall social reach growth within a single enrollment cycle.',
                'technologies_used' => ['Content Strategy', 'Video Diaries', 'Parent Targeting Ads', 'Graphic Design'],
                'main_image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop',
                'gallery_images' => ['https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?q=80&w=600'],
                'video_url' => null,
                'is_featured' => false,
                'order' => 4
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        // 6. Testimonials
        $testimonials = [
            [
                'client_name' => 'Rajesh Sen',
                'client_avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=200',
                'client_company' => 'Himalayan Leisure Resorts',
                'feedback' => 'KKSB Studios transformed our hotel marketing. Their video tours and social media campaigns helped us double direct bookings. Highly professional team!',
                'rating' => 5,
                'order' => 1
            ],
            [
                'client_name' => 'Meera Sharma',
                'client_avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=200',
                'client_company' => 'The Solan Roastery',
                'feedback' => 'We hired them for a weekday reels shoot and the results were incredible. We hit a million views on our coffee brew series and our weekend crowds are now massive.',
                'rating' => 5,
                'order' => 2
            ]
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }

        // 7. FAQs
        $faqs = [
            [
                'question' => 'What services do you offer?',
                'answer' => 'We provide full social media management, creative video production (Reels, commercials, property tours), web design & development, brand strategy consulting, and influencer marketing.',
                'category' => 'home',
                'order' => 1
            ],
            [
                'question' => 'Do you handle the scripting and editing for videos?',
                'answer' => 'Yes! We are an end-to-end studio. We manage the scripting, storyboard development, shoot direction, professional voiceover licensing, and high-end video editing/color-grading.',
                'category' => 'home',
                'order' => 2
            ],
            [
                'question' => 'What is the typical timeline for a web development project?',
                'answer' => 'A custom business website or lead generation funnel usually takes 3 to 6 weeks, which includes layout wireframing, frontend styling, backend CMS deployment, and speed optimization audits.',
                'category' => 'home',
                'order' => 3
            ],
            [
                'question' => 'How can we get started?',
                'answer' => 'You can send an enquiry through our contact page with your rough project budget and service requirements. We will schedule a quick consultation call to outline a strategy proposal.',
                'category' => 'home',
                'order' => 4
            ],
            [
                'question' => 'Do you work outside Solan?',
                'answer' => 'Yes, we execute campaigns and video shoots across all of Himachal (Shimla, Manali, Dharamshala, Kangra, etc.) and neighboring states.',
                'category' => 'home',
                'order' => 5
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }

        // 8. Clients
        $clients = [
            ['name' => 'Liqo', 'logo' => '/images/clients/liqo.jpg', 'website_url' => 'https://liqo.com', 'order' => 1],
            ['name' => 'LG', 'logo' => '/images/clients/lg.jpg', 'website_url' => 'https://lg.com', 'order' => 2],
            ['name' => 'Laxmanjee', 'logo' => '/images/clients/laxmanjee.jpg', 'website_url' => 'https://laxmanjee.com', 'order' => 3],
            ['name' => 'Maini Travels', 'logo' => '/images/clients/maini.jpg', 'website_url' => 'https://mainitravels.com', 'order' => 4],
            ['name' => 'Lenovo', 'logo' => '/images/clients/lenovo.png', 'website_url' => 'https://lenovo.com', 'order' => 5]
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }

        // 9. Gallery
        $galleries = [
            ['title' => 'Our Design Wall', 'image_path' => '/images/gallery/bts-1.jpg', 'type' => 'behind_the_scenes', 'order' => 1],
            ['title' => 'Meeting Room Setup', 'image_path' => '/images/gallery/bts-2.jpg', 'type' => 'behind_the_scenes', 'order' => 2],
            ['title' => 'Creative Workstations', 'image_path' => '/images/gallery/bts-3.jpg', 'type' => 'behind_the_scenes', 'order' => 3],
            ['title' => 'Lounge Sofa Area', 'image_path' => '/images/gallery/bts-4.jpg', 'type' => 'behind_the_scenes', 'order' => 4]
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }

        // 10. Career Jobs
        $jobs = [
            [
                'title' => 'Video Editor',
                'location' => 'Solan, Himachal Pradesh',
                'type' => 'full-time',
                'description' => 'We are looking for a creative Video Editor who can assemble recorded footage into finished project matching our premium agency standards.',
                'requirements' => ['Proficiency in Premiere Pro, After Effects, or DaVinci Resolve', 'Strong sense of visual storytelling, pacing, and music synchronization', 'Ability to handle color grading and basic sound design', 'Portfolio showing dynamic reels and corporate videos'],
                'benefits' => ['Competitive salary', 'High-end workstation provided', 'Growth opportunities in a fast-paced agency', 'Fun and collaborative team environment'],
                'is_active' => true,
                'closes_at' => now()->addDays(30)
            ],
            [
                'title' => 'Social Media Executive',
                'location' => 'Solan (Hybrid)',
                'type' => 'full-time',
                'description' => 'Help us manage and grow our client\'s social profiles. You will plan calendars, engage with followers, and track growth analytics.',
                'requirements' => ['Solid understanding of Instagram, YouTube, and LinkedIn growth algorithms', 'Excellent copywriting and communication skills', 'Basic knowledge of Canva or graphic templates', 'Analytical mindset to review monthly dashboards'],
                'benefits' => ['Performance-based bonuses', 'Professional training & mentorship', 'Hybrid working options', 'Regular team outings and networking events'],
                'is_active' => true,
                'closes_at' => now()->addDays(30)
            ]
        ];

        foreach ($jobs as $job) {
            CareerJob::create($job);
        }

        // 11. Blogs
        $blogs = [
            [
                'title' => 'How to Grow Your Restaurant Brand in 2026 using Reels',
                'slug' => 'grow-restaurant-brand-reels-2026',
                'content' => '<p>Short form vertical video remains the single most effective tool for organic food marketing. Restaurants that tell stories, showcase slow-motion food preparation, and capture real customer reactions are seeing substantial gains in local footfall.</p><h4>1. Showcase the Aesthetics</h4><p>Customers eat with their eyes first. Invest in good lighting and capture macro shots of steam, melting cheese, or dripping sauces.</p><h4>2. Tell Behind-the-scenes Stories</h4><p>People connect with people. Film your head chef explaining the origin of a dish, or document the morning kitchen prep hustle.</p><h4>3. Leverage Trending Local Audio</h4><p>Using localized trending sounds pushes your reels to local feeds, directly targeting customers in your immediate geography.</p>',
                'summary' => 'Discover the exact Reels and vertical video content strategies to drive local footfall to your cafe or restaurant.',
                'featured_image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=600',
                'category_id' => $blogCat1->id,
                'author_id' => $author1->id,
                'status' => 'published',
                'published_at' => now(),
                'seo_title' => 'Grow Your Restaurant Brand with Reels - 2026 Strategy',
                'seo_description' => 'Read our guide on using short vertical videos to drive footfall to local cafes and restaurants.',
                'seo_keywords' => 'restaurant marketing, reels, short form video, local business growth'
            ],
            [
                'title' => 'The Importance of a Fast, Custom-Built Website for Lead Gen',
                'slug' => 'importance-fast-custom-built-website-lead-gen',
                'content' => '<p>Every second your website takes to load cost you potential customers. While generic drag-and-drop website builders are easy to start with, they inject bloated scripts that slow down page loads, particularly on mobile networks in regional areas.</p><h4>Why Custom Backends Matter</h4><p>Custom solutions (like Laravel) allow caching database configurations, minifying assets, and serving WebP compressed images natively, giving users a blazing fast browsing experience.</p>',
                'summary' => 'A slow website hurts your ad conversion. Learn why custom-coded backends drive superior leads for real estate and schools.',
                'featured_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=600',
                'category_id' => $blogCat3->id,
                'author_id' => $author2->id,
                'status' => 'published',
                'published_at' => now(),
                'seo_title' => 'Laravel Custom Websites vs Builders for Lead Generation',
                'seo_description' => 'Understand how website speed and custom-built Laravel solutions improve conversion rates for ad campaigns.',
                'seo_keywords' => 'web design, laravel cms, lead generation, website loading speed'
            ]
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }
    }
}
