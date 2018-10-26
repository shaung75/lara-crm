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

Route::middleware('auth')->group(function() {
    Route::get('/', 'PagesController@index')->middleware('auth')->name('dashboard');

    Route::get('/customers', 'CustomerController@index')->name('customers');
    Route::post('/customers', 'CustomerController@store');
    Route::get('/customers/create', 'CustomerController@create')->name('customers.create');
    Route::get('/customers/{customer}', 'CustomerController@show')->name('customer')->middleware('checkOwner');
    Route::patch('/customers/{customer}', 'CustomerController@update')->middleware('checkOwner');
    Route::get('/customers/{customer}/edit', 'CustomerController@edit')->name('customers.update')->middleware('checkOwner');

    Route::get('/customers/{customer}/projects/create', 'CustomerProjectsController@create')->middleware('checkOwner');
    Route::post('/customers/{customer}/projects', 'CustomerProjectsController@store');

    Route::get('/projects', 'ProjectController@index')->name('projects');
    Route::post('/projects', 'ProjectController@store');
    Route::get('/projects/create', 'ProjectController@create')->name('projects.create');
    Route::get('/projects/{project}', 'ProjectController@show')->name('project')->middleware('checkOwner');  
    Route::delete('/projects/{project}', 'ProjectController@destroy')->name('project.delete')->middleware('checkOwner');
});

/**
 * Auth Routes
 */
Auth::routes();