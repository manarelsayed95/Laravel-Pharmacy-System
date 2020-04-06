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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin');
});

Route::get('orders','orderController@index');
Route::get('/doctors', 'DoctorController@index')->name('doctors.index');

Route::get('/doctors/{doctor}', 'DoctorController@show')->name('doctors.show');

Route::get('/medicines', 'MedicineController@index')->name('medicines.index');

Route::get('/medicines/{medicine}', 'MedicineController@show')->name('medicines.show');
