<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use DatabaseMigrations;
    protected $company;

    /** @test */
    public function company_has_users()
    {
        $user = create('App\User');

        $this->company->users()->save($user);

        $this->assertTrue($this->company->users->contains($user));
    }

    /** @test */
    public function company_has_reception()
    {
        $reception = create('App\Reception', ['company_id' => $this->company->id]);

        $this->assertTrue($this->company->receptions->contains($reception));
    }

    /** @test */
    public function company_has_reviews()
    {
        $review = make('App\Review')->toArray();

        $this->company->reviews()->create($review);

        $this->assertDatabaseHas('reviews', $review);
    }

    protected function setUp()
    {
        parent::setUp();

        $this->company = create('App\Company');
    }


}
