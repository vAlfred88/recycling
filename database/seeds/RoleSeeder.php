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
            ['name' => 'admin',],
            ['name' => 'owner',],
            ['name' => 'employee',],
            ['name' => 'manager',],
            ['name' => 'user',],
        ];

        $permissions = [
            ['name' => 'create-users',],
            ['name' => 'show-users',],
            ['name' => 'update-users',],
            ['name' => 'delete-users',],
            ['name' => 'create-roles',],
            ['name' => 'show-roles',],
            ['name' => 'update-roles',],
            ['name' => 'delete-roles',],
            ['name' => 'show-permissions',],
            ['name' => 'create-permissions',],
            ['name' => 'update-permissions',],
            ['name' => 'delete-permissions',],
        ];

        foreach ($permissions as $permission) {
            create(\Spatie\Permission\Models\Permission::class, $permission);
        }

        foreach ($roles as $role) {
            create(\Spatie\Permission\Models\Role::class, $role);
        }
    }
}
