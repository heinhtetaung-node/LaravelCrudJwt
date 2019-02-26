<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::insert([
        	[
	            'name' => 'admin',
	            'email' => 'admin@gmail.com',
	            'password' => bcrypt('admin'),
	        ],
	        [
	        	'name' => 'honda',
	            'email' => 'honda@gmail.com',
	            'password' => bcrypt('honda'),	
	        ],
	    	[
	    		'name' => 'toyota',
	            'email' => 'toyota@gmail.com',
	            'password' => bcrypt('toyota'),
	    	]
    	]);        
    }
}
