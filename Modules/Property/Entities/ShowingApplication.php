<?php

namespace Modules\Property\Entities;

use App\Domains\Auth\Models\User;
use Cache;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ShowingApplication extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['showing_id', 'property_id', 'agent_id', 'tenant_id', 'showing_date', 'first_name', 'last_name', 'email', 'phone', 'comments', 'status', 'reason_of_rejection', 'notify_status', 'showing_type', 'different_time'];

    protected static function newFactory()
    {
        return \Modules\Property\Database\factories\ShowingApplicationFactory::new();
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id')->select(['id', 'user_id', 'form_id', 'title', 'slug', 'address', 'city', 'beds', 'baths', 'sleeps', 'area', 'rate', 'rateper', 'prop_status']);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function tenant()
    {
        return $this->hasOne(User::class, 'id', 'tenant_id');
    }

    public function prop_showing()
    {
        return $this->hasOne(PropertyShowing::class, 'id', 'showing_id');
    }

    public static function getpropertyShowingsData()
    {
        return Cache::remember(__CLASS__ . ':getpropertyShowingsData', 3, function () {
            return self::select(DB::raw('COUNT(id) as `count`'), DB::raw("CONCAT_WS('-',YEAR(created_at),MONTH(created_at)) as monthyear"))->where('status', '1')->groupby('monthyear')->get();
        });
    }
}
