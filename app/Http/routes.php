<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Admin functions begin
Route::get('/profile/{user}', 'UserController@show');

Route::get('/change-password', function(){
	return view('address.change-password'); 
})->middleware('auth');
Route::post('/change-password', 'UserController@change_password');
//Admin fuctions end

//SuperAdmin functions begin
Route::get('/add-user', function(){
	return view('auth.add-user');
})->middleware('superadmin');
Route::post('/add-user', 'UserController@add')->middleware('superadmin');
Route::post('/edit-user/password', 'UserController@change_user_password')->middleware('superadmin');
Route::get('/edit-users', function() {
	$users = App\User::all();
	$deletedusers = App\User::onlyTrashed()->get();
	return view('auth.edit-users', compact('users','deletedusers'));
})->middleware('superadmin');
Route::post('/edit-user/type', 'UserController@edit_type')->middleware('superadmin');
Route::get('/edit-user/delete/{user}', 'UserController@delete_user')->middleware('superadmin');
Route::post('/edit-user/restore', 'UserController@restore_user')->middleware('superadmin');
Route::post('/edit-user/permanent-delete', 'UserController@permanently_delete_user')->middleware('superadmin');
//SuperAdmin functions end

Route::get('/','PagesController@home');

Route::get('/state/{state}', 'StateController@state');

Route::post('/state/{state}/district', 'DistrictController@store');

Route::get('/district/{district}/edit', 'DistrictController@edit');

Route::patch('/district/{district}', 'DistrictController@update');

Route::patch('/state/{state}', 'StateController@update');

Route::auth();

Route::get('/first', function () {
	Session::flash('status', 'Hi! Welcome back');
	
	return redirect('/home');
});

Route::get('/home', 'StateController@index');

Route::get('/district/{district}/delete', 'DistrictController@delete');

Route::get('/district/{district}/addresses', 'AddressController@district');

Route::post('/district/{district}/add-address', 'AddressController@store');

Route::post('/state/add-state', 'StateController@store');

Route::get('/state/{state}/delete', 'StateController@delete');

Route::get('/add/address', 'AddressController@index');

Route::post('/address/delete', 'AddressController@delete');

Route::get('/address/{address}', 'AddressController@show');

Route::patch('/address/edit/', 'AddressController@update');

Route::get('/search', 'AddressController@search');

//Printing functions
Route::get('/print', 'PrintController@index');

Route::get('/print/all', 'PrintController@all');