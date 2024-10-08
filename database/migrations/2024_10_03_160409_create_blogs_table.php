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
        Schema::create('blogs', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('user_id')->constrained('users')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title')->index();
            $table->string('description',191);
            $table->text('content');
            $table->boolean('free')->default(1);
            $table->integer('price')->nullable();
            $table->unsignedBigInteger('likes')->nullable();
            $table->unsignedBigInteger('views')->nullable();
            $table->string('additional_info',200)->nullable();
            $table->date('update_date')->nullable();
            $table->timestamp('published_at')->nullable(); // زمان انتشار پست
            $table->boolean('is_active') ->default(1);
            $table->boolean('is_featured') ->default(0);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
