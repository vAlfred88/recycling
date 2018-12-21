<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
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
    public function role_belongs_to_permission()
    {
        $permission = create('App\Permission');

        $this->role->permissions()->attach($permission);

        $this->assertTrue($this->role->permissions->contains($permission));
    }

    protected function setUp()
    {
        parent::setUp();

        $this->role = create('App\Role');
    }
}
