<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('tenant_agreements')) {
            Schema::create('tenant_agreements', function (Blueprint $table) {
                $table->id();
                $table->string('ip_address');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->unsignedBigInteger('prop_id');
                $table->string('prop_type')->nullable();
                $table->text('property_address')->nullable();
                $table->integer('adult_tenants')->default(1);
                $table->integer('minor_tenants')->default(1);
                $table->enum('number_tenants', ['1', '2', '3', '4', '5'])->default('1');
                $table->text('adult_names')->nullable();
                $table->text('minor_names')->nullable();
                $table->text('disclosure')->nullable();
                $table->text('tenants_data')->nullable();
                $table->text('rental_period')->nullable();
                $table->text('rent_fees')->nullable();
                $table->text('utilities')->nullable();
                $table->string('liquidated_damages', 15)->default('0');
                $table->string('security')->nullable();
                $table->string('insurance', 15)->nullable();
                $table->string('smoking')->nullable();
                $table->string('other_act_1')->nullable();
                $table->string('other_act_2')->nullable();
                $table->string('addendum')->nullable();
                $table->string('pet_agreement')->nullable();
                $table->string('van_tenancy_date')->nullable();
                $table->string('addendum_dated')->nullable();
                $table->text('form_k_notice')->nullable();
                $table->text('tenant_property')->nullable();
                $table->text('charges')->nullable();
                $table->string('account_details')->nullable();
                $table->string('other_account_holder')->nullable();
                $table->string('voided_check')->nullable();
                $table->string('ins_policy')->nullable();
                $table->text('agreement_notes')->nullable();
                $table->text('access_token')->nullable();
                $table->boolean('notify_status')->default(0)->comment('0 => False, 1 => True');
                $table->boolean('disclaimer')->default(0)->comment('0 => False, 1 => True');
                $table->enum('status', ['0', '1', '2', '3'])->default('0');
                $table->enum('form_step', ['0', '1', '2', '3', '4', '5'])->default('0');
                $table->text('initial_1')->nullable();
                $table->text('initial_2')->nullable();
                $table->text('initial_3')->nullable();
                $table->text('initial_4')->nullable();
                $table->text('initial_5')->nullable();
                $table->text('initial_6')->nullable();
                $table->text('initial_7')->nullable();
                $table->text('initial_8')->nullable();
                $table->text('initial_9')->nullable();
                $table->text('initial_10')->nullable();
                $table->text('initial_11')->nullable();
                $table->text('initial_12')->nullable();
                $table->text('initial_13')->nullable();
                $table->text('initial_14')->nullable();
                $table->text('initial_15')->nullable();
                $table->text('initial_16')->nullable();
                $table->text('initial_17')->nullable();
                $table->text('initial_18')->nullable();
                $table->text('initial_19')->nullable();
                $table->text('initial_20')->nullable();
                $table->text('initial_21')->nullable();
                $table->text('initial_22')->nullable();
                $table->text('initial_23')->nullable();
                $table->text('initial_24')->nullable();
                $table->text('initial_25')->nullable();
                $table->text('initial_26')->nullable();
                $table->text('initial_27')->nullable();
                $table->text('initial_28')->nullable();
                $table->text('initial_29')->nullable();
                $table->text('initial_30')->nullable();
                $table->timestamp('approved_on')->nullable();
                $table->timestamps();
                $table->softDeletes();
                $table->foreign('prop_id')->references('id')->on('properties')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenant_agreements');
    }
};
