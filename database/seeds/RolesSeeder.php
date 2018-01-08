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
		    ['name' => 'access_hr_admin', 'description' => 'Access to HR admin'],
		    ['name' => 'access_proposition_admin', 'description' => 'Access to Propositions admin'],
		    ['name' => 'access_department_tasks', 'description' => 'Access to Department Tasks'],
		    ['name' => 'access_all_department_tasks', 'description' => 'Access to All Department Tasks'],
		    ['name' => 'role_create', 'description' => 'Create User Roles'],
		    ['name' => 'role_delete', 'description' => 'Delete User Roles'],
		    ['name' => 'role_update', 'description' => 'Update User Roles'],
		    ['name' => 'employee_create', 'description' => 'Create Employee'],
		    ['name' => 'employee_update', 'description' => 'Update Employee'],
		    ['name' => 'employee_delete', 'description' => 'Delete Employee'],
		    ['name' => 'employee_update_roles', 'description' => 'Update Employee Roles'],
		    ['name' => 'department_tasks_order_edit', 'description' => 'Reorder employee tasks'],
		    ['name' => 'department_tasks_order_approve', 'description' => 'Approve new order of tasks'],
		    ['name' => 'access_all_propositions', 'description' => 'Access all propositions'],
	    ];
	    DB::table('roles')->insert($roles);

	    $users = [1];

	    $rels = [];
	    foreach ($users as $user) {
	    	for($i=1; $i<=count($roles); $i++) {
	    		$rels[] = ['employee_id' => $user, 'role_id' => $i];
		    }
	    }

	    DB::table('employees_roles')->insert($rels);
    }
}
