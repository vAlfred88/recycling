<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * Class Review
 *
 * @property mixed user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 *
 * @SWG\Definition(
 *  definition="Rewiew",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="label",
 *      type="string"
 *  ),
 *     @SWG\Property(
 *      property="body",
 *      type="text"
 *  ),
 * )
 */
class Review extends Model
{
    protected $fillable = [
        'review',
        'body',
    ];

    protected $casts = ['review'];

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

    public function getReviewAttribute()
    {
        return !!$this->attributes['review'];
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param $company
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function scopeWhereCompanyId(Builder $builder, $company) {
        return $builder->whereHas('companies', function (Builder $builder) use ($company) {
            return $builder->where('id', $company);
        });
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param $receptions
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function scopeWhereReceptionsId(Builder $builder, $receptions)
    {
        return $builder->whereHas('receptions', function (Builder $builder) use ($receptions) {
            return $builder->whereIn('id', $receptions);
        });
    }
}
