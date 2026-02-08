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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $table->decimal('mrp_amount', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('paid_amount', 10, 2);
            $table->string('payment_id')->nullable();
            $table->integer('coupon_id');
            $table->enum('order_status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled','return_requested'])->default('pending');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->text('shipping_address');
            $table->text('billing_address');
            $table->string('return_reason')->nullable();
            $table->decimal('refund_amount', 10, 2)->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
