<?php

namespace Modules\Tenant\Entities;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Property\Entities\Property;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable = ['property_id', 'user_id', 'status'];

    protected static function newFactory()
    {
        return \Modules\Tenant\Database\factories\TenantFactory::new();
    }

    public function userDetails()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id', 'first_name', 'last_name', 'name', 'email', 'phone');
    }

    public function propertyDetails()
    {
        return $this->belongsTo(Property::class, 'property_id')->select('id', 'title');
    }
}
