<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'stripe_product_id',
        'stripe_price_id',
        'title',
        'slug',
        'description',
        'total_property_limit',
        'amount',
        'status',
    ];
    public function services()
    {
        return $this->belongsToMany(Service::class, 'package_services', 'package_id', 'service_id');
    }

    public function packageServices()
    {
        return $this->belongsToMany(Service::class, 'package_services');
    }

    public function package(){
        return $this->hasMany(PackageService::class, 'package_id', 'id');
    }
}
