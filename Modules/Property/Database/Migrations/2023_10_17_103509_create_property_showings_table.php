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
        Schema::create('property_showings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prop_id');
            $table->unsignedBigInteger('agent_id');
            $table->datetime('showing_date');
            $table->tinyInteger('limit')->nullable();
            $table->text('comments')->nullable();
            $table->enum('status', ['0', '1', '2'])->default(0);
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
        Schema::dropIfExists('property_showings');
    }
};
