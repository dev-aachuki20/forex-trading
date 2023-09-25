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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');

            $table->json('page_keys')->nullable();

            $table->string('slug')->nullable();

            $table->string('section_key')->nullable();
            $table->string('title')->nullable();
            $table->longtext('description')->nullable();
            $table->longtext('other_details')->nullable();
            $table->tinyInteger('is_image')->default(0)->comment('0=> No, 1=> yes');
            $table->tinyInteger('is_multiple_image')->default(0)->comment('0=> No, 1=> yes');
            $table->tinyInteger('is_video')->default(0)->comment('0=> No, 1=> yes');

            $table->tinyInteger('status')->default(1)->comment('0=> inactive, 1=> active');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
