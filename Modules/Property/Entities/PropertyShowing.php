<?php

namespace Modules\Property\Entities;

use App\Domains\Auth\Models\User;
use Cache;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyShowing extends Model
{
    use HasFactory;

    protected $fillable = ['prop_id', 'agent_id', 'showing_date', 'limit', 'comments', 'status'];

    protected static function newFactory()
    {
        return \Modules\Property\Database\factories\PropertyShowingFactory::new();
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'prop_id')->select(['id', 'user_id', 'form_id', 'title', 'address', 'city', 'slug', 'prop_status']);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id')->select(['id', 'name', 'first_name', 'last_name', 'email', 'phone']);
    }

    public function showing_applications()
    {
        return $this->hasMany(ShowingApplication::class, 'showing_id', 'id');
    }

    public function showing_app_count()
    {
        //return $this->hasMany('App\ShowingApplications','showing_id','id');
        //return $this->hasMany('App\ShowingApplications')->where('showing_id', $this->id)->count();
        return ShowingApplication::withCount('showing_applications')->get();
    }

    public static function getshowingsGraphData($user_id)
    {
        return Cache::remember(__CLASS__ . ':getshowingsGraphData', 3, function () use ($user_id) {
            return self::select(DB::raw('COUNT(showing_date) as `count`'), DB::raw("CONCAT_WS('-',YEAR(created_at),MONTH(created_at)) as monthyear"))->where('agent_id', $user_id)->groupby('monthyear')->get();
        });
    }

    public function showingApplications()
    {
        return $this->hasMany(ShowingApplication::class, 'showing_id', 'id');
    }
}
