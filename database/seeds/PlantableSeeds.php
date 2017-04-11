<?php

use Illuminate\Database\Seeder;

class PlantableSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('plans')->insert([
        	'id'	=>1,
            'name' => 'Free',
            'max_vendors'=>2,
            'max_buyers'=> 10,
            'amount' => 0
        ]);

        \DB::table('plans')->insert([
            'id'	=>2,
            'name' => 'Basic',
            'max_vendors'=>10,
            'max_buyers'=> 100,
            'amount' => 100

        ]);

        \DB::table('plans')->insert([
        	'id'	=>3,
            'name' => 'Premium',
            'max_vendors'=>15,
            'max_buyers'=> 500,
            'amount' => 1000
        ]);

        \DB::table('plans')->insert([
        	'id'	=>4,
            'name' => 'Ultimate',
            'max_vendors'=>0,
            'max_buyers'=> 0,
            'infinite'  => true,
            'amount' => 10000
        ]);

        \DB::table('plans')->insert([
        	'id'	=>5,
            'name' => 'Custom',
            'max_vendors'=>0,
            'max_buyers'=> 0,
            'amount' => 0,
            'show'	=> false
        ]);
    }
}
