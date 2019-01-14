<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Media
 *
 * @package App
 */
class Media extends Model
{
    /**
     * @var string
     */
    protected $table = 'files';

    /**
     * @var array
     */
    protected $fillable = [
        'path',
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function storable()
    {
        return $this->morphTo();
    }
}
