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

    public function viewAny(Employee $user)
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
	    if ($user->hasRole('employee_create')) {
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
        if ($user->hasRole('employee_update')) {
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
	    if ($user->hasRole('employee_delete')) {
		    return true;
	    }

	    return false;
    }

    public function updateRoles(Employee $user, Employee $employee) {
    	if ($user->hasRole('employee_update_roles')) {
    		return true;
	    }
	    return false;
    }

	public function viewRoles(Employee $user, Employee $employee) {
		if ($user->hasRole('employee_update_roles')) {
			return true;
		}
		return false;
	}

	public function requestTaskOrder(Employee $user, Employee $employee) {
		if ($user->hasRole('department_tasks_order_edit')) {
			return true;
		}

		return false;
	}

	public function approveTaskOrder(Employee $user, Employee $employee ) {
		if ($user->hasRole('department_tasks_order_approve')) {
			return true;
		}

		return false;
	}
}
