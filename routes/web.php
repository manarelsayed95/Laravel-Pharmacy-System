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

//####################### Doctor Routes #############################
Route::get('/doctors', 'DoctorController@index')->name('doctors.index');
Route::get('/doctors/create', 'DoctorController@create')->name('doctors.create');
Route::post('/doctors', 'DoctorController@store')->name('doctors.store');
Route::get('/doctors/{doctor}', 'DoctorController@show')->name('doctors.show');
Route::get('/doctors/{doctor}/edit', 'DoctorController@edit')->name('doctors.edit');
Route::put('/doctors/{doctor}', 'DoctorController@update')->name('doctors.update');
Route::delete('/doctors/{doctor}/delete', 'DoctorController@destroy')->name('doctors.destroy');



Route::get('/pharmacies', 'PharmacyController@index')->name('pharmacies.index');
Route::get('/pharmacies/create','PharmacyController@create')->name('pharmacies.create');
Route::get('/pharmacies/{pharmacy}', 'PharmacyController@show')->name('pharmacies.show');
Route::post('/pharmacies','PharmacyController@store')->name('pharmacies.store');

Route::delete('/pharmaciess/{pharmacy}','PharmacyController@destroy')->name('pharmacies.destroy');

//Route::get('/posts/','PostController@index')->name('posts.destroy');
