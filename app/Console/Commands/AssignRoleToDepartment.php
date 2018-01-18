<?php

namespace Inspirium\Console\Commands;

use Illuminate\Console\Command;
use Inspirium\Models\HumanResources\Employee;

class AssignRoleToDepartment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inspirium:assignrole2dep {--role=} {--department=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign certain role to everybody in department';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $role_id = $this->option('role');

        $department_id = $this->option('department');

		$employees = Employee::where('department_id', $department_id)->get();
		foreach ($employees as $employee) {
			/** @var Employee $employee */
			$employee->roles()->attach($role_id);
		}
	    $this->info('Complete');
    }
}
