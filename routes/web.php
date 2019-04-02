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

Route::get('/', function () {
	return redirect('admin-area');
	// return redirect()->route('community.index');
});

Auth::routes();

Route::get('user-area', 'LotUsersController@index')->name('lotUsers');
Route::get('admin-area', 'AdminUsersController@index');
Route::get('admin-area/levies', 'AdminUsersController@levies');

Route::middleware('auth')->group(function () {
	Route::resource('maintenance', 'MaintenanceRequestController');
	Route::resource('community', 'CommunityController');
	Route::resource('user', 'UserDetailController');
});
