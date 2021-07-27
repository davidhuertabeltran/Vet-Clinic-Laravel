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

Route::get('/api', 'ClinicAPI@index')->name('database-api');

Route::get('/', 'clientController@index')->name('home');

Route::get('/client/{id}', 'clientController@show')->name('client');
Route::get('/client/{id}/{pet_id}', 'clientController@pet')->name('pet');


Route::get('/results', 'clientController@search')->name('search');



//Client Routes

Route::get('/clients/create', 'AdminController@create')->name('client-create');
Route::post('/clients', 'AdminController@store')->name('client-store');
Route::get('/clients/{id}/edit', 'AdminController@edit')->name('client-edit');
Route::put('/clients/{id}', 'AdminController@update')->name('client-update');


//Pet Routes

Route::post('/pet/', 'PetController@storePet')->name('pet-store');
Route::get('/pet/{id}/edit', 'PetController@editPet')->name('pet-edit');
Route::put('/pet/{id}', 'PetController@updatePet')->name('pet-update');
Route::put('/pet/delete/{id}', 'PetController@deletePet')->name('pet-delete');


//ADDITIONAL ROUTES FOR HEADING/NAVBAR

Route::get('/about_us', function () {

    return view('clinic.about_us');
})->name('about_us');
