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
        $user = createUserWithPermission('create-roles');
        $this->signIn($user);

        $this->definePermissions();

        $this->get(route('roles.create'))->assertStatus(200);

        $role = make(Role::class);
        $permission = make(Permission::class);
        $data = array_merge($role->toArray(), [
            'permissions' => array_wrap($permission->name)
        ]);

        $this->post(route('roles.store'), $data);

        $this->assertDatabaseHas('roles', $role->only(['name', 'label']));
        $this->assertDatabaseHas('permissions', $permission->only(['name']));
    }

    /** @test */
    public function test_authorized_user_can_edit_role()
    {
        $user = createUserWithPermission('update-roles');
        $this->signIn($user);

        $role = create(Role::class);

        $this->definePermissions();

        $this->get(route('roles.edit', $role))->assertSee($role->name);


        $new_role = make(Role::class);
        $new_permission = make(Permission::class);
        $data = array_merge($new_role->toArray(), [
            'permissions' => array_wrap($new_permission->name)
        ]);

        $this->put(route('roles.update', $role), $data);

        $this->assertDatabaseHas('roles', $new_role->only(['name', 'label']));
        $this->assertDatabaseHas('permissions', $new_permission->only(['name']));
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
