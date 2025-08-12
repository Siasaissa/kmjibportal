<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_create_receipts_table.php

public function up()
{
    Schema::create('receipts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('quotation_id')->constrained('insurance_quotations');
        $table->decimal('premium_amount', 12, 2);
        $table->string('premium_currency', 3);
        $table->string('payment_mode');
        $table->string('reference_no');
        $table->string('issuer_bank')->nullable();
        $table->string('collecting_bank')->nullable();
        $table->decimal('amount', 12, 2);
        $table->string('currency', 3);
        $table->decimal('exchange_rate', 10, 4)->default(1);
        $table->decimal('equivalent_amount', 12, 2);
        $table->dateTime('receipt_date');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
