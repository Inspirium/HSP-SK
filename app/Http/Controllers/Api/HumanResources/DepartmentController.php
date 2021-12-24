<?php

namespace Inspirium\Http\Controllers\Api\HumanResources;

use Inspirium\Http\Controllers\Controller;
use Inspirium\Models\HumanResources\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller {

	public function getDepartment(Department $department) {
		return response()->json($department);
	}

	public function postDepartment(Request $request) {
		$name = $request->input('name');
		$department = new Department(['name' => $name]);
		$department->save();
		return response()->json($department);
	}

	public function putDepartment(Request $request, Department $department) {
		$department->name = $request->input('name');
		$department->save();
		return response()->json($department);
	}

	public function postDepartments(Request $request) {
		$limit = $request->input('limit');
		$offset = $request->input('offset');
		$order = $request->input('order');
        if (!$order) {
            $order = 'asc';
        }
		$sort = $request->input('sort');
		$filter = $request->input('filter');
		if ($filter) {
			$deps = Department::orderBy( $sort ? $sort : 'id', $order )
			                     ->limit( $limit )
			                     ->offset( $offset )
			                     ->where('name', 'LIKE', "%$filter%")
			                     ->get();
			$total     = Department::where('name', 'LIKE', "%$filter%")->count();
		}
		else {
			$deps = Department::orderBy( $sort ? $sort : 'id', $order )
               ->limit( $limit )->offset( $offset )->get();
			$total     = Department::count();
		}
		return response()->json(['rows' => $deps, 'total' => $total]);
	}

    public function getDepartments(Request $request) {
	    $deps = Department::orderBy('id', 'asc' )->get();
	    $total     = Department::count();

        return response()->json(['rows' => $deps, 'total' => $total]);
    }
}