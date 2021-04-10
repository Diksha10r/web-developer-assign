<?php
use Spatie\ArrayToXml\ArrayToXml;

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

Route::get('/','BookManagementController@index' );
Route::get('BookManagement_delete/{id}','BookManagementController@destroy' );
Route::post('BookManagement_delete/{id}','BookManagementController@destroy' );
Route::post('BookManagement_submit','BookManagementController@store' );
Route::get('BookManagement_editbook/{id}','BookManagementController@edit' );
Route::post('BookManagement_update/{id}','BookManagementController@update' )-> name('BookManagement.update');
Route::post('/export', 'BookManagementController@export');

