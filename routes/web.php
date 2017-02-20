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

/**
 * Logged Users Routes
 */
Route::group(['middleware'=> ['auth', 'revalidate']], function() {
    /**
     * Administration Routes - (For administrative matters, not admin user)
     */
    Route::group(['namespace' => 'Admin'], function () {
        // Controllers Within The "App\Http\Controllers\Admin" Namespace
        Route::group(['middleware' => 'admin', 'prefix' => 'subjects'], function () {
            // Matches The "/admin/subjects" URL
            Route::get('list', ['as' => 'subject.list', 'uses' => 'SubjectController@index']);
            Route::get('create', ['as' => 'subject.create', 'uses' => 'SubjectController@create']);
            Route::post('store', ['as' => 'subject.store', 'uses' => 'SubjectController@store']);
            Route::get('edit/{id}', ['as' => 'subject.edit', 'uses' => 'SubjectController@edit']);
            Route::post('update/{id}', ['as' => 'subject.update', 'uses' => 'SubjectController@update']);
            Route::delete('delete', ['as' => 'subject.delete', 'uses' => 'SubjectController@delete']);
        });

        Route::group(['middleware' => 'admin', 'prefix' => 'users'], function () {
            // Matches The "/admin/users" URL
            Route::get('list', ['as' => 'user.list', 'uses' => 'UserController@index']);
            Route::get('create', ['as' => 'user.create', 'uses' => 'UserController@create']);
            Route::post('store', ['as' => 'user.store', 'uses' => 'UserController@store']);
            Route::get('edit/{id}', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
            Route::post('update/{id}', ['as' => 'user.update', 'uses' => 'UserController@update']);
            Route::delete('delete', ['as' => 'user.delete', 'uses' => 'UserController@delete']);
        });
        
        Route::group(['middleware' => 'admin', 'prefix' => 'courses'], function () {
            // Matches The "/admin/courses" URL
            Route::get('list', ['as' => 'course.list', 'uses' => 'CourseController@index']);
            Route::get('create', ['as' => 'course.create', 'uses' => 'CourseController@create']);
            Route::post('store', ['as' => 'course.store', 'uses' => 'CourseController@store']);
            Route::get('edit/{id}', ['as' => 'course.edit', 'uses' => 'CourseController@edit']);
            Route::post('update/{id}', ['as' => 'course.update', 'uses' => 'CourseController@update']);
            Route::delete('delete', ['as' => 'course.delete', 'uses' => 'CourseController@delete']);
        });
    });

    Route::group(['prefix' => 'profile'], function () {
        // Matches The "/profile" URL
        Route::get('view', ['as' => 'profile.view', 'uses' => 'ProfileController@view']);
        Route::post('update', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
        Route::get('change/password', ['as' => 'profile.change_password', 'uses' => 'ProfileController@changePassword']);
        Route::post('change/password', ['as' => 'profile.change_password', 'uses' => 'ProfileController@updatePassword']);
    });
});