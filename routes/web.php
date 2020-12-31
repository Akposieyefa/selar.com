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

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('customers', 'HomeController@customers')->name('customers');// get all registered customers for admin view
Route::delete('/customer-destroy/{id}', 'HomeController@destroy')->name('customer-destroy');//deleting users from database
Route::resource('wallets', 'WalletController'); //wallet controller
Route::resource('/transactions', 'TransactionController'); //transaction controller

Route::get('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');


Route::get('/text-pay-pal', function () {
    return view('payment');
});
