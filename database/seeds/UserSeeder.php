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
        $admin = factory(\App\User::class)->create(['email' => 'admin@appomart.com']);
        factory(\App\Profile::class)->create(['user_id' => $admin->id]);

        $admin->assignRole('admin');

        $ceo = factory(\App\User::class)->create(['email' => 'ceo@appomart.com']);
        factory(\App\Profile::class)->create(['user_id' => $ceo->id]);

        $ceo->assignRole('admin');

//        $owner = factory(\App\User::class)->create(['email' => 'owner@appomart.com']);
//        factory(\App\Profile::class)->create(['user_id' => $owner->id]);
//
//        $owner->assignRole('owner');
//        $owner->company_id = factory(\App\Company::class)->create()->id;
//        $owner->save();
//
//        $user = factory(\App\User::class)->create(['email' => 'user@appomart.com']);
//        factory(\App\Profile::class)->create(['user_id' => $user->id]);
//
//        $user->assignRole('user');
    }
}
