<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Auth\Access\HandlesAuthorization;

class VendorPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view the vendor.
     *
     * @param  \App\User  $user
     * @param  \App\Vendor  $vendor
     * @return mixed
     */

    public function view(User $user, Vendor $vendor)
    {
        //
        return ($user->isSuperAdmin()) || ($user->isOrg() && $vendor->org_id==$user->id);

    }

    /**
     * Determine whether the user can create vendors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        //echo "ffefeff";
        //die();
        return ($user->isOrg());
    }

    /**
     * Determine whether the user can update the vendor.
     *
     * @param  \App\User  $user
     * @param  \App\Vendor  $vendor
     * @return mixed
     */
    public function update(User $user, Vendor $vendor)
    {
        //
        return ($user->isOrg() && $vendor->org_id==$user->id);
    }

    /**
     * Determine whether the user can delete the vendor.
     *
     * @param  \App\User  $user
     * @param  \App\Vendor  $vendor
     * @return mixed
     */
    public function delete(User $user, Vendor $vendor)
    {
        //
        return ($user->isOrg() && $vendor->org_id==$user->id);
    }
}
