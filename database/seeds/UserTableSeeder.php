<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->delete();

        User::create(array(
        	'name'=> 'lakshya',
        	'email' => 'lakshya@3hammers.com',
        	'password' => Hash::make('lakshya'),
        	));
    }
}
