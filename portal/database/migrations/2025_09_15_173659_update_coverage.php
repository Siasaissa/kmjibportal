<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('coverages', function (Blueprint $table) {
            $table->decimal('sum_insured', 15, 2)->after('risk_name');
            $table->decimal('sum_insured_equivalent', 15, 2)->after('sum_insured');
            $table->decimal('premium_before_discount', 12, 2)->after('rate');
            $table->decimal('premium_after_discount', 12, 2)->after('premium_before_discount');
            $table->decimal('premium_excluding_tax_equivalent', 12, 2)->after('premium_after_discount');
            $table->decimal('premium_including_tax', 12, 2)->after('premium_excluding_tax_equivalent');
            $table->json('taxes')->nullable()->after('premium_including_tax');
        });
    }

    public function down(): void
    {
        Schema::table('coverages', function (Blueprint $table) {
            $table->dropColumn([
                'sum_insured',
                'sum_insured_equivalent',
                'premium_before_discount',
                'premium_after_discount',
                'premium_excluding_tax_equivalent',
                'premium_including_tax',
                'taxes',
            ]);
        });
    }
};
