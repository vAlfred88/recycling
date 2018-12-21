<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CompaniesTest extends TestCase
{
    use DatabaseMigrations;

    /* @test */
    public function test_unauthenticated_user_can_not_see_company_page()
    {
        $this->withExceptionHandling()
            ->get(route('companies.index'), [])
            ->assertRedirect('/login');
    }
}
