<?php

namespace App\Providers;

use App\Company;
use App\Permission;
use App\Policies\CompanyPolicy;
use App\Policies\ProfilePolicy;
use App\Profile;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Company::class => CompanyPolicy::class,
        Profile::class => ProfilePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @param \Illuminate\Contracts\Auth\Access\Gate $gate
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        $gate->before(function (User $user) {
            if ($user->isAdmin()) {
                return true;
            }

            return null;
        });

        if (!$this->app->environment('testing') && Schema::hasTable('permissions')) {
            foreach ($this->getPermissions() as $permission) {
                $gate->define($permission->name, function (User $user) use ($permission) {
                    return $user->hasPermission($permission);
                });
            }
        }
    }

    public function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}
