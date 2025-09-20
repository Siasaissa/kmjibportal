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
            $table->dropColumn('request_id','msg_signature');
        });
    }
};
