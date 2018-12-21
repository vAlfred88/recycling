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

    /** @test */
    public function test_unauthorized_user_can_not_show_roles()
    {
        $this->withExceptionHandling();

        $role = create('App\Role');

        $this->get(route('roles.show', $role))
            ->assertStatus(302);
    }

    /**
     * @test
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

    /** @test */
    public function test_admin_can_do_anything_with_roles()
    {
        $this->signIn($this->user);

        $role = create('App\Role', ['name' => 'admin']);
        $this->user->roles()->attach($role);

        $this->definePermissions();

        $this->get(route('roles.index'))
            ->assertSee($role->name)
            ->assertSee($role->label);
    }

    /** @test */
    public function test_admin_can_delete_role()
    {
        $this->signIn($this->user);

        $role = create('App\Role', ['name' => 'admin']);
        $this->user->roles()->attach($role);

        $this->definePermissions();

        $this->assertTrue($this->user->can('delete-roles'));

        $this->delete(route('roles.destroy', $role))
            ->assertRedirect();

        $this->assertDatabaseMissing('roles', ['id' => $role->id]);
    }

    protected function setUp()
    {
        parent::setUp();

        $this->user = create('App\User');
    }
}
