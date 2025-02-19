<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Service
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

/**
 * @SWG\Definition(
 *  definition="Service",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="address",
 *      type="string"
 *  ),
 *     @SWG\Property(
 *      property="name",
 *      type="string"
 *  ),
 * )
 */
class Service extends Model
{
    protected $fillable = [
        'name'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function receptions(): BelongsToMany
    {
        return $this->belongsToMany(Reception::class);
    }
}
