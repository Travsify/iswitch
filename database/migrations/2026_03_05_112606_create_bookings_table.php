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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('service_type'); // flight, hotel, tour
            $table->unsignedBigInteger('service_id');
            $table->decimal('amount', 15, 2);
            $table->string('currency', 3);
            $table->string('status')->default('pending'); // pending, confirmed, failed
            $table->string('payment_method')->nullable(); // wallet, gateway
            $table->string('payment_reference')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
