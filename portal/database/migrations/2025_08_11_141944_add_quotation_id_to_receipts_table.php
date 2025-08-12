<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('receipts', function (Blueprint $table) {
        $table->unsignedBigInteger('quotation_id')->nullable()->after('id');
        $table->foreign('quotation_id')->references('id')->on('insurance_quotations')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('receipts', function (Blueprint $table) {
        $table->dropForeign(['quotation_id']);
        $table->dropColumn('quotation_id');
    });
}

};
