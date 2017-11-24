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
		    ],
		    [
			    'first_name' => 'Stjepan',
			    'email' => 'stjepan@inspirium.hr',
			    'password' => bcrypt('secret'),
		    ],
		    [
			    'first_name' => 'Matilda',
			    'email' => 'matilda.bulic@skolskaknjiga.hr',
			    'password' => bcrypt('secret'),
		    ],
		    [
			    'first_name' => 'Mihovil',
			    'email' => 'mihovil.zuzul@skolskaknjiga.hr',
			    'password' => bcrypt('secret'),
		    ],
	    ]);
    }
}
