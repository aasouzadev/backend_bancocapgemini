<?php

use App\Http\Controllers\AccountController;
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


Route::get('accounts', 'AccountController@index');
Route::get('accounts/{conta}', 'AccountController@balance');
Route::post('accounts', 'AccountController@storeAccount');
Route::put('accounts/transaction/{conta}', 'AccountController@transaction');

