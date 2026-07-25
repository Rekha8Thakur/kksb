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
                'title' => 'NOBLE SOLAR',
                'description' => 'Solar & Renewable Energy',
                'video_url' => 'https://www.instagram.com/reel/DWOy1DSCeF7/?igsh=YjQyc3FidHJxNXJr',
                'platform' => 'instagram',
                'category' => 'retail',
                'order' => 0,
            ],
            [
                'title' => 'MAYUR HOTEL SOLAN',
                'description' => 'Hotel & Hospitality',
                'video_url' => 'https://www.instagram.com/reel/DXhIHQECZXx/?igsh=MWQwbDNudGVqa2xwbw==',
                'platform' => 'instagram',
                'category' => 'hospitality',
                'order' => 1,
            ],
            [
                'title' => 'LIQO MONSOON SALE',
                'description' => 'Retail & Electronics',
                'video_url' => 'https://www.instagram.com/reel/DVged6VEpyv/?igsh=dTNnZDYyaTk3enVx',
                'platform' => 'instagram',
                'category' => 'products',
                'order' => 2,
            ],
            [
                'title' => 'MAINI ELECTRONICS',
                'description' => 'Electronics Retail',
                'video_url' => 'https://www.instagram.com/reel/DU3Jo95EqgI/?igsh=MWFxa3VmdWtkMHVocg==',
                'platform' => 'instagram',
                'category' => 'retail',
                'order' => 3,
            ],
            [
                'title' => 'PUPSTYLE & CARE',
                'description' => 'Pet Care Services',
                'video_url' => 'https://www.instagram.com/reel/DSK_75DEoX2/?igsh=bGU0NTh3eno3NGU2',
                'platform' => 'instagram',
                'category' => 'products',
                'order' => 4,
            ],
            [
                'title' => 'SHIV SHAKTI TIMBER',
                'description' => 'Interior & Building Solutions',
                'video_url' => 'https://www.instagram.com/reel/DWOy1DSCeF7/?igsh=YjQyc3FidHJxNXJr',
                'platform' => 'instagram',
                'category' => 'products',
                'order' => 5,
            ],
        ];

        BrandVideo::truncate();

        foreach ($videos as $video) {
            BrandVideo::create($video);
        }
    }
}
