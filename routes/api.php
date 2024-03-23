<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/customers', 'CustomerController@index');
Route::post('/customers', 'CustomerController@store');
Route::get('/customers/{id}', 'CustomerController@show');
Route::put('/customers/{id}', 'CustomerController@update');
Route::delete('/customers/{id}', 'CustomerController@destroy');

Route::post('/wallets/topup/{customerId}', 'WalletController@topup');
Route::post('/wallets/pay/{customerId}', 'WalletController@pay');