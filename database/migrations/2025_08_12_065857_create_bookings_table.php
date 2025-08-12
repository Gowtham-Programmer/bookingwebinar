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
            $table->unsignedBigInteger('webinar_id')->index();
            $table->string('name');
            $table->string('status')->default('pending'); // pending, confirmed, cancelled
            $table->string('email');
            $table->string('stripe_session_id')->nullable();
            $table->integer('amount_cents')->nullable(); // store amount in cents
            $table->string('stripe_payment_intent')->nullable();
            $table->string('currency')->default('usd');
            $table->timestamps();

            $table->foreign('webinar_id')->references('id')->on('webinars')->onDelete('cascade');

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
