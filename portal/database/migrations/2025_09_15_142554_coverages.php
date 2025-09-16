<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coverages', function (Blueprint $table) {
            $table->id();
            $table->string('risk_code')->unique();
            $table->string('risk_name');
            $table->decimal('rate', 8, 4)->nullable(); // e.g. 0.01 = 1%
            $table->decimal('minimum_amount', 18, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coverages');
    }
};
