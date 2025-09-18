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

            // Foreign keys
            $table->unsignedBigInteger('cover_note_type_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();

            // CoverNoteDtl
            $table->foreignId('coverage_id')->constrained('coverages')->nullable();
            $table->string('sale_point_code')->nullable();
            $table->string('cover_note_desc')->nullable();
            $table->string('operative_clause')->nullable();
            $table->date('cover_note_start_date')->nullable();
            $table->date('cover_note_end_date')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('currency_code', 10)->nullable();
            $table->decimal('exchange_rate', 10, 2)->default(1);
            $table->decimal('total_premium_excluding_tax', 15, 2)->nullable();
            $table->decimal('total_premium_including_tax', 15, 2)->nullable();
            $table->decimal('commission_paid', 15, 2)->nullable();
            $table->decimal('commission_rate', 8, 2)->nullable();
            $table->string('officer_name')->nullable();
            $table->string('officer_title')->nullable();
            $table->string('product_code')->nullable();
            $table->string('cover_note_reference')->unique()->nullable();

            // RiskCovered
            $table->decimal('sum_insured', 15, 2)->nullable();
            $table->decimal('sum_insured_equivalent', 15, 2)->nullable();
            $table->decimal('premium_rate', 8, 2)->nullable();
            $table->decimal('premium_before_discount', 15, 2)->nullable();
            $table->decimal('premium_after_discount', 15, 2)->nullable();
            $table->decimal('premium_excluding_tax_equivalent', 15, 2)->nullable();
            $table->decimal('premium_including_tax', 15, 2)->nullable();
            $table->string('tax_code')->nullable();
            $table->boolean('is_tax_exempted')->default(false);
            $table->decimal('tax_rate', 8, 2)->nullable();
            $table->decimal('tax_amount', 15, 2)->nullable();

            // SubjectMattersCovered
            $table->string('subject_matter_reference')->nullable();
            $table->text('subject_matter_description')->nullable();

            // PolicyHolders
            $table->string('policy_holder_name')->nullable();
            $table->date('policy_holder_birth_date')->nullable();
            $table->string('policy_holder_type')->nullable();
            $table->string('policy_holder_id_number')->nullable();
            $table->string('policy_holder_id_type')->nullable();
            $table->string('country_code', 10)->nullable();
            $table->string('region')->nullable();
            $table->string('district')->nullable();
            $table->string('street')->nullable();
            $table->string('policy_holder_phone_number')->nullable();
            $table->string('postal_address')->nullable();

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('cover_note_type_id')->references('id')->on('covernote_types')->onDelete('set null');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
