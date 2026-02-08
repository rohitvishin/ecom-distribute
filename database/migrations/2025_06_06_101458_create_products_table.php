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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Identifiers
            $table->string('product_uid')->unique();
            $table->string('category_uid')->index()->nullable();
            $table->string('cloudinary_public_id')->nullable();

            // Product details
            $table->string('title')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->longText('description')->nullable();
            $table->text('short_desc')->nullable();

            // Pricing
            $table->decimal('mrp', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('selling_price', 10, 2)->nullable();

            // Stock
            $table->integer('available_qty')->default(0);
            $table->string('sku')->unique()->nullable();

            // Media
            $table->string('thumbnail')->nullable();

            // SEO
            $table->text('tags')->nullable(); // tags as JSON array
            $table->string('canonical_url')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_desc')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->text('product_schema')->nullable(); // for rich snippets


            $table->enum('status', ['published', 'draft'])->default('draft');
            $table->timestamp('published_at')->nullable();

            // Timestamps & Soft Deletes
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
