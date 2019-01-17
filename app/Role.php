<?php

namespace App;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

/**
 * Class Role
 *
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
        'label',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * @param \App\Permission $permission
     *
     * @return bool
     */
    public function hasPermission($permission): bool
    {
        if (is_string($permission)) {
            return $this->permissions->contains('name', $permission);
        }

        return !!$permission->intersect($this->permissions)->count();
    }

    /**
     * @param \Illuminate\Http\Request $request
     */
    public function assignPermissions(Request $request)
    {
        if ($request->has('permissions')) {
            foreach ($request->get('permissions') as $permission) {
                $permissions[] = Permission::firstOrCreate(
                    [
                        'name' => $permission,
                        'label' => $permission,
                    ]
                )->id;
            }

            $this->permissions()->attach($permissions);
        }
    }
}
