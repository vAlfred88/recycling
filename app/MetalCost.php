<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(
 *  definition="Metalcost",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="metal",
 *      type="string"
 *  ),
 *     @SWG\Property(
 *      property="cost",
 *      type="float"
 *  ),
 * )
 */
class MetalCost extends Model
{
    protected $fillable = [
        'metal',
        'cost'
    ];

    public function getTwoLast(Builder $builder)
    {
        $builder->latest()->take(2)->get();
    }

    public function getCostAttribute($cost)
    {
        return round($cost,2);
    }

}
