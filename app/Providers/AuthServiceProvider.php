<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\User;
use App\Models\Vendor;
use App\Models\Item;
use App\Models\Buyer;
use App\Models\Org;

use App\Policies\OrgPolicy;
use App\Policies\VendorPolicy;
use App\Policies\BuyerPolicy;
use App\Policies\ItemPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Org::class => OrgPolicy::class,
        Vendor::class => VendorPolicy::class,
        Buyer::class => BuyerPolicy::class,
        Item::class => ItemPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('viewallvendors', function ($user) 
        {
                return $user->isOrg() || $user->isSuperAdmin();
        });

        Gate::define('viewallbuyers', function ($user) 
        {
                return $user->isOrg() || $user->isSuperAdmin();
        });


        Gate::define('viewallitems', function ($user) 
        {
                return $user->isOrg() || $user->isSuperAdmin() || $user->isVendor();
        });

        Gate::define('viewallorgs', function ($user) 
        {
                return $user->isSuperAdmin();
        });

        //
    }
}
