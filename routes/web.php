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

Route::get('/','Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('apply','usercv')->name('cv.apply');

Route::view('dashboard','dashboard')->name('dashboard');


//Client
Route::get('client/all','ClientController@index')->name('client.all');
Route::post('client/all','ClientController@insert')->name('client.insert');
Route::post('client/edit','ClientController@edit')->name('client.edit');

//Product
Route::get('products','ProductController@index')->name('product.all');
Route::post('products/getProductData','ProductController@getProductData')->name('product.getProductData');
Route::post('products','ProductController@insert')->name('product.insert');
Route::post('product/edit','ProductController@edit')->name('product.edit');
Route::post('product/stock','ProductController@stock')->name('product.stock');
Route::post('product/insertQuantity','ProductController@insertQuantity')->name('insertQuantity');






Route::view('application','application')->name('application');
Route::view('job/all','job.all')->name('job.all');
Route::view('job/manage','job.manage')->name('job.manage');

Route::view('manage/zone','manage.zone')->name('manage.zone');
Route::view('manage/education','manage.education')->name('manage.education');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Cart
Route::post('/card/add','InvoiceController@addCart')->name('card.add');
Route::post('/card/refresh','InvoiceController@refreshCart')->name('card.refresh');
Route::post('/card/changeDiscount','InvoiceController@changeDiscount')->name('cart.changeDiscount');
Route::post('/card/changeQuantity','InvoiceController@changeQuantity')->name('cart.changeQuantity');
Route::post('/cart/deleteProduct','InvoiceController@deleteProduct')->name('cart.deleteProduct');

//Invoice
Route::get('invoice','InvoiceController@index')->name('invoice');
Route::get('invoice/{id}','InvoiceController@get')->name('invoice.get');
Route::get('bill/create','InvoiceController@bill')->name('bill.create');
Route::get('invoice/generate/{clientId}','InvoiceController@generate')->name('invoice.generate');
