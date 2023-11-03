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
        Schema::create('localizations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->longText('value')->nullable();
            $table->text('key')->nullable();
            $table->text('type')->nullable();
            $table->integer('serial_no')->nullable();
            $table->tinyInteger('is_nav_menu')->default(1)->comment('0=> No, 1=> Yes');
            $table->tinyInteger('status')->default(1)->comment('0=> No, 1=> Yes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localizations');
    }
};
