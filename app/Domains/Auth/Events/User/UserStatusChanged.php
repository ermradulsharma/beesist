<?php

namespace App\Domains\Auth\Events\User;

use App\Domains\Auth\Models\User;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserStatusChanged.
 */
class UserStatusChanged
{
    use SerializesModels;

    public $user;

    public $status;

    /**
     * UserStatusChanged constructor.
     */
    public function __construct(User $user, $status)
    {
        $this->user = $user;
        $this->status = $status;
    }
}
