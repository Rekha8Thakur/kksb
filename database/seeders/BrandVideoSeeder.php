<?php

namespace Database\Seeders;

use App\Models\BrandVideo;
use Illuminate\Database\Seeder;

class BrandVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = [
            [
                'title' => 'Brand Showcase 1',
                'video_url' => 'https://youtu.be/H7ch9Z3_qeM?si=bb7uN17S1LtwPr8Q',
                'platform' => 'youtube',
                'order' => 0,
            ],
            [
                'title' => 'Brand Showcase 2',
                'video_url' => 'https://youtu.be/eyvS1WsEsNY?si=9dgq6AjIoCPH2xFF',
                'platform' => 'youtube',
                'order' => 1,
            ],
            [
                'title' => 'Brand Showcase 3',
                'video_url' => 'https://youtu.be/QxdBSSKpsN8?si=3_Q02Ltq2TEw3Sn4',
                'platform' => 'youtube',
                'order' => 2,
            ],
            [
                'title' => 'Brand Showcase 4',
                'video_url' => 'https://youtu.be/oCA3uEI0nFY?si=dHHxoUY_ZcxjuMOy',
                'platform' => 'youtube',
                'order' => 3,
            ],
        ];

        foreach ($videos as $video) {
            BrandVideo::updateOrCreate(
                ['video_url' => $video['video_url']],
                $video
            );
        }
    }
}
