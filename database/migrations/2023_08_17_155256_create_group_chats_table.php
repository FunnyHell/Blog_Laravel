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
        Schema::create('group_chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chat_id');
            $table->foreign('chat_id')->references('id')->on('chats');
            $table->string('title');
            $table->string('description')->nullable();
            $table->unsignedInteger('participants_count')->default(1);
            $table->string('slug');
            $table->boolean('is_private')->default(false);
            $table->boolean('is_require_subscription')->default(false);
            $table->integer('subscription_level')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_chats');
    }
};
