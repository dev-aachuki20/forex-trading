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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->string('page_key')->nullable();
            $table->string('title')->nullable();
            $table->text('sub_title')->nullable();
            $table->string('slug')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=> inactive, 1=> active');
            $table->tinyInteger('is_visible')->default(1)->comment('0=> no, 1=> yes');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            // $table->unsignedBigInteger('parent_page_id')->nullable();
            // $table->json('type')->nullable();
            // $table->longtext('description')->nullable();
            // $table->string('template_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
