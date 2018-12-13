<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

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
    public function companies(): MorphToMany
    {
        return $this->morphedByMany(Company::class, 'reviewable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function receptions(): MorphToMany
    {
        return $this->morphedByMany(Reception::class, 'reviewable');
    }
}
