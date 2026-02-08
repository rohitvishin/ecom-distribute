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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->string('currency')->default('INR');
            $table->string('currency_symbol')->default('₹');
            $table->string('cloudinary_key_name')->nullable();
            $table->string('cloudinary_api_key')->nullable();
            $table->string('cloudinary_secret_key')->nullable();
            $table->boolean('maintenance_mode')->default(false);
            $table->text('default_meta_title')->nullable();
            $table->text('default_meta_description')->nullable();
            $table->text('default_schema')->nullable();
            $table->longText('custom_header')->nullable();
            $table->longText('custom_footer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
