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
           // $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->char('sku', 50)->unique(); // Assuming SKU has a max length of 50
            $table->string('name');
            $table->longText('details')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->date('stop_selling')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->string('unit')->nullable();
            $table->integer('discount')->default(0);
            $table->timestamps();
            // Adding indexes for performance improvements
            $table->index('name'); // If name is frequently queried
            $table->index('views'); // If views are frequently queried
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
