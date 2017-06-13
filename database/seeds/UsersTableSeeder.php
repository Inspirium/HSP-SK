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
    }
}
