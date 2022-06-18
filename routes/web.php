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
// Home
Route::get('/', 'HomeController@index');
