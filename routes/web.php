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
Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
Route::get('/admin', 'AdminController@index');

Route::resource('/admin/trash', 'TrashController');
Route::resource('/admin/Pengurus1', 'Pengurus1Controller');
Route::resource('/admin/Pengurus2', 'Pengurus2Controller');
Route::resource('/admin/Bendahara', 'BendaharaController');
});
