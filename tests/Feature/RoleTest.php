<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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

        $role = create(Role::class);

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

        $role = create(Role::class);

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

        $role = create(Role::class);

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

        $role = create(Role::class);
        $permission = create(Permission::class, ['name' => 'view-roles']);

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

        $role = create(Role::class);
        $permission = create(Permission::class, ['name' => 'show-roles']);

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
        $this->signIn(null, 'user');

        $permission = create(Permission::class, ['name' => 'create-roles']);

        auth()->user()->givePermissionTo('create-roles');

        $menu = create('App\Menu');

        $this->definePermissions();

        $this->get(route('roles.create'))
            ->assertSee($menu->label);

        $role = [
            'name' => 'new-role',
            'permissions' => [
                'new-permission',
            ]
        ];

        $this->post(route('roles.store'), $role);

        $this->assertDatabaseHas('roles', ['name' => 'new-role']);
        $this->assertDatabaseHas('permissions', ['name' => 'new-permission']);
    }

    /** @test */
    public function test_authorized_user_can_edit_role()
    {
        $this->signIn(null, 'user');

        create(Permission::class, ['name' => 'edit-roles']);

        auth()->user()->givePermissionTo('edit-roles');

        $this->definePermissions();

        $this->get(route('roles.edit', 1))
             ->assertSee('user');


        $newRole = [
            'name' => 'new-role',
            'permissions' => [
                'new-permission',
            ]
        ];

        $this->patch(route('roles.update', 1), $newRole);

        $this->assertDatabaseHas('roles', ['name' => 'new-role']);
        $this->assertDatabaseHas('permissions', ['name' => 'new-permission']);
    }

    /** @test */
    public function test_admin_can_see_roles()
    {
        $this->signIn($this->user);

        $role = create(Role::class, ['name' => 'admin']);
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

        $role = create(Role::class, ['name' => 'admin']);
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
