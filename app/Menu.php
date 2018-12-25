<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu
 * @package App
 * @mixin Builder
 */
class Menu extends Model
{
    use AssignPermissions;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
        'icon',
        'url'
    ];

    /**
     * @param $permission
     * @return string
     */
    public function getPermissionName($permission)
    {
        return implode([$permission, '-', $this->attributes['name']]);
    }

    /**
     * @param Model $model
     */
    public function assignPermissions(Model $model)
    {
        if (request()->has('permissions')) {
            foreach (request()->permissions as $permission) {
                Permission::firstOrCreate([
                    'name' => $permission,
                    'label' => $permission
                ]);

            }
        }
    }
}
