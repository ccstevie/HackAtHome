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

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::resource('posts', 'PostsController');

// Testing Planner

Route::get('/test', 'PlannerController@index');

Route::get('/wishlist', 'PlannerController@wishList')->name('wishlist');

Route::get('/travel', 'PlannerController@travel');

Route::get('/travel-results', 'PlannerController@travelResults')->name('travel_results');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
