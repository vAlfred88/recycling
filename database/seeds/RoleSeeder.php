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

        factory(\Spatie\Permission\Models\Permission::class)->create(['name' => 'create-users']);
        factory(\Spatie\Permission\Models\Permission::class)->create(['name' => 'update-users']);
        factory(\Spatie\Permission\Models\Permission::class)->create(['name' => 'show-users']);
        factory(\Spatie\Permission\Models\Permission::class)->create(['name' => 'delete-users']);

        foreach ($roles as $role) {
            create(\Spatie\Permission\Models\Role::class, $role);
        }
    }
}
