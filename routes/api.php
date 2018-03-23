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

Route::group( [ 'middleware' => [ 'auth:api' ], ], function () {

	Route::get( 'home', 'Api\HomeController@home' );

	Route::get( '/me', function ( Request $request ) {
		$user = Auth::user();
		$user->load( [ 'roles' ] );

		return $user;
	} );


	Route::group( [ 'prefix' => 'user' ], function () {

		Route::get( 'notifications', 'Api\HumanResources\NotificationController@getNotifications' );
		Route::post( 'notifications/all', 'Api\HumanResources\NotificationController@markAllAsRead' );
		Route::post( 'notifications/{notification}', 'Api\HumanResources\NotificationController@markAsRead' );

	} );

	Route::group( [
		'prefix'    => 'human_resources',
		'namespace' => 'Api\HumanResources'
	], function () {
		Route::post( 'employees', 'EmployeeController@getEmployees' );
		Route::get( 'employee/{employee}', 'EmployeeController@getEmployee' );
		Route::post( 'employee/{employee}', 'EmployeeController@saveEmployee' );
		Route::delete( 'employee/{employee}', 'EmployeeController@deleteEmployee' );
		Route::post( 'employee', 'EmployeeController@createEmployee' );
		Route::get( 'employee/search/{term}', 'EmployeeController@searchEmployee' );

		Route::get( 'department/{department}', 'DepartmentController@getDepartment' );
		Route::put( 'department/{department}', 'DepartmentController@putDepartment' );
		Route::post( 'department', 'DepartmentController@postDepartment' );
		Route::post('departments', 'DepartmentController@getDepartments');
	} );

	Route::group( [ 'namespace' => 'Api\BookManagement' ], function () {

		Route::group( [ 'prefix' => 'author' ], function () {
			Route::get( '{author}', 'AuthorController@getAuthor' );
			Route::get( 'search/{term}', 'AuthorController@search' );
			Route::post( '/', 'AuthorController@postAuthor' );
			Route::put( '{author}', 'AuthorController@putAuthor' );
			Route::delete('{author}', 'AuthorController@deleteAuthor');
		} );

		Route::group( [ 'prefix' => 'book' ], function () {
			Route::group( [ 'prefix' => 'category' ], function () {
				Route::get( '/', 'CategoryController@getCategories' );
			} );

			Route::get( 'types', 'CategoryController@getTypes' );
			Route::get( 'schools', 'CategoryController@getSchools' );
			Route::get( 'subjects', 'CategoryController@getSchoolSubjects' );
			Route::get( 'bibliotecas', 'CategoryController@getBibliotecas' );

			Route::get( 'categorization', 'CategoryController@getAll' );
		} );

	} );

	Route::group( [
		'prefix'    => 'file',
		'namespace' => 'Api\FileManagement'
	], function () {
		Route::get( '{file?}', 'FileController@getFileInfo' );
		Route::get( '{file}/download', 'FileController@getFile' );
		Route::post( '/', 'FileController@postFile' );
		Route::patch( '{file}', 'FileController@updateFile' );
		Route::delete( '{file}', 'FileController@deleteFile' );
	} );

	Route::group( [
		'namespace' => 'Api\Messaging',
		'prefix'    => 'thread'
	], function () {
		Route::get( '{id}', 'ThreadController@getThread' );
		Route::post( '{id}/message', 'ThreadController@postMessage' );
	} );

	Route::group([
		'namespace' => 'Api\BookManagement',
		'prefix' => 'books'
	], function() {
		Route::post('/', 'BookController@getBooks');
	});

	Route::group([
		'namespace' => 'Api\BookManagement',
		'prefix' => 'authors'
	], function() {
		Route::post('/', 'AuthorController@getAuthors');
		Route::post('{author}/related/propositions', 'AuthorController@getRelatedPropositions');
	});

} );