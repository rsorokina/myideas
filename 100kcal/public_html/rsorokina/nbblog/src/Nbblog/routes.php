<?php

/**
 * @author admin
 * @copyright 2017
 */

Route::get('/test', [
    'uses' => 'Rsorokina\Nbblog\AdminController@index', 
    'as' =>  'admin.index'
]);

