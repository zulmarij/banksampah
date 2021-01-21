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
// Route::view('password/reset', 'auth.reset_password')->name('password.reset');
Route::middleware('auth:web')->group(function () {
Route::get('/admin', 'Admin\AdminController@index')->name('Dashboard');
Route::resource('/admin/trash', 'Admin\TrashController');
});
