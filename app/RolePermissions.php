<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Trait RolePermissions
 * @package App
 */
trait RolePermissions
{
    /**
     * @return null
     */
    public static function bootRolePermissions()
    {
        if (auth()->guest()) {
            return;
        }

        foreach (static::getModelEvents() as $event) {
            static::$event(function (Model $model) {
                $model->assignPermissions($model);
            });
        }
    }

    /**
     * @return array
     */
    public static function getModelEvents()
    {
        return [
            'created',
            'updated'
        ];
    }

    /**
     * @param Model $model
     */
    public function assignPermissions(Model $model)
    {
        if (request()->has('permissions')) {
            foreach (request()->permissions as $permission) {
                $permissions[] = Permission::firstOrCreate([
                    'name' => $permission,
                    'label' => $permission
                ])->id;
            }

            $model->permissions()->attach($permissions);
        }
    }
}