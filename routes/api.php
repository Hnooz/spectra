<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('meals' , 'API\MealController@index');
Route::get('categories' , 'API\CategoryController@index');

Route::post('orderdetails' , 'API\OrderDetailsController@store');
Route::get('orderdetails' , 'API\OrderDetailsController@index');

Route::get('orders' , 'API\OrderController@index');
Route::post('orders' , 'API\OrderController@store');
Route::put('orders/{order}' , 'API\OrderController@update');
Route::delete('orders/{order}', 'API\OrderController@destroy');