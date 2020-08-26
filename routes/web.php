<?php
use Illuminate\Support\Facades\Input;
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
    return view('home');
});

Route::get('/exchangerates', function () {
    return view('currencies.exchangerates');
})->name('exchangerates');

Route::get('/currencyexchange', function () {
    return view('currencies.exchange');
})->name('currencyexchange');

Route::get('/cashin', function () {
    return view('currencies.cashin');
})->name('cashin');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/getexchangerates', 'CurrencyController@getExchangeRates');

Route::get('/getpaymentstatus', 'CurrencyController@getPaymentStatus');


Route::get('/gettransactionid', 'CurrencyController@getTransactionId');

Route::post('/getsignature', 'CurrencyController@getSignature');

Route::post('/settransaction', 'CurrencyController@setTransaction');


Route::get('/getcryptorates', 'HomeController@getCryptoRates');
