<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('brand_videos', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->string('video_url')->nullable()->change();
            $table->string('platform')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brand_videos', function (Blueprint $table) {
            $table->string('category')->nullable()->after('platform');
            $table->string('video_url')->nullable(false)->change();
            $table->string('platform')->nullable(false)->change();
        });
    }
};
