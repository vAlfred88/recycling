<?php

namespace App;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\Types\LineString;
use Grimzy\LaravelMysqlSpatial\Types\MultiPoint;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'address',
        'place',
        'lat',
        'lng',
    ];

    public $spatialFields = [
        'location'
    ];

    public function addressable()
    {
        return $this->morphTo();
    }

    public function markers()
    {
        return $this->hasMany(Marker::class);
    }
}
