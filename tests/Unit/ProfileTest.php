<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function profile_belongs_to_user()
    {
        $profile = create('App\Profile');

        $this->assertInstanceOf('App\User', $profile->user);
    }
}
