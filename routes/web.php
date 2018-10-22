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

Route::get('/', 'PagesController@index')->middleware('auth')->name('dashboard');

/**
 * Customer Routes
 */
Route::get('/customers', 'CustomerController@index')->name('customers');
Route::post('/customers', 'CustomerController@store');
Route::get('/customers/create', 'CustomerController@create')->name('customers.create');
Route::get('/customers/{customer}', 'CustomerController@show')->middleware('customers');
Route::patch('/customers/{customer}', 'CustomerController@update')->middleware('customers');
Route::get('/customers/{customer}/edit', 'CustomerController@edit')->name('customers.update')->middleware('customers');

Route::get('/projects', 'ProjectController@index')->name('projects');
/**
 * Auth Routes
 */
Auth::routes();