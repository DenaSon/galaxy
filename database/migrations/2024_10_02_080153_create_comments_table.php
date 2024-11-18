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
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();

            $table->morphs('commentable');

            $table->foreignId('parent_id')->nullable()->constrained('comments')->cascadeOnDelete()->cascadeOnUpdate();

            $table->unsignedTinyInteger('rating')->nullable(); // Rating 0-255
            $table->unsignedSmallInteger('likes')->default(0); // Likes start at 0
            $table->enum('status', ['hidden', 'published'])->default('hidden');

            $table->string('username', 100)->nullable();

            $table->text('text');
            $table->text('reply')->nullable();

            $table->timestamps();
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
