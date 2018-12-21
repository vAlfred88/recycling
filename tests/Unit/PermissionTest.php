<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use DatabaseMigrations;
    protected $permission;

    /** @test */
    public function permission_belongs_to_role()
    {
        $role = create('App\Role');
        $permission = create('App\Permission');

        $role->permissions()->attach($permission);

        $this->assertTrue($permission->roles->contains($role));
    }
}
