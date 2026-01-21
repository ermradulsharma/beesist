<?php

namespace Modules\Property\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['ref_id', 'type', 'url', 'featured', 'order'];

    protected static function newFactory()
    {
        return \Modules\Property\Database\factories\MediaFactory::new();
    }
}
