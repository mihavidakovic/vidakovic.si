<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'
));

Route::get('project/{id}', array(
	'as' => 'project',
	'uses' => 'ProjectController@getProject'
));

Route::get('addproject', array(
	'as' => 'add-project',
	'uses' => 'ProjectController@addProject'
));

Route::post('addproject', array(
	'as' => 'post-add-project',
	'uses' => 'ProjectController@postProject'
));


Route::get('project/edit/{id}', array(
	'as' => 'edit-project',
	'uses' => 'ProjectController@editProject'
));

Route::post('project/edit/{id}', array(
	'as' => 'post-edit-project',
	'uses' => 'ProjectController@postEditProject'
));

// about
Route::get('about', array(
	'as' => 'about',
	'uses' => 'SubpageController@about'
));

// work
Route::get('work', array(
	'as' => 'work',
	'uses' => 'SubpageController@work'
));

// contact
Route::get('thanks', array(
	'as' => 'thanks',
	'uses' => 'SubpageController@thanks'
));

Route::get('contact', array(
	'as' => 'contact',
	'uses' => 'SubpageController@contact'
));

Route::post('contact', array(
	'as' => 'post-contact',
	'uses' => 'SubpageController@postContact'
));