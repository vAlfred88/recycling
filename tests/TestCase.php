<?php

namespace Tests;

use App\Permission;
use App\User;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Gate;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

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

    // Hat tip, @adamwathan.
    protected function signIn($user = null)
    {
        $user = $user ?: create('App\User');
        $this->actingAs($user);
        return $this;
    }

    public function givePermission($permission)
    {
        $role = create('App\Role');
        $permission = create('App\Permission', ['name' => $permission]);

        $role->permissions()->save($permission);
        auth()->user()->roles()->attach($role);
    }

    protected function withExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);
        return $this;
    }
}
