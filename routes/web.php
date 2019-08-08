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

Route::get('/', 'GetQuoteController@index');

Route::get('invited/{token}/{id}', 'ValidateInvitedUserController@validateInvite')->name('validate.invite');

Auth::routes();

Route::middleware('auth')->group(function () {
	Route::get('maintenance/post', 'MaintenanceRequestController@createPost')->name('maintenance.createPost');
	Route::get('maintenance/post/{post}', 'MaintenanceRequestController@editPost')->name('maintenance.editPost');
	Route::resource('maintenance', 'MaintenanceRequestController');

	Route::get('community/upload/{community}', 'CommunityController@upload')->name('community.new');
	Route::post('community/invite', 'CommunityController@invite');
	Route::get('community/get-doc/{community}/{docType}', 'CommunityController@getDoc');
	Route::post('community/delete-doc', 'CommunityController@deleteDoc');
	Route::resource('community', 'CommunityController');

	Route::post('user/import', 'UserController@import');
	Route::delete('user/delete/{user}', 'UserController@delete')->name('user.delete');

	Route::post('user/levy-report', 'UserDetailController@levyReport');
	Route::resource('user', 'UserDetailController');

	Route::get('super/users', 'SuperAdminController@users')->name('super.users');
	Route::get('super/community/{community}', 'SuperAdminController@community')->name('super.community');
	Route::get('super/user/{user}', 'SuperAdminController@user')->name('super.user');
});

Route::post('landing/getQuote', 'GetQuoteController@getQuote');
Route::post('landing/contact', 'GetQuoteController@contact');
Route::post('landing/contactOther', 'GetQuoteController@contactOther');

