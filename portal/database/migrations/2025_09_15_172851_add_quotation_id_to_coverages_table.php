<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('coverages', function (Blueprint $table) {
            $table->unsignedBigInteger('quotation_id')->after('id');

            // Add foreign key to quotations
            $table->foreign('quotation_id')
                  ->references('id')
                  ->on('quotations')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('coverages', function (Blueprint $table) {
            $table->dropForeign(['quotation_id']);
            $table->dropColumn('quotation_id');
        });
    }
};
