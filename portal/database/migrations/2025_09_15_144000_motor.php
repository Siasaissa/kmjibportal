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
        Schema::create('motors', function (Blueprint $table) {
    $table->id();
    $table->string('registration_number')->unique();   // e.g. T123 ABC
    $table->string('chassis_number')->nullable();
    $table->string('make')->nullable();                // Toyota, Nissan, etc.
    $table->string('model')->nullable();               // Corolla, X-Trail, etc.
    $table->integer('year_of_manufacture')->nullable();
    $table->decimal('value', 15, 2)->nullable();       // Vehicle value
    $table->foreignId('insurance_id')
          ->constrained('insurances')
          ->onDelete('cascade');                       // link to insurance
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('motors');
    }
};
