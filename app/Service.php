<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Service extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function receptions()
    {
        return $this->belongsToMany(Reception::class);
    }
}
