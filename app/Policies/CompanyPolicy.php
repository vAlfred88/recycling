<?php

namespace App\Policies;

use App\Company;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the company.
     *
     * @param  \App\User $user
     *
     * @return mixed
     */
    public function view(User $user)
    {
        if ($user->hasRole('owner'))
            return true;
    }

    /**
     * Determine whether the user can create companies.
     *
     * @param  \App\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the company.
     *
     * @param  \App\User $user
     * @param  \App\Company $company
     *
     * @return mixed
     */
    public function update(User $user, Company $company)
    {
        if ($user->company->id == $company->id &&
            $user->hasRole('owner')) return true;

        return false;
    }

    /**
     * Determine whether the user can delete the company.
     *
     * @param  \App\User $user
     * @param  \App\Company $company
     *
     * @return mixed
     */
    public function delete(User $user, Company $company)
    {
        //
    }

    /**
     * Determine whether the user can restore the company.
     *
     * @param  \App\User $user
     * @param  \App\Company $company
     *
     * @return mixed
     */
    public function restore(User $user, Company $company)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the company.
     *
     * @param  \App\User $user
     * @param  \App\Company $company
     *
     * @return mixed
     */
    public function forceDelete(User $user, Company $company)
    {
        //
    }
}
