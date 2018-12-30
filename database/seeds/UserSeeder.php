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

        $admin->assignRole('admin');

        $owner = factory(\App\User::class)->create(['email' => 'owner@site.com']);

        $owner->assignRole('owner');

        $user = factory(\App\User::class)->create(['email' => 'user@site.com']);

        $user->assignRole('user');
    }
}
