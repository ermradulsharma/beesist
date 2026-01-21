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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_product_id');
            $table->string('stripe_price_id');
            $table->string('title');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->BigInteger('total_property_limit');
            $table->double('amount', 10, 2);
            $table->enum('status', [0, 1])->default(1);
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
        Schema::dropIfExists('packages');
    }
};
