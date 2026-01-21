<?php

namespace Modules\Tenant\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TenancyEndNotice extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\Tenant\Database\factories\TenancyEndNoticeFactory::new();
    }
}
