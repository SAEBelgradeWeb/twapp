<?php

App::bind('App\Repositories\EntriesInterface', 'App\Repositories\TweetsRepository');

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'api'], function(){
    Route::post('rate', 'HomeController@postTweet');
});