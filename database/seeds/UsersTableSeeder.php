<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('employees')->insert([
		    [
		    	'first_name' => 'Marko',
		        'email' => 'marko@inspirium.hr',
		        'password' => bcrypt('secret'),
		    ]
	    ]);
    }
}
