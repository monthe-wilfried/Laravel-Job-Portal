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
Route::get('/', 'JobController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Jobs
Route::get('/jobs/{id}/{job}', 'JobController@show')->name('job.show');


// Companies
Route::get('/company/{id}/{name}', 'CompanyController@show')->name('company.show');
