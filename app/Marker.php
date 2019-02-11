<?php

namespace App;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Grimzy\LaravelMysqlSpatial\Types\LineString;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    use SpatialTrait;

    protected $fillable = [
        'position'
    ];

    public $spatialFields = [
        'location'
    ];

    protected $with = ['markers'];

    public function setPositionAttribute($point)
    {
        $this->attributes['viewport'] = [
            LineString::fromString($point),
        ];
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
