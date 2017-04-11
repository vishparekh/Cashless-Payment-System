<?php

use Illuminate\Database\Seeder;

class SidebarTableSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('sidebars')->insert([
            'role_id'   => 3,
            'name'      =>  'Dashboard',
            'route'     =>  'vendors.home'
        ]);

        \DB::table('sidebars')->insert([
            'role_id' 	=> 1,
            'name'		=>	'Add Organization',
            'route'		=>	'orgs.create'
        ]);

        \DB::table('sidebars')->insert([
            'role_id' 	=> 1,
            'name'		=>	'See Organization',
            'route'		=>	'orgs.index'
        ]);

        \DB::table('sidebars')->insert([
            'role_id' 	=> 1,
            'name'		=>	'See Vendors',
            'route'		=>	'vendors.index'
        ]);

        \DB::table('sidebars')->insert([
            'role_id' 	=> 1,
            'name'		=>	'See Items',
            'route'		=>	'items.index'
        ]);

         \DB::table('sidebars')->insert([
            'role_id' 	=> 1,
            'name'		=>	'See Buyers',
            'route'		=>	'buyers.index'
        ]);


         \DB::table('sidebars')->insert([
            'role_id' 	=> 2,
            'name'		=>	'Add Vendors',
            'route'		=>	'vendors.create'
        ]);

         \DB::table('sidebars')->insert([
            'role_id' 	=> 2,
            'name'		=>	'Add Buyer',
            'route'		=>	'buyers.create'
        ]);

         \DB::table('sidebars')->insert([
            'role_id' 	=> 2,
            'name'		=>	'Add Buyer By File',
            'route'		=>	'createwithfile'
        ]);

         \DB::table('sidebars')->insert([
            'role_id' 	=> 2,
            'name'		=>	'See Vendors',
            'route'		=>	'vendors.index'
        ]);

         \DB::table('sidebars')->insert([
            'role_id' 	=> 2,
            'name'		=>	'See Buyer',
            'route'		=>	'buyers.index'
        ]);



         \DB::table('sidebars')->insert([
            'role_id' 	=> 3,
            'name'		=>	'Add Item',
            'route'		=>	'items.create'
        ]);

         \DB::table('sidebars')->insert([
            'role_id' 	=> 3,
            'name'		=>	'See Item',
            'route'		=>	'items.index'
        ]);

         \DB::table('sidebars')->insert([
            'role_id'   => 4,
            'name'      =>  'Block My CARD',
            'route'     =>  'buyer.block'
        ]);

    }
}
