<?php

use Illuminate\Database\Seeder;

class UsersTableSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('users')->insert([
            'name' => 'Vishal Parekh',
            'email' => 'vishalparekh26@gmail.com',
            'password' => bcrypt('secret'),
            'mobile'	=> '7405350854',
            'role_id'	=>	1,
        ]);

        \DB::table('super_admins')->insert([
            'id'    =>  1,
            'desciption' => 'test admin',
        ]);
    }
}
