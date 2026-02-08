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
        Schema::create('admin_login_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->string('ip_address', 45)->nullable(); // IPv6-safe
            $table->text('user_agent')->nullable();
            $table->dateTime('login_at')->useCurrent();
            $table->dateTime('logout_at')->nullable();
            $table->enum('status', ['success', 'failed'])->default('success');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_login_histories');
    }
};
