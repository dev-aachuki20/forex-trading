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
        Schema::create('faq_types', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('language_id');
            // $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            // $table->string('key')->nullable();
            $table->json('title')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=> inactive, 1=> active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_types');
    }
};
