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
// Home Route
Route::get('/', 'HomeController@index')->name('home');

// Login Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');

// Password Reset Routes
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

// Logged Users Routes
Route::group(['middleware'=> ['auth', 'revalidate']], function() {
    // Administration Routes - (For administrative matters, not admin user)
    Route::group(['namespace' => 'Admin'], function () {
        Route::group(['prefix' => 'subjects'], function () {
            Route::get('list', 'SubjectController@index')->name('subjects.list');
            Route::get('create', 'SubjectController@create')->name('subjects.create');
            Route::post('store', 'SubjectController@store')->name('subjects.store');
            Route::get('edit/{id}', 'SubjectController@edit')->name('subjects.edit');
            Route::post('update/{id}', 'SubjectController@update')->name('subjects.update');
            Route::delete('delete', 'SubjectController@delete')->name('subjects.delete');
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('list', 'UserController@index')->name('users.list');
            Route::get('create', 'UserController@create')->name('users.create');
            Route::post('store', 'UserController@store')->name('users.store');
            Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
            Route::post('update/{id}', 'UserController@update')->name('users.update');
            Route::delete('delete', 'UserController@delete')->name('users.delete');
        });
        
        Route::group(['prefix' => 'courses'], function () {
            Route::get('list', 'CourseController@index')->name('courses.list');
            Route::get('{id}', 'CourseController@show')->name('courses.show');
            Route::get('create', 'CourseController@create')->name('courses.create');
            Route::post('store', 'CourseController@store')->name('courses.store');
            Route::get('edit/{id}', 'CourseController@edit')->name('courses.edit');
            Route::post('update/{id}', 'CourseController@update')->name('courses.update');
            Route::delete('delete', 'CourseController@delete')->name('courses.delete');
            Route::delete('{id}/student/{student_id}', 'CourseController@deleteStudent')->name('courses.delete.student');

            Route::group(['prefix' => 'registration'], function () {
                Route::get('', 'CourseRegistrationController@index')->name('courses_registration.list');
                Route::get('{course_id}/students', 'CourseRegistrationController@students')->name('courses_registration.students');
                Route::post('{course_id}/store', 'CourseRegistrationController@store')->name('courses_registration.store');
            });
        });
        
        Route::group(['prefix' => 'plans'], function () {
            Route::get('list', 'PlanController@index')->name('plans.list');
            Route::get('create', 'PlanController@create')->name('plans.create');
            Route::post('store', 'PlanController@store')->name('plans.store');
            Route::get('edit/{id}', 'PlanController@edit')->name('plans.edit');
            Route::post('update/{id}', 'PlanController@update')->name('plans.update');
            Route::delete('delete', 'PlanController@delete')->name('plans.delete');
        });

        Route::group(['prefix' => 'levels'], function () {
            Route::get('list', 'LevelController@index')->name('levels.list');
            Route::get('create', 'LevelController@create')->name('levels.create');
            Route::post('store', 'LevelController@store')->name('levels.store');
            Route::get('edit/{id}', 'LevelController@edit')->name('levels.edit');
            Route::post('update/{id}', 'LevelController@update')->name('levels.update');
            Route::delete('delete', 'LevelController@delete')->name('levels.delete');
        });
    });

    Route::group(['namespace' => 'Exam'], function() {
        Route::group(['prefix' => 'exam'], function () {
            Route::group(['prefix' => 'instances'], function () {
                Route::get('list', 'ExamInstanceController@index')->name('exam_instances.list');
                Route::get('create', 'ExamInstanceController@create')->name('exam_instances.create');
                Route::post('store', 'ExamInstanceController@store')->name('exam_instances.store');
                Route::get('edit/{id}', 'ExamInstanceController@edit')->name('exam_instances.edit');
                Route::post('update/{id}', 'ExamInstanceController@update')->name('exam_instances.update');
                Route::delete('delete', 'ExamInstanceController@delete')->name('exam_instances.delete');
            });

            Route::group(['prefix' => 'acts'], function () {
                Route::get('list', 'ExamActController@index')->name('exam_acts.list');
                Route::get('create', 'ExamActController@create')->name('exam_acts.create');
                Route::post('store', 'ExamActController@store')->name('exam_acts.store');
                Route::get('edit/{id}', 'ExamActController@edit')->name('exam_acts.edit');
                Route::post('update/{id}', 'ExamActController@update')->name('exam_acts.update');
                Route::delete('delete', 'ExamActController@delete')->name('exam_acts.delete');
            });

            Route::group(['prefix' => 'registration'], function() {
                Route::get('list', 'ExamRegistrationController@index')->name('exam_registration.list');
                Route::get('student/{student_id}/subject/{subject}', 'ExamRegistrationController@show')->name('exam_registration.show');
                Route::get('subjects/{id?}', 'ExamRegistrationController@subjects')->name('exam_registration.subjects');
                Route::post('store', 'ExamRegistrationController@store')->name('exam_registration.store');
            });
        });
    });

    Route::group(['prefix' => 'profiles'], function () {
        // Matches The "/profile" URL
        Route::get('view', ['as' => 'profiles.view', 'uses' => 'ProfileController@view']);
        Route::post('update', ['as' => 'profiles.update', 'uses' => 'ProfileController@update']);
        Route::get('change/password', ['as' => 'profiles.change_password', 'uses' => 'ProfileController@changePassword']);
        Route::post('change/password', ['as' => 'profiles.change_password', 'uses' => 'ProfileController@updatePassword']);
    });
});