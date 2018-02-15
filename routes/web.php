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

Route::get('/', 'PagesController@root')->name('root');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::resource('users', 'UsersController', ['only' => ['index', 'store', 'destroy', 'edit', 'update']]);
Route::get('users/role', 'PermissionsController@index')->name('permission.index');
Route::post('users/role', 'PermissionsController@roleStore')->name('permission.roleStore');
Route::post('users/permission', 'PermissionsController@permissionStore')->name('permission.permissionStore');
Route::post('users/roleandpermission', 'PermissionsController@roleAndPermission')->name('permission.roleAndPermission');




// Registration Routes...
if (config('common.allow_user_register')) {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
}