<?php

namespace Database\Seeders;

use App\Models\OriginalVideo;
use Illuminate\Database\Seeder;

class OriginalVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = [
            [
                'title' => 'Villages of Himachal',
                'description' => 'A journey through the hidden gems and untold stories of Himachal.',
                'video_url' => 'https://www.instagram.com/reel/DWOy1DSCeF7/?igsh=YjQyc3FidHJxNXJr',
                'platform' => 'instagram',
                'order' => 0,
            ],
            [
                'title' => 'AIIMS Bilaspur',
                'description' => 'A documentary on the pride of Himachal and hope for thousands.',
                'video_url' => 'https://www.instagram.com/reel/DXhIHQECZXx/?igsh=MWQwbDNudGVqa2xwbw==',
                'platform' => 'instagram',
                'order' => 1,
            ],
            [
                'title' => 'Shoolini Mela Documentary',
                'description' => 'Capturing the essence of Solan\'s biggest cultural celebration.',
                'video_url' => 'https://www.instagram.com/reel/DVged6VEpyv/?igsh=dTNnZDYyaTk3enVx',
                'platform' => 'instagram',
                'order' => 2,
            ],
            [
                'title' => 'Temple & Cultural Stories',
                'description' => 'Exploring the spiritual heritage and traditions that define our roots.',
                'video_url' => 'https://youtu.be/H7ch9Z3_qeM?si=bb7uN17S1LtwPr8Q',
                'platform' => 'youtube',
                'order' => 3,
            ],
            [
                'title' => 'Travel Films',
                'description' => 'Exploring new places, cultures and experiences through our lens.',
                'video_url' => 'https://youtu.be/eyvS1WsEsNY?si=9dgq6AjIoCPH2xFF',
                'platform' => 'youtube',
                'order' => 4,
            ],
            [
                'title' => 'People & Stories',
                'description' => 'Real people. Real stories. Real impact.',
                'video_url' => 'https://youtu.be/QxdBSSKpsN8?si=3_Q02Ltq2TEw3Sn4',
                'platform' => 'youtube',
                'order' => 5,
            ],
            [
                'title' => 'Explore Originals Additional',
                'description' => 'Behind the scenes documentary production at KKSB.',
                'video_url' => 'https://youtu.be/oCA3uEI0nFY?si=dHHxoUY_ZcxjuMOy',
                'platform' => 'youtube',
                'order' => 6,
            ],
            [
                'title' => 'Explore Originals Promo 1',
                'description' => 'Visual storytelling and cinematic short promo.',
                'video_url' => 'https://www.instagram.com/reel/DU3Jo95EqgI/?igsh=MWFxa3VmdWtkMHVocg==',
                'platform' => 'instagram',
                'order' => 7,
            ],
            [
                'title' => 'Explore Originals Promo 2',
                'description' => 'Documentary teaser and travel memories.',
                'video_url' => 'https://www.instagram.com/reel/DSK_75DEoX2/?igsh=bGU0NTh3eno3NGU2',
                'platform' => 'instagram',
                'order' => 8,
            ],
        ];

        foreach ($videos as $video) {
            OriginalVideo::updateOrCreate(
                ['video_url' => $video['video_url']],
                $video
            );
        }
    }
}
