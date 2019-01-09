<?php

namespace App;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Role
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 * @property \Illuminate\Database\Eloquent\Collection $permissions
 */
class Role extends Model
{
    use FormAccessible, AssignPermissions;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'label'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * @param \App\Permission $permission
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function givePermissionTo(Permission $permission): Model
    {
        return $this->permissions()->save($permission);
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
