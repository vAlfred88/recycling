<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function test_unauthorized_user_can_not_see_profile()
    {
        $this->withExceptionHandling();

        $this->get(route('profile.view'))
             ->assertRedirect(route('login'));

        $this->signIn();

        $this->get(route('profile.view'))
             ->assertStatus(403);
    }

    /** @test */
    public function test_unauthorized_user_can_see_profile()
    {
        $this->signIn();

        $profile = create('App\Profile', ['user_id' => auth()->user()->id]);

        $this->get(route('profile.view'))
             ->assertSee(auth()->user()->name)
             ->assertSee(auth()->user()->email);
    }

    /** @test */
    public function test_authorized_user_can_edit_profile()
    {
        $this->signIn();

        create('App\Profile', ['user_id' => auth()->user()->id]);

        $profile = make('App\Profile', ['user_id' => auth()->user()->id]);

        $this->put(route('profile.update'), $profile->toArray());

        $this->assertDatabaseHas('profiles', $profile->toArray());

        $user = make('App\User');

        $this->put(route('profile.update'), $user->toArray());

        $this->assertDatabaseHas('users', $user->only('name', 'email'));
    }
}
