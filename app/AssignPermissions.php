<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Trait RolePermissions
 * @package App
 */
trait AssignPermissions
{
    /**
     * @return null
     */
    public static function bootAssignPermissions()
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
    abstract public function assignPermissions(Model $model);
}