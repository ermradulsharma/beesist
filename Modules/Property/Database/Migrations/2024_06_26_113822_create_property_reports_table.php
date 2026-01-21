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
        Schema::create('property_reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_id')->nullable();
            $table->bigInteger('agent_id')->nullable();
            $table->string('property_status')->nullable();
            $table->bigInteger('rental_applications')->default(0);
            $table->bigInteger('tenancy_agreements')->default(0);
            $table->bigInteger('showings')->default(0);
            $table->bigInteger('showing_requests')->default(0);
            $table->bigInteger('people_attended')->default(0);
            $table->bigInteger('asked_questions')->default(0);
            $table->bigInteger('days_on_market')->default(0);
            $table->bigInteger('views')->default(0);
            $table->bigInteger('inspections')->default(0);
            $table->dateTime('status_changed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_reports');
    }
};
