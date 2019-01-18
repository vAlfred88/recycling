<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;

    /** @test */
    public function user_has_profile_relation()
    {
        $user = create('App\User');
        create('App\Profile', ['user_id' => $user->id]);

        $this->assertInstanceOf('App\Profile', $user->profile);
    }

    /** @test */
    public function user_has_role()
    {
        $role = create(Role::class);

        $this->user->roles()->attach($role);

        $this->assertTrue($this->user->roles->contains($role));
    }

    /** @test */
    public function user_belongs_to_company()
    {
        $company = create('App\Company');

        $user = create('App\User', ['company_id' => $company->id]);

        $this->assertInstanceOf('App\Company', $user->company);
    }

    /** @test */
    public function user_belongs_to_reception()
    {
        $reception = create('App\Reception');

        $this->user->receptions()->attach($reception);

        $this->assertTrue($this->user->receptions->contains($reception));
    }

    /** @test */
    public function user_has_phone_attribute()
    {
        $profile = create('App\Profile', ['user_id' => $this->user->id]);

        $this->assertTrue($profile->phone == $this->user->phone);
    }

    /** @test */
    public function user_has_position_attribute()
    {
        $profile = create('App\Profile', ['user_id' => $this->user->id]);

        $this->assertTrue($profile->position == $this->user->position);
    }

    protected function setUp()
    {
        parent::setUp();

        $this->user = create('App\User');
    }
}
