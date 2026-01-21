<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    public $table = 'subscriptions';
    protected $fillable = [
        'user_id',
        'name',
        'stripe_id',
        'stripe_status',
        'stripe_price',
        'quantity',
        'trial_ends_at',
        'ends_at',
    ];

    public function userDetails()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'first_name', 'last_name', 'name', 'email', 'phone']);
    }
}
