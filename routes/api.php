<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'API\UserController@register');
Route::post('login', 'API\UserController@login');
// Route::post('forgot', 'API\UserController@forgot');
// Route::post('reset', 'API\UserController@reset');

Route::post('password/email', 'API\ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset', 'API\ResetPasswordController@reset');

Route::get('/email/resend', 'API\VerificationController@resend')->name('verification.resend');
Route::get('/email/verify/{id}/{hash}', 'API\VerificationController@verify')->name('verification.verify');

Route::middleware('auth:api')->group(function () {
    Route::get('logout', 'API\UserController@logout');
    
    Route::get('profile', 'API\ProfileController@index');
    Route::post('profile', 'API\ProfileController@update');
    Route::delete('profile', 'API\ProfileController@destroy');
    Route::post('change', 'API\ProfileController@change');

    Route::get('history', 'API\DepositController@history');
    Route::post('deposit/{fee}', 'API\DepositController@store');
    Route::post('deposit', 'API\DepositController@store');
    Route::post('pickup', 'API\DepositController@pickup');

    Route::get('message', 'API\ChatController@index');
    Route::get('chat/{id}', 'API\ChatController@getChat');
    Route::post('chat/{id}', 'API\ChatController@sendChat');
    Route::delete('chat/delete/{id} ', 'API\ChatController@destroy');

    Route::get('pickup/list', 'API\PickupController@index');
    Route::get('pickup/done', 'API\PickupController@done');
    Route::get('pickup/rejection', 'API\PickupController@rejection');
    Route::post('pickup/rejection/{pickup}', 'API\PickupController@reject');
    Route::post('pickup/confirmation/{pickup}', 'API\PickupController@confirmation');

    Route::get('pickup/request', 'API\PickupController@request');
    Route::delete('pickup/delete/{pickup}', 'API\PickupController@delete');

    
    Route::get('history/list', 'API\HistoryController@index');

    Route::get('sell', 'API\SaleController@index');
    Route::post('sell', 'API\SaleController@store');

    Route::get('trash', 'API\WarehouseController@index');
    Route::get('trash/{id}', 'API\WarehouseController@show');
    Route::get('trashes', 'API\WarehouseController@get');

    Route::get('savings', 'API\SavingsController@index');
    Route::get('balance', 'API\SavingsController@show');
    Route::get('history/withdraw', 'API\SavingsController@history');
    Route::post('withdrawal', 'API\SavingsController@withdraw');


});
