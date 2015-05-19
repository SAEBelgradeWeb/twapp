<?php

App::bind('App\Repositories\EntriesInterface', 'App\Repositories\TweetsRepository');

Route::get('/query/{q}', 'HomeController@index');

Route::group(['prefix' => 'api'], function(){
    Route::post('rate', 'HomeController@postTweet');
});