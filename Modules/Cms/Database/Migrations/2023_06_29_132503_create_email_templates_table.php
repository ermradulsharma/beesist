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
        Schema::create('email_templates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('subject')->nullable();
            $table->string('scheduled_time')->nullable();
            $table->string('schedule_desc')->nullable();
            $table->text('content')->nullable();
            $table->string('command')->nullable();
            $table->string('other_reciepients')->nullable();
            $table->string('role')->nullable()->comment('Administrator, Property Manager, Property Owner, Agent, Tenant');
            $table->string('notify_trigger')->nullable();
            $table->enum('is_active', [0, 1])->default(1)->comment('0 => Disable, 1 => Enable');
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
        Schema::dropIfExists('email_templates');
    }
};
