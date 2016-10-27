<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    if(Auth::check())
        route('home');
    else
        route('login');
});

//Home Route
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

/**
 * Authentication Routes
 */
// Login Routes...
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
//Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
Route::post('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::post('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@reset']);
Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);

Route::group(['namespace' => 'Admin'], function() {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::group(['prefix' => 'subjects'], function () {
        // Matches The "/admin/subjects" URL
        Route::get('list', ['as' => 'subject.list', 'uses' => 'SubjectsController@index']);
        Route::get('create', ['as' => 'subject.create', 'uses' => 'SubjectsController@create']);
        Route::post('store', ['as' => 'subject.store', 'uses' => 'SubjectsController@store']);
        Route::get('edit/{id}', ['as' => 'subject.edit', 'uses' => 'SubjectsController@edit']);
        Route::post('update/{id}', ['as' => 'subject.update', 'uses' => 'SubjectsController@update']);
        Route::delete('delete', ['as' => 'subject.delete', 'uses' => 'SubjectsController@delete']);
    });
});
    