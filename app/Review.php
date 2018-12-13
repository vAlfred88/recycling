<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Review extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function companies()
    {
        return $this->morphedByMany(Company::class, 'reviewable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function receptions()
    {
        return $this->morphedByMany(Reception::class, 'reviewable');
    }
}
