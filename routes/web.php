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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/tester', 'ItemC@item');

Route::group(['prefix' => 'kegiatan'], function () {
	Route::get('','ProyekC@index');
	Route::get('create','ProyekC@create');
	Route::post('','ProyekC@store');
	Route::get('req/{id}','ProyekC@show');
	Route::get('req/{id}/edit','ProyekC@edit');
	Route::patch('req/{id}','ProyekC@update');
	Route::delete('req/{id}','ProyekC@destroy');
	Route::get('listdata','ProyekC@listdata');
	Route::patch('enable/{id}','ProyekC@enable');
	Route::patch('disable/{id}','ProyekC@disable');
});

Route::group(['prefix' => 'coa'], function () {
	Route::get('','CoaC@index');
	Route::get('create','CoaC@create');
	Route::post('','CoaC@store');
	Route::get('req/{id}','CoaC@show');
	Route::get('req/{id}/edit','CoaC@edit');
	Route::patch('req/{id}','CoaC@update');
	Route::delete('req/{id}','CoaC@destroy');
	Route::get('listdata','CoaC@listdata');
	Route::patch('enable/{id}','CoaC@enable');
	Route::patch('disable/{id}','CoaC@disable');
});

Route::group(['prefix' => 'item'], function () {
	Route::get('','ItemC@index');
	Route::get('create','ItemC@create');
	Route::post('','ItemC@store');
	Route::get('req/{id}','ItemC@show');
	Route::get('req/{id}/edit','ItemC@edit');
	Route::patch('req/{id}','ItemC@update');
	Route::delete('req/{id}','ItemC@destroy');
	Route::get('listdata','ItemC@listdata');
	Route::patch('enable/{id}','ItemC@enable');
	Route::patch('disable/{id}','ItemC@disable');
});

Route::group(['prefix' => 'satuan'], function () {
	Route::get('','SatuanC@index');
	Route::get('create','SatuanC@create');
	Route::post('','SatuanC@store');
	Route::get('req/{id}','SatuanC@show');
	Route::get('req/{id}/edit','SatuanC@edit');
	Route::patch('req/{id}','SatuanC@update');
	Route::delete('req/{id}','SatuanC@destroy');
	Route::get('listdata','SatuanC@listdata');
	Route::patch('enable/{id}','SatuanC@enable');
	Route::patch('disable/{id}','SatuanC@disable');
});

Route::group(['prefix' => 'user'], function () {
	Route::get('','UserC@index');
	Route::get('create','UserC@create');
	Route::post('','UserC@store');
	Route::get('req/{id}','UserC@show');
	Route::get('req/{id}/edit','UserC@edit');
	Route::patch('req/{id}','UserC@update');
	Route::delete('req/{id}','UserC@destroy');
	Route::get('listdata','UserC@listdata');
	Route::patch('enable/{id}','UserC@enable');
	Route::patch('disable/{id}','UserC@disable');
});
