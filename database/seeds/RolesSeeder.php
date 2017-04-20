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
    	$roles = [
		    ['name' => 'hr_admin', 'description' => 'Access to HR admin'],
		    ['name' => 'proposition_admin', 'description' => 'Access to Propositions admin'],
		    ['name' => 'user_edit', 'description' => 'Edit User'],
		    ['name' => 'user_edit_roles', 'description' => 'Edit User Roles'],
		    ['name' => 'main_admin', 'description' => 'Access main administration'],
	    ];
	    DB::table('roles')->insert($roles);

	    $users = [1,2,3];

	    $rels = [];
	    foreach ($users as $user) {
	    	for($i=1; $i<=count($roles); $i++) {
	    		$rels[] = ['user_id' => $user, 'role_id' => $i];
		    }
	    }

	    DB::table('users_roles')->insert($rels);
    }
}
