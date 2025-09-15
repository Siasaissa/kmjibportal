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
     Schema::table('insurance_quotations', function (Blueprint $table) {
        $table->string('fleet_type')->nullable();
        $table->string('previous_quote')->nullable();
        $table->string('loss_ratio_forecast')->nullable();
        $table->string('business_type')->nullable();
        $table->string('business_by')->nullable();
        $table->string('borrower_type')->nullable();
        $table->string('first_loss_payee')->nullable();
        $table->string('bind_collateral')->nullable();
        $table->string('collateral_name')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('insurance_quotations', function (Blueprint $table) {
            //
        });
    }
};
