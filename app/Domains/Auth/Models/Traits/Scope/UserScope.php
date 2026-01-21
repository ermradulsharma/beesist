<?php

namespace App\Domains\Auth\Models\Traits\Scope;

use App\Domains\Auth\Models\User;

/**
 * Class UserScope.
 */
trait UserScope
{

    /**
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(function ($query) use ($term) {
            $query->where('name', 'like', '%' . $term . '%')->orWhere('email', 'like', '%' . $term . '%');
        });
    }

    /**
     * @return mixed
     */
    public function scopeOnlyDeactivated($query)
    {
        return $query->whereActive(false);
    }

    /**
     * @return mixed
     */
    public function scopeOnlyActive($query)
    {
        return $query->whereActive(true);
    }

    /**
     * @return mixed
     */
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * @return mixed
     */
    public function scopeAllAccess($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', config('boilerplate.access.role.admin'));
        });
    }

    /**
     * @return mixed
     */
    public function scopeAdmins($query)
    {
        return $query->where('type', User::TYPE_ADMIN);
    }

    /**
     * @return mixed
     */
    public function scopeUsers($query)
    {
        return $query->where('type', User::TYPE_USER);
    }
}
