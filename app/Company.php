<?php

namespace App;

use Carbon\Carbon;
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
 * @property mixed reviews
 * @property mixed place
 * @property mixed owner
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @SWG\Definition(
 *  definition="Company",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="name",
 *      type="string"
 *  ),
 *  @SWG\Property(
 *      property="phone",
 *      type="string"
 *  ),
 * @SWG\Property(
 *      property="descrtiption",
 *      type="string"
 *  ),
 * @SWG\Property(
 *      property="site",
 *      type="string"
 *  ),
 * @SWG\Property(
 *      property="email",
 *      type="string"
 *  ),
 * @SWG\Property(
 *      property="address",
 *      type="string"
 *  ),
 * @SWG\Property(
 *      property="inn",
 *      type="string"
 *  ),
 * @SWG\Property(
 *      property="kpp",
 *      type="string"
 *  ),
 * @SWG\Property(
 *      property="ogrn",
 *      type="string"
 *  )
 * )
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
        'instagram',
        'facebook',
        'vk',
    ];

    protected $withCount = [
        'receptions',
    ];

    protected $appends = [
        'route',
        'logo',
        'positive_reviews',
        'negative_reviews',
    ];

    protected $with = [
        'users',
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
            return $role->where('name', 'owner');
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receptions(): HasMany
    {
        return $this->hasMany(Reception::class);
    }

    public function getRouteAttribute()
    {
        return route('front.recycles.show', $this);
    }

    public function getPositiveReviewsAttribute()
    {
        if ($this->reviews) {
            return $this->reviews()->where('review', true)->count();
        }

        return 0;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function reviews(): MorphToMany
    {
        return $this->morphToMany(Review::class, 'reviewable');
    }

    public function getNegativeReviewsAttribute()
    {
        if ($this->reviews) {
            return $this->reviews()->where('review', false)->count();
        }

        return 0;
    }

    public function place()
    {
        return $this->morphOne(Place::class, 'addressable');
    }

    public function getLogoAttribute()
    {
        if ($this->media()->exists()) {
            return asset('storage/' . $this->media->path);
        }

        return asset('https://via.placeholder.com/250x250.png?text=Logo');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function media()
    {
        return $this->morphOne(Media::class, 'storable');
    }
}
