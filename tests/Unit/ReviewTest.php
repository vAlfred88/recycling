<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function review_can_by_apply_to_a_company()
    {
        $review = create('App\Review');
        $company = create('App\Company');

        $review->companies()->attach($company);

        $this->assertTrue($review->companies->contains($company));
    }

    /** @test */
    public function review_can_be_apply_to_a_reception()
    {
        $review = create('App\Review');
        $reception = create('App\Reception');

        $review->receptions()->attach($reception);

        $this->assertTrue($review->receptions->contains($reception));
    }
}
