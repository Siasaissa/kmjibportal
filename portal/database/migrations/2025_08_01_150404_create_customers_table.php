<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            
            // Client Details
            $table->string('title')->nullable();
            $table->string('client_name');
            $table->string('client_status')->nullable();
            $table->string('client_sub_status')->nullable();
            $table->string('aml_risk')->nullable();
            $table->string('id_type')->nullable();
            $table->string('id_number')->nullable();
            $table->string('tin')->nullable();
            $table->string('zrb')->nullable();
            $table->date('appointment_date')->nullable();
            $table->string('account_number')->nullable();

            // Individual Info
            $table->date('dob')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('disability')->nullable();
            
            // Corporate Info
            $table->string('business_type')->nullable();
            $table->string('country_of_registration')->nullable();
            $table->date('registration_date')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('vrn_gst')->nullable();
            
            // Contact Information
            $table->string('region')->nullable();
            $table->string('district')->nullable();
            $table->string('village')->nullable();
            $table->string('sector')->nullable();
            $table->string('cell_street')->nullable();
            $table->date('mandate_expiry')->nullable();
            $table->string('profile_id')->nullable();
            $table->string('profile_category')->nullable();
            $table->string('screening_group_id')->nullable();
            $table->text('address')->nullable();
            $table->string('mobile1')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('mobile3')->nullable();
            $table->string('telephone1')->nullable();
            $table->string('telephone2')->nullable();
            $table->string('telephone3')->nullable();
            $table->string('email1')->nullable();
            $table->string('email2')->nullable();
            $table->string('email3')->nullable();
            $table->boolean('tax_exempted')->default(false);
            $table->boolean('related_party')->default(false);
            $table->boolean('notify_sms')->default(false);
            $table->boolean('notify_email')->default(false);
            $table->string('language')->default('English');
            $table->string('pep')->default('no');
            $table->text('additional_notes')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};