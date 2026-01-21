<?php

namespace App\Domains\Auth\Events\Role;

use App\Domains\Auth\Models\Role;
use Illuminate\Queue\SerializesModels;

/**
 * Class RoleDeleted.
 */
class RoleDeleted
{
    use SerializesModels;

    public $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }
}
