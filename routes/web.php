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

// Auth::routes();

Route::post('/inquiry', 'InquiryController@create')->name('inquiry.create');
Route::get('/inquiry/confirm', 'InquiryController@confirm')->name('inquiry.confirm');
Route::post('/inquiry/back', 'InquiryController@confirmback')->name('inquiry.confirmback');
Route::post('/inquiry/complete', 'InquiryController@store')->name('inquiry.store');


Route::group(['prefix' => 'admin'], function(){
	/***** Auth Routes *****/
	Route::group(['middleware' => 'auth'], function(){
		Route::get('/', 'HomeController@index')->name('home');
	});	
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    /*******************/
});