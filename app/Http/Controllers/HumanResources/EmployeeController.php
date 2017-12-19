<?php

namespace Inspirium\Http\Controllers\HumanResources;

use Inspirium\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inspirium\Models\HumanResources\Department;
use Inspirium\Models\HumanResources\Employee;
use Inspirium\Models\HumanResources\Role;

class EmployeeController extends Controller {

    public function showEmployees() {
	    $user = \Auth::user();
        $elements = Employee::all();
        $columns = [
            'image' => [ 'title' => __('Image'), 'breakpoint' => '', 'image' => true ],
            'name' => [ 'title' => __('Name'), 'breakpoint' => ''],
            'department_name' => [ 'title' => __('Department'), 'breakpoint' => 'md'],
            'phone' => [ 'title' => __('Phone'), 'breakpoint' => 'md' ],
            'mobile' => [ 'title' => __('Mobile'), 'breakpoint' => 'md' ],
            'room' => [ 'title' => __('Room'), 'breakpoint' => 'md' ]
        ];
        $strings = [
            'title' => __('Employees'),
            'add_new' => __('Add New Employee'),
        ];
        $links = [
            'add_new' => $user->hasRole('employee_create')?'/human_resources/employee/new':'',
            'edit' => $user->hasRole('employee_update')?'/human_resources/employee/:id/edit/':'',
            'delete' => $user->hasRole('employee_delete')?'/api/human_resources/employee/:id':'',
            'show' => '/human_resources/employee/:id/show/'
        ];
        return view(config('app.template') . '::vue.table-search', compact( 'elements', 'columns', 'strings', 'links' ));
    }

    public function showEmployee(Employee $employee) {
        return view(config('app.template').'::hr.show', ['employee'=>$employee]);
    }

	public function employeeRoles(Employee $employee) {
		$roles = Role::all();
		return view(config('app.template') . '::user.role.user_roles', ['user' => $employee, 'roles' => $roles]);
	}

	public function updateEmployeeRoles(Request $request, Employee $employee) {
		$employee->roles()->sync($request->input('roles'));
		$employee->save();
		return redirect('human_resources/employee/'.$employee->id.'/show/');
	}
}
