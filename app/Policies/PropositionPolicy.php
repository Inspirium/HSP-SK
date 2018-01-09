<?php

namespace Inspirium\Policies;

use Inspirium\Models\HumanResources\Employee;
use Inspirium\BookProposition\Models\BookProposition;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropositionPolicy
{
    use HandlesAuthorization;

	/**
	 * Determine whether the user can view the proposition.
	 *
	 * @param  Employee $user
	 * @param BookProposition $proposition
	 *
	 * @return mixed
	 */
    public function view( Employee $user, BookProposition $proposition)
    {
        if ($user->id === $proposition->owner_id) {
        	return true;
        }
        if ($user->hasRole('access_all_propositions')) {
        	return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create proposition.
     *
     * @param  Employee  $user
     * @return mixed
     */
    public function create(Employee $user)
    {
	    return true;
    }

	/**
	 * Determine whether the user can update the proposition.
	 *
	 * @param  Employee $user
	 * @param BookProposition $proposition
	 *
	 * @return mixed
	 */
    public function update(Employee $user, BookProposition $proposition)
    {
	    if ($user->id === $proposition->owner_id) {
		    return true;
	    }
	    if ($user->hasRole('access_all_propositions')) {
		    return true;
	    }

	    return false;
    }

    /**
     * Determine whether the user can delete the proposition.
     *
     * @param  Employee  $user
     * @param  BookProposition  $proposition
     * @return mixed
     */
    public function delete(Employee $user, BookProposition $proposition)
    {
	    if ($user->id === $proposition->owner_id) {
		    return true;
	    }
	    if ($user->hasRole('access_all_propositions')) {
		    return true;
	    }

	    return false;
    }
}
