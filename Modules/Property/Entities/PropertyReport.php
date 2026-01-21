<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyReport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'property_id',
        'agent_id',
        'property_status',
        'rental_applications',
        'tenancy_agreements',
        'showings',
        'showing_requests',
        'people_attended',
        'asked_questions',
        'days_on_market',
        'views',
        'inspections',
        'status_changed_at',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
