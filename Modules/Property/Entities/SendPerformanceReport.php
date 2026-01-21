<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Property\Database\factories\SendPerformanceReportFactory;

class SendPerformanceReport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'property_id',
        'agent_id',
        'owner_id',
        'property_status',
        'prop_url',
        'owner_name',
        'owner_email',
        'owner2_name',
        'owner2_email',
        'comparable_listings',
        'craigslist_url',
        'craigslist_enquiries',
        'rent_board_url',
        'rent_board_enquiries',
        'applied',
        'applications',
        'showings',
        'people_attended',
        'asked_questions',
        'days_on_market',
        'views',
        'comment',
        'from_date',
        'to_date',
    ];

    public function properties()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    protected static function newFactory(): SendPerformanceReportFactory
    {
        return SendPerformanceReportFactory::new();
    }
}
