<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        if (Service::count() === 0) {

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
                'image_path' => 'images/services/social-media-management.webp',
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
                'image_path' => 'images/services/video-production.webp',
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
                'image_path' => 'images/services/brand-strategy.webp',
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
                'image_path' => 'images/services/digital-campaigns.webp',
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
                'image_path' => 'images/services/influencer-marketing.webp',
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
        }
    }
}