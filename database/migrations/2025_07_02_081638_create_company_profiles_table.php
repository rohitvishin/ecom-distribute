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
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->string('cloudinary_public_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('logo')->nullable(); // Path to logo image
            $table->string('favicon')->nullable(); // Path to favicon
            $table->text('brand_tag_line')->nullable();
            $table->text('fulladdress')->nullable();
            $table->string('support_phone')->nullable();
            $table->string('support_email')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('support_days')->nullable()->default('[monday,tuesday,wednesday,thrusday,friday]');
            $table->string('support_hour_from')->nullable()->default('9:00');
            $table->string('support_hour_to')->nullable()->default('21:00');
            $table->json('social_media_links')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
