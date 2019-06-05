<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(AdditionlaMenuSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ServiceSeeder::class);
//        $this->call(CompanySeeder::class);
    }
}
