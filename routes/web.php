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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/homes', 'HomeController@store');
Route::post('/recordatorisHome', 'HomeController@storeRecordatori');

Route::get('/homes/nuevo', 'HomeController@create')
    ->name('homes.create');

Route::post('/saveSensor/{home}', 'SensorController@store');
Route::get('/newSensor/{home}', 'SensorController@create')
    ->name('createSensor');


Route::post('/recordatoris', 'HomeController@store');

Route::post('/homes/changeState/{sensor}', 'SensorController@changeState')->name('homes.changeState');

Route::get('/recordatori/nuevo/{home}', 'HomeController@createRecordatori')
    ->name('recordatori.create');

Route::get('/homes/{recordatoris}', 'HomeController@show')
->where('home', '[0-9]+')
->name('homes.show');

Route::delete('/homes/{recordatoris}', 'HomeController@destroy')->name('homes.destroy');


