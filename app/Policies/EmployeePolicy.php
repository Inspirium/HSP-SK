<?php

namespace Inspirium\Policies;

use Inspirium\Models\HumanResources\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the employee.
     *
     * @param  \Inspirium\Models\HumanResources\Employee  $user
     * @param  \Inspirium\Models\HumanResources\Employee  $employee
     * @return mixed
     */
    public function view(Employee $user, Employee $employee)
    {
        return true;
    }

    /**
     * Determine whether the user can create employees.
     *
     * @param  \Inspirium\Models\HumanResources\Employee  $user
     * @return mixed
     */
    public function create(Employee $user)
    {
    	return true;
	    if ($user->hasRole('create_employee')) {
		    return true;
	    }

	    return false;
    }

    /**
     * Determine whether the user can update the employee.
     *
     * @param  \Inspirium\Models\HumanResources\Employee  $user
     * @param  \Inspirium\Models\HumanResources\Employee  $employee
     * @return mixed
     */
    public function update(Employee $user, Employee $employee)
    {
        if ($user->id === $employee->id) {
        	return true;
        }
        if ($user->hasRole('edit_employee')) {
        	return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the employee.
     *
     * @param  \Inspirium\Models\HumanResources\Employee  $user
     * @param  \Inspirium\Models\HumanResources\Employee  $employee
     * @return mixed
     */
    public function delete(Employee $user, Employee $employee)
    {
	    if ($user->hasRole('delete_employee')) {
		    return true;
	    }

	    return false;
    }
}
