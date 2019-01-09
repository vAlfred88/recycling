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
}
