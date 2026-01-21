<?php

namespace Modules\Leads\Entities;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Property\Entities\Property;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['property_id', 'user_id', 'account_id', 'appointment_title', 'appointment_date', 'first_name', 'last_name', 'email', 'phone', 'location', 'unit_number', 'comments', 'notify_status', 'status', 'type'];

    public function user_detail()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function property()
    {
        return $this->hasOne(Property::class, 'id', 'property_id');
    }
}
