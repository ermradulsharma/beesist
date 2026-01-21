<?php

namespace App\Domains\Auth\Events\User;

use App\Domains\Auth\Models\User;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserUpdated.
 */
class UserUpdated
{
    use SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
