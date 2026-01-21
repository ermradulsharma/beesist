<?php

namespace Modules\RentalApplication\Entities;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Modules\Leads\Entities\UserEntity;
use Modules\Property\Entities\Property;

class RentalApplication extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'id',
        'user_id',
        'prop_id',
        'first_name',
        'last_name',
        'viewed_home',
        'dob',
        'sin',
        'country',
        'street_address',
        'city',
        'state',
        'zip_code',
        'email',
        'phone',
        'emc_first_name',
        'emc_last_name',
        'emc_relation',
        'emc_email',
        'emc_phone',
        'property_applying_for',
        'desired_move_in_date',
        'desired_lease_duration',
        'rental_history',
        'employment',
        'references',
        'cosigners',
        'additional_occupants',
        'pets',
        'vehicles',
        'agreed_to',
        'agreed_by',
        'total_occupants',
        'financial_suitability',
        'picture_id',
        'status',
        'notify_status',
    ];

    protected $appends = [
        'name',
    ];

    protected static function newFactory()
    {
        return \Modules\RentalApplication\Database\factories\RentalApplicationFactory::new();
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function user()
    {
        return $this->hasOne(User::class, 'email', 'email');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'prop_id')->select('id', 'user_id', 'title', 'address', 'country', 'state', 'city', 'zip', 'rate', 'unit_number', 'prop_type', 'strata_property_details', 'prop_agents')->with(['featuredImage', 'agentDetail']);
        ;
    }

    public function sc_questions()
    {
        return $this->hasMany(ApplicantScreening::class, 'app_id', 'id');
    }

    public function applicantScreenings()
    {
        return $this->hasMany(ApplicantScreening::class, 'app_id');
    }

    public function userEntity()
    {
        return $this->belongsTo(UserEntity::class, 'prop_id', 'entity_value')
            ->where('entity_key', 'property')
            ->select(['id as p_id', 'account_id', 'entity_key', 'entity_value']);
    }

    public function users()
    {
        return $this->hasOne(User::class, UserEntity::class, 'entity_value', 'id', 'prop_id', 'account_id');
    }
}
