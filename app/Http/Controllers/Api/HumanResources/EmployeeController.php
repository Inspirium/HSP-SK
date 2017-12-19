<?php

namespace Inspirium\Http\Controllers\Api\HumanResources;

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
		return response()->json([]);
	}

	public function deleteEmployee(Employee $employee) {
		$employee->delete();

		return response()->json([]);
	}
}