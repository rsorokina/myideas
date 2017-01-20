<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::match(['get','options'],'/api/v1/getFront', [
    'uses' => 'ApiV1Controller@getFront', 
    'as' =>  'api.v1.getFront'
]);

Route::match(['get','post','options'],'/api/v1/setFront', [
    'uses' => 'ApiV1Controller@setFront', 
    'as' =>  'api.v1.setFront'
]);














Route::get('/', [
    'uses' => 'AdminController@index', 
    'as' =>  'admin.index'
]);

Route::get('/course', [
    'uses' => 'AdminController@course', 
    'as' =>  'admin.course'
]);

Route::post('/food/create', [
    'uses' => 'AdminController@createFood', 
    'as' =>  'admin.createFood'
]);

Route::post('/course/create', [
    'uses' => 'AdminController@createCourse', 
    'as' =>  'admin.createCourse'
]);