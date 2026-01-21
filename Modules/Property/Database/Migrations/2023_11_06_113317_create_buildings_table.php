<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->text('content')->nullable();
            $table->json('building_info')->nullable();
            $table->json('building_contacts')->nullable();
            $table->json('construction_info')->nullable();
            $table->json('location')->nullable();
            $table->json('seo_data')->nullable();
            $table->json('custom_tags')->nullable();
            $table->decimal('avg_sqft_rate', 10, 2)->nullable();
            $table->decimal('avg_strata_fee', 10, 2)->nullable();
            $table->json('other_buildings_in_complex')->nullable();
            $table->json('strata_by_laws')->nullable();
            $table->json('pets_restrictions')->nullable();
            $table->json('maintenance_fee_includes')->nullable();
            $table->json('amenities')->nullable();
            $table->text('other_amenities')->nullable();
            $table->json('features')->nullable();
            $table->bigInteger('last_edited')->nullable();
            $table->enum('featured', ['yes', 'no'])->default('no');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
};
