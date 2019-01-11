<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_admin_can_see_users_list()
    {
        $this->signIn(null, 'admin');

        $this->get(route('users.index'))->assertSee(auth()->user()->name);
    }

    /** @test */
    public function test_unauthorized_user_can_not_see_users_list()
    {
        $this->withExceptionHandling();

        $this->get(route('users.index'))->assertRedirect('login');

        $this->signIn();

        $this->get(route('users.index'))->assertStatus(403);
    }

    /** @test */
    public function test_admin_can_see_user_card()
    {
        $this->signIn(null, 'admin');

        $user = create('App\User');

        $this->get(route('users.show', $user))->assertSee($user->name);
    }

    /** @test */
    public function test_unauthorized_user_can_not_see_user_card()
    {
        $this->withExceptionHandling();

        $user = create('App\User');

        $this->get(route('users.show', $user))->assertRedirect('login');

        $this->signIn();

        $this->get(route('users.show', $user))->assertStatus(403);
    }

    /** @test */
    public function test_unauthorized_user_can_not_create_user()
    {
        $this->withExceptionHandling();
        $this->get(route('users.create'))->assertRedirect('login');

        $this->signIn();

        $this->get(route('users.create'))->assertStatus(403);
    }

    /** @test */
    public function test_authorized_users_can_create_user()
    {
        $this->signIn(null, 'admin');

        $this->get(route('users.create'))->assertStatus(200);

        $user = make('App\User');
        $user->password = 'secret';
        $user->password_confirmation = 'secret';
        $user->makeVisible(['password']);


        $this->post(route('users.store'), $user->toArray());

        $this->assertDatabaseHas('users', $user->only('name', 'email'));
    }
}
