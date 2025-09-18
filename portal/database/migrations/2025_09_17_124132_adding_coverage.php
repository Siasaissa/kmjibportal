<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coverages', function (Blueprint $table) {
            $table->id(); // auto-increment primary key
            $table->unsignedBigInteger('product_id');
            $table->string('risk_name');
            $table->string('risk_code');
            $table->decimal('rate', 10, 2);
            $table->decimal('minimum_amount', 12, 2);
            $table->unsignedBigInteger('tpp')->nullable();
            $table->unsignedBigInteger('additional_amount')->nullable();
            $table->unsignedBigInteger('per_seat')->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coverages');
    }
};
