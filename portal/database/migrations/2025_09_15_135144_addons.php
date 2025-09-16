<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
Schema::create('addons', function (Blueprint $table) {
    $table->id();
    $table->string('addon_code')->unique();            // unique identifier
    $table->string('addon_name');                      // e.g. "Roadside Assistance"
    $table->decimal('rate', 8, 2)->default(0);         // percentage rate
    $table->decimal('minimum_amount', 15, 2)->default(0);
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('addons');
    }
};
