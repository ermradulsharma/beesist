<?php

namespace Modules\Property\Entities;

use App\Domains\Auth\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Modules\Leads\Entities\PropertyManagementAgreementForm;
use Modules\Leads\Entities\UserEntity;

class Property extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'user_id',
        'form_id',
        'building_id',
        'prop_agents',
        'title',
        'slug',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'address',
        'st_address',
        'country',
        'state',
        'city',
        'neighborhood',
        'zip',
        'lat',
        'lng',
        'beds',
        'baths',
        'sleeps',
        'area',
        'rate',
        'rateper',
        'prop_url',
        'prop_status',
        'prop_type',
        'strata_fees_paying',
        'strata_property_details',
        'unit_number',
        'parking',
        'storage',
        'utilities',
        'other_utilities',
        'way_to_contact',
        'pet_policy',
        'insurance',
        'additional_comments',
        'occupancy_status',
        'occupancy_tenant_info',
        'virtual_tour',
        'in_suite_laudry',
        'craigslist',
        'rentboard',
        'fb',
        'disclaimer',
        'custom_head_script',
        'custom_footer_script',
        'is_active',
        'order',
        'views',
        'daily_views',
        'days_on_market',
        'status_changed_on',
        'last_rate_change',
        'last_edited',
        'featured',
        'status',
    ];

    protected $appends = [
        'tenancy_applications',
        'showing_request',
        'showing', 'image',
        'property_form',
        'property_building',
        'owner_details',
        'agent_details',
        'property_report',
        'url',
        'last_report_sent',
    ];

    public function getPropertyReportAttribute()
    {
        $rental_applications = PropertyReport::where('property_id', $this->id)->sum('rental_applications');
        $tenancy_agreements = PropertyReport::where('property_id', $this->id)->sum('tenancy_agreements');
        $showing_requests = PropertyReport::where('property_id', $this->id)->sum('showing_requests');
        $showings = PropertyReport::where('property_id', $this->id)->sum('showings');
        $peopleAttended = PropertyReport::where('property_id', $this->id)->sum('people_attended');
        $askedQuestions = PropertyReport::where('property_id', $this->id)->sum('asked_questions');
        $daysOnMarket = PropertyReport::where('property_id', $this->id)->sum('days_on_market');
        $views = PropertyReport::where('property_id', $this->id)->sum('views');
        $inspections = PropertyReport::where('property_id', $this->id)->sum('inspections');

        return [
            'rental_applications' => $rental_applications,
            'tenancy_agreements' => $tenancy_agreements,
            'showing_requests' => $showing_requests,
            'showings' => $showings,
            'peopleAttended' => $peopleAttended,
            'askedQuestions' => $askedQuestions,
            'daysOnMarket' => $daysOnMarket,
            'views' => $views,
            'inspections' => $inspections,
        ];
    }

    public function getTenancyApplicationsAttribute()
    {
        return PropertyReport::where('property_id', $this->id)->sum('rental_applications');
    }

    public function getLastReportSentAttribute()
    {
        $report = SendPerformanceReport::where('property_id', $this->id)->latest()->first();

        return $report ? $report->created_at->format('M j, Y') : '';
    }

    public function getUrlAttribute()
    {
        $slug = Property::find($this->id)->slug;

        return route('property.single', ['property' => $slug]);
    }

    public function getShowingRequestAttribute()
    {
        return PropertyReport::where('property_id', $this->id)->sum('showing_requests');
    }

    public function getShowingAttribute()
    {

        $showingProperty = PropertyShowing::where('prop_id', $this->id);
        $scheduled = $showingProperty->count() ?? 0;

        $startDatePast = Carbon::now()->subDays(7)->startOfDay();
        $endDatePast = Carbon::now()->subDays(1)->endOfDay();

        $startDateFuture = Carbon::now()->startOfDay();

        $past = $showingProperty->where(['status' => '1'])->whereDate('showing_date', '>=', $startDatePast)->whereDate('showing_date', '<=', $endDatePast)->count() ?? 0;
        $future = $showingProperty->whereDate('showing_date', '>=', $startDateFuture)->count() ?? 0;

        $askQuestion = PropertyQuestion::where('property_id', $this->id)->count();

        return [
            'past' => $past,
            'future' => $future,
            'scheduled' => $scheduled,
            'askQuestion' => $askQuestion,
        ];
    }

    public function getAttendedAttribute()
    {
        $limit = PropertyShowing::where(['prop_id' => $this->id, 'status' => '1'])->limit;

        return ShowingApplication::where(['property_id' => $this->id])->whereNotNull('')->whereNotNull('')->count() ?? 0;
    }

    public function getImageAttribute()
    {
        $imageUrl = $this->featuredImage->url ?? '';
        $imagePath = public_path('uploads/properties/'.$this->id.'/property_photos/thumbs/'.$imageUrl);
        if ($imageUrl && file_exists($imagePath)) {
            return asset('uploads/properties/'.$this->id.'/property_photos/thumbs/'.$imageUrl);
        }

        return asset('images/bolld-placeholder.png');
    }

    public function getPropertyFormAttribute()
    {
        return PropertyManagementAgreementForm::find($this->form_id);
    }

    public function getPropertyBuildingAttribute()
    {
        return Building::find($this->building_id);
    }

    public function getOwnerDetailsAttribute()
    {
        $user = User::find($this->user_id);
        if ($user) {
            return $user->only(['id', 'name', 'first_name', 'last_name', 'email', 'phone']);
        }

        return null;
    }

    public function getAgentDetailsAttribute()
    {
        $user = User::find($this->prop_agents);
        if ($user) {
            return $user->only(['id', 'name', 'first_name', 'last_name', 'email', 'phone']);
        }

        return null;
    }

    public function propertyReports()
    {
        return $this->hasMany(PropertyReport::class, 'property_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($property) {
            $property->slug = $property->generateSlug($property->title);
            $property->save();
        });
    }

    private function generateSlug($title)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }

            return "{$slug}-2";
        }

        return $slug;
    }

    public function propertyImages()
    {
        return $this->hasMany(Media::class, 'ref_id', 'id')->where('type', 'property_photos');
    }

    public function strataDocs()
    {
        return $this->hasMany(Media::class, 'ref_id', 'id')->where('type', 'strata_documents');
    }

    public function featuredImage()
    {
        return $this->hasOne(Media::class, 'ref_id', 'id')->where('type', 'property_photos')->where('featured', 1)->select(['id', 'ref_id', 'url']);
    }

    public function featured_image()
    {
        return $this->hasOne(Media::class, 'ref_id', 'id')->where('type', 'property_photos')->where('featured', 1)->select(['id', 'ref_id', 'url']);
    }

    public function agent_detail()
    {
        return $this->hasOne(User::class, 'id', 'prop_agents')->select('id', 'image', 'first_name', 'last_name', 'name', 'email', 'phone');
    }

    public function property_showing()
    {
        return $this->hasMany(PropertyShowing::class, 'prop_id', 'id')->where('showing_date', '>', Carbon::now()->addHours(12)->format('Y/m/d H:i'))->with('agent');
    }

    protected static function newFactory()
    {
        return \Modules\Property\Database\factories\PropertyFactory::new();
    }

    public function agentDetail()
    {
        return $this->hasOne(User::class, 'id', 'prop_agents')->select('id', 'image', 'first_name', 'last_name', 'name', 'email', 'phone');
    }

    public function agentName()
    {
        $agentObjs = $this->prop_agents;
        $userId = $this->user_id;
        $agentsIds = explode(',', $agentObjs);

        if (count($agentsIds) > 0) {
            $userObs = User::find($agentsIds[0])->name ?? 'xxxxx';
        } else {
            $userObs = User::find($userId)->name ?? 'zzzzz';
        }

        return $userObs;
    }

    public function userEntity()
    {
        return $this->belongsTo(UserEntity::class, 'id', 'entity_value')->where('entity_key', 'property')->select(['id as p_id', 'account_id', 'entity_key', 'entity_value'])->with('userDetails', 'managerPage');
    }

    public function buildingDetails()
    {
        return $this->belongsTo(Building::class, 'building_id')->with('featuredImage');
    }
}
