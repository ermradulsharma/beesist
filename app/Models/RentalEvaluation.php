<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalEvaluation extends Model
{
    use HasFactory;

    protected $fillable = ['account_id', 'address', 'unit_no', 'bedrooms', 'bathrooms', 'square_footage', 'first_name', 'last_name', 'email', 'phone', 'what_are_you_looking', 'notify_status', 'status'];

    public function userDetails()
    {
        return $this->belongsTo(User::class, 'account_id')->select(['id', 'first_name', 'last_name', 'name', 'email', 'phone']);
    }
}
