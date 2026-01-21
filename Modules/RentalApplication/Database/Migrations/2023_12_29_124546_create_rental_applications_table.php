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
        Schema::create('rental_applications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('prop_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('viewed_home')->nullable();
            $table->date('dob')->nullable();
            $table->string('sin')->nullable();
            $table->string('country')->nullable();
            $table->string('street_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('emc_first_name')->nullable();
            $table->string('emc_last_name')->nullable();
            $table->string('emc_relation')->nullable();
            $table->string('emc_email')->nullable();
            $table->string('emc_phone')->nullable();
            $table->string('property_applying_for')->nullable();
            $table->string('desired_move_in_date')->nullable();
            $table->string('desired_lease_duration')->nullable();
            $table->text('rental_history')->nullable();
            $table->text('employment')->nullable();
            $table->text('references')->nullable();
            $table->text('cosigners')->nullable();
            $table->text('additional_occupants')->nullable();
            $table->text('pets')->nullable();
            $table->text('vehicles')->nullable();
            $table->string('agreed_to')->nullable();
            $table->string('agreed_by')->nullable();
            $table->integer('total_occupants')->nullable();
            $table->text('financial_suitability')->nullable();
            $table->string('picture_id')->nullable();
            $table->string('status')->nullable();
            $table->integer('notify_status')->default(0);
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
        Schema::dropIfExists('rental_applications');
    }
};
