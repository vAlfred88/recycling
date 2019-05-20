<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyUsersTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_employee()
    {
        $owner = createUserWithPermission('create-users');
        $company = createCompanyWithOwner($owner);

        $this->signIn($owner, 'owner');

        $this->get(route('employees.create'))->assertStatus(200);

        $user = make(User::class);

        $this->post(route('api.users.store'), $user->toArray())->assertStatus(200);
        $this->assertDatabaseHas('users', $user->only(['name', 'email']));

        $user = User::where($user->only(['name', 'email']))->first();
        $this->assertTrue($company->users->contains($user));
    }
}
