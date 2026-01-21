<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'status',
    ];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_services', 'service_id', 'package_id');
    }

    public function packageServices()
    {
        return $this->hasMany(PackageService::class, 'service_id', 'id');
    }
}
