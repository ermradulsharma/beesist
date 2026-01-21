<?php

namespace Modules\Leads\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyManagementAgreement extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'user_id', 'owner_count', 'bp', 'form_step', 'owner_2_email', 'first_name_1', 'last_name_1', 'first_name_2', 'last_name_2', 'owner_1_identity', 'owner_2_identity', 'located_1', 'located_2', 'phone_1', 'phone_2', 'email_1', 'email_2', 'resident_owner_1', 'resident_owner_2', 'resident_ca_6', 'rescount_7', 'dob_8', 'tax_sin_no_8', 'manage_p_at_9', 'prop_address', 'ad_excess_11', 'furn_excess_12', 'IA_rent_13', 'utilities_14', 'rent_gst_15', 'manage_fee_16', 'items_inc_17', 'parking_17_1', 'stall_17_2', 'storage_17_3', 'others_17_4', 'pName_18', 'date_19', 'pName_20', 'date_21', 'w_name_22', 'reg_own_23', 'pName_24', 'date_25', 'pName_26', 'date27', 're_reg_own_28', 'pw_name_29', 'ac_holder_30', 'bank_details_31', 'pw_name_32', 'date_33', 'pw_name_34', 'date_35', 'initial_1', 'initial_2', 'initial_3', 'initial_4', 'initial_5', 'initial_6', 'initial_7', 'initial_8', 'initial_9', 'initial_10', 'initial_11', 'initial_12', 'initial_13', 'initial_14', 'initial_15', 'initial_16', 'initial_17', 'initial_18', 'initial_19', 'initial_20', 'initial_21', 'initial_22', 'initial_23', 'initial_24', 'initial_25', 'AgentN_25', 'Agentdate_25', 'voided_check', 'owner_title', 'access_token', 'ip', 'status', 'pro_status', 'approved_on', 'promo_code', 'promocode', 'pma_pdf', 'notify_status', 'occu_status', 'occupancy_tenant_info', 'agent_pma_id', 'management_type', 'referral', 'referral_other'];

    protected static function newFactory()
    {
        return \Modules\Leads\Database\factories\PropertyManagementAgreementFactory::new();
    }
}
