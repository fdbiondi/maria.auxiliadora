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

Route::get('materias/crear', [
                        'as' => 'subjects.create',
                        'uses' =>'SubjectController@create'
]);

Route::post('materias/crear', [
    'as' => 'subjects.store',
    'uses' =>'SubjectController@store'
]);

/*
Route::get('materias', [
                        'as' => 'subjects.list',
                        'uses' => 'SubjectController@list'
]);*/