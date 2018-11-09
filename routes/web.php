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

Route::get('/', 'PagesController@home')->name('home');
Route::get('/freelance', 'PagesController@freelance')->name('freelance');
Route::get('/terms', 'PagesController@terms')->name('terms');
Route::get('/privacy', 'PagesController@privacy')->name('privacy');
Route::get('/pay', 'PagesController@pay')->name('pay');
Route::post('/pay', 'PayInvoiceController@show');
Route::post('/pay/{invoice}', 'PayInvoiceController@update');
Route::post('/contact', 'ContactController@store')->name('contact');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', 'PagesController@index')->middleware('auth')->name('dashboard');

    Route::get('/customers', 'CustomerController@index')->name('customers');
    Route::post('/customers', 'CustomerController@store');
    Route::get('/customers/create', 'CustomerController@create')->name('customers.create');
    Route::get('/customers/{customer}', 'CustomerController@show')->name('customer')->middleware('checkOwner');
    Route::patch('/customers/{customer}', 'CustomerController@update')->middleware('checkOwner');
    Route::get('/customers/{customer}/edit', 'CustomerController@edit')->name('customers.update')->middleware('checkOwner');
    Route::get('/customers/{customer}/invoices', 'CustomerController@invoices')->name('customers.invoices')->middleware('checkOwner');
    Route::get('/customers/{customer}/invoices/unpaid', 'CustomerController@invoices')->name('customers.invoices.unpaid')->middleware('checkOwner');
    Route::get('/customers/{customer}/invoices/create', 'CustomerController@invoicesCreate')->name('customers.invoices.create')->middleware('checkOwner');

    Route::get('/customers/{customer}/projects/create', 'CustomerProjectsController@create')->middleware('checkOwner');
    Route::post('/customers/{customer}/projects', 'CustomerProjectsController@store');

    Route::get('/projects', 'ProjectController@index')->name('projects');
    Route::post('/projects', 'ProjectController@store');
    Route::get('/projects/create', 'ProjectController@create')->name('projects.create');
    Route::get('/projects/{project}', 'ProjectController@show')->name('project')->middleware('checkOwner');  
    Route::delete('/projects/{project}', 'ProjectController@destroy')->name('project.delete')->middleware('checkOwner');

    Route::get('/invoices', 'InvoiceController@index')->name('invoices');
    Route::get('/invoices/unpaid', 'InvoiceController@index')->name('invoices.unpaid');
    Route::post('/invoices', 'InvoiceController@store');
    Route::get('/invoices/create', 'InvoiceController@create')->name('invoices.create');
    Route::get('/invoices/{invoice}', 'InvoiceController@show')->name('invoice')->middleware('checkOwner');
    Route::get('/invoices/{invoice}/print', 'InvoiceController@print')->name('invoice.print')->middleware('checkOwner');
    Route::patch('/invoices/{invoice}', 'InvoiceController@update')->middleware('checkOwner');
    Route::patch('/invoices/{invoice}/lock', 'InvoiceController@update')->middleware('checkOwner');
    Route::post('/invoices/{invoice}/items/create', 'InvoiceItemController@store')->middleware('checkOwner');

    Route::get('/quotes', 'QuoteController@index')->name('quotes');
    Route::get('/quotes/create', 'QuoteController@create')->name('quotes.create');
    Route::get('/quotes/{quote}/print', 'QuoteController@print')->name('quote.print')->middleware('checkOwner');
    Route::get('/quotes/{quote}', 'QuoteController@show')->name('quote')->middleware('checkOwner');
    Route::get('/quotes/{quote}/print', 'QuoteController@print')->name('quote.print')->middleware('checkOwner');
    Route::post('/quotes', 'QuoteController@store');
    Route::post('/quotes/{quote}/items/create', 'QuoteItemController@store')->middleware('checkOwner');
});

/**
 * Auth Routes
 */
Auth::routes(['verify' => true, 'register' => false]);