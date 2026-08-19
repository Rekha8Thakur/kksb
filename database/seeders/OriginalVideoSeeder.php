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
                'video_url' => 'https://youtu.be/H7ch9Z3_qeM?si=bb7uN17S1LtwPr8Q',
                'platform' => 'youtube',
                'order' => 0,
            ],
            [
                'title' => 'AIIMS Bilaspur',
                'description' => 'A documentary on the pride of Himachal and hope for thousands.',
                'video_url' => 'https://youtu.be/eyvS1WsEsNY?si=9dgq6AjIoCPH2xFF',
                'platform' => 'youtube',
                'order' => 1,
            ],
            [
                'title' => 'Shoolini Mela Documentary',
                'description' => 'Capturing the essence of Solan\'s biggest cultural celebration.',
                'video_url' => 'https://youtu.be/QxdBSSKpsN8?si=3_Q02Ltq2TEw3Sn4',
                'platform' => 'youtube',
                'order' => 2,
            ],
            [
                'title' => 'Temple & Cultural Stories',
                'description' => 'Exploring the spiritual heritage and traditions that define our roots.',
                'video_url' => 'https://youtu.be/oCA3uEI0nFY?si=dHHxoUY_ZcxjuMOy',
                'platform' => 'youtube',
                'order' => 3,
            ],
        ];

        if (OriginalVideo::count() === 0) {
            foreach ($videos as $video) {
                OriginalVideo::create($video);
            }
        }
    }
}
