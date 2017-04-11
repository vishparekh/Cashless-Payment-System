<?php

use Illuminate\Database\Seeder;

class RoleTableSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('roles')->insert([
            'name' => 'Super Admin',
        ]);

        \DB::table('roles')->insert([
            'name' => 'Organization',
        ]);

        \DB::table('roles')->insert([
            'name' => 'Vendor',
        ]);

        \DB::table('roles')->insert([
            'name' => 'Buyer',
        ]);

        
    }
}
