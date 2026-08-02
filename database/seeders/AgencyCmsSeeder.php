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
        \DB::statement('PRAGMA foreign_keys = OFF');
        Category::query()->delete();
        Author::query()->delete();
        Blog::query()->delete();
        CareerJob::query()->delete();
        Client::query()->delete();
        Faq::query()->delete();
        Gallery::query()->delete();
        Project::query()->delete();
        Service::query()->delete();
        Testimonial::query()->delete();
        Setting::query()->delete();
        \DB::statement('PRAGMA foreign_keys = ON');

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
            
            // Showreel Settings
            'showreel_video_1' => 'https://www.youtube.com/watch?v=H7ch9Z3_qeM',
            'showreel_title_1' => 'Mahasu Devta Documentary',
            'showreel_video_2' => 'https://www.youtube.com/watch?v=eyvS1WsEsNY',
            'showreel_title_2' => 'Shoolini Mata Documentary',
            'showreel_video_3' => 'https://www.youtube.com/watch?v=jJmfDRKFFGI',
            'showreel_title_3' => 'Laxmanjees Sweets Kandaghat',

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
            'about_founder_bio' => 'Content creator, travel and culture filmmaker, social media marketer, and founder of KKSB Studios. His creator-led journey across Himachal Pradesh shaped an agency built on storytelling, strategy, video production, and brand growth. Today, he helps businesses turn local insights and audience understanding into campaigns that build visibility, trust, and meaningful impact',
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

        $portCat1 = Category::create(['name' => 'Hospitality & Tourism', 'slug' => 'hospitality-tourism', 'type' => 'portfolio']);
        $portCat2 = Category::create(['name' => 'Food & Beverage', 'slug' => 'food-beverage', 'type' => 'portfolio']);
        $portCat3 = Category::create(['name' => 'Healthcare', 'slug' => 'healthcare', 'type' => 'portfolio']);
        $portCat4 = Category::create(['name' => 'Retail', 'slug' => 'retail', 'type' => 'portfolio']);

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
                'icon' => 'Smartphone',
                'tagline' => 'Build a Brand That People Remember',
                'short_description' => 'Build meaningful connections with your audience and grow organically with consistent, platform-specific content and management.',
                'long_description' => 'At KKSB STUDIOS, we believe social media is more than just posting photos—it’s about creating meaningful connections with your audience and building a brand people trust. We develop platform-specific strategies that help businesses grow organically while maintaining a consistent and professional online presence. From planning monthly content calendars to designing creatives, editing engaging reels, writing compelling captions, and monitoring performance, we manage every aspect of your social media so you can focus on running your business. Whether you\'re a startup, local business, hotel, educational institute, restaurant, healthcare brand, or established company, we tailor every strategy to match your goals.',
                'offerings_title' => 'What We Offer',
                'benefits' => [
                    'Social Media Strategy',
                    'Content Planning',
                    'Content Calendar',
                    'Reels & Short Videos',
                    'Graphic Design',
                    'Caption Writing',
                    'Profile Optimization',
                    'Community Management',
                    'Analytics & Reporting'
                ],
                'features' => ['Content Calendar & Scheduling', 'Custom Reel & Post Graphic Design', 'Hashtag & Keyword Research', 'Monthly Analytics Reporting'],
                'image_path' => 'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?q=80&w=800',
                'order' => 1
            ],
            [
                'title' => 'Video Production',
                'slug' => 'video-production',
                'icon' => 'Video',
                'tagline' => 'Bringing Stories to Life Through Visual Excellence',
                'short_description' => 'Bring your brand\'s story to life through high-quality video creation, professional cinematography, and expert post-production.',
                'long_description' => 'Every business has a story worth telling. At KKSB STUDIOS, we create high-quality videos that don\'t just look beautiful—they communicate your message, build trust, and leave a lasting impression. From concept development and scripting to filming, drone cinematography, editing, motion graphics, and final delivery, our team handles the complete production process. Whether it\'s a commercial advertisement, promotional reel, corporate film, documentary, hospitality showcase, or social media content, every frame is crafted with creativity and purpose.',
                'offerings_title' => 'What We Produce',
                'benefits' => [
                    'Commercial Advertisements',
                    'Brand Films',
                    'Promotional Reels',
                    'Corporate Videos',
                    'Product Videos',
                    'Tourism & Hospitality Films',
                    'Documentary Production',
                    'Interviews & Podcasts',
                    'Drone Cinematography',
                    'Professional Editing'
                ],
                'features' => ['Script & Storyboard Development', 'Full Frame 4K Shooting', 'Advanced Color Grading', 'Audio Engineering & Sound Design'],
                'image_path' => 'https://images.unsplash.com/photo-1536240478700-b869070f9279?q=80&w=800',
                'order' => 2
            ],
            [
                'title' => 'Brand Strategy',
                'slug' => 'brand-strategy',
                'icon' => 'Target',
                'tagline' => 'Building Brands With Purpose',
                'short_description' => 'Define your identity, reach the right audience, and establish a clear roadmap for long-term growth.',
                'long_description' => 'A successful brand is built on clarity, consistency, and a strong identity. We help businesses define who they are, what they stand for, and how they should communicate with their audience. Our strategic approach combines market research, audience understanding, content direction, and brand positioning to create a roadmap for long-term growth. Every design, campaign, and piece of content becomes part of one unified brand experience.',
                'offerings_title' => 'Our Strategy Covers',
                'benefits' => [
                    'Brand Positioning',
                    'Audience Research',
                    'Competitor Analysis',
                    'Brand Messaging',
                    'Content Direction',
                    'Marketing Roadmap',
                    'Visual Identity Guidance',
                    'Brand Growth Consultation'
                ],
                'features' => ['Competitor Analysis & Audits', 'Brand Messaging Guides', 'Logo & Identity Design', 'Marketing Launch Blueprints'],
                'image_path' => 'https://images.unsplash.com/photo-1432821596592-e2c18b78144f?q=80&w=800',
                'order' => 3
            ],
            [
                'title' => 'Digital Campaigns',
                'slug' => 'digital-campaigns',
                'icon' => 'TrendingUp',
                'tagline' => 'Performance Marketing That Delivers Results',
                'short_description' => 'Maximize your ROI with data-driven advertising campaigns, precise targeting, and continuous optimization.',
                'long_description' => 'Successful advertising is driven by strategy, not guesswork. KKSB STUDIOS creates data-driven digital campaigns that help businesses increase visibility, generate quality leads, and achieve measurable growth. We plan, launch, monitor, and optimize campaigns across Meta platforms using audience insights, creative storytelling, and continuous performance analysis to maximize every advertising budget.',
                'offerings_title' => 'Campaign Services',
                'benefits' => [
                    'Meta Ads Management',
                    'Facebook & Instagram Campaigns',
                    'Lead Generation',
                    'Brand Awareness Campaigns',
                    'Audience Targeting',
                    'Retargeting Campaigns',
                    'Conversion Tracking',
                    'Campaign Optimization',
                    'Performance Reporting'
                ],
                'features' => ['Lead Generation funnels', 'Retargeting setups', 'Meta Pixel Audits', 'ROAS Analysis'],
                'image_path' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800',
                'order' => 4
            ],
            [
                'title' => 'Influencer Marketing',
                'slug' => 'influencer-marketing',
                'icon' => 'Users',
                'tagline' => 'Connecting Brands With Trusted Voices',
                'short_description' => 'Connect your brand with trusted creators and influencers to run authentic, high-impact collaboration campaigns.',
                'long_description' => 'Influencer marketing works best when it feels authentic. At KKSB STUDIOS, we connect businesses with carefully selected creators whose audience genuinely aligns with your brand. From identifying the right influencers and managing collaborations to coordinating content and tracking campaign performance, we ensure every partnership creates meaningful impact and real engagement.',
                'offerings_title' => 'Our Services Include',
                'benefits' => [
                    'Influencer Discovery',
                    'Campaign Planning',
                    'Creator Coordination',
                    'Content Approval',
                    'Campaign Execution',
                    'Regional Influencer Marketing',
                    'Brand Collaborations',
                    'Performance Reporting'
                ],
                'features' => ['Influencer Match & Vetting', 'Contract Negotiations', 'Creative Briefing & Direction', 'Tracking & ROI Analysis'],
                'image_path' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?q=80&w=800',
                'order' => 5
            ],
            [
                'title' => 'Website Design & Development',
                'slug' => 'web-design-development',
                'icon' => 'Globe',
                'tagline' => 'Your Digital Identity Starts Here',
                'short_description' => 'Establish your digital footprint with custom, high-speed, and responsive websites optimized for conversions.',
                'long_description' => 'Your website is often the first interaction customers have with your business. We design modern, responsive, and user-friendly websites that reflect your brand, build credibility, and turn visitors into customers. Every website is developed with clean design, fast loading speeds, mobile responsiveness, and SEO-ready architecture to ensure a seamless experience across all devices.',
                'offerings_title' => 'Website Solutions',
                'benefits' => [
                    'Business Websites',
                    'Landing Pages',
                    'Portfolio Websites',
                    'Responsive Design',
                    'UI/UX Design',
                    'SEO-Friendly Development',
                    'Performance Optimization',
                    'Website Maintenance & Support'
                ],
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
                'client' => 'The Himalayan Resort',
                'project_date' => '2025-06-15',
                'description' => 'Cinematic brand shoot and targeted social ad campaign showcasing luxury mountain stays.',
                'challenge' => 'The resort needed to increase direct bookings and establish a premium brand presence to reduce heavy OTA commission reliance.',
                'solution' => 'We executed a high-end cinematic drone & interior photography shoot, coupled with hyper-targeted meta ad campaigns focused on luxury travelers.',
                'results' => '+250% Bookings',
                'technologies_used' => ['Cinematography', 'Drone Shoot', 'Meta Ads', 'Social Ads'],
                'main_image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=1200&auto=format&fit=crop',
                'gallery_images' => ['https://images.unsplash.com/photo-1582719508461-905c673771fd?q=80&w=600', 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?q=80&w=600'],
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'is_featured' => true,
                'order' => 1
            ],
            [
                'title' => 'The Café Project',
                'slug' => 'the-cafe-project',
                'category_id' => $portCat2->id,
                'client' => 'The Café Project',
                'project_date' => '2025-09-10',
                'description' => 'Micro-influencer food campaign and viral Instagram reels series driving weekend footfall.',
                'challenge' => 'Increasing competition and lack of organic engagement from local tourists in Solan.',
                'solution' => 'Designed a weekly high-aesthetic reels calendar featuring specialty coffee stories, combined with micro-influencer meetups and community campaigns.',
                'results' => '3X Footfall',
                'technologies_used' => ['Reels Production', 'Food Styling', 'Influencer Outreach'],
                'main_image' => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?auto=format&fit=crop&w=1000&q=80',
                'gallery_images' => ['https://images.unsplash.com/photo-1498804103079-a6351b050096?q=80&w=600', 'https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=600'],
                'video_url' => null,
                'is_featured' => true,
                'order' => 2
            ],
            [
                'title' => 'Bhalla Dental Clinic',
                'slug' => 'bhalla-dental-clinic',
                'category_id' => $portCat3->id,
                'client' => 'Bhalla Dental Clinic',
                'project_date' => '2025-11-15',
                'description' => 'Patient testimonial videos and localized lead generation campaigns establishing authority.',
                'challenge' => 'Need to build local trust and establish leadership in dental implants and cosmetic treatments in the region.',
                'solution' => 'Shot raw, high-trust patient testimonials and deployed localized lead generation ads highlighting clinic hygiene and advanced tech.',
                'results' => '200% Inquiries',
                'technologies_used' => ['Patient Testimonials', 'Lead Generation', 'Local SEO'],
                'main_image' => 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=1000&q=80',
                'gallery_images' => ['https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?q=80&w=600'],
                'video_url' => null,
                'is_featured' => true,
                'order' => 3
            ],
            [
                'title' => 'Peter England Solan',
                'slug' => 'peter-england-solan',
                'category_id' => $portCat4->id,
                'client' => 'Peter England Solan',
                'project_date' => '2026-02-10',
                'description' => 'Seasonal apparel launch commercial shoots and hyper-targeted regional customer ad drives.',
                'challenge' => 'Low store visits during seasonal transitions and offline promotions yielding poor ROI.',
                'solution' => 'Produced high-energy localized apparel commercials for local cinemas & social media, combined with location-based geo-fenced mobile ads.',
                'results' => '180% Store Visits',
                'technologies_used' => ['Commercial Shoots', 'Hyperlocal Ads', 'Retail Marketing'],
                'main_image' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?auto=format&fit=crop&w=1000&q=80',
                'gallery_images' => ['https://images.unsplash.com/photo-1441984969893-c53657968b4f?q=80&w=600'],
                'video_url' => null,
                'is_featured' => true,
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
