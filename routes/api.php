<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:api'], 'prefix' => 'user'], function () {

	Route::get('notifications', 'Api\HumanResources\NotificationController@getNotifications');

});

Route::group(['prefix' => 'human_resources', 'middleware' => [ 'auth:api'], 'namespace' => 'Api\HumanResources'], function() {
	Route::get('employee/{employee}', 'EmployeeController@getEmployee');
	Route::post('employee/{employee}', 'EmployeeController@saveEmployee')->middleware('can:update,employee');
	Route::get('employee/search/{term}', 'EmployeeController@searchEmployee');

	Route::get('department/{department}', 'DepartmentController@getDepartment');
	Route::get('departments', 'DepartmentController@getDepartments');
	Route::get('department/search/{term}', 'DepartmentController@searchDepartment');
});