<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

                'username' => 'tanakataru',
                'mail' => 'tanaka01',
                'password' =>$password = Hash::make ("tanaka01"),
        ]);
    }

}
