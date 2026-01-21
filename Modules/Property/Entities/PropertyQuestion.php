<?php

namespace Modules\Property\Entities;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'user_id', 'agents', 'question', 'answer', 'status'];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id')->select(['id', 'title', 'address', 'slug']);
    }

    public function tenant()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'name', 'email', 'phone', 'first_name', 'last_name']);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agents')->select(['id', 'name', 'email', 'phone', 'first_name', 'last_name']);
    }

    protected static function newFactory()
    {
        return \Modules\Property\Database\factories\PropertyQuestionFactory::new();
    }
}
