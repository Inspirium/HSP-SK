<?php

namespace Inspirium\Policies;

use Inspirium\Models\HumanResources\Department;
use Inspirium\Models\HumanResources\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the employee.
     *
     * @param  \Inspirium\Models\HumanResources\Employee  $user
     * @param  \Inspirium\Models\HumanResources\Employee  $employee
     * @return mixed
     */
    public function view(Employee $user, Department $department)
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
	    if ($user->hasRole('department_create')) {
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
    public function update(Employee $user, Department $department)
    {
        if ($user->hasRole('department_update')) {
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
    public function delete(Employee $user, Department $department)
    {
	    if ($user->hasRole('department_delete')) {
		    return true;
	    }

	    return false;
    }
}
