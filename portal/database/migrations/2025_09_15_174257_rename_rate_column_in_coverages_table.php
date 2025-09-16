<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('coverages', function (Blueprint $table) {
            $table->renameColumn('rate', 'premium_rate');
        });
    }

    public function down(): void
    {
        Schema::table('coverages', function (Blueprint $table) {
            $table->renameColumn('premium_rate', 'rate');
        });
    }
};
