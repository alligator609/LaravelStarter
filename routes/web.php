<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// google auth
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');



Route::group(
    ['as' => 'backend.', 'prefix' => 'backend', 'namespace' => 'Backend'],
    function (){
        Route::get('home',function () {
            Toastr::message('Messages in here', 'Title');
            return view('backend.dashboard');
        });
        Route::resource('role', 'RoleController');
        Route::resource('permission', 'PermissionController');
        Route::resource('user', 'UserController');

    }
);

