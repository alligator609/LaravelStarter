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
    Toastr::message('Messages in here', 'Title');
    return view('welcome');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/backend',function () {
    Toastr::message('Messages in here', 'Title');
    return view('backend.dashboard');
});


Route::group(
    ['as' => 'backend.', 'prefix' => 'backend', 'namespace' => 'Backend'],
    function (){
        Route::resource('role', 'RoleController');
        Route::resource('permission', 'PermissionController');
        Route::resource('user', 'UserController');

    }
);

