<?php

namespace App;

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
}
