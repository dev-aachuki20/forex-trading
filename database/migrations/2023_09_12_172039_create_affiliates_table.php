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
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('mobile_no', 191)->nullable();
            $table->longText('address')->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->string('website')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->string('youtube_handle')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('purpose')->nullable();
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
        Schema::dropIfExists('affiliates');
    }
};
