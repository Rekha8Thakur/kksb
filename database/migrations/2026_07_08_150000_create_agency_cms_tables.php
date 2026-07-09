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
        // 1. Categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type'); // 'blog' or 'portfolio'
            $table->timestamps();
        });

        // 2. Services
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('icon')->nullable(); // Lucide icon identifier
            $table->text('short_description');
            $table->longText('long_description');
            $table->text('benefits')->nullable(); // JSON or serialized text line-by-line
            $table->text('features')->nullable(); // JSON or serialized text line-by-line
            $table->string('image_path')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 3. Authors
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->text('social_links')->nullable(); // JSON representation
            $table->timestamps();
        });

        // 4. Blogs
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->text('summary')->nullable();
            $table->string('featured_image')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('author_id')->nullable()->constrained('authors')->nullOnDelete();
            $table->string('status')->default('draft'); // 'draft', 'published', 'scheduled'
            $table->timestamp('published_at')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->timestamps();
        });

        // 5. Projects (Portfolio)
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('client')->nullable();
            $table->date('project_date')->nullable();
            $table->text('description')->nullable();
            $table->text('challenge')->nullable();
            $table->text('solution')->nullable();
            $table->text('results')->nullable();
            $table->text('technologies_used')->nullable(); // JSON format
            $table->string('main_image')->nullable();
            $table->text('gallery_images')->nullable(); // JSON format
            $table->string('video_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 6. Testimonials
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_avatar')->nullable();
            $table->string('client_company')->nullable();
            $table->text('feedback');
            $table->integer('rating')->default(5);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 7. FAQs
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->string('category')->default('general'); // 'home', 'services', 'contact', 'general'
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 8. Clients
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo');
            $table->string('website_url')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 9. Gallery (Behind the scenes)
        Schema::create('gallery', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image_path');
            $table->string('type')->default('behind_the_scenes');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // 10. Career Jobs
        Schema::create('career_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('type')->default('full-time'); // 'full-time', 'part-time', 'remote', 'contract'
            $table->text('description');
            $table->text('requirements')->nullable(); // JSON or markdown
            $table->text('benefits')->nullable(); // JSON or markdown
            $table->boolean('is_active')->default(true);
            $table->date('closes_at')->nullable();
            $table->timestamps();
        });

        // 11. Career Applications
        Schema::create('career_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_job_id')->constrained('career_jobs')->cascadeOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('resume_path');
            $table->text('cover_letter')->nullable();
            $table->string('status')->default('pending'); // 'pending', 'reviewed', 'rejected', 'hired'
            $table->timestamps();
        });

        // 12. Contact Enquiries
        Schema::create('contact_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('service_interest')->nullable();
            $table->string('budget')->nullable();
            $table->text('message');
            $table->string('status')->default('unread'); // 'unread', 'replied', 'archived'
            $table->timestamps();
        });

        // 13. Newsletters
        Schema::create('newsletters', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('status')->default('active'); // 'active', 'unsubscribed'
            $table->timestamps();
        });

        // 14. Settings
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->longText('value')->nullable();
            $table->timestamps();
        });

        // 15. Activity Logs
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('action');
            $table->text('description')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('newsletters');
        Schema::dropIfExists('contact_enquiries');
        Schema::dropIfExists('career_applications');
        Schema::dropIfExists('career_jobs');
        Schema::dropIfExists('gallery');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('blogs');
        Schema::dropIfExists('authors');
        Schema::dropIfExists('services');
        Schema::dropIfExists('categories');
    }
};
