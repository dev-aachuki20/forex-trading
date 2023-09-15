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
        Schema::table('trader_resources', function (Blueprint $table) {
            $table->tinyInteger('is_primary')->default(0)->comment('0=> not_primary, 1=> primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trader_resources', function (Blueprint $table) {
            $table->dropColumn('is_primary');
        });
    }
};
