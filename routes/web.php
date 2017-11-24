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

	Route::group(['middleware' => 'auth'], function() {
		Route::group(['prefix' => 'administration'], function() {
			Route::get('roles', 'HumanResources\RoleController@showRoles');
			Route::group(['prefix' => 'role'], function() {
				Route::get('/edit/{id?}', 'HumanResources\RoleController@showRole');
				Route::get('/delete/{id}', 'HumanResources\RoleController@deleteRole');
				Route::post('/edit/{id?}', 'HumanResources\RoleController@submitRole');
			});
		});

	});
