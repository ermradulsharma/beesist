<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('send_performance_reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_id');
            $table->bigInteger('agent_id')->nullable();
            $table->bigInteger('owner_id')->nullable();
            $table->string('property_status')->nullable();
            $table->string('prop_url')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_email')->nullable();
            $table->string('owner2_name')->nullable();
            $table->string('owner2_email')->nullable();
            $table->text('comparable_listings')->nullable();
            $table->string('craigslist_url')->nullable();
            $table->bigInteger('craigslist_enquiries')->default(0);
            $table->string('rent_board_url')->nullable();
            $table->bigInteger('rent_board_enquiries')->default(0);
            $table->bigInteger('rental_applications')->default(0);
            $table->bigInteger('tenancy_agreements')->default(0);
            $table->bigInteger('showings')->default(0);
            $table->bigInteger('showing_requests')->default(0);
            $table->bigInteger('people_attended')->default(0);
            $table->bigInteger('asked_questions')->default(0);
            $table->bigInteger('days_on_market')->default(0);
            $table->bigInteger('views')->default(0);
            $table->bigInteger('inspections')->default(0);
            $table->text('comment')->nullable();
            $table->string('from_date')->nullable();
            $table->string('to_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('send_performance_reports');
    }
};
