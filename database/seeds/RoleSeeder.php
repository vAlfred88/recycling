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

        foreach ($roles as $role) {
            create(\Spatie\Permission\Models\Role::class, $role);
        }
    }
}
