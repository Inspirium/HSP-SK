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
	Route::get('notifications', 'HomeController@getNotifications');
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
	Route::get('employees', function() {
		return view(config('app.template') . '::router-view');
	});
	Route::group(['prefix' => 'employee'], function () {
		Route::get('{employee}/show', 'HumanResources\EmployeeController@showEmployee');
		Route::get('{employee}/roles', 'HumanResources\EmployeeController@employeeRoles')->middleware('can:viewRoles,employee');
		Route::post('{employee}/roles', 'HumanResources\EmployeeController@updateEmployeeRoles')->middleware('can:updateRoles,employee');
		Route::any('{all}', function() {
			return view(config('app.template') . '::router-view');
		});
		Route::any('{id}/{all}', function() {
			return view(config('app.template') . '::router-view');
		});
	});

	Route::get('departments', function() {
		return view(config('app.template') . '::router-view');
	});
	Route::group(['prefix' => 'department'], function() {
		Route::any('{all}', function() {
			return view(config('app.template') . '::router-view');
		});
		Route::any('{id}/{all}', function() {
			return view(config('app.template') . '::router-view');
		});
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

	Route::get('/', function() {
		return view(config('app.template') . '::router-view');
	});
	Route::group(['prefix' => 'book'], function() {
		Route::get('{id}/show', 'BookController@showBook');
		Route::get('{id}/edit', 'BookController@editBook');
	});

	Route::get('authors', function() {
		return view(config('app.template') . '::router-view');
	});
	Route::group(['prefix' => 'author'], function() {
		Route::get('{id}', function() {
			return view(config('app.template') . '::router-view');
		});
		Route::get('{id}/edit', function() {
			return view(config('app.template') . '::router-view');
		});
		Route::get('{author}/related/propositions', function() {
			return view(config('app.template') . '::router-view');
		});
	});

	Route::get('categories', 'CategoryController@showCategories');
	Route::group(['prefix' => 'category'], function() {
		Route::get('{id}/show', 'CategoryController@showCategory');
		Route::get('{id?}/edit', 'CategoryController@editCategory');
	});
});

Route::group(['prefix' => 'message', 'middleware' => ['auth']], function() {
	Route::get('thread/{id}', 'MessageController@showThread');
});

Route::get('/file/{file}/download', 'Api\FileManagement\FileController@getFile');

Route::get('changelog', function() {
	$parser = new \cebe\markdown\GithubMarkdown();
	$file = \Illuminate\Support\Facades\File::get('../CHANGELOG.md');
	return $parser->parse($file);
});