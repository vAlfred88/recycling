<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Spatie\Permission\Models\Role;
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

        $this->signIn(null, 'owner');

        $this->get(route('companies.index'))
             ->assertStatus(403);
    }

    /** @test */
    public function test_admin_can_see_list_of_companies()
    {
        $this->signIn(null, 'admin');

        $this->get(route('companies.index'))->assertSee(auth()->user()->company->name);
    }

    /** @test */
    public function test_company_owner_can_see_company_card()
    {
        $this->signIn(null, 'owner');

        $this->get(route('companies.show', auth()->user()->company))
             ->assertSee(auth()->user()->company->name)
             ->assertSee(auth()->user()->company->phone)
             ->assertSee(auth()->user()->company->email);

    }

    /** @test */
    public function test_admin_can_see_company_card()
    {
        $this->signIn(null, 'admin');

        $this->get(route('companies.show', auth()->user()->company))
             ->assertSee(auth()->user()->company->name)
             ->assertSee(auth()->user()->company->phone)
             ->assertSee(auth()->user()->company->email);
    }

    /** @test */
    public function test_unauthorized_user_can_not_edit_company()
    {
        $this->withExceptionHandling();

        $company = create('App\Company');
        $this->get(route('companies.edit', $company))
             ->assertRedirect('/login');

        $this->signIn();

        $this->get(route('companies.edit', auth()->user()->company))
             ->assertStatus(403);
    }

    /** @test */
    public function test_company_owner_can_edit_company()
    {
        $this->signIn(null, 'owner');

        $this->get(route('companies.edit', auth()->user()->company))
             ->assertSee(auth()->user()->company->name)
             ->assertSee(auth()->user()->company->address)
             ->assertSee(auth()->user()->company->email);

        $company = make('App\Company');

        $this->put(route('companies.update', auth()->user()->company), $company->toArray())
             ->assertRedirect();

        $this->assertDatabaseHas('companies', $company->toArray());
    }

    /** @test */
    public function test_admin_can_edit_company()
    {
        $this->signIn(null, 'admin');

        $this->get(route('companies.edit', auth()->user()->company))
             ->assertSee(auth()->user()->company->fresh()->name)
             ->assertSee(auth()->user()->company->fresh()->email);

        $company = make('App\Company');

        $this->put(route('companies.update', auth()->user()->company), $company->toArray());

        $this->assertDatabaseHas('companies', $company->toArray());
    }

    /** @test */
    public function test_unauthorized_users_can_not_delete_company()
    {
        $this->withExceptionHandling();

        $company = create('App\Company');

        $this->delete(route('companies.destroy', $company))->assertRedirect('login');

        $this->signIn();

        $this->delete(route('companies.destroy', $company))->assertStatus(403);
    }

    /** @test */
    public function test_authorized_user_can_delete_company()
    {
        $this->signIn(null, 'admin');

        $company = create('App\Company');

        $this->delete(route('companies.destroy', $company))->assertRedirect();

        $this->assertDatabaseMissing('companies', ['name' => $company->name, 'id' => $company->id]);
    }

    /** @test */
    public function test_unauthorized_user_can_not_create_company()
    {
        $this->withExceptionHandling();

        $this->get(route('companies.create'))->assertRedirect('login');

        $this->signIn();

        $this->get(route('companies.create'))->assertStatus(403);
    }

    /** @test */
    public function test_authorized_user_can_create_company()
    {
        $this->signIn(null, 'admin');

        $this->get(route('companies.create'))->assertStatus(200);

        $company = make('App\Company')->toArray();

        $this->post(route('companies.store'), $company)->assertRedirect();

        $this->assertDatabaseHas('companies', $company);
    }

    /** @test */
    public function test_authorized_user_can_create_company_with_owner()
    {
        $this->signIn(null, 'admin');

        create(Role::class, ['name' => 'owner']);

        $company = make('App\Company');
        $owner = make('App\User');

        $company->owner_email = $owner->email;
        $company->owner_name = $owner->name;
        $company->with_owner = true;

        $this->post(route('companies.store'), $company->toArray())->assertRedirect();

        $this->assertDatabaseHas('companies', $company->only('name', 'email', 'phone'));
        $this->assertDatabaseHas('users', $owner->only('name', 'email'));

        $created_owner = User::where($owner->only('name', 'email'))->first();

        $this->assertTrue($created_owner->hasRole('owner'));
        $this->assertTrue($created_owner->company->name === $company->name);
    }
}
