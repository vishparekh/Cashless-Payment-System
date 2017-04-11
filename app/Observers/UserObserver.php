<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Vendor;
use App\Models\Buyer;
use App\Models\Item;
use App\Models\Org;

class UserObserver
{
    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        $entity=$user->role->model::find($user->id);
        $entity->delete();
        if($user->role->id==2)
        {
            $org=Org::find($user->id);
            $vendors=$org->vednors;
            $vednors->delete();
            $buyers=$org->buyers;
            $buyers->delete();
        }   
        else if($user->role->id==3)
        {
            $vendor=Vendor::find($user->id);
            $items=$vendor->items;
            $items->delete();
        }

    }
}