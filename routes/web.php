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
            // Matches The "/subjects" URL
            Route::get('list', ['as' => 'subject.list', 'uses' => 'SubjectController@index']);
            Route::get('create', ['as' => 'subject.create', 'uses' => 'SubjectController@create']);
            Route::post('store', ['as' => 'subject.store', 'uses' => 'SubjectController@store']);
            Route::get('edit/{id}', ['as' => 'subject.edit', 'uses' => 'SubjectController@edit']);
            Route::post('update/{id}', ['as' => 'subject.update', 'uses' => 'SubjectController@update']);
            Route::delete('delete', ['as' => 'subject.delete', 'uses' => 'SubjectController@delete']);
        });

        Route::group(['middleware' => 'admin', 'prefix' => 'users'], function () {
            // Matches The "/users" URL
            Route::get('list', ['as' => 'user.list', 'uses' => 'UserController@index']);
            Route::get('create', ['as' => 'user.create', 'uses' => 'UserController@create']);
            Route::post('store', ['as' => 'user.store', 'uses' => 'UserController@store']);
            Route::get('edit/{id}', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
            Route::post('update/{id}', ['as' => 'user.update', 'uses' => 'UserController@update']);
            Route::delete('delete', ['as' => 'user.delete', 'uses' => 'UserController@delete']);
        });
        
        Route::group(['middleware' => 'admin', 'prefix' => 'courses'], function () {
            // Matches The "/courses" URL
            Route::get('list', ['as' => 'course.list', 'uses' => 'CourseController@index']);
            Route::get('create', ['as' => 'course.create', 'uses' => 'CourseController@create']);
            Route::post('store', ['as' => 'course.store', 'uses' => 'CourseController@store']);
            Route::get('edit/{id}', ['as' => 'course.edit', 'uses' => 'CourseController@edit']);
            Route::post('update/{id}', ['as' => 'course.update', 'uses' => 'CourseController@update']);
            Route::delete('delete', ['as' => 'course.delete', 'uses' => 'CourseController@delete']);

            Route::group(['prefix' => 'registration'], function () {
                // Matches The "/courses/registration" URL
                Route::get('', ['as' => 'course_registration.list', 'uses' => 'CourseRegistrationController@index']);
                Route::get('{course_id}/students', ['as' => 'course_registration.students', 'uses' => 'CourseRegistrationController@students']);
                Route::post('{course_id}/store', ['as' => 'course_registration.store', 'uses' => 'CourseRegistrationController@store']);
            });

            Route::get('{course_id}/students', ['as' => 'course.students', 'uses' => 'CourseController@students']);
            Route::delete('{course_id}/student/{student_id}', ['as' => 'course.student.delete', 'uses' => 'CourseController@deleteStudent']);
        });
        
        Route::group(['middleware' => 'admin', 'prefix' => 'plans'], function () {
            // Matches The "/plans" URL
            Route::get('list', ['as' => 'plan.list', 'uses' => 'PlanController@index']);
            Route::get('create', ['as' => 'plan.create', 'uses' => 'PlanController@create']);
            Route::post('store', ['as' => 'plan.store', 'uses' => 'PlanController@store']);
            Route::get('edit/{id}', ['as' => 'plan.edit', 'uses' => 'PlanController@edit']);
            Route::post('update/{id}', ['as' => 'plan.update', 'uses' => 'PlanController@update']);
            Route::delete('delete', ['as' => 'plan.delete', 'uses' => 'PlanController@delete']);
        });

        Route::group(['middleware' => 'admin', 'prefix' => 'levels'], function () {
            // Matches The "/levels" URL
            Route::get('list', ['as' => 'level.list', 'uses' => 'LevelController@index']);
            Route::get('create', ['as' => 'level.create', 'uses' => 'LevelController@create']);
            Route::post('store', ['as' => 'level.store', 'uses' => 'LevelController@store']);
            Route::get('edit/{id}', ['as' => 'level.edit', 'uses' => 'LevelController@edit']);
            Route::post('update/{id}', ['as' => 'level.update', 'uses' => 'LevelController@update']);
            Route::delete('delete', ['as' => 'level.delete', 'uses' => 'LevelController@delete']);
        });
    });

    Route::group(['namespace' => 'Exam'], function() {
        // Controllers Within The "App\Http\Controllers\Exam" Namespace
        Route::group(['middleware' => 'secretary', 'prefix' => 'exams'], function () {
            Route::group(['prefix' => 'instances'], function () {
                // Matches The "/exams/instances" URL
                Route::get('list', ['as' => 'exam_instance.list', 'uses' => 'ExamInstanceController@index']);
                Route::get('create', ['as' => 'exam_instance.create', 'uses' => 'ExamInstanceController@create']);
                Route::post('store', ['as' => 'exam_instance.store', 'uses' => 'ExamInstanceController@store']);
                Route::get('edit/{id}', ['as' => 'exam_instance.edit', 'uses' => 'ExamInstanceController@edit']);
                Route::post('update/{id}', ['as' => 'exam_instance.update', 'uses' => 'ExamInstanceController@update']);
                Route::delete('delete', ['as' => 'exam_instance.delete', 'uses' => 'ExamInstanceController@delete']);
            });

            Route::group(['prefix' => 'acts'], function () {
                // Matches The "/exams/acts" URL
                Route::get('list', ['as' => 'exam_act.list', 'uses' => 'ExamActController@index']);
                Route::get('create', ['as' => 'exam_act.create', 'uses' => 'ExamActController@create']);
                Route::post('store', ['as' => 'exam_act.store', 'uses' => 'ExamActController@store']);
                Route::get('edit/{id}', ['as' => 'exam_act.edit', 'uses' => 'ExamActController@edit']);
                Route::post('update/{id}', ['as' => 'exam_act.update', 'uses' => 'ExamActController@update']);
                Route::delete('delete', ['as' => 'exam_act.delete', 'uses' => 'ExamActController@delete']);
            });

            Route::group(['prefix' => 'registration'], function() {
                // Matches The "/exams/register" URL
                Route::get('search', ['as' => 'exam_registration.search', 'uses' => 'ExamRegistrationController@search']);
                Route::get('student/{student_id}/subject/{subject}', ['as' => 'exam_registration.index', 'uses' => 'ExamRegistrationController@index']);
                Route::get('subjects/{id?}', ['as' => 'exam_registration.subjects', 'uses' => 'ExamRegistrationController@subjects']);
                Route::post('store', ['as' => 'exam_registration.store', 'uses' => 'ExamRegistrationController@store']);
            });
        });

        Route::group(['middleware' => 'student', 'prefix' => 'exam'], function () {
            Route::group(['prefix' => 'register'], function() {
                // Matches The "/exam/register" URL
                Route::get('subjects', ['as' => 'exam_register.view', 'uses' => 'ExamRegistrationController@subjects']);
            });
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