<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Reception
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @property integer company_id
 * @property \App\Place place
 *
 * @SWG\Definition(
 *  definition="Reception",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="address",
 *      type="string"
 *  ),
 *     @SWG\Property(
 *      property="open",
 *      type="string"
 *  ),
 *     @SWG\Property(
 *      property="close",
 *      type="string"
 *  ),
 *     @SWG\Property(
 *      property="phone",
 *      type="string"
 *  ),
 *     @SWG\Property(
 *      property="lat",
 *      type="decimal"
 *  ),
 *     @SWG\Property(
 *      property="lng",
 *      type="decimal"
 *  ),
 *     @SWG\Property(
 *      property="company_id",
 *      type="integer"
 *  ),
 *       @SWG\Property(
 *      property="city",
 *      type="string"
 *  ),
 * )
 */
class Reception extends Model
{
    protected $fillable = [
        'address',
        'open',
        'close',
        'phone',
        'company_id',
        'lat',
        'lng',
        'city',
    ];

    protected $with = ['place', 'users', 'services', 'reviews'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function periods()
    {
        return $this->hasMany(Period::class);
    }

    public function place()
    {
        return $this->morphOne(Place::class, 'addressable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function reviews()
    {
        return $this->morphToMany(Review::class, 'reviewable')->latest();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
