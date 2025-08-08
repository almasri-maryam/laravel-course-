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
        Schema::create('comments', function (Blueprint $table) {
                $table->id('comment_id');
                $table->text('content');
                $table->foreignId('user_id')->nullable()->constrained('users', 'user_id')->nullOnDelete();
                $table->foreignId('post_id')->constrained('posts', 'post_id')->cascadeOnDelete();
                $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
