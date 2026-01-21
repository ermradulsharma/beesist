<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('content')->nullable();
            $table->string('meta_title', 191)->nullable();
            $table->string('meta_description', 191)->nullable();
            $table->string('meta_keywords', 255)->nullable();
            $table->text('custom_head_script')->nullable();
            $table->text('custom_footer_script')->nullable();
            $table->boolean('is_active');
            $table->integer('order');
            $table->enum('page_type', ['default', 'Landing'])->default('default')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
