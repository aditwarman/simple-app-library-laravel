<?php

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
    return (\Illuminate\Support\Facades\Auth::guest())
            ? view('welcome')
            : view('landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'list'], function () {
        Route::get('/book', 'BookController@index')->name('book.list');
        Route::get('/customer', 'CustomerController@index')->name('customer.list');
    });

    Route::group(['prefix' => 'book'], function () {
        Route::get('/create', 'BookController@formCreate')->name('book.create');
        Route::post('/create', 'BookController@postBook')->name('book.post');
        Route::get('/{id}/edit', 'BookController@edit')->name('book.edit');
        Route::post('/edit', 'BookController@postEdit')->name('book.postEdit');
        Route::get('/restore', 'BookController@restore')->name('book.restore');
    });

    Route::group(['prefix' => 'customer'], function () {
        Route::get('/create', 'CustomerController@form')->name('customer.create');
        Route::post('/create', 'CustomerController@postCustomer')->name('customer.post');
        Route::get('/{id}/edit', 'CustomerController@edit')->name('customer.edit');
        Route::post('/edit', 'CustomerController@postEdit')->name('customer.postEdit');
        Route::get('/restore', 'CustomerController@restore')->name('customer.restore');
    });

    Route::group(['prefix' => 'transaction'], function () {
        Route::get('/', 'TransactionController@index')->name('transaction.index');
        Route::get('/{id}/detail', 'TransactionController@detail')->name('transaction.detail');
        Route::get('/create', 'TransactionController@form')->name('transaction.create');
        Route::post('/create', 'TransactionController@order')->name('transaction.post');
    });

    Route::group(['prefix' => 'delete'], function () {
        Route::delete('/book/{id}', 'BookController@delete')->name('book.delete');
        Route::delete('/customer/{id}', 'CustomerController@delete')->name('customer.delete');
    });
});
