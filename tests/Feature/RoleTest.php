<?php

namespace Tests\Feature;

use App\Permission;
use App\Role;
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

        $this->signIn();

        $this->get(route('roles.index'))
            ->assertStatus(403);
    }

    /** @test */
    public function test_unauthorized_user_can_not_create_role()
    {
        $this->withExceptionHandling();

        $this->get(route('roles.create'))
            ->assertStatus(302);

        $this->signIn();

        $this->get(route('roles.create'))
            ->assertStatus(403);
    }

    /** @test */
    public function test_unauthorized_user_can_not_edit_role()
    {
        $this->withExceptionHandling();

        $role = create('App\Role');

        $this->get(route('roles.edit', $role))
            ->assertStatus(302);

        $this->signIn();

        $this->get(route('roles.edit', $role))
            ->assertStatus(403);
    }

    /** @test */
    public function test_unauthorized_user_can_not_delete_role()
    {
        $this->withExceptionHandling();

        $role = create('App\Role');

        $this->get(route('roles.destroy', $role))
            ->assertStatus(302);

        $this->signIn();

        $this->get(route('roles.destroy', $role))
            ->assertStatus(403);
    }

    /** @test */
    public function test_unauthorized_user_can_not_show_roles()
    {
        $this->withExceptionHandling();

        $role = create('App\Role');

        $this->get(route('roles.show', $role))
            ->assertStatus(302);

        $this->signIn();

        $this->get(route('roles.show', $role))
            ->assertStatus(403);
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

    /**
     * @test
     */
    public function test_authorized_user_can_see_single_role()
    {
        $this->signIn($this->user);

        $role = create('App\Role');
        $permission = create('App\Permission', ['name' => 'show-roles']);

        $role->permissions()->save($permission);
        $this->user->roles()->attach($role);

        $this->definePermissions();

        $this->get(route('roles.show', $role))
            ->assertSee($role->name)
            ->assertSee($role->label);
    }

    /**
     * @test
     */
    public function test_authorized_user_can_create_role()
    {
        $this->signIn($this->user);

        $role = create('App\Role');
        $permission = create('App\Permission', ['name' => 'create-roles']);

        $role->permissions()->save($permission);
        $this->user->roles()->attach($role);

        $menu = create('App\Menu');

        $this->definePermissions();

        $this->get(route('roles.create'))
            ->assertSee($menu->label);

        $newPermission = create('App\Permission');

        $newRole = [
            'name' => 'new-role',
            'label' => 'New role',
            'permissions' => [
                'new-permission',
                $newPermission->name
            ]
        ];

        $this->post(route('roles.store'), $newRole);

        $this->assertDatabaseHas('roles', ['name' => 'new-role']);
        $this->assertDatabaseHas('permissions', ['name' => 'new-permission']);

        $createdRole = Role::whereName('new-role')->first();
        $createdPermission = Permission::whereName('new-permission')->first();

        $this->assertTrue($createdRole->permissions->contains($createdPermission));
        $this->assertTrue($createdRole->permissions->contains($newPermission));
    }

    /** @test */
    public function test_authorized_user_can_edit_role()
    {
        $this->signIn($this->user);

        $role = create('App\Role');
        $permission = create('App\Permission', ['name' => 'edit-roles']);

        $role->permissions()->save($permission);
        $this->user->roles()->attach($role);

        $this->definePermissions();

        $this->get(route('roles.edit', $role))
            ->assertSee($role->name)
            ->assertSee($role->label);

        $newPermission = create('App\Permission');

        $newRole = [
            'name' => 'new-role',
            'label' => 'New role',
            'permissions' => [
                'new-permission',
                $newPermission->name
            ]
        ];

        $this->patch(route('roles.update', $role), $newRole);

        $this->assertDatabaseHas('roles', ['name' => 'new-role']);
        $this->assertDatabaseHas('permissions', ['name' => 'new-permission']);

        $createdRole = Role::whereName('new-role')->first();
        $createdPermission = Permission::whereName('new-permission')->first();

        $this->assertTrue($createdRole->permissions->contains($createdPermission));
        $this->assertTrue($createdRole->permissions->contains($newPermission));
    }

    /** @test */
    public function test_admin_can_see_roles()
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
