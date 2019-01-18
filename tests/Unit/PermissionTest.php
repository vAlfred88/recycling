<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use DatabaseMigrations;
    protected $permission;

    /** @test */
    public function permission_belongs_to_role()
    {
        $role = create(Role::class);
        $permission = create(Permission::class);

        $role->permissions()->attach($permission);

        $this->assertTrue($permission->roles->contains($role));
    }
}
