<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function() {
	Route::get('/', 'HomeController@getIndex');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::any('logout', 'Auth\LoginController@logout')->name('logout');

	// Password Reset Routes...
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'human_resources'], function() {
	Route::get('employees', 'HumanResources\EmployeeController@showEmployees');
	Route::group(['prefix' => 'employee'], function () {
		Route::get('{employee}/show', 'HumanResources\EmployeeController@showEmployee');
		Route::any('{id}/{all}', function() {
			return view(config('app.template') . '::router-view');
		});
	});
	Route::get('departments', 'HumanResources\DepartmentController@showDepartments');
	Route::group(['prefix' => 'department'], function() {
		Route::get('{department?}/edit', 'HumanResources\DepartmentController@showDepartment');
		Route::post('{department?}/edit', 'HumanResources\DepartmentController@submitDepartment');
		Route::get('{department}/delete/', 'HumanResources\DepartmentController@deleteDepartment');
	});

	Route::get('roles', 'HumanResources\RoleController@showRoles');

	Route::group(['prefix' => 'role'], function() {
		Route::get('{role}/edit', 'HumanResources\RoleController@showRole');
		Route::get('{role}/delete', 'HumanResources\RoleController@deleteRole');
		Route::post('{role}/edit', 'HumanResources\RoleController@submitRole');
		Route::get('edit', 'HumanResources\RoleController@showCreateRole');
		Route::post('edit', 'HumanResources\RoleController@createRole');
	});
});

Route::group(['prefix' => 'books', 'namespace' => 'BookManagement'], function() {

	Route::get('/', 'BookController@showBooks');
	Route::group(['prefix' => 'book'], function() {
		Route::get('{id}/show', 'BookController@showBook');
		Route::get('{id}/edit', 'BookController@editBook');
	});

	Route::get('authors', 'AuthorController@showAuthors');
	Route::group(['prefix' => 'author'], function() {
		Route::get('{id}/show', 'AuthorController@showAuthor');
		Route::get('{id}/edit', 'AuthorController@editAuthor');
	});

	Route::get('categories', 'CategoryController@showCategories');
	Route::group(['prefix' => 'category'], function() {
		Route::get('{id}/show', 'CategoryController@showCategory');
		Route::get('{id?}/edit', 'CategoryController@editCategory');
	});
});

Route::group(['prefix' => 'message', 'namespace' => 'Messaging', 'middleware' => ['auth']], function() {
	Route::get('thread/{id}', 'MessageController@showThread');
});
