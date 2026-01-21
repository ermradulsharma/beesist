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
        Schema::create('showing_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('showing_id')->nullable();
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->unsignedBigInteger('tenant_id');
            $table->datetime('showing_date')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->text('comments')->nullable();
            $table->enum('status', ['0', '1', '2', '3', '4'])->default(0);
            $table->text('reason_of_rejection')->nullable();
            $table->tinyInteger('notify_status')->default(0);
            $table->enum('showing_type', ['Physical', 'Virtual'])->default('Physical');
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
        Schema::dropIfExists('showing_applications');
    }
};
