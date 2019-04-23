<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(
 *  definition="Period",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="day",
 *      type="time"
 *  ),
 *     @SWG\Property(
 *      property="open",
 *      type="time"
 *  ),
 *     @SWG\Property(
 *      property="close",
 *      type="string"
 *  ),
 *     @SWG\Property(
 *      property="reception_id",
 *      type="integer"
 *  ),
 * )
 */
class Period extends Model
{
    protected $fillable = [
        'day',
        'open',
        'close',
        'reception_id'
    ];

    public function reception()
    {
        return $this->belongsTo(Reception::class);
    }

    public function getDayAttribute($day)
    {
        return Carbon::now()->startOfWeek()->addDay($day)->format('D');
    }
}
