<?php

namespace Inspirium\Http\Controllers\Api\HumanResources;

use Inspirium\Http\Controllers\Controller;
use Inspirium\Models\HumanResources\Department;

class DepartmentController extends Controller {

	public function searchDepartment($term) {
		$departments = Department::where('name', 'LIKE', '%'.$term.'%')->get();
		return response()->json($departments);
	}

	public function getDepartment(Department $department) {
		return response()->json($department);
	}

	public function getDepartments() {
		$departments = Department::all();
		return response()->json($departments);
	}
}