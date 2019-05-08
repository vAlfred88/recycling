<?php

namespace Tests\Unit;

use App\Company;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReceptionTest extends TestCase
{
    use DatabaseMigrations;

    protected $reception;

    /** @test */
    public function reception_belongs_to_a_company()
    {
        $this->assertInstanceOf('App\Company', $this->reception->company);
    }

    /** @test */
    public function reception_can_belongs_to_user()
    {
        $user = create('App\User');

        $this->reception->users()->attach($user);

        $this->assertTrue($this->reception->users->contains($user));
    }

    /** @test */
    public function reception_has_reviews()
    {
        $review = create('App\Review');

        $this->reception->reviews()->attach($review);

        $this->assertTrue($this->reception->reviews->contains($review));
    }

    /** @test */
    public function reception_has_a_service()
    {
        $service = create('App\Service');

        $this->reception->services()->attach($service);

        $this->assertTrue($this->reception->services->contains($service));
    }

    protected function setUp()
    {
        parent::setUp();

        $company = create(Company::class);
        $reception = create('App\Reception');
        $company->receptions()->save($reception);

        $this->reception = $reception;
    }
}
