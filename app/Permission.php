<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Permission extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Permission::class);
    }
}
