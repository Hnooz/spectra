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

Route::get('/', fn() => redirect()->route('dashboard.index'));

Auth::routes(['register' => false, 'confirm' => false, 'reset' => false]);


Route::middleware('auth')->prefix('/dashboard')->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('/ui', 'DashboardController@ui');

    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::post('/users', 'UserController@store')->name('users.store');
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('/users/{user}', 'UserController@update')->name('users.update');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');
    
    Route::get('/orders', 'OrderController@index')->name('orders.index');

    Route::get('/meals', 'MealController@index')->name('meals.index');
    Route::get('/meals/create', 'MealController@create')->name('meals.create');
    Route::post('/meals', 'MealController@store')->name('meals.store');
    Route::get('/meals/{meal}/edit', 'MealController@edit')->name('meal.edit');
    Route::put('/meals/{meal}', 'MealController@update')->name('meals.update');
    Route::delete('/meals/{meal}', 'MealController@destroy')->name('meals.destroy');

    Route::get('/categories', 'CategoryController@index')->name('categories.index');
    Route::post('/categories', 'CategoryController@store')->name('categories.store');
    Route::delete('/categories/{category}', 'CategoryController@destroy')->name('categories.destroy');
});
