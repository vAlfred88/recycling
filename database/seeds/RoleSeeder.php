<?php

use Illuminate\Database\Seeder;

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
        $roles = [
            [
                'name' => 'admin',
                'label' => 'Администратор',
            ],
            [
                'name' => 'owner',
                'label' => 'Администратор компании',
            ],
            [
                'name' => 'employee',
                'label' => 'Сотрудник',
            ],
            [
                'name' => 'user',
                'label' => 'Пользователь',
            ],
        ];

        $permissions = [
            [
                'name' => 'create-users',
                'label' => 'Добавление пользователей',
            ],
            [
                'name' => 'show-users',
                'label' => 'Просмотр пользователей',
            ],
            [
                'name' => 'update-users',
                'label' => 'Изменение пользователей',
            ],
            [
                'name' => 'delete-users',
                'label' => 'Удаление пользователей',
            ],
            [
                'name' => 'create-roles',
                'label' => 'Добавление ролей',
            ],
            [
                'name' => 'show-roles',
                'label' => 'Просмотр ролей',
            ],
            [
                'name' => 'update-roles',
                'label' => 'Изменение ролей',
            ],
            [
                'name' => 'delete-roles',
                'label' => 'Удаление ролей',
            ],
            [
                'name' => 'create-permissions',
                'label' => 'Добавление прав',
            ],
            [
                'name' => 'show-permissions',
                'label' => 'Просмтор прав',
            ],
            [
                'name' => 'update-permissions',
                'label' => 'Изменение прав',
            ],
            [
                'name' => 'delete-permissions',
                'label' => 'Удаление прав',
            ],
            [
                'name' => 'create-menus',
                'label' => 'Добавление меню',
            ],
            [
                'name' => 'show-menus',
                'label' => 'Просмотр меню',
            ],
            [
                'name' => 'update-menus',
                'label' => 'Изменение меню',
            ],
            [
                'name' => 'delete-menus',
                'label' => 'Удаление меню',
            ],
            [
                'name' => 'create-companies',
                'label' => 'Добавление компаний',
            ],
            [
                'name' => 'show-companies',
                'label' => 'Просмотр компаний',
            ],
            [
                'name' => 'update-companies',
                'label' => 'Изменение компаний',
            ],
            [
                'name' => 'delete-companies',
                'label' => 'Удаление компаний',
            ],
            [
                'name' => 'create-services',
                'label' => 'Добавление услуги',
            ],
            [
                'name' => 'show-services',
                'label' => 'Просмотр услуг',
            ],
            [
                'name' => 'update-services',
                'label' => 'Изменение услуги',
            ],
            [
                'name' => 'delete-services',
                'label' => 'Удаление услуги',
            ],
            [
                'name' => 'create-receptions',
                'label' => 'Добавление пункта приема',
            ],
            [
                'name' => 'show-receptions',
                'label' => 'Просмотр пункта приема',
            ],
            [
                'name' => 'update-receptions',
                'label' => 'Изменение пункта приема',
            ],
            [
                'name' => 'delete-receptions',
                'label' => 'Удаление пункта приема',
            ],
        ];

        foreach ($permissions as $permission) {
            create(\Spatie\Permission\Models\Permission::class, $permission);
        }

        foreach ($roles as $role) {
            create(\Spatie\Permission\Models\Role::class, $role);
        }

        // grand all permission
        $admin = \Spatie\Permission\Models\Role::whereName('admin')->first();
        $admin->syncPermissions(\Spatie\Permission\Models\Permission::all());

        // grand company permission
        $owner = \Spatie\Permission\Models\Role::whereName('owner')->first();
        $owner->syncPermissions(
                [
                    //user
                    'create-users',
                    'show-users',
                    'update-users',
                    'delete-users',
                    // company
                    'show-companies',
                    'update-companies',
                ]
        );

        //grand employee permission
        $employee = \Spatie\Permission\Models\Role::whereName('employee')->first();
        $employee->syncPermissions(
                [
                    //user
                    'show-users',
                    // company
                    'show-companies',
                ]
        );
    }
}
