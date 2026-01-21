<?php

namespace Modules\Tenant\Entities;

use App\Domains\Auth\Models\User;
use Cache;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;

class TenantAgreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'form_step',
        'adult_tenants',
        'minor_tenants',
        'number_tenants',
        'user_id',
        'prop_id',
        'prop_type',
        'disclosure',
        'tenants_data',
        'adult_names',
        'minor_names',
        'property_address',
        'utilities',
        'rental_period',
        'rent_fees',
        'liquidated_damages',
        'security',
        'insurance',
        'smoking',
        'other_act_1',
        'other_act_2',
        'addendum',
        'pet_agreement',
        'van_tenancy_date',
        'addendum_dated',
        'form_k_notice',
        'tenant_property',
        'charges',
        'account_details',
        'other_account_holder',
        'initial_1', 'initial_2', 'initial_3', 'initial_4', 'initial_5', 'initial_6', 'initial_7', 'initial_8', 'initial_9', 'initial_10', 'initial_11', 'initial_12', 'initial_13', 'initial_14', 'initial_15', 'initial_16', 'initial_17', 'initial_18', 'initial_19', 'initial_20', 'initial_21', 'initial_22', 'initial_23', 'initial_24', 'initial_25', 'initial_26', 'initial_27', 'initial_28', 'initial_29',
        'voided_check',
        'ins_policy',
        'access_token',
        'ip_address',
        'status',
        'agreement_notes',
        'approved_on',
        'notify_status',
        'disclaimer'
    ];

    protected static function newFactory()
    {
        return \Modules\Tenant\Database\factories\TenantAgreementFactory::new();
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'prop_id')->select('id', 'title', 'slug', 'address', 'prop_agents')->with('agent_detail');
    }

    public function tenant()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->select('id', 'name', 'email', 'phone');
    }

    public static function getTAData()
    {
        return Cache::remember(__CLASS__ . ':getTAData', 3, function () {
            return self::select(DB::raw('COUNT(id) as `count`'), DB::raw("CONCAT_WS('-', YEAR(created_at), MONTH(created_at)) as monthyear"))
                ->groupBy('monthyear')
                ->get();
        });
    }

    public function tenantData()
    {
        return $this->tenants_data;
    }

    public function userEntity()
    {
        return $this->belongsTo(UserEntity::class, 'prop_id', 'entity_value')
            ->where('entity_key', 'property')
            ->select(['id as p_id', 'account_id', 'entity_key', 'entity_value']);
    }

    public function user()
    {
        return $this->hasOne(User::class, UserEntity::class, 'entity_value', 'id', 'prop_id', 'account_id');
    }
}
