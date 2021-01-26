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

Route::resource('/admin/nasabah', 'NasabahController');
Route::resource('/admin/pengurus1', 'Pengurus1Controller');
Route::resource('/admin/pengurus2', 'Pengurus2Controller');
Route::resource('/admin/bendahara', 'BendaharaController');

Route::resource('/admin/trash', 'TrashController');

Route::get('/admin/finance', 'FinanceController@index');

Route::get('/admin/deposit', 'DepositController@index');

Route::get('/admin/sale', 'SaleController@index');

Route::get('/admin/withdrawal/request', 'WithdrawalController@getRequest');
});
