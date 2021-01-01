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
Route::get('admin-wallets', 'AdminAccessController@wallets')->name('admin-wallets');
Route::get('admin-transactions', 'AdminAccessController@transactions')->name('admin-transactions');

Route::get('payment', 'PaymentController@index');
Route::post('charge', 'PaymentController@charge');
Route::get('paymentsuccess', 'PaymentController@payment_success');
Route::get('paymenterror', 'PaymentController@payment_error');


Route::get('/text-pay-pal', function () {
    return view('payment');
});
