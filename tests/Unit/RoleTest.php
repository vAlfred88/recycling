<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use DatabaseMigrations;
    protected $role;

    /** @test */
    public function roles_belongs_to_user()
    {
        $user = create('App\User');

        $this->role->users()->attach($user);

        $this->assertTrue($this->role->users->contains($user));
    }

    /** @test */
    public function role_give_permission()
    {
        $user = create('App\User');
        $role = create(Role::class);
        $user->assignRole($role->name);

        $permission = create(Permission::class);
        $role->givePermissionTo($permission);

        $this->assertTrue($user->hasPermissionTo($permission));
    }

    /** @test */
    public function role_belongs_to_permission()
    {
        $permission = create(Permission::class);

        $this->role->permissions()->attach($permission);

        $this->assertTrue($this->role->permissions->contains($permission));
    }

    protected function setUp()
    {
        parent::setUp();

        $this->role = create(Role::class);
    }
}
