<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// TODO REST CRUD
Route::get('/', 'TodoController@index');
Route::resource('todo', 'TodoController');
