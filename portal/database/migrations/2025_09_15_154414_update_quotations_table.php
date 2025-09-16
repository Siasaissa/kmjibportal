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
       Schema::table('quotations', function (Blueprint $table) {
    // Taxes fields from RisksCovered → per quotation level
    $table->string('tax_code')->nullable();
    $table->string('is_tax_exempted')->nullable();
    $table->string('tax_exemption_type')->nullable();
    $table->string('tax_exemption_reference')->nullable();
    $table->decimal('tax_rate', 5, 2)->nullable();
    $table->decimal('tax_amount', 12, 2)->nullable();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
