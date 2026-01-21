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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('form_id')->nullable();
            $table->unsignedBigInteger('building_id')->nullable();
            $table->string('prop_agents', 255)->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('content')->nullable();
            $table->string('meta_title', 191)->nullable();
            $table->string('meta_description', 191)->nullable();
            $table->string('meta_keywords', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('st_address', 191)->nullable();
            $table->string('country', 55)->nullable();
            $table->string('state', 55)->nullable();
            $table->string('city', 55)->nullable();
            $table->string('neighborhood', 55)->nullable();
            $table->string('zip', 15)->nullable();
            $table->string('lat', 25)->nullable();
            $table->string('lng', 25)->nullable();
            $table->string('beds', 25)->nullable();
            $table->string('baths', 25)->nullable();
            $table->string('sleeps', 25)->nullable();
            $table->string('area', 25)->nullable();
            $table->string('rate', 25)->nullable();
            $table->string('rateper', 25)->nullable();
            $table->string('prop_url', 255)->nullable();
            $table->string('prop_status', 25)->nullable();
            $table->string('prop_type', 55)->nullable();
            $table->unsignedBigInteger('strata_fees_paying')->nullable();
            $table->text('strata_property_details')->nullable();
            $table->string('unit_number', 25)->nullable();
            $table->string('parking', 25)->nullable();
            $table->string('storage', 191)->nullable();
            $table->text('utilities')->nullable();
            $table->text('other_utilities', 255)->nullable();
            $table->text('way_to_contact')->nullable();
            $table->string('pet_policy', 191)->nullable();
            $table->string('insurance', 191)->nullable();
            $table->text('additional_comments')->nullable();
            $table->string('occupancy_status', 255)->nullable();
            $table->text('occupancy_tenant_info')->nullable();
            $table->text('virtual_tour')->nullable();
            $table->string('in_suite_laudry', 55)->nullable();
            $table->string('craigslist', 255)->nullable();
            $table->string('rentboard', 255)->nullable();
            $table->string('fb', 255)->nullable();
            $table->text('disclaimer')->nullable();
            $table->text('custom_head_script')->nullable();
            $table->text('custom_footer_script')->nullable();
            $table->boolean('is_active');
            $table->integer('order');
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('daily_views')->default(0);
            $table->integer('days_on_market')->default(0);
            $table->datetime('status_changed_on')->nullable();
            $table->datetime('last_rate_change')->nullable();
            $table->tinyInteger('last_edited')->default(0);
            $table->tinyInteger('featured')->default(0);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('properties');
    }
};
