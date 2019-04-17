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

Route::get('/', 'UserController@index');

Route::get('invited/{token}/{id}', 'ValidateInvitedUserController@validateInvite')->name('validate.invite');

Auth::routes();

Route::middleware('auth')->group(function () {
	Route::resource('maintenance', 'MaintenanceRequestController');
	Route::get('community/upload/{community}', 'CommunityController@upload')->name('community.new');
	Route::post('community/invite', 'CommunityController@invite');
	Route::get('community/get-doc/{community}/{docType}', 'CommunityController@getDoc');
	Route::resource('community', 'CommunityController');
	Route::post('user/import', 'UserController@import');
	Route::resource('user', 'UserDetailController');
});
