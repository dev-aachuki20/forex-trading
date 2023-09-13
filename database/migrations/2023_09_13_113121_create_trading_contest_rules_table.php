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
        Schema::create('trading_contest_rules', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');

            $table->unsignedBigInteger('trading_contest_id');
            $table->foreign('trading_contest_id')->references('id')->on('trading_contests');

            $table->longText('instruction')->nullable();
            $table->json('rules')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->string('created_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('updated_by')->nullable();

            // Define foreign keys
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trading_contest_rules');
    }
};
