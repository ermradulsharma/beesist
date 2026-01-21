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
        Schema::create('applicant_screenings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('app_id')->nullable()->constrained('rental_applications');
            $table->foreignId('screened_by')->nullable()->constrained('users');
            $table->string('question')->nullable();
            $table->boolean('answer')->nullable();
            $table->string('answer_guest')->nullable();
            $table->string('question_type')->nullable();
            $table->string('field_type')->default('radio');
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
        Schema::dropIfExists('applicant_screenings');
    }
};
