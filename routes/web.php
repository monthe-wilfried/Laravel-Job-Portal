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
Route::get('/company/{id}/{company}', 'CompanyController@show')->name('company.show');
Route::get('/company/profile', 'CompanyController@companyProfile')->name('company.profile');
Route::post('/company/profile/update', 'CompanyController@companyProfileUpdate')->name('company.profile.update');
Route::post('/company/profile/cover', 'CompanyController@companyProfileCover')->name('company.profile.cover');
Route::post('/company/profile/logo', 'CompanyController@companyProfileLogo')->name('company.profile.logo');


// User Profile
Route::get('user/profile', 'UserProfileController@index')->name('user.profile');
Route::post('user/profile/update', 'UserProfileController@profileSeekerUpdate')->name('profile.seeker.update');
Route::post('user/profile/update/cover', 'UserProfileController@profileSeekerCover')->name('profile.seeker.cover');
Route::post('user/profile/update/resume', 'UserProfileController@profileSeekerResume')->name('profile.seeker.resume');
Route::post('user/profile/update/avatar', 'UserProfileController@profileSeekerAvatar')->name('profile.seeker.avatar');

// Employer
Route::view('employer/registration', 'auth.employer-registration')->name('employer');
Route::post('employer/register', 'EmployerRegisterController@employerRegister')->name('employer.register');
