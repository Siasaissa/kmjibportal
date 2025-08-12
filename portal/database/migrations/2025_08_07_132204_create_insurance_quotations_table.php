<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('insurance_quotations', function (Blueprint $table) {
            $table->id();
            
            // Reference Information
            $table->string('reference_number')->unique();
            $table->string('client');
            $table->string('policy_type');
            $table->date('created_date');
            
            // Customer Information
            $table->string('client_name');
            $table->string('address');
            $table->string('tin_number');
            $table->string('vrn_number')->nullable();
            $table->string('id_type');
            $table->string('id_number');
            $table->date('date_of_birth')->nullable();
            $table->string('customer_type');
            
            // Product Information
            $table->string('insurer')->nullable();
            $table->string('period');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('currency');
            $table->string('business_contact_person')->nullable();
            $table->integer('no_of_days')->nullable();
            $table->string('file_no')->nullable();
            $table->string('branch')->nullable();
            $table->string('fleet_type')->nullable();
            $table->string('motor_type');
            $table->string('policy_type_detail');
            $table->string('previous_quote')->nullable();
            $table->string('loss_ratio_forecast')->nullable();
            $table->string('business_type')->nullable();
            $table->string('business_by')->nullable();
            $table->string('borrower_type')->nullable();
            $table->string('first_loss_payee')->nullable();
            $table->string('bind_collateral')->nullable();
            $table->string('collateral_name')->nullable();
            $table->boolean('fronting_business')->default(false);
            $table->boolean('non_renewable')->default(false);
            $table->string('fleet_id')->nullable();
            $table->string('fleet_seq')->nullable();
            
            // Risk Details
            $table->string('registration_no');
            $table->string('chassis_number');
            $table->string('engine_number');
            $table->string('vehicle_make');
            $table->string('vehicle_model');
            $table->string('body_type');
            $table->string('insurance_type');
            $table->string('insurance_class');
            $table->string('fuel_type');
            $table->integer('seat_capacity');
            $table->string('color');
            $table->string('owner_category');
            $table->string('cc');
            $table->integer('registration_year');
            $table->decimal('accessories_sum_insured', 12, 2);
            $table->string('accessories_info')->nullable();
            $table->decimal('windscreen_sum_insured', 12, 2);
            $table->decimal('windscreen_premium', 12, 2);
            $table->integer('number_of_axles');
            $table->decimal('short_period_percentage', 5, 2);
            $table->decimal('override_percentage', 5, 2);
            $table->decimal('tppd_sum_insured', 12, 2);
            $table->decimal('tppd_increase_limit', 12, 2);
            $table->boolean('enable')->default(true);
            $table->boolean('apply_depreciation')->default(false);
            
            // Premium Calculation
            $table->decimal('sum_insured', 12, 2);
            $table->decimal('actual_premium', 12, 2);
            $table->decimal('adjust_premium', 12, 2)->nullable();
            $table->decimal('discount_percentage', 5, 2)->nullable();
            $table->decimal('total_premium', 12, 2);
            $table->string('payment_method');
            
            // Finalization
            $table->text('additional_notes')->nullable();
            $table->boolean('terms_accepted')->default(false);
            
            $table->timestamps();
        });

        Schema::create('quotation_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id')->constrained('insurance_quotations')->onDelete('cascade');
            $table->string('file_path');
            $table->string('original_name');
            $table->string('mime_type');
            $table->unsignedInteger('size');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quotation_documents');
        Schema::dropIfExists('insurance_quotations');
    }
};