<?php

namespace App\Providers;

use App\Company;
use App\Permission;
use App\Policies\CompanyPolicy;
use App\Policies\EmployeePolicy;
use App\Policies\ProfilePolicy;
use App\Profile;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        });
    }
}
