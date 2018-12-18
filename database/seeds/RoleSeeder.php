<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class RoleSeeder
 */
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'label' => 'Администратор сайта'],
            ['name' => 'owner', 'label' => 'Администратор компании'],
            ['name' => 'user', 'label' => 'Пользователь'],
        ]);

        DB::table('permissions')->insert(
            [
                //роли
                ['name' => 'roles', 'label' => 'Управление ролями'],
                ['name' => 'add-role', 'label' => 'Создание ролей'],
                ['name' => 'view-role', 'label' => 'Просмотр ролей'],
                ['name' => 'edit-role', 'label' => 'Редактирование ролей'],
                ['name' => 'delete-role', 'label' => 'Удаление ролей'],
                //права
                ['name' => 'permissions', 'label' => 'Управление ролями'],
                ['name' => 'add-permission', 'label' => 'Создание прав'],
                ['name' => 'view-permission', 'label' => 'Просмотр прав'],
                ['name' => 'edit-permission', 'label' => 'Редактирование прав'],
                ['name' => 'delete-permission', 'label' => 'Удаление прав'],
            ]
        );

        $role = \App\Role::where('name', 'admin')->first();

        $role->permissions()->attach(\App\Permission::all()->pluck('id'));
    }
}
