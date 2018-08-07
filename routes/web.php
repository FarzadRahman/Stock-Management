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
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('apply','usercv')->name('cv.apply');

Route::view('dashboard','dashboard')->name('dashboard');
Route::view('invoice','invoice')->name('invoice');

Route::view('client/all','client.all')->name('client.all');
Route::view('products','product.all')->name('product.all');
Route::view('bill/create','bill.create')->name('bill.create');
Route::get('invoice/generate','InvoiceController@generate')->name('invoice.generate');



Route::view('application','application')->name('application');
Route::view('job/all','job.all')->name('job.all');
Route::view('job/manage','job.manage')->name('job.manage');

Route::view('manage/zone','manage.zone')->name('manage.zone');
Route::view('manage/education','manage.education')->name('manage.education');


