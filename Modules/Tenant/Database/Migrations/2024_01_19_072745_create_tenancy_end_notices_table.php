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
        Schema::create('tenancy_end_notices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('unit')->nullable();
            $table->string('st_address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email_id')->nullable();
            $table->string('move_date')->nullable();
            $table->string('ending_tenancy')->nullable();
            $table->text('showing_times')->nullable();
            $table->string('present_at_showing')->nullable();
            $table->text('initial_1')->nullable();
            $table->enum('status', ['0', '1', '2'])->default('0');
            $table->enum('notify_status', ['0', '1', '2', '3', '4'])->default('0');
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
        Schema::dropIfExists('tenancy_end_notices');
    }
};
