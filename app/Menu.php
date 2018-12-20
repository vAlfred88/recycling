<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'label',
        'icon',
        'url'
    ];
    public function getPermissionName($permission)
    {
        return implode([$permission, '-', $this->attributes['name']]);
    }
}
