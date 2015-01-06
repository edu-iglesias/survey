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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/create', function()
{
	return View::make('create');
});

Route::post('createtab', array('uses' => 'CreateSurveyController@createtab', 'as'=>'createtab'));

Route::post('createquestion', array('uses' => 'CreateSurveyController@createquestion', 'as'=>'createquestion'));

Route::post('createchoice', array('uses' => 'CreateSurveyController@createchoice', 'as'=>'createchoice'));

Route::post('createnumericchoice', array('uses' => 'CreateSurveyController@createnumericchoice', 'as'=>'createnumericchoice'));


Route::get('/createcontents/{id}', function($id)
{
	return View::make('createcontents')->with('id', $id);
});

Route::get('deletetab/{id}', array('uses' => 'DeleteSurveyController@deletetab'));
Route::get('deletequestion/{id}', array('uses' => 'DeleteSurveyController@deletequestion'));
Route::get('deletechoice/{id}', array('uses' => 'DeleteSurveyController@deletechoice'));
Route::get('deletenumericchoice/{id}', array('uses' => 'DeleteSurveyController@deletenumericchoice'));