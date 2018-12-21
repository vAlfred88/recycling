<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;

    /** @test */
    public function test_unauthorized_user_can_not_see_roles()
    {
        $this->withExceptionHandling();

        $this->get(route('roles.index'))
            ->assertStatus(302);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_authorized_user_can_see_roles()
    {
        $this->signIn($this->user);

        $role = create('App\Role');
        $permission = create('App\Permission', ['name' => 'view-roles']);

        $role->permissions()->save($permission);
        $this->user->roles()->attach($role);

        $this->definePermissions();

        $this->get(route('roles.index'))
            ->assertSee($role->name)
            ->assertSee($role->label);
    }

    protected function setUp()
    {
        parent::setUp();

        $this->user = create('App\User');
    }
}
