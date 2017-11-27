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

Route::group(['prefix' => 'human_resources', 'middleware' => ['auth:api'], 'namespace' => 'Api\HumanResources'], function() {
	Route::get('employee/{employee}', 'EmployeeController@getEmployee');
	Route::post('employee/{employee}', 'EmployeeController@saveEmployee')->middleware('can:update,employee');
	Route::post('employee', 'EmployeeController@createEmployee');//TODO: auth
	Route::get('employee/search/{term}', 'EmployeeController@searchEmployee');

	Route::get('department/{department}', 'DepartmentController@getDepartment');
	Route::get('departments', 'DepartmentController@getDepartments');
	Route::get('department/search/{term}', 'DepartmentController@searchDepartment');
});

Route::group(['namespace' => 'Api\BookManagement', 'middleware' => [ 'auth:api']], function() {

	Route::group(['prefix' => 'author'], function() {
		Route::get('/{id}', 'AuthorController@getAuthor');
		Route::get('search/{term}', 'AuthorController@search');
		Route::post('/', 'AuthorController@postAuthor');

	});

	Route::group(['prefix' => 'book'], function() {
		Route::group(['prefix' => 'category'], function() {
			Route::get('/', 'CategoryController@getCategories');
		});

		Route::get('types', 'CategoryController@getTypes');
		Route::get('schools', 'CategoryController@getSchools');
		Route::get('subjects', 'CategoryController@getSchoolSubjects');
		Route::get('bibliotecas', 'CategoryController@getBibliotecas');

		Route::get('categorization', 'CategoryController@getAll');
	});

});

Route::group(['prefix' => 'file', 'namespace' => 'Api\FileManagement', 'middleware' => ['auth:api']], function() {
	Route::get('{id?}', 'FileController@getFileInfo');
	Route::post('/', 'FileController@postFile');
	Route::patch('{id}', 'FileController@updateFile');
	Route::delete('{id}', 'FileController@deleteFile');
});

Route::group(['middleware' => ['auth:api'], 'namespace' => 'Api\Messaging', 'prefix' => 'thread'], function() {
	Route::get('{id}', 'ThreadController@getThread');
	Route::post('{id}/message', 'ThreadController@postMessage');
});