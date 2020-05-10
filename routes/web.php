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

Route::get('/','TodosController@index');
Route::get('/todos/{todo}','TodosController@show');
Route::get('/create','TodosController@create');
Route::post('/create','TodosController@store');
Route::get('/todos/{todo}/edit','TodosController@edit');
Route::post('/todos/{todo}/edit','TodosController@update');
Route::get('/todos/{todo}/delete','TodosController@destroy');
Route::get('/todos/{todo}/completed','TodosController@completed');
Route::get('/todos/{todo}/restore','TodosController@restore');









Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
