<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
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
        $role = create('App\Role');

        $this->user->roles()->attach($role);

        $this->assertTrue($this->user->roles->contains($role));
    }

    /** @test */
    public function user_belongs_to_company()
    {
        $company = create('App\Company');

        $this->user->companies()->attach($company);

        $this->assertTrue($this->user->companies->contains($company));
    }

    /** @test */
    public function user_belongs_to_reception()
    {
        $reception = create('App\Reception');

        $this->user->receptions()->attach($reception);

        $this->assertTrue($this->user->receptions->contains($reception));
    }

    protected function setUp()
    {
        parent::setUp();

        $this->user = create('App\User');
    }
}
