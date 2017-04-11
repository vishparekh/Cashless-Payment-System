<?php

use Illuminate\Database\Seeder;

class TranTypeTableSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('tran_types')->insert([
        	'id'	=>1,
            'name' => 'Buyer to Vendor',
        ]);

        \DB::table('tran_types')->insert([
        	'id'	=>2,
            'name' => 'TP to Buyer',
        ]);

        \DB::table('tran_types')->insert([
        	'id'	=>3,
            'name' => 'ORG to Buyer',
        ]);

        \DB::table('tran_types')->insert([
        	'id'	=>4,
            'name' => 'ORG to Vendor',
        ]);


    }
}
