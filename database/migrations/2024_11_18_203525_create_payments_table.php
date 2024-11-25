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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('order_id')->nullable()->constrained('orders')->onDelete('cascade');
            $table->integer('amount');
            $table->enum('payment_method', ['credit_card', 'bank_transfer', 'paypal'])->default('credit_card');
            $table->string('transaction_id')->nullable();
            $table->string('reference_id')->nullable();
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
            $table->dateTime('payment_date');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index('status');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
