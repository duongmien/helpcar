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
//  City
Route::resource('city', 'cityController');
//  District
Route::resource('district', 'DistrictController');
//  SubDistrict
Route::resource('sub-district', 'SubDistrictController');
//  Role
Route::resource('role', 'RoleController');
//  User
Route::resource('user', 'UserController');
// Home No Login
Route::get('/', 'HomeController@index');
// Home Login
Route::get('/home', 'HomeController@home');
//  User
Route::resource('csch', 'ResFacilityController');
// Login
Route::get('/login', 'LoginController@index');
Route::post('/check-login', 'LoginController@check_login');
// Logout
Route::get('/logout', 'LoginController@logout');
