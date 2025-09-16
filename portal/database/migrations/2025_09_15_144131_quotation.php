<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('coverage_id')->nullable()->constrained('coverages')->onDelete('set null');
            $table->foreignId('insurance_id')->nullable()->constrained('insurances')->onDelete('set null');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('receipt_id')->nullable()->constrained('receipts')->onDelete('set null');
            $table->foreignId('motor_id')->nullable()->constrained('motors')->onDelete('set null');
            $table->foreignId('addon_id')->nullable()->constrained('addons')->onDelete('set null');

            $table->string('quotation_number')->unique();
            $table->decimal('total_premium', 12, 2)->default(0);
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();
            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
