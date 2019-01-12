<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'files';

    protected $fillable = [
        'path',
        'name',
    ];

    public function storable()
    {
        return $this->morphTo();
    }
}
