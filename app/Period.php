<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
