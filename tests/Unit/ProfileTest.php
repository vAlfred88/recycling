<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function profile_belongs_to_user()
    {
        $user = create(User::class);
        $user->profile()->create(make('App\Profile')->toArray());

        $this->assertInstanceOf('App\Profile', $user->profile);
    }
}
