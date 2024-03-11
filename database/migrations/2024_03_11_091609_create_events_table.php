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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('activity_type');
    $table->string('flight_number')->nullable();
    $table->unsignedBigInteger('departure_airport_id')->nullable();
    $table->unsignedBigInteger('arrival_airport_id')->nullable();
    $table->dateTime('start_time');
    $table->dateTime('end_time');
    $table->timestamps();

    $table->foreign('departure_airport_id')->references('id')->on('airports');
    $table->foreign('arrival_airport_id')->references('id')->on('airports');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
