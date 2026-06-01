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
        Schema::table('payments', function (Blueprint $table) {
            $table->integer('order_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->enum('payment_method', ['razorpay', 'cod'])->default('cod');
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('currency', 3)->default('INR');
            $table->enum('status', ['pending', 'authorized', 'captured', 'failed', 'refunded'])->default('pending');
            $table->string('razorpay_payment_id')->nullable()->unique();
            $table->string('razorpay_order_id')->nullable()->unique();
            $table->string('razorpay_signature')->nullable();
            $table->text('razorpay_response')->nullable();
            $table->text('error_message')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('refunded_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn([
                'order_id',
                'user_id',
                'payment_method',
                'amount',
                'currency',
                'status',
                'razorpay_payment_id',
                'razorpay_order_id',
                'razorpay_signature',
                'razorpay_response',
                'error_message',
                'paid_at',
                'refunded_at',
            ]);
        });
    }
};
