<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

/**
 * Class Menu
 * @package App
 * @mixin Builder
 */

/**
 * @SWG\Definition(
 *  definition="Menu",
 *  @SWG\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @SWG\Property(
 *      property="name",
 *      type="string"
 *  ),
 *     @SWG\Property(
 *      property="label",
 *      type="string"
 *  ),
 *     @SWG\Property(
 *      property="icon",
 *      type="string"
 *  ),
 *     @SWG\Property(
 *      property="url",
 *      type="string"
 *  ),
 * )
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
                    'label' => $permission,
                ]);

            }
        }
    }
}
