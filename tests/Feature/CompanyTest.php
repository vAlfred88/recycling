<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use DatabaseMigrations;

    /* @test */
    public function test_unauthenticated_user_can_not_see_company_page()
    {
        $this->withExceptionHandling()
             ->get(route('companies.index'), [])
             ->assertRedirect('/login');

        $this->signIn();

        $this->get(route('companies.index'))
             ->assertStatus(403);
    }

    /** @test */
    public function test_authorized_user_can_see_company_card()
    {
        $user = create('App\User');

        $owner = create('App\Role', ['name' => 'owner']);
        $user->assignRole('owner');

        $this->signIn($user);

        $this->get(route('companies.index'))
             ->assertSee($user->company->name)
             ->assertSee($user->company->address)
             ->assertSee($user->company->email);

        create('App\Role', ['name' => 'admin']);
        auth()->user()->assignRole('admin');
        auth()->user()->roles()->detach($owner);

        $this->get(route('companies.index'))
             ->assertSee($user->company->name)
             ->assertSee($user->company->address)
             ->assertSee($user->company->email);
    }
}
