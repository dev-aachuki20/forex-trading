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
        Schema::table('trading_contest_registrations', function (Blueprint $table) {
            $table->string('trading_account_no')->nullable()->after('country_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trading_contest_registrations', function (Blueprint $table) {
            $table->dropColumn('trading_account_no');
        });
    }
};
