<?php

namespace App\Domains\Auth\Models\Traits\Relationship;

use App\Domains\Auth\Models\PasswordHistory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->morphMany(PasswordHistory::class, 'model');
    }

    /**
     * The roles that belong to the UserRelationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

}
