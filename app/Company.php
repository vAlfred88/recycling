<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Class Company
 *
 * @property mixed user_id
 * @property mixed id
 * @property mixed users
 * @property mixed media
 * @property mixed receptions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Company extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'description',
        'site',
        'email',
        'address',
        'inn',
        'kpp',
        'ogrn',
    ];

    protected $withCount = [
        'receptions'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function owner()
    {
        return $this->hasOne(User::class)->whereHas('roles', function (Builder $role) {
            return $role->whereName('owner');
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receptions(): HasMany
    {
        return $this->hasMany(Reception::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function reviews(): MorphToMany
    {
        return $this->morphToMany(Review::class, 'reviewable');
    }

    public function media()
    {
        return $this->morphOne(Media::class, 'storable');
    }

    public function place()
    {
        return $this->morphOne(Place::class, 'addressable');
    }

    public function getLogoAttribute()
    {
        if ($this->media()->exists()) {
            return asset("storage/" . $this->media->path);
        }

        return asset('images/default.png');
    }
}
