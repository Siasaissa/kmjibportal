<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('insurance_quotations', function (Blueprint $table) {
            // Officer Details
            $table->string('officer_name')->nullable();
            $table->string('officer_title')->nullable();

            // Commission Details
            $table->decimal('commission_paid', 12, 2)->nullable();
            $table->decimal('commission_rate', 5, 2)->nullable();

            // Endorsement Details
            $table->string('endorsement_type')->nullable();
            $table->string('endorsement_reason')->nullable();
            $table->decimal('endorsement_premium_earned', 12, 2)->nullable();

            // Tax Information (basic fields)
            $table->string('tax_code')->nullable();
            $table->boolean('is_tax_exempted')->nullable();
            $table->string('tax_exemption_type')->nullable();
            $table->string('tax_exemption_reference')->nullable();
            $table->decimal('tax_rate', 5, 2)->nullable();
            $table->decimal('tax_amount', 12, 2)->nullable();

            // Addon Information (basic fields)
            $table->string('addon_reference')->nullable();
            $table->string('addon_desc')->nullable();
            $table->decimal('addon_amount', 12, 2)->nullable();
            $table->decimal('addon_premium_rate', 5, 2)->nullable();
            $table->decimal('addon_premium_excl_tax', 12, 2)->nullable();
            $table->decimal('addon_premium_incl_tax', 12, 2)->nullable();

            // Callback URL (for TIRA API response)
            $table->string('callback_url')->nullable();
        });
    }

    public function down()
    {
        Schema::table('insurance_quotations', function (Blueprint $table) {
            $table->dropColumn([
                'officer_name', 'officer_title',
                'commission_paid', 'commission_rate',
                'endorsement_type', 'endorsement_reason', 'endorsement_premium_earned',
                'tax_code', 'is_tax_exempted', 'tax_exemption_type', 'tax_exemption_reference', 'tax_rate', 'tax_amount',
                'addon_reference', 'addon_desc', 'addon_amount', 'addon_premium_rate', 'addon_premium_excl_tax', 'addon_premium_incl_tax',
                'callback_url',
            ]);
        });
    }
};
