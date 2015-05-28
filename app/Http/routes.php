<?php

App::bind('App\Repositories\EntriesInterface', 'App\Repositories\TweetsRepository');

//Route::get('/query/{q}', 'HomeController@index');
Route::get('/search/{q}', 'HomeController@nav');
Route::get('/search', 'HomeController@search');

Route::get('/','HomeController@goodBad');


Route::group(['prefix' => 'api'], function(){
    Route::post('rate', 'HomeController@postTweet');
});