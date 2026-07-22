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
        Schema::create('join_applications', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'influencer' or 'career'
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('social_link')->nullable(); // for influencers (Instagram/YouTube link)
            $table->string('resume_link')->nullable(); // for careers (Portfolio/Resume link)
            $table->string('position')->nullable(); // for careers
            $table->text('message')->nullable();
            $table->string('status')->default('pending'); // 'pending', 'reviewed', 'archived'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('join_applications');
    }
};
