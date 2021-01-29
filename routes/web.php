<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', function () {
    return redirect('/admin');
});

// Route::view('password/reset', 'auth.reset_password')->name('password.reset');
Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/admin', 'AdminController@index');

    Route::resource('/admin/user', 'UserController');

    Route::resource('/admin/trash', 'TrashController');

    Route::get('/admin/deposit', 'DepositController@index');

    Route::get('/admin/pickup', 'PickupController@index');

    Route::get('/admin/finance', 'FinanceController@index');

    Route::get('/admin/sale', 'SaleController@index');

    Route::get('/admin/warehouse', 'WarehouseController@index');

    Route::get('/admin/withdrawal/', 'WithdrawalController@index');
    Route::get('/admin/withdrawal/withdraw', 'WithdrawalController@getWithdraw');
    Route::post('/admin/withdrawal/{id}/confirm', 'WithdrawalController@confirm');
    Route::post('/admin/withdrawal/{id}/reject', 'WithdrawalController@reject');
    Route::post('/admin/withdrawal/withdraw/store', 'WithdrawalController@withdraw');
});
