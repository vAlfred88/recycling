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

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->user->roles
        );
    }

    /** @test */
    public function user_has_one_role()
    {
        $role = create('App\Role');
        create('App\Role');

        $this->user->roles()->attach($role);

        $this->assertCount(1, $this->user->roles);
    }

    /** @test */
    public function user_belongs_to_company()
    {
        $company = create('App\Company');

        $this->user->companies()->attach($company);

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->user->companies
        );
    }

    /** @test */
    public function user_belongs_to_one_company()
    {
        $company = create('App\Company');
        create('App\Company');

        $this->user->companies()->attach($company);

        $this->assertCount(1, $this->user->companies);
    }

    /** @test */
    public function user_belongs_to_reception()
    {
        $reception = create('App\Reception');

        $this->user->receptions()->attach($reception);

        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection', $this->user->receptions
        );
    }

    /** @test */
    public function user_belongs_to_one_reception()
    {
        $reception = create('App\Reception');
        create('App\Company');

        $this->user->receptions()->attach($reception);

        $this->assertCount(1, $this->user->receptions);
    }

    protected function setUp()
    {
        parent::setUp();

        $this->user = create('App\User');
    }
}
