<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Org;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrgPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can view the org.
     *
     * @param  \App\User  $user
     * @param  \App\Org  $org
     * @return mixed
     */
    public function view(User $user, Org $org)
    {
        //
        return false;

    }

    /**
     * Determine whether the user can create orgs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return false;
    }

    /**
     * Determine whether the user can update the org.
     *
     * @param  \App\User  $user
     * @param  \App\Org  $org
     * @return mixed
     */
    public function update(User $user, Org $org)
    {
        //
        return false;

    }

    /**
     * Determine whether the user can delete the org.
     *
     * @param  \App\User  $user
     * @param  \App\Org  $org
     * @return mixed
     */
    public function delete(User $user, Org $org)
    {
        //
        return false;
    }
}
