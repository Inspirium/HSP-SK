<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('roles')->insert([
	    	['name' => 'hr_admin', 'description' => 'Access to HR admin'],
	    	['name' => 'proposition_admin', 'description' => 'Access to Propositions admin'],
	    ]);

	    DB::table('users_roles')->insert([
	    	['user_id' => 1, 'role_id' => 1],
	    	['user_id' => 1, 'role_id' => 2],
	    	['user_id' => 2, 'role_id' => 1],
	    	['user_id' => 3, 'role_id' => 2],
	    ]);
    }
}
