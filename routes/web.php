<?php

Route::get('/', 'PagesController@root')->name('root');
Auth::routes();
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UsersController',['only' => ['show', 'update', 'edit']]);
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');
Route::resource('topics', 'TopicsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
