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
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('logistics_cost', 10, 2)->default(0)->nullable()->after('discount');
            $table->decimal('tax_amount', 10, 2)->default(0)->nullable()->after('logistics_cost');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['logistics_cost', 'tax_amount']);
        });
    }
};
