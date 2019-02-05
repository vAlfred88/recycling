<?php

namespace App;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Place
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @property \Grimzy\LaravelMysqlSpatial\Types\Polygon viewport
 * @property mixed location
 * @property mixed addressable
 */
class Place extends Model
{
    protected $fillable = [
        'lat',
        'lng',
        'south',
        'west',
        'north',
        'east',
        'place'
    ];

    public function addressable()
    {
        return $this->morphTo();
    }
}
