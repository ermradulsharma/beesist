<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestBuilding extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'message',
        'status',
        'location'
    ];

    protected static function newFactory()
    {
        return \Modules\Property\Database\factories\RequestBuildingFactory::new();
    }
}
