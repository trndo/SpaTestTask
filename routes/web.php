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


Route::group(['prefix' => '/admin/rooms','middleware' => 'admin'],function () {
    Route::get('/','Admin\ConferenceRoomController@getAll')->name('rooms.all');
    Route::post('store','Admin\ConferenceRoomController@store')->name('rooms.store');
    Route::get('create','Admin\ConferenceRoomController@create')->name('rooms.create');
    Route::get('{id}/update','Admin\ConferenceRoomController@edit')->name('rooms.edit');
    Route::patch('{id}/update','Admin\ConferenceRoomController@update')->name('rooms.update');
    Route::delete('delete/{id}','Admin\ConferenceRoomController@delete')->name('rooms.delete');
    Route::get('{id}','Admin\ConferenceRoomController@read')->name('rooms.show');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{any}','SpaController@index')->where('any','.*');
