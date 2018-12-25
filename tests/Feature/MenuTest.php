<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MenuTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function test_authorized_user_can_create_menu()
    {
        $this->signIn();

        $this->givePermission('create-menus');

        $this->definePermissions();

        $this->get(route('menus.create'))
            ->assertStatus(200);

        $permission = make('App\Permission');
        $createdPermission = create('App\Permission');

        $menu = [
            'name' => 'new-menu',
            'label' => 'new menu',
            'url' => 'new-menu',
            'permissions' => [
                $permission->name,
                $createdPermission->name
            ]
        ];

        $this->post(route('menus.store'), $menu)
            ->assertRedirect();

        $this->assertDatabaseHas('menus', array_only($menu, ['name', 'label', 'url']));
        $this->assertDatabaseHas('permissions', ['name' => $permission->name]);


    }
}
