<?php

namespace Modules\Leads\Entities;

use App\Domains\Auth\Models\User;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Property\Entities\Building;
use Modules\Property\Entities\Property;

class UserEntity extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id', 'entity_key', 'entity_value'
    ];

    public function buildings()
    {
        return $this->belongsTo(Building::class, 'entity_value')->where('entity_key', 'building');
    }

    public function userDetails()
    {
        return $this->belongsTo(User::class, 'account_id')->select(['id', 'slug', 'image', 'name', 'first_name', 'last_name', 'email', 'phone']);
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'entity_value')->with('propertyImages', 'strataDocs', 'featured_image', 'userEntity')->whereRaw("find_in_set('For Rent', prop_status)")->where('status', '1')->select('id', 'title', 'address', 'city');
    }



    protected static function newFactory()
    {
        return \Modules\Leads\Database\factories\UserEntityFactory::new();
    }

    public function managerPage()
    {
        return $this->hasMany(Setting::class, 'account_id', 'account_id');
    }
}
