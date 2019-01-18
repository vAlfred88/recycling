<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_unauthorized_users_can_not_see_company_page()
    {
        $this->withExceptionHandling();

        $this->get(route('company'))
             ->assertRedirect('login');

        $this->signIn(null, 'user');

        $this->get(route('company'))
             ->assertStatus(403);

        $this->signIn(null, 'admin');

        $this->get(route('company'))
             ->assertStatus(403);

    }

    /** @test */
    public function test_users_without_role_can_not_see_home_page()
    {
        $this->withExceptionHandling();

        $this->signIn();

        $this->get(route('home'))->assertStatus(404);
    }

    /** @test */
    public function test_authorized_user_can_see_company_card()
    {
        $this->signIn(null, 'owner');

        $this->get(route('company'))
             ->assertSee(auth()->user()->company->name);
    }

    /** @test */
    public function test_admin_can_see_own_home_page()
    {
        $this->signIn(null, 'admin');

        $this->get(route('home'))->assertSee('Admin page');
    }

    /** @test */
    public function test_owner_can_see_own_home_page()
    {
        $this->signIn(null, 'owner');

        $this->get(route('home'))->assertSee(auth()->user()->company->name);
    }

    /** @test */
    public function test_user_can_see_own_home_page()
    {
        $this->signIn(null, 'user');

        $this->get(route('home'))->assertSee('User page');
    }
}
