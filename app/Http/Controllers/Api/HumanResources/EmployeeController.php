<?php

namespace Inspirium\Http\Controllers\Api\HumanResources;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Validation\UnauthorizedException;
use Inspirium\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inspirium\Models\HumanResources\Employee;
use Inspirium\Models\HumanResources\Role;

class EmployeeController extends Controller {

	public function searchEmployee($term) {
		$employees = Employee::where('first_name', 'LIKE', '%'.$term.'%')->orWhere('last_name', 'LIKE', '%'.$term.'%')->get();
		return response()->json($employees);
	}

	public function getEmployee(Employee $employee) {
		return response()->json($employee);
	}

	public function saveEmployee(Request $request, Employee $employee) {
		try {
			$this->authorize( 'update', $employee );
		}
		catch (AuthorizationException $e) {
			return response()->json(['error' => 'unauthorized'], 403);
		}
		$input = $request->all();

		$user_array = [
			'first_name' => $input['first_name']?$input['first_name']:'',
			'last_name' => $input['last_name']?$input['last_name']:'',
			'email' => $input['email']?$input['email']:'',
			'mobile_pre' => $input['mobile_pre']?$input['mobile_pre']:'',
			'mobile' => $input['mobile']?$input['mobile']:'',
			'mobile_vpn' => $input['mobile_vpn']?$input['mobile_vpn']:'',
			'phone_pre' => $input['phone_pre']?$input['phone_pre']:'',
			'phone' => $input['phone']?$input['phone']:'',
			'phone_vpn' => $input['phone_vpn']?$input['phone_vpn']:'',
			'address' => $input['address']?$input['address']:'',
			'city' => $input['city']?$input['city']:'',
			'postal_code' => $input['postal_code']?$input['postal_code']:'',
			'room' => $input['room']?$input['room']:'',
			'sex' => $input['sex']?$input['sex']:'',
			'department_id' => $input['department_id']?$input['department_id']:0
		];
		if (isset($input['password']) && $input['password']) {
			$user_array['password'] = bcrypt($input['password']);
		}
		if ($request->hasFile('new_image') && $request->file('new_image')) {
			$file = $request->file('new_image');
			if(!$file->isValid()) {
				return response()->json([ 'result' => 'error', 'message' => 'Invalid file upload'], 400);
			}
			$path = $file->store(sprintf('%s/%d/%d', 'avatars', date('Y'), date('m') ), 'public');
			$user_array['image'] = $path;
		}

		$employee->update($user_array);
		return response()->json([]);
	}

	public function createEmployee(Request $request) {
		try {
			$this->authorize( 'create', Employee::class );
		}
		catch (AuthorizationException $e) {
			return response()->json(['error' => 'unauthorized'], 403);
		}
		$input = $request->all();

		$user_array = [
			'first_name' => $input['first_name']?$input['first_name']:'',
			'last_name' => $input['last_name']?$input['last_name']:'',
			'email' => $input['email']?$input['email']:'',
			'mobile_pre' => $input['mobile_pre']?$input['mobile_pre']:'',
			'mobile' => $input['mobile']?$input['mobile']:'',
			'mobile_vpn' => $input['mobile_vpn']?$input['mobile_vpn']:'',
			'phone_pre' => $input['phone_pre']?$input['phone_pre']:'',
			'phone' => $input['phone']?$input['phone']:'',
			'phone_vpn' => $input['phone_vpn']?$input['phone_vpn']:'',
			'address' => $input['address']?$input['address']:'',
			'city' => $input['city']?$input['city']:'',
			'postal_code' => $input['postal_code']?$input['postal_code']:'',
			'room' => $input['room']?$input['room']:'',
			'sex' => $input['sex']?$input['sex']:'',
			'department_id' => $input['department_id']?$input['department_id']:0
		];
		if (isset($input['password']) && $input['password']) {
			$user_array['password'] = bcrypt($input['password']);
		}
		if ($request->hasFile('new_image') && $request->file('new_image')) {
			$file = $request->file('new_image');
			if(!$file->isValid()) {
				return response()->json([ 'result' => 'error', 'message' => 'Invalid file upload'], 400);
			}
			$path = $file->store(sprintf('%s/%d/%d', 'avatars', date('Y'), date('m') ), 'public');
			$user_array['image'] = $path;
		}

		$employee = Employee::create($user_array);
		return response()->json(['id' => $employee->id]);
	}

	public function deleteEmployee(Employee $employee) {
		try {
			$this->authorize( 'delete', $employee );
		}
		catch (AuthorizationException $e) {
			return response()->json(['error' => 'unauthorized'], 403);
		}

		$employee->delete();

		return response()->json([]);
	}

	public function getEmployees(Request $request) {
		$limit = $request->input('limit');
		$offset = $request->input('offset');
		$order = $request->input('order');
		$sort = $request->input('sort');
		$filter = $request->input('filter');
		if ($filter) {
			$employees = Employee::orderBy( $sort ? $sort : 'id', $order )
			                     ->limit( $limit )
			                     ->offset( $offset )
								 ->where('first_name', 'LIKE', "%$filter%")
								 ->orWhere('last_name', 'LIKE', "%$filter%")
								 ->orWhere('phone', 'LIKE', "%$filter%")
								 ->orWhere('mobile', 'LIKE', "%$filter%")
								 ->orWhere('mobile_vpn', 'LIKE', "%$filter%")
								 ->orWhere('phone_vpn', 'LIKE', "%$filter%")
								 ->orWhere('room', 'LIKE', "%$filter%")
								 ->orWhereHas('department', function($query) use ($filter) {
								 	$query->where('name', 'LIKE', "%$filter%");
								 })
			                     ->get();
			$total     = Employee::where('first_name', 'LIKE', "%$filter%")->orWhere('last_name', 'LIKE', "%$filter%")->count();
		}
		else {
			$employees = Employee::orderBy( $sort ? $sort : 'id', $order )
			                     ->limit( $limit )
			                     ->offset( $offset )
			                     ->get();
			$total     = Employee::count();
		}
		return response()->json(['rows' => $employees, 'total' => $total]);
	}
}