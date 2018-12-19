<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function getPermissionName($permission)
    {
        return implode([$permission, '-', $this->attributes['name']]);
    }
}
