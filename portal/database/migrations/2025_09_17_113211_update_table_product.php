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
    Schema::table('products', function (Blueprint $table) {
        if (!Schema::hasColumn('products', 'insurance_id')) {
            $table->unsignedBigInteger('insurance_id')->nullable()->after('id');

            $table->foreign('insurance_id')
                  ->references('id')
                  ->on('insurances')
                  ->onDelete('cascade');
        }
    });
}

public function down(): void
{
    Schema::table('products', function (Blueprint $table) {
        if (Schema::hasColumn('products', 'insurance_id')) {
            // First drop the foreign key
            $table->dropForeign(['insurance_id']);

            // Then drop the column
            $table->dropColumn('insurance_id');
        }
    });
}

};
