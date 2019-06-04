<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
                                       [
                                           'name' => 'roles',
                                           'label' => 'Роли',
                                           'url' => 'roles',
                                       ],
                                       [
                                           'name' => 'permissions',
                                           'label' => 'Права',
                                           'url' => 'permissions',
                                       ],
                                       [
                                           'name' => 'users',
                                           'label' => 'Пользователи',
                                           'url' => 'users',
                                       ],
                                       [
                                           'name' => 'menus',
                                           'label' => 'Меню',
                                           'url' => 'menus',
                                       ],
                                       [
                                           'name' => 'companies',
                                           'label' => 'Компании',
                                           'url' => 'companies',
                                       ],
                                       [
                                           'name' => 'services',
                                           'label' => 'Услуги',
                                           'url' => 'services',
                                       ],
            [
                                           'name' => 'places',
                                           'label' => 'Города',
                                           'url' => 'places',
                                       ],
                                   ]);
    }
}
