<?php

namespace Tests\Feature;

use App\Company;
use App\Place;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
        $company = factory(Company::class)->create();

        $this->get(route('companies.index'))->assertSee($company->name);
    }

    /** @test */
    public function test_company_owner_can_see_company_card()
    {
        $owner = create(User::class);
        $this->signIn($owner, 'owner');
        $company = factory(Company::class)->create();
        $owner->company()->associate($company);

        $this->get(route('companies.show', auth()->user()->company))
             ->assertSee(auth()->user()->company->name)
             ->assertSee(auth()->user()->company->phone)
             ->assertSee(auth()->user()->company->email);

    }

    /** @test */
    public function test_admin_can_see_company_card()
    {
        $this->signIn(null, 'admin');
        $company = create(Company::class);

        $this->get(route('companies.show', $company))
             ->assertSee($company->name)
             ->assertSee($company->phone)
             ->assertSee($company->email);
    }

    /** @test */
    public function test_unauthorized_user_can_not_edit_company()
    {
        $this->withExceptionHandling();

        $company = create('App\Company');
        $this->get(route('companies.edit', $company))
             ->assertRedirect('/login');

        $this->signIn();

        $this->get(route('companies.edit', $company))
             ->assertStatus(403);
    }

    /** @test */
    public function test_authorized_user_can_edit_company()
    {
        $owner = $this->createUserWithRole('owner');
        $this->signIn($owner);
        $company = $this->createCompanyWithOwner($owner);

        $this->get(route('companies.edit', $company))
             ->assertSee($company->name);

        $new_company = make('App\Company');

        $this->json('PATCH', route('api.companies.update', $company), $new_company->toArray());

        $this->assertDatabaseHas('companies', [
            'name' => $new_company->name,
            'phone' => $new_company->phone,
            'email' => $new_company->email,
            'inn' => $new_company->inn,
        ]);
    }

    public function createUserWithRole($role)
    {
        create(Role::class, ['name' => 'owner']);
        $user = create(User::class);
        $user->assignRole($role);

        return $user;
    }

    /**
     * @param \App\User|null $user
     *
     * @return mixed
     */
    public function createCompanyWithOwner(?User $user = null)
    {
        $company = create(Company::class);
        if ($user) {
            $company->owner()->save($user);
        }
        $company->owner()->save($this->createUserWithRole('owner'));

        return $company;
    }

    /** @test */
    public function test_admin_can_edit_company()
    {
        $this->signIn(null, 'admin');

        $company = $this->createCompanyWithOwner();

        $this->assertTrue($company->owner()->exists());

        $this->get(route('companies.edit', $company))
             ->assertSee($company->name);

        $new_company = make('App\Company');
        $logo = UploadedFile::fake()->image('logo.png');
        $new_owner = $this->createUserWithRole('owner');
        $place = make(Place::class);

        $data = array_merge($new_company->toArray(), $place->toArray());

        $this->json('PATCH', route('api.companies.update', $company),
            array_merge($data, [
                'logo' => $logo,
                'owner' => $new_owner->id,
            ]));

        $this->assertDatabaseHas('companies', [
            'name' => $new_company->name,
            'phone' => $new_company->phone,
            'email' => $new_company->email,
            'inn' => $new_company->inn,
        ]);

        $this->assertEquals(asset('storage/companies/' . $company->id . '/' . $logo->hashName()), $company->logo);
        Storage::disk('public')->assertExists('companies/' . $company->id . '/' . $logo->hashName());
        $this->assertEquals($company->owner->only(['name', 'email', 'id']), $new_owner->only(['name', 'email', 'id']));
        $this->assertEquals($company->place->only(['lat', 'lng', 'city']), $place->only(['lat', 'lng', 'city']));
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

        $this->assertDatabaseMissing('companies', [
            'name' => $company->name,
            'id' => $company->id,
        ]);
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

        $company = make(Company::class);
        $logo = UploadedFile::fake()->image('logo.png');

        create(Role::class, ['name' => 'owner']);
        $owner = create(User::class);
        $owner->assignRole('owner');

        $this->json('POST', route('api.companies.store'),
            array_merge($company->toArray(), [
                'logo' => $logo,
                'owner' => $owner->id,
            ]));

        $this->assertDatabaseHas('companies', [
            'name' => $company->name,
            'phone' => $company->phone,
            'email' => $company->email,
            'inn' => $company->inn,
        ]);

        $company = Company::query()->where($company->only('name', 'email', 'phone'))->first();

        $this->assertEquals(asset('storage/companies/' . $company->id . '/' . $logo->hashName()), $company->logo);
        Storage::disk('public')
               ->assertExists('companies/' . $company->id . '/' . $logo->hashName());
        $this->assertEquals($company->owner->only(['name', 'email', 'id']), $owner->only(['name', 'email', 'id']));
    }
}
