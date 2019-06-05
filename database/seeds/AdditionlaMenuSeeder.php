<?php

use Illuminate\Database\Seeder;

class AdditionlaMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('menus')->insert([
            [
                'name' => 'places',
                'label' => 'Города',
                'url' => 'places',
            ],
        ]);
    }
}
