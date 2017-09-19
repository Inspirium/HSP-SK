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
	    DB::table('users')->insert([
		    [
		    	'name' => 'Marko',
		        'email' => 'marko@inspirium.hr',
		        'password' => bcrypt('secret'),
		    ],
		    [
			    'name' => 'Stjepan',
			    'email' => 'stjepan@inspirium.hr',
			    'password' => bcrypt('secret'),
		    ],
		    [
			    'name' => 'Matilda',
			    'email' => 'matilda.bulic@skolskaknjiga.hr',
			    'password' => bcrypt('secret'),
		    ],
		    [
			    'name' => 'Mihovil',
			    'email' => 'mihovil.zuzul@skolskaknjiga.hr',
			    'password' => bcrypt('secret'),
		    ],
	    ]);
	    DB::table('employees')->insert([
	    	['first_name' => 'Marko', 'last_name' => 'B', 'user_id' => 1],
	    	['first_name' => 'Stjepan', 'last_name' => 'Drmić', 'user_id' => 2],
	    	['first_name' => 'Matilda', 'last_name' => 'Bulić', 'user_id' => 3],
	    	['first_name' => 'Mihovil', 'last_name' => 'Žužul', 'user_id' => 4]
	    ]);
    }
}
