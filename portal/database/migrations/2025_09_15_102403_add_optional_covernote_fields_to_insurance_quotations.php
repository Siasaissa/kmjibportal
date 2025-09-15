<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('insurance_quotations', function (Blueprint $table) {
            $table->string('officer_name')->nullable()->after('business_contact_person');
            $table->string('officer_title')->nullable()->after('officer_name');
            $table->string('product_code')->nullable()->after('officer_title');
            $table->string('endorsement_type')->nullable()->after('product_code');
            $table->string('endorsement_reason')->nullable()->after('endorsement_type');
            $table->decimal('endorsement_premium_earned', 12, 2)->nullable()->after('endorsement_reason');
        });
    }

    public function down(): void
    {
        Schema::table('insurance_quotations', function (Blueprint $table) {
            $table->dropColumn([
                'officer_name',
                'officer_title',
                'product_code',
                'endorsement_type',
                'endorsement_reason',
                'endorsement_premium_earned',
            ]);
        });
    }
};
