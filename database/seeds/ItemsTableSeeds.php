<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($number = 4; $number < 51; $number++)
        {
            \DB::table('items')->insert([
                'name' => 'Item '.$number,
                'amount' => 25,
                'vendor_id' => 4,
                'show' => 1, 
            ]);
        }

    }
}
