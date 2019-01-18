<?php

namespace Tests;

use App\User;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function givePermission($permission)
    {
        $role = create(Role::class);
        $permission = create(Permission::class, ['name' => $permission]);

        $role->permissions()->save($permission);
        auth()->user()->roles()->attach($role);
    }

    protected function setUp()
    {
        parent::setUp();

//        DB::statement('PRAGMA foreign_keys=on;');
        $this->disableExceptionHandling();
    }

    protected function disableExceptionHandling()
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);
        $this->app->instance(ExceptionHandler::class, new class extends Handler
        {
            public function __construct()
            {
            }

            public function report(\Exception $e)
            {
            }

            public function render($request, \Exception $e)
            {
                throw $e;
            }
        });
    }

    // Hat tip, @adamwathan.

    protected function definePermissions()
    {
        $permissions = Permission::with('roles')->get();

        foreach ($permissions as $permission) {
            Gate::define($permission->name, function (User $user) use ($permission) {
                return $user->hasPermission($permission);
            });
        }

        return $this;
    }

    protected function signIn($user = null, $role = null)
    {
        $user = $user ?: create('App\User');

        $this->actingAs($user);

        if ($role) {
            create(Role::class, ['name' => $role]);
            auth()->user()->assignRole($role);
        }

        return $this;
    }

    protected function withExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);

        return $this;
    }
}
