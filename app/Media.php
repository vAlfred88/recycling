<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Media
 *
 * @package App
 */

/**
 * @SWG\Definition(
 *  definition="Media",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="path",
 *      type="string"
 *  ),
 *     @SWG\Property(
 *      property="name",
 *      type="string"
 *  ),
 * )
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
