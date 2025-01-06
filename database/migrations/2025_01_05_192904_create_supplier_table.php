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

        Schema::create('producers', function (Blueprint $table)
        {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('location')->nullable();
            $table->text('products');
            $table->enum('capacity',['low','medium','high'])->default('medium');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier');
    }
};
