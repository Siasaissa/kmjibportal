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
    Schema::table('insurance_quotations', function (Blueprint $table) {
        $table->boolean('receipt_captured')->default(false)->after('status');
    });
}

public function down()
{
    Schema::table('insurance_quotations', function (Blueprint $table) {
        $table->dropColumn('receipt_captured');
    });
}

};
