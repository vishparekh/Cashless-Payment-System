<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Buyer;
use Illuminate\Auth\Access\HandlesAuthorization;

class BuyerPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the buyer.
     *
     * @param  \App\User  $user
     * @param  \App\Buyer  $buyer
     * @return mixed
     */
    public function view(User $user, Buyer $buyer)
    {
        //
        return $user->isSuperAdmin() || ($user->isOrg() && $buyer->org_id==$user->id);
    }

    /**
     * Determine whether the user can create buyers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->isOrg());
    }

    /**
     * Determine whether the user can update the buyer.
     *
     * @param  \App\User  $user
     * @param  \App\Buyer  $buyer
     * @return mixed
     */
    public function update(User $user, Buyer $buyer)
    {
        return ($user->isOrg() && $buyer->org_id==$user->id);
    }

    /**
     * Determine whether the user can delete the buyer.
     *
     * @param  \App\User  $user
     * @param  \App\Buyer  $buyer
     * @return mixed
     */
    public function delete(User $user, Buyer $buyer)
    {
        return ($user->isOrg() && $buyer->org_id==$user->id);
    }
}
