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
        Schema::create('property_management_agreement_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('n_own', ['1', '2'])->default('1');
            $table->enum('bp', ['0', '1', '2'])->default('0');
            $table->enum('form_step', ['0', '1', '2', '3', '4'])->default('0');
            $table->string('won2_email')->nullable();
            $table->string('fName_1')->nullable();
            $table->string('lName_2')->nullable();
            $table->string('fName_1_2')->nullable();
            $table->string('lName_2_2')->nullable();
            $table->string('own1_identity')->nullable();
            $table->string('own2_identity')->nullable();
            $table->longText('located_3')->nullable();
            $table->string('located_o2_3')->nullable();
            $table->string('phone_4')->nullable();
            $table->string('phone_o2_4')->nullable();
            $table->string('email_5')->nullable();
            $table->string('email_o2_5')->nullable();
            $table->text('resident_won1')->nullable();
            $table->text('resident_won2')->nullable();
            $table->enum('resident_ca_6', ['0', '1'])->default('1');
            $table->string('rescount_7')->nullable();
            $table->string('dob_8')->nullable();
            $table->string('tax_sin_no_8')->nullable();
            $table->longText('manage_p_at_9')->nullable();
            $table->string('address_10')->nullable();
            $table->decimal('ad_excess_11', 8, 2)->nullable();
            $table->decimal('furn_excess_12', 8, 2)->nullable();
            $table->string('IA_rent_13')->nullable();
            $table->string('utilities_14')->nullable();
            $table->longText('items_inc_17')->nullable();
            $table->string('parking_17_1')->nullable();
            $table->string('stall_17_2')->nullable();
            $table->string('storage_17_3')->nullable();
            $table->string('others_17_4')->nullable();
            $table->string('pName_18')->nullable();
            $table->string('date_19')->nullable();
            $table->string('pName_20')->nullable();
            $table->string('date_21')->nullable();
            $table->string('w_name_22')->nullable();
            $table->longText('reg_own_23')->nullable();
            $table->string('pName_24')->nullable();
            $table->string('date_25')->nullable();
            $table->string('pName_26')->nullable();
            $table->string('date27')->nullable();
            $table->longText('re_reg_own_28')->nullable();
            $table->string('pw_name_29')->nullable();
            $table->longText('ac_holder_30')->nullable();
            $table->longText('bank_details_31')->nullable();
            $table->string('pw_name_32')->nullable();
            $table->string('date_33')->nullable();
            $table->string('pw_name_34')->nullable();
            $table->string('date_35')->nullable();
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
            $table->string('AgentN_25')->nullable();
            $table->string('Agentdate_25')->nullable();
            $table->string('voided_check')->nullable();
            $table->string('owner_title')->nullable();
            $table->text('access_token')->nullable();
            $table->string('ip')->nullable();
            $table->enum('status', ['0', '1', '2', '3'])->default('0');
            $table->enum('pro_status', ['0', '1'])->default('0');
            $table->integer('notify_status')->default('1');
            $table->string('occu_status')->nullable();
            $table->text('occupancy_tenant_info')->nullable();
            $table->unsignedBigInteger('agent_pma_id')->nullable();
            $table->timestamp('approved_on')->nullable();
            $table->string('promo_code')->nullable();
            $table->string('promocode')->nullable();
            $table->string('management_type')->nullable();
            $table->string('pma_pdf')->nullable();
            $table->string('referral')->nullable();
            $table->string('referral_other')->nullable();
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
        Schema::dropIfExists('property_management_agreement_forms');
    }
};
