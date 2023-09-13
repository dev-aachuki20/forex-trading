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
        Schema::create('trading_contest_winner_places', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');

            $table->unsignedBigInteger('trading_contest_id')->nullable();
            $table->foreign('trading_contest_id')->references('id')->on('trading_contests')->onDelete('cascade');

            $table->unsignedBigInteger('contest_register_id')->nullable();
            $table->foreign('contest_register_id')->references('id')->on('trading_contest_registrations')->onDelete('cascade');

            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->integer('position')->nullable();

            $table->timestamps();
            $table->softDeletes();
            $table->string('created_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trading_contest_winner_places');
    }
};
