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

Route::get('/', 'InquiryController@index');

Auth::routes();

Route::post('/inquiry', 'InquiryController@create')->name('inquiry.create');
Route::get('/inquiry/confirm', 'InquiryController@confirm')->name('inquiry.confirm');
Route::post('/inquiry/back', 'InquiryController@confirmback')->name('inquiry.confirmback');
Route::post('/inquiry/complete', 'InquiryController@store')->name('inquiry.store');

Route::get('/home', 'HomeController@index')->name('home');
