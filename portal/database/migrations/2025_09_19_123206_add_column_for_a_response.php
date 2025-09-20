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
            $table->string('acknowledgement_id')->nullable()->after('uploads');
            $table->string('acknowledgement_status_code')->nullable()->after('acknowledgement_id');
            $table->string('acknowledgement_status_description')->nullable()->after('acknowledgement_status_code');
            $table->string('request_id')->nullable()->after('acknowledgement_status_description');
            $table->longText('msg_signature')->nullable()->after('request_id');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            Schema::table('quotations', function (Blueprint $table) {
            $table->dropColumn('acknowledgement_id','acknowledgement_status_code','acknowledgement_status_description','request_id','msg_signature');
        });
    }
};
