<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Class Review
 *
 * @property mixed user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Review extends Model
{
    protected $fillable = [
        'label',
        'body',
    ];

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

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getUsernameAttribute()
    {
        return $this->user()->exists() ? $this->user->name : 'Анонимный';
    }
}
