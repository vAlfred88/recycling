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

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->role->users
        );
    }

    /** @test */
    public function role_belongs_to_one_user()
    {
        $user = create('App\User');
        create('App\User');

        $this->role->users()->attach($user);

        $this->assertCount(1, $this->role->users);
    }

    /** @test */
    public function role_belongs_to_permission()
    {
        $permission = create('App\Permission');

        $this->role->permissions()->attach($permission);

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->role->permissions
        );
    }

    /** @test */
    public function role_belongs_to_one_permission()
    {
        $permission = create('App\Permission');
        create('App\Permission');

        $this->role->permissions()->attach($permission);

        $this->assertCount(1, $this->role->permissions);
    }

    protected function setUp()
    {
        parent::setUp();

        $this->role = create('App\Role');
    }
}
