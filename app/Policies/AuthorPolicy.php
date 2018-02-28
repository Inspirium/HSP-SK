<?php

namespace Inspirium\Policies;

use Inspirium\Models\BookManagement\Author;
use Inspirium\Models\HumanResources\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the employee.
     *
     * @param  \Inspirium\Models\HumanResources\Employee  $user
     * @param  \Inspirium\Models\HumanResources\Employee  $employee
     * @return mixed
     */
    public function view(Employee $user, Author $author)
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
    }

    /**
     * Determine whether the user can update the employee.
     *
     * @param  \Inspirium\Models\HumanResources\Employee  $user
     * @param  \Inspirium\Models\HumanResources\Employee  $employee
     * @return mixed
     */
    public function update(Employee $user, Author $author)
    {
        if ($user->hasRole('author_update')) {
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
    public function delete(Employee $user, Author $author)
    {
    	//TODO: check if linked to proposition
	    $author->load('propositions');
	    if ($author->propositions()) {
	    	return false;
	    }
	    if ($user->hasRole('author_delete')) {
		    return true;
	    }

	    return false;
    }
}
