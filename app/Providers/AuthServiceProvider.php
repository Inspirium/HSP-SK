<?php

namespace Inspirium\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Inspirium\Models\HumanResources\Employee' => 'Inspirium\Policies\EmployeePolicy',
        'Inspirium\Models\HumanResources\Department' => 'Inspirium\Policies\DepartmentPolicy',
        'Inspirium\Models\HumanResources\Role' => 'Inspirium\Policies\RolePolicy',
	    'Inspirium\BookProposition\Models\BookProposition' => 'Inspirium\Policies\PropositionPolicy',
	    'Inspirium\Models\BookManagement\Author' => 'Inspirium\Policies\AuthorPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

	    Passport::routes();
    }
}
