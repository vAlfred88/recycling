<?php

namespace Tests\Feature;

use App\Company;
use App\Place;
use App\Reception;
use App\Service;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReceptionTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_reception()
    {
        $this->signIn(null, 'owner');

        $company = create(Company::class);
        $employee = create(User::class);
        $company->users()->save($employee);

        $reception = create(Reception::class);
        $company->receptions()->save($reception);
        $reception->users()->save($employee);

        $services = create(Service::class, [], 2);
        $reception->services()->attach($services);

        $this->get(route('company.receptions.edit', $reception))->assertStatus(200);

        $new_reception = make(Reception::class);
        $new_user = create(User::class);
        $new_services = create(Service::class, [], 2);

        $data = array_merge($new_reception->toArray(), [
            'users' => $new_user->id,
            'services' => $new_services->pluck('id')
        ]);

        $this->put(route('api.receptions.update', $reception), $data)->assertStatus(200);

        $this->assertDatabaseHas('receptions', $new_reception->only(['address', 'phone']));
        $this->assertTrue($reception->fresh()->users->contains($new_user));
        $this->assertTrue($reception->fresh()->services->intersect($new_services)->isNotEmpty());
    }

    public function test_create_reception()
    {
        $owner = createUserWithRole('owner');
        $company = createCompanyWithOwner($owner);

        $this->signIn($owner, 'owner');

        $this->get(route('company.receptions.create'))->assertStatus(200);

        $reception = make(Reception::class);
        $user = create(User::class);
        $services = create(Service::class, [], 2);

        $data = array_merge($reception->toArray(), [
            'users' => $user->id,
            'services' => $services->pluck('id')
        ]);

        $this->post(route('api.receptions.store'), $data)->assertStatus(201);
        $this->assertDatabaseHas('receptions', $reception->only(['address', 'phone']));

        $reception = Reception::where($reception->toArray())->first();

        $this->assertTrue($reception->users->contains($user));
        $this->assertTrue($reception->services->intersect($services)->isNotEmpty());
    }
}
