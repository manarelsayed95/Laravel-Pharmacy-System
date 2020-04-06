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



<<<<<<< HEAD
Route::get('/pharmacies', 'PharmacyController@index')->name('pharmacies.index');
Route::get('/pharmacies/create','PharmacyController@create')->name('pharmacies.create');
Route::get('/pharmacies/{pharmacy}', 'PharmacyController@show')->name('pharmacies.show');
Route::post('/pharmacies','PharmacyController@store')->name('pharmacies.store');

Route::delete('/pharmaciess/{pharmacy}','PharmacyController@destroy')->name('pharmacies.destroy');

//Route::get('/posts/','PostController@index')->name('posts.destroy');
=======

Route::get('/medicines', 'MedicineController@index')->name('medicines.index');
Route::get('/medicines/create','MedicineController@create')->name('medicines.create');
Route::post('/medicines','MedicineController@store')->name('medicines.store');
Route::get('/medicines/{medicine}', 'MedicineController@show')->name('medicines.show');
Route::get('/medicines/{medicine}/edit','MedicineController@edit')->name('medicines.edit');
Route::put('/medicines/{medicine}','MedicineController@update')->name('medicines.update');
Route::delete('/medicines/{medicine}/delete','MedicineController@destroy')->name('medicines.destroy');

>>>>>>> 3178aa5050e74f999c6bf80025e036e54e0a5fbc
