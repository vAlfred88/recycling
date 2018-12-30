<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = factory(\App\User::class)->create(['email' => 'admin@site.com']);
        factory(\App\Profile::class)->create(['user_id' => $admin->id]);

        $admin->assignRole('admin');

        $owner = factory(\App\User::class)->create(['email' => 'owner@site.com']);
        factory(\App\Profile::class)->create(['user_id' => $owner->id]);

        $owner->assignRole('owner');

        $user = factory(\App\User::class)->create(['email' => 'user@site.com']);
        factory(\App\Profile::class)->create(['user_id' => $user->id]);

        $user->assignRole('user');
    }
}
