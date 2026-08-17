<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Setting::set('about_founder_bio', 'Content creator, travel and culture filmmaker, social media marketer, and founder of *KKSB Studios. His journey across Himachal Pradesh shaped an agency focused on storytelling, strategy, video production, and brand growth. With strong roots in Himachal and a growing presence in **Chandigarh and Tricity*, he helps businesses build visibility, trust, and impact through authentic, audience-driven campaigns.');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Setting::set('about_founder_bio', 'Content creator, travel and culture filmmaker, social media marketer, and founder of KKSB Studios. His creator-led journey across Himachal Pradesh shaped an agency built on storytelling, strategy, video production, and brand growth. Today, he helps businesses turn local insights and audience understanding into campaigns that build visibility, trust, and meaningful impact');
    }
};
