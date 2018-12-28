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

    /** @test */
    public function test_unauthorized_user_can_not_edit_company()
    {
        $this->withExceptionHandling()
             ->get(route('companies.edit', 1), [])
             ->assertRedirect('/login');

        $this->signIn();

        $this->get(route('companies.edit', auth()->user()->company))
             ->assertStatus(403);
    }

    /** @test */
    public function test_authorized_user_can_edit_company()
    {
        $this->signIn();

        $owner = create('App\Role', ['name' => 'owner']);
        auth()->user()->assignRole('owner');

        $this->get(route('companies.edit', auth()->user()->company))
             ->assertSee(auth()->user()->company->name)
             ->assertSee(auth()->user()->company->address)
             ->assertSee(auth()->user()->company->email);

        $company = make('App\Company');

        $this->put(route('companies.update', auth()->user()->company), $company->toArray());

        $this->assertDatabaseHas('companies', $company->toArray());

        create('App\Role', ['name' => 'admin']);
        auth()->user()->assignRole('admin');
        auth()->user()->roles()->detach($owner);

        $this->get(route('companies.edit', auth()->user()->company))
             ->assertSee(auth()->user()->company->fresh()->name)
             ->assertSee(auth()->user()->company->fresh()->address)
             ->assertSee(auth()->user()->company->fresh()->email);

        $company = make('App\Company');

        $this->put(route('companies.update', auth()->user()->company), $company->toArray());

        $this->assertDatabaseHas('companies', $company->toArray());
    }
}
